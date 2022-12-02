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
    $this->db->join('suppliers', 'suppliers.kd_supplier = perbaikan.kd_supplier', 'left');
    $this->db->order_by('tgl_perbaikan', 'desc');
    $this->db->order_by('kd_perbaikan', 'desc');
    return $this->db->get('perbaikan')->result_array();
  }

  public function perbaikan($kd_perbaikan)
  {
    $this->db->join('penilaian', 'penilaian.kd_penilaian = perbaikan.kd_penilaian', 'left');
    $this->db->join('suppliers', 'suppliers.kd_supplier = perbaikan.kd_supplier', 'left');
    return $this->db->get_where('perbaikan', ['kd_perbaikan' => $kd_perbaikan])->row();
  }

  public function validasi()
  {
    $kd_perbaikan = $this->input->post('kd_perbaikan');
    $kd_penilaian = $this->input->post('kd_penilaian');

    if (!$this->db->update('penilaian', ['status' => 'Lolos', 'klasifikasi' => $this->input->post('klasifikasi')], ['kd_penilaian' => $kd_penilaian])) return FALSE;
    if ($this->db->update('perbaikan', ['status' => 'Lolos'], ['kd_perbaikan' => $kd_perbaikan])) return TRUE;
  }

  public function revisiKembali()
  {
    $kd_penilaian = $this->input->post('kd_penilaian');
    $kd_perbaikan = $this->input->post('kd_perbaikan');

    if (!$this->input->post('notes')[0]['revisi']) return FALSE;
    if (!$this->db->update('penilaian', ['status' => 'Perlu Revisi'], ['kd_penilaian' => $kd_penilaian])) return FALSE;
    if (!$this->db->update('perbaikan', ['status' => 'Perlu revisi kembali'], ['kd_perbaikan' => $kd_perbaikan])) return FALSE;
    $penilaian_notes = [];
    foreach ($this->input->post('notes') as $item) {
      $notes = [
        'kd_penilaian' => $kd_penilaian,
        'notes' => $item['revisi'],
      ];

      array_push($penilaian_notes, $notes);
    }

    if ($this->db->insert_batch('penilaian_notes', $penilaian_notes)) return TRUE;
  }
}
