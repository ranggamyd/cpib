<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
    public function kd_pengajuan_auto()
    {
        $this->db->select('RIGHT(pengajuan.kd_pengajuan,4) as kd_pengajuan', FALSE);
        $this->db->order_by('kd_pengajuan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pengajuan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kd = intval($data->kd_pengajuan) + 1;
        } else {
            $kd = 1;
        }
        $batas = str_pad($kd, 4, "0", STR_PAD_LEFT);
        $kdpengajuan = "REG-" . $batas;
        return $kdpengajuan;
    }

    public function semuaPengajuan()
    {
        $this->db->join('suppliers', 'suppliers.kd_supplier = pengajuan.kd_supplier', 'left');
        $this->db->order_by('tgl_pengajuan', 'desc');
        $this->db->order_by('kd_pengajuan', 'desc');
        return $this->db->get('pengajuan')->result_array();
    }

    public function pengajuanTertunda()
    {
        $this->db->join('suppliers', 'suppliers.kd_supplier = pengajuan.kd_supplier', 'left');
        return $this->db->get_where('pengajuan', ['status' => 'Tertunda'])->result_array();
    }

    public function pengajuan($kd_pengajuan)
    {
        $this->db->join('suppliers', 'suppliers.kd_supplier = pengajuan.kd_supplier', 'left');
        return $this->db->get_where('pengajuan', ['kd_pengajuan' => $kd_pengajuan])->row();
    }

    public function tambah()
    {
        $config['upload_path']    = './assets/dokumen';
        $config['allowed_types']  = 'jpg|png|jpeg|pdf';

        $this->load->library('upload', $config);

        $files = ['ktp', 'npwp', 'nib', 'siup', 'akta_usaha', 'imb', 'layout', 'panduan_mutu'];

        $uploadedFiles = [];
        foreach ($files as $item) {
            if ($this->upload->do_upload($item)) {
                $fileName = $this->upload->data('file_name');
                array_push($uploadedFiles, $fileName);
            } else {
                array_push($uploadedFiles, null);
            }
        };

        $kd_pengajuan = $this->input->post('kd_pengajuan');
        $kd_supplier = $this->input->post('kd_supplier');

        $data = [
            'kd_pengajuan' => $kd_pengajuan,
            'kd_supplier' => $kd_supplier,
            'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
            'status' => 'Tertunda',
            'ktp' => $uploadedFiles[0],
            'npwp' => $uploadedFiles[1],
            'nib' => array_key_exists(2, $uploadedFiles) ? $uploadedFiles[2] : '',
            'siup' => array_key_exists(3, $uploadedFiles) ? $uploadedFiles[3] : '',
            'akta_usaha' => array_key_exists(4, $uploadedFiles) ? $uploadedFiles[4] : '',
            'imb' => array_key_exists(5, $uploadedFiles) ? $uploadedFiles[5] : '',
            'layout' => $uploadedFiles[6],
            'panduan_mutu' => $uploadedFiles[7],
        ];

        $notifikasi = [
            'kd_supplier' => $kd_supplier,
            'kd_pengajuan' => $kd_pengajuan,
            'type' => 'pengajuan',
            'pesan' => 'Pengajuan baru Tertunda, lanjutkan proses sekarang?'
        ];

        if (!$this->db->insert('notifikasi', $notifikasi)) return FALSE;

        if ($this->input->post('jenis_produk')) $this->tambah_jenis_produk();
        if ($this->db->insert('pengajuan', $data)) return TRUE;
    }

    private function tambah_jenis_produk()
    {
        $jenis_produk = [];
        foreach ($this->input->post('jenis_produk') as $item) {
            $produk = [
                'kd_pengajuan' => $this->input->post('kd_pengajuan'),
                'kd_supplier' => $this->input->post('kd_supplier'),
                'jenis_produk' => $item['produk'],
            ];

            array_push($jenis_produk, $produk);
        }

        if ($this->db->insert_batch('jenis_produk', $jenis_produk)) return TRUE;
    }

    public function hapus($kd_pengajuan)
    {
        if ($this->db->delete('pengajuan', ['kd_pengajuan' => $kd_pengajuan])) return TRUE;
    }

    public function tolak_ajuan()
    {
        if ($this->db->update('pengajuan', ['status' => 'Tidak Lolos', 'keterangan' => $this->input->post('keterangan')], ['kd_pengajuan' => $this->input->post('kd_pengajuan')])) return TRUE;
    }

    public function check_team($kd_pengajuan)
    {
        $team = $this->db->get_where('tim_inspeksi', ['kd_pengajuan' => $kd_pengajuan]);
        if ($team->num_rows() > 0) return $team;
    }
}
