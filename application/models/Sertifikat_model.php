<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat_model extends CI_Model
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
        $kdsupplier = "CPIB-" . $batas;
        return $kdsupplier;
    }

    public function semuaSertifikat()
    {
        $this->db->join('jenis_produk', 'jenis_produk.kd_jenis_produk = suppliers.kd_jenis_produk', 'left');
        return $this->db->get('suppliers')->result_array();
    }
}
