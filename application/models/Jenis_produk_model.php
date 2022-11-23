<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_produk_model extends CI_Model
{
    public function kd_jenis_produk_auto()
    {
        $this->db->select('RIGHT(jenis_produk.kd_jenis_produk,3) as kd_jenis_produk', FALSE);
        $this->db->order_by('kd_jenis_produk', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('jenis_produk');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kd = intval($data->kd_jenis_produk) + 1;
        } else {
            $kd = 1;
        }
        $batas = str_pad($kd, 3, "0", STR_PAD_LEFT);
        $kdjenis_produk = "JPK-" . $batas;
        return $kdjenis_produk;
    }

    public function semuaJenisProduk()
    {
        return $this->db->get('jenis_produk')->result_array();
    }

    public function tambah()
    {
        $data = [
            'kd_jenis_produk' => $this->input->post('kd_jenis_produk'),
            'jenis_produk' => $this->input->post('jenis_produk'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        if ($this->db->insert('jenis_produk', $data)) return TRUE;
    }

    public function ubah()
    {
        $data = [
            'jenis_produk' => $this->input->post('jenis_produk'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        if ($this->db->update('jenis_produk', $data, ['kd_jenis_produk' => $this->input->post('kd_jenis_produk')])) return TRUE;
    }

    public function hapus($kd_jenis_produk)
    {
        if ($this->db->delete('jenis_produk', ['kd_jenis_produk' => $kd_jenis_produk])) return TRUE;
    }
}
