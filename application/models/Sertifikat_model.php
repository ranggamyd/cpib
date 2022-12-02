<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat_model extends CI_Model
{
    public function semuaSertifikat()
    {
        $this->db->order_by('tgl', 'desc');
        $this->db->order_by('id', 'desc');
        return $this->db->get('sertifikat')->result_array();
    }

    public function sertifikat($kd_sertifikat)
    {
        return $this->db->get_where('sertifikat', ['kd_sertifikat' => $kd_sertifikat])->row();
    }

    public function generate()
    {
        $sertifikat = $this->generate_certificate();

        if (!$sertifikat) return FALSE;

        $sertifikat = [
            'kd_supplier' => $this->input->post('kd_supplier'),
            'kd_penilaian' => $this->input->post('kd_penilaian'),
            'kd_sertifikat' => $this->input->post('kd_sertifikat'),
            'no_surat' => $this->input->post('no_surat'),
            'tgl' => $this->input->post('tgl'),
            'berlaku_sampai' => $this->input->post('berlaku_sampai'),
            'kepala_upt' => $this->input->post('kepala_upt'),
            'file_sertifikat' => $sertifikat
        ];

        if (!$this->db->update('pengajuan', ['status' => 'Lolos'], ['kd_pengajuan' => $this->db->get_where('penilaian', ['kd_penilaian' => $this->input->post('kd_penilaian')])->row('kd_pengajuan')])) return FALSE;
        if (!$this->db->update('penilaian', ['status' => 'Lolos'], ['kd_penilaian' => $this->input->post('kd_penilaian')])) return FALSE;
        if ($this->db->insert('sertifikat', $sertifikat)) return TRUE;
    }

    private function generate_certificate()
    {
        $this->load->library('Pdf');

        $template = $this->db->get_where('sertifikat_template', ['kd_sertifikat' => $this->input->post('kd_sertifikat')])->row();
        $supplier = $this->db->get_where('suppliers', ['kd_supplier' => $this->input->post('kd_supplier')])->row();
        $penilaian = $this->db->get_where('penilaian', ['kd_penilaian' => $this->input->post('kd_penilaian')])->row();
        $jenis_produk = $this->db->get_where('jenis_produk', ['kd_pengajuan' => $penilaian->kd_pengajuan])->result_array();
        $this->db->join('penanganan', 'penanganan.kd_penanganan = penilaian_penanganan.kd_penanganan', 'left');
        $tahap_penanganan = $this->db->get_where('penilaian_penanganan', ['kd_penilaian' => $penilaian->kd_penilaian])->result_array();

        $font = APPPATH . '..\assets\fonts\HELVETICA.TTF';
        $image = imagecreatefromjpeg(base_url('assets/sertifikat/template/' . $template->file_template));
        $color = imagecolorallocate($image, 0, 0, 0);

        imagettftext($image, $template->s_no_surat, 0, $template->x_no_surat, $template->y_no_surat, $color, $font, $this->input->post('no_surat'));
        imagettftext($image, $template->s_supplier, 0, $template->x_supplier, $template->y_supplier, $color, $font, $supplier->nama_miniplant);
        imagettftext($image, $template->s_alamat, 0, $template->x_alamat, $template->y_alamat, $color, $font, wordwrap($supplier->alamat, $template->w_alamat));
        imagettftext($image, $template->s_jenis_produk, 0, $template->x_jenis_produk, $template->y_jenis_produk, $color, $font, implode(", ", array_column($jenis_produk, "jenis_produk")));
        imagettftext($image, $template->s_penanganan, 0, $template->x_penanganan, $template->y_penanganan, $color, $font, wordwrap(implode(" - ", array_column($tahap_penanganan, "nama_penanganan")), $template->w_penanganan));
        imagettftext($image, $template->s_klasifikasi, 0, $template->x_klasifikasi, $template->y_klasifikasi, $color, $font, $penilaian->klasifikasi);
        imagettftext($image, $template->s_tgl_inspeksi, 0, $template->x_tgl_inspeksi, $template->y_tgl_inspeksi, $color, $font, date('d M Y', strtotime($penilaian->tgl_inspeksi)));
        imagettftext($image, $template->s_berlaku_sampai, 0, $template->x_berlaku_sampai, $template->y_berlaku_sampai, $color, $font, date('d M Y', strtotime($this->input->post('berlaku_sampai'))));
        imagettftext($image, $template->s_dikeluarkan_di, 0, $template->x_dikeluarkan_di, $template->y_dikeluarkan_di, $color, $font, $this->input->post('dikeluarkan_di'));
        imagettftext($image, $template->s_tgl, 0, $template->x_tgl, $template->y_tgl, $color, $font, date('d M Y', strtotime($this->input->post('tgl'))));
        imagettftext($image, $template->s_kepala_upt, 0, $template->x_kepala_upt, $template->y_kepala_upt, $color, $font, $this->input->post('kepala_upt'));
        imagettftext($image, $template->s_head_of, 0, $template->x_head_of, $template->y_head_of, $color, $font, $this->input->post('head_of'));

        $fileName = $template->kd_sertifikat . '-' . $supplier->kd_supplier . '-' . date('YmdHis');

        $output = APPPATH . '../assets/sertifikat/' . $fileName;
        imagejpeg($image, $output . '.jpg');

        $pdf = new FPDF('P', 'in', [8.27, 11.7]);
        $pdf->AddPage();
        $pdf->Image($output . '.jpg', 0, 0, 8.27, 11.7);
        $title = 'Sertifikat CPIB - ' . $supplier->nama_miniplant;
        $pdf->SetTitle($title);
        $pdf->SetAuthor('BKIPM Cirebon');
        $pdf->Output($output . '.pdf', 'F');

        return $fileName;
    }

    public function hapus($id)
    {
        if ($this->db->delete('sertifikat', ['id' => $id])) return TRUE;
    }
}
