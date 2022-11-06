<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perbaikan_ajuan_model extends CI_Model
{
  public function kd_perbaikan_ajuan_auto()
  {
    $this->db->select('RIGHT(perbaikan_ajuan.kd_perbaikan_ajuan,4) as kd_perbaikan_ajuan', FALSE);
    $this->db->order_by('kd_perbaikan_ajuan', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('perbaikan_ajuan');
    if ($query->num_rows() <> 0) {
      $data = $query->row();
      $kd = intval($data->kd_perbaikan_ajuan) + 1;
    } else {
      $kd = 1;
    }
    $batas = str_pad($kd, 4, "0", STR_PAD_LEFT);
    $kdperbaikan_ajuan = "PAJ-" . $batas;
    return $kdperbaikan_ajuan;
  }

  public function semuaPerbaikanAjuan()
  {
    $this->db->join('suppliers', 'suppliers.kd_supplier = perbaikan_ajuan.kd_supplier', 'left');
    $this->db->join('jenis_produk', 'jenis_produk.kd_jenis_produk = suppliers.kd_jenis_produk', 'left');
    $this->db->join('pengajuan', 'pengajuan.kd_pengajuan = perbaikan_ajuan.kd_pengajuan', 'left');
    return $this->db->get('perbaikan_ajuan')->result_array();
  }

  public function perbaikan_ajuan($kd_perbaikan_ajuan)
  {
    $this->db->join('suppliers', 'suppliers.kd_supplier = perbaikan_ajuan.kd_supplier', 'left');
    $this->db->join('jenis_produk', 'jenis_produk.kd_jenis_produk = suppliers.kd_jenis_produk', 'left');
    $this->db->join('pengajuan', 'pengajuan.kd_pengajuan = perbaikan_ajuan.kd_pengajuan', 'left');
    return $this->db->get_where('perbaikan_ajuan', ['kd_perbaikan_ajuan' => $kd_perbaikan_ajuan])->row();
  }
}
