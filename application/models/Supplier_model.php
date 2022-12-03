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
        $this->db->join('users', 'users.kd_supplier = suppliers.kd_supplier', 'left');
        $this->db->order_by('suppliers.kd_supplier', 'desc');
        return $this->db->get('suppliers')->result_array();
    }
    public function suppliersBaru()
    {
        $this->db->join('users', 'users.kd_supplier = suppliers.kd_supplier', 'left');
        $this->db->order_by('is_active');
        $this->db->order_by('suppliers.kd_supplier', 'desc');
        return $this->db->get('suppliers')->result_array();
    }

    public function supplier($kd_supplier)
    {
        $this->db->join('users', 'users.kd_supplier = suppliers.kd_supplier', 'left');
        return $this->db->get_where('suppliers', ['suppliers.kd_supplier' => $kd_supplier])->row();
    }

    public function tambah()
    {
        $kd_supplier = $this->input->post('kd_supplier');
        $nama_miniplant = $this->input->post('nama_miniplant');
        $nama_pimpinan = $this->input->post('nama_pimpinan');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $no_fax = $this->input->post('no_fax');
        $alamat = $this->input->post('alamat');

        $data = [
            'kd_supplier' => $kd_supplier,
            'nama_miniplant' => $nama_miniplant,
            'nama_pimpinan' => $nama_pimpinan,
            'no_telp' => $no_telp,
            'email' => $email,
            'no_fax' => $no_fax,
            'alamat' => $alamat,
        ];

        if (!$this->db->insert('suppliers', $data)) return FALSE;

        $user = [
            'name' => $nama_miniplant,
            'phone' => $no_telp,
            'email' => $email,
            'password' => md5($no_telp),
            'kd_supplier' => $kd_supplier,
            'is_active' => 0
        ];

        if ($this->db->insert('users', $user)) return TRUE;
    }

    public function ubah()
    {
        $kd_supplier = $this->input->post('kd_supplier');
        $nama_miniplant = $this->input->post('nama_miniplant');
        $nama_pimpinan = $this->input->post('nama_pimpinan');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $no_fax = $this->input->post('no_fax');
        $alamat = $this->input->post('alamat');

        $data = [
            // 'kd_supplier' => $kd_supplier,
            'nama_miniplant' => $nama_miniplant,
            'nama_pimpinan' => $nama_pimpinan,
            'no_telp' => $no_telp,
            'email' => $email,
            'no_fax' => $no_fax,
            'alamat' => $alamat,
        ];

        if (!$this->db->update('suppliers', $data, ['kd_supplier' => $kd_supplier])) return FALSE;

        $user = [
            'name' => $nama_miniplant,
            'phone' => $no_telp,
            'email' => $email,
            // 'password' => md5($no_telp),
            // 'kd_supplier' => $kd_supplier,
            // 'is_active' => 0
        ];

        if ($this->db->update('users', $user, ['kd_supplier' => $kd_supplier])) return TRUE;
    }

    public function hapus($kd_supplier)
    {
        if (!$this->db->delete('suppliers', ['kd_supplier' => $kd_supplier])) return FALSE;
        if ($this->db->delete('users', ['kd_supplier' => $kd_supplier])) return TRUE;
    }

    public function activation($kd_supplier)
    {
        $where = ['kd_supplier' => $kd_supplier];
        $supp = $this->db->get_where('users', $where)->row('is_active');

        if ($supp == 0) {
            $this->db->update('users', ['is_active' => 1], $where);
            return 'activated';
        } else {
            $this->db->update('users', ['is_active' => 0], $where);
            return 'nonactivated';
        }
    }
}
