<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_supplier_model extends CI_Model
{
    public function getAll()
    {
        $this->db->join('suppliers', 'pengajuan.kd_supplier = suppliers.kd_supplier');
        return $this->db->get_where('pengajuan', ['pengajuan.kd_supplier' => 'SPL-001'])->result_array();
    }
}
