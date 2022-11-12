<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
  public function kd_penilaian_auto()
  {
    $this->db->select('RIGHT(penilaian.kd_penilaian,4) as kd_penilaian', FALSE);
    $this->db->order_by('kd_penilaian', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('penilaian');
    if ($query->num_rows() <> 0) {
      $data = $query->row();
      $kd = intval($data->kd_penilaian) + 1;
    } else {
      $kd = 1;
    }
    $batas = str_pad($kd, 4, "0", STR_PAD_LEFT);
    $kdpenilaian = "PKS-" . $batas;
    return $kdpenilaian;
  }
}
