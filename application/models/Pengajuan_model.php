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
        return $this->db->get('pengajuan')->result_array();
    }

    public function pengajuan($kd_pengajuan)
    {
        $this->db->join('suppliers', 'suppliers.kd_supplier = pengajuan.kd_supplier', 'left');
        $this->db->join('jenis_produk', 'jenis_produk.kd_jenis_produk = suppliers.kd_jenis_produk', 'left');
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
            }
        };

        $kd_pengajuan = $this->input->post('kd_pengajuan');
        $kd_supplier = $this->input->post('kd_supplier');
        $nama_miniplant = $this->input->post('nama_miniplant');
        $tgl_pengajuan = $this->input->post('tgl_pengajuan');

        foreach ($this->input->post('kd_jenis_produk') as $item) {
            $jenis_produk = [
                'kd_pengajuan' => $kd_pengajuan,
                'kd_supplier' => $kd_supplier,
                'kd_jenis_produk' => $item,
            ];

            if (!$this->db->insert('jenis_produk_supplier', $jenis_produk)) return FALSE;
        };

        $miniplant = [
            'kd_pengajuan' => $kd_pengajuan,
            'kd_supplier' => $kd_supplier,
            'nama_miniplant' => $nama_miniplant,
        ];

        if (!$this->db->insert('miniplant_supplier', $miniplant)) return FALSE;

        $data = [
            'kd_pengajuan' => $kd_pengajuan,
            'kd_supplier' => $kd_supplier,
            'nama_miniplant' => $nama_miniplant,
            'tgl_pengajuan' => $tgl_pengajuan,
            'status' => 'Tertunda',
            'ktp' => $uploadedFiles[0],
            'npwp' => $uploadedFiles[1],
            'nib' => $uploadedFiles[2],
            'siup' => $uploadedFiles[3],
            'akta_usaha' => array_key_exists(4, $uploadedFiles) ? $uploadedFiles[4] : '',
            'imb' => array_key_exists(5, $uploadedFiles) ? $uploadedFiles[5] : '',
            'layout' => array_key_exists(6, $uploadedFiles) ? $uploadedFiles[6] : '',
            'panduan_mutu' => array_key_exists(7, $uploadedFiles) ? $uploadedFiles[7] : '',
        ];

        if ($this->db->insert('pengajuan', $data)) return TRUE;
    }

    public function hapus($kd_pengajuan)
    {
        if ($this->db->delete('pengajuan', ['kd_pengajuan' => $kd_pengajuan])) return TRUE;
    }

    public function check_team($kd_pengajuan)
    {
        $team = $this->db->get_where('tim_inspeksi', ['kd_pengajuan' => $kd_pengajuan]);
        if ($team->num_rows() > 0) return $team;
    }
}
