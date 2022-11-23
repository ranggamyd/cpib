<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perbaikan_model extends CI_Model
{
  public function kd_perbaikan_auto()
  {
    $this->db->select('RIGHT(perbaikan.kd_perbaikan,4) as kd_perbaikan', FALSE);
    $this->db->order_by('kd_perbaikan', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('perbaikan');
    if ($query->num_rows() <> 0) {
      $data = $query->row();
      $kd = intval($data->kd_perbaikan) + 1;
    } else {
      $kd = 1;
    }
    $batas = str_pad($kd, 4, "0", STR_PAD_LEFT);
    $kdperbaikan = "PAJ-" . $batas;
    return $kdperbaikan;
  }

  public function semuaPerbaikanAjuan()
  {
    $this->db->join('penilaian', 'penilaian.kd_penilaian = perbaikan.kd_penilaian', 'left');
    $this->db->join('suppliers', 'suppliers.kd_supplier = perbaikan.kd_supplier', 'left');
    return $this->db->get('perbaikan')->result_array();
  }

  public function perbaikan($kd_perbaikan)
  {
    $this->db->join('penilaian', 'penilaian.kd_penilaian = perbaikan.kd_penilaian', 'left');
    $this->db->join('suppliers', 'suppliers.kd_supplier = perbaikan.kd_supplier', 'left');
    return $this->db->get_where('perbaikan', ['kd_perbaikan' => $kd_perbaikan])->row();
  }
}
