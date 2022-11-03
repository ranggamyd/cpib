<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    public function kd_supplier_auto()
    {
        $this->db->select('RIGHT(supplier.kd_supplier,3) as kd_supplier', FALSE);
        $this->db->order_by('kd_supplier', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('supplier');
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

    public function read_supplier()
    {
        return $this->db->get('supplier')->result_array();
    }

    public function tambah_supplier($data_supplier)
    {
        $this->db->insert('supplier', $data_supplier);
    }

    public function update_supplier($kd_supplier, $data_supplier)
    {
        $this->db->where('kd_supplier', $kd_supplier);
        $this->db->update('supplier', $data_supplier);
    }
}
