<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    public function kd_supplier_auto()
    {
        $this->db->select('RIGHT(suppliers.kd_supplier,3) as kd_supplier', FALSE);
        $this->db->order_by('kd_supplier', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('suppliers');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kd = intval($data->kd_supplier) + 1;
        } else {
            $kd = 1;
        }
        $batas = str_pad($kd, 3, "0", STR_PAD_LEFT);
        $kdsupplier = "SPL-" . $batas;
        return $kdsupplier;
    }

    public function suppliers()
    {

        $this->db->join('jenis_produk', 'jenis_produk.kd_jenis_produk = suppliers.kd_jenis_produk', 'left');
        return $this->db->get('suppliers')->result_array();
    }

    public function tambah()
    {
        $data = [
            'kd_supplier' => $this->input->post('kd_supplier'),
            'nama_supplier' => $this->input->post('nama_supplier'),
            'nama_miniplant' => $this->input->post('nama_miniplant'),
            'kd_jenis_produk' => $this->input->post('kd_jenis_produk'),
            'alamat' => $this->input->post('alamat'),
        ];

        if (!$this->db->insert('suppliers', $data)) return FALSE;

        $kd_supplier = $this->input->post('kd_supplier');
        $name = $this->input->post('nama_supplier');
        $username = $this->input->post('kd_supplier') . '_' . strtok($name, ' ');
        $user = [
            'name' => $name,
            'username' => $username,
            'password' => $username,
            'kd_supplier' => $kd_supplier,
        ];

        if ($this->db->insert('users', $user)) return TRUE;
    }

    public function ubah()
    {
        $data = [
            'nama_supplier' => $this->input->post('nama_supplier'),
            'nama_miniplant' => $this->input->post('nama_miniplant'),
            'kd_jenis_produk' => $this->input->post('kd_jenis_produk'),
            'alamat' => $this->input->post('alamat'),
        ];

        if ($this->db->update('suppliers', $data, ['kd_supplier' => $this->input->post('kd_supplier')])) return TRUE;
    }

    public function hapus()
    {
        $kd_supplier = $this->input->post('kd_supplier');
        if (!$this->db->delete('suppliers', ['kd_supplier' => $kd_supplier])) return FALSE;
        if ($this->db->delete('users', ['kd_supplier' => $kd_supplier])) return TRUE;
    }
}
