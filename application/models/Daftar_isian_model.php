<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_isian_model extends CI_Model
{
    public function kd_daftar_isian_auto()
    {
        $this->db->select('RIGHT(daftar_isian.kd_daftar_isian,3) as kd_daftar_isian', FALSE);
        $this->db->order_by('kd_daftar_isian', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('daftar_isian');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kd = intval($data->kd_daftar_isian) + 1;
        } else {
            $kd = 1;
        }
        $batas = str_pad($kd, 3, "0", STR_PAD_LEFT);
        $kddaftar_isian = "CKS-" . $batas;
        return $kddaftar_isian;
    }

    public function semuaDaftar_isian()
    {
        return $this->db->get('daftar_isian')->result_array();
    }

    // public function tambah()
    // {
    //     $config['upload_path']    = './assets/dokumen';
    //     $config['allowed_types']  = 'jpg|png|jpeg|pdf';

    //     $this->load->library('upload', $config);

    //     $files = ['ktp', 'npwp', 'nib', 'siup', 'akta_usaha', 'imb', 'layout', 'panduan_mutu'];

    //     $uploadedFiles = [];
    //     foreach ($files as $item) {
    //         if ($this->upload->do_upload($item)) {
    //             $fileName = $this->upload->data('file_name');
    //             array_push($uploadedFiles, $fileName);
    //         }
    //     };

    //     $kd_daftar_isian = $this->input->post('kd_daftar_isian');
    //     $kd_supplier = $this->input->post('kd_supplier');
    //     $tgl_daftar_isian = $this->input->post('tgl_daftar_isian');

    //     $data = [
    //         'kd_daftar_isian' => $kd_daftar_isian,
    //         'kd_supplier' => $kd_supplier,
    //         'tgl_daftar_isian' => $tgl_daftar_isian,
    //         'status' => 'Tertunda',
    //         'ktp' => $uploadedFiles[0],
    //         'npwp' => $uploadedFiles[1],
    //         'nib' => $uploadedFiles[2],
    //         'siup' => $uploadedFiles[3],
    //         'akta_usaha' => $uploadedFiles[4],
    //         'imb' => $uploadedFiles[5],
    //         'layout' => $uploadedFiles[6],
    //         'panduan_mutu' => $uploadedFiles[7],
    //     ];

    //     if ($this->db->insert('daftar_isian', $data)) return TRUE;
    // }



    // public function daftar_isian($kd_daftar_isian)
    // {
    //     $this->db->join('suppliers', 'suppliers.kd_supplier = daftar_isian.kd_supplier', 'left');
    //     $this->db->join('jenis_produk', 'jenis_produk.kd_jenis_produk = suppliers.kd_jenis_produk', 'left');
    //     return $this->db->get_where('daftar_isian', ['kd_daftar_isian' => $kd_daftar_isian])->row();
    // }
}
