<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat_template_model extends CI_Model
{
    public function kd_sertifikat_auto()
    {
        $this->db->select('RIGHT(sertifikat_template.kd_sertifikat,3) as kd_sertifikat', FALSE);
        $this->db->order_by('kd_sertifikat', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('sertifikat_template');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kd = intval($data->kd_sertifikat) + 1;
        } else {
            $kd = 1;
        }
        $batas = str_pad($kd, 3, "0", STR_PAD_LEFT);
        $kdsertifikat = "CPIB-" . $batas;
        return $kdsertifikat;
    }

    public function semuaSertifikat()
    {
        return $this->db->get('sertifikat_template')->result_array();
    }

    public function sertifikat($kd_sertifikat)
    {
        return $this->db->get_where('sertifikat_template', ['kd_sertifikat' => $kd_sertifikat])->row();
    }

    public function tambah()
    {
        $config['upload_path']    = './assets/sertifikat/template';
        $config['allowed_types']  = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_template')) {
            $file_template = $this->upload->data('file_name');
            $preview_template = 'preview-' . $this->upload->data('file_name');
            $path = APPPATH . '../assets/sertifikat/template/';

            if (!copy($path . $file_template, $path . $preview_template)) {
                echo "failed to copy $file_template...\n";
                return FALSE;
            };

            $sertifikat = [
                'kd_sertifikat' => $this->input->post('kd_sertifikat'),
                'nama_sertifikat' => $this->input->post('nama_sertifikat'),
                'file_template' => $file_template,
                'preview_template' => $preview_template
            ];

            if ($this->db->insert('sertifikat_template', $sertifikat)) return TRUE;
        } else {
            return FALSE;
        }
    }

    public function save()
    {
        $template = [
            'no_surat' => $this->input->post('no_surat'),
            's_no_surat' => $this->input->post('s_no_surat'),
            'x_no_surat' => $this->input->post('x_no_surat'),
            'y_no_surat' => $this->input->post('y_no_surat'),
            'supplier' => $this->input->post('supplier'),
            's_supplier' => $this->input->post('s_supplier'),
            'x_supplier' => $this->input->post('x_supplier'),
            'y_supplier' => $this->input->post('y_supplier'),
            'alamat' => $this->input->post('alamat'),
            'w_alamat' => $this->input->post('w_alamat'),
            's_alamat' => $this->input->post('s_alamat'),
            'x_alamat' => $this->input->post('x_alamat'),
            'y_alamat' => $this->input->post('y_alamat'),
            'y_alamat' => $this->input->post('y_alamat'),
            'jenis_produk' => $this->input->post('jenis_produk'),
            's_jenis_produk' => $this->input->post('s_jenis_produk'),
            'x_jenis_produk' => $this->input->post('x_jenis_produk'),
            'y_jenis_produk' => $this->input->post('y_jenis_produk'),
            'penanganan' => $this->input->post('penanganan'),
            'w_penanganan' => $this->input->post('w_penanganan'),
            's_penanganan' => $this->input->post('s_penanganan'),
            'x_penanganan' => $this->input->post('x_penanganan'),
            'y_penanganan' => $this->input->post('y_penanganan'),
            'klasifikasi' => $this->input->post('klasifikasi'),
            's_klasifikasi' => $this->input->post('s_klasifikasi'),
            'x_klasifikasi' => $this->input->post('x_klasifikasi'),
            'y_klasifikasi' => $this->input->post('y_klasifikasi'),
            'tgl_inspeksi' => $this->input->post('tgl_inspeksi'),
            's_tgl_inspeksi' => $this->input->post('s_tgl_inspeksi'),
            'x_tgl_inspeksi' => $this->input->post('x_tgl_inspeksi'),
            'y_tgl_inspeksi' => $this->input->post('y_tgl_inspeksi'),
            'berlaku_sampai' => $this->input->post('berlaku_sampai'),
            's_berlaku_sampai' => $this->input->post('s_berlaku_sampai'),
            'x_berlaku_sampai' => $this->input->post('x_berlaku_sampai'),
            'y_berlaku_sampai' => $this->input->post('y_berlaku_sampai'),
            'dikeluarkan_di' => $this->input->post('dikeluarkan_di'),
            's_dikeluarkan_di' => $this->input->post('s_dikeluarkan_di'),
            'x_dikeluarkan_di' => $this->input->post('x_dikeluarkan_di'),
            'y_dikeluarkan_di' => $this->input->post('y_dikeluarkan_di'),
            'tgl' => $this->input->post('tgl'),
            's_tgl' => $this->input->post('s_tgl'),
            'x_tgl' => $this->input->post('x_tgl'),
            'y_tgl' => $this->input->post('y_tgl'),
            'kepala_upt' => $this->input->post('kepala_upt'),
            's_kepala_upt' => $this->input->post('s_kepala_upt'),
            'x_kepala_upt' => $this->input->post('x_kepala_upt'),
            'y_kepala_upt' => $this->input->post('y_kepala_upt'),
            'head_of' => $this->input->post('head_of'),
            's_head_of' => $this->input->post('s_head_of'),
            'x_head_of' => $this->input->post('x_head_of'),
            'y_head_of' => $this->input->post('y_head_of'),

        ];

        if ($this->db->update('sertifikat_template', $template, ['kd_sertifikat' => $this->input->post('kd_sertifikat')])) return TRUE;
    }
}
