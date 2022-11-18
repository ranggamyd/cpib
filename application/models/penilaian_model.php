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

  public function semuaPenilaian()
  {
    $this->db->join('miniplant_supplier', 'miniplant_supplier.kd_pengajuan = penilaian.kd_pengajuan', 'left');
    $this->db->join('suppliers', 'suppliers.kd_supplier = penilaian.kd_supplier', 'left');
    return $this->db->get('penilaian')->result_array();
  }

  public function tambah()
  {
    $penilaian = [
      'kd_penilaian' => $this->input->post('kd_penilaian'),
      'kd_pengajuan' => $this->input->post('kd_pengajuan'),
      'tgl_inspeksi' => $this->input->post('tgl_inspeksi'),
      'kd_supplier' => $this->input->post('kd_supplier'),
      'jenis_supplier' => $this->input->post('jenis_supplier'),
      'kd_tim_inspeksi' => $this->input->post('kd_tim_inspeksi'),
      'jml_minor' => $this->input->post('jmlMinor'),
      'jml_mayor' => $this->input->post('jmlMayor'),
      'jml_serius' => $this->input->post('jmlSerius'),
      'jml_kritis' => $this->input->post('jmlKritis'),
      'klasifikasi' => $this->input->post('klasifikasi'),
      'is_need_revisi' => $this->input->post('is_needRevisi') ? 1 : 0,
    ];

    if (!$this->tambah_tahap_penanganan()) return FALSE;
    if (!$this->tambah_detail()) return FALSE;
    if (!$this->db->insert('penilaian', $penilaian)) return FALSE;
    if ($this->input->post('notes')['revisi']) $this->tambah_notes();

    if ($this->input->post('is_needRevisi') == 1) {
      if ($this->db->update('pengajuan', ['status' => 'Perlu Revisi'], ['kd_pengajuan' => $this->input->post('kd_pengajuan')])) return TRUE;
    } else {
      if ($this->db->update('pengajuan', ['status' => 'Lolos Inspeksi'], ['kd_pengajuan' => $this->input->post('kd_pengajuan')])) return TRUE;
    }
  }

  private function tambah_detail()
  {
    $penilaian_detail = [];
    $minor = 0;
    $mayor = 0;
    $serius = 0;
    $kritis = 0;
    foreach ($this->db->get('sub_daftar_isian')->result_array() as $item) {
      if ($this->input->post($item['id'])) {
        $nilai = [
          'kd_penilaian' => $this->input->post('kd_penilaian'),
          'id_subisian' => $item['id'],
          'is_minor' => 0,
          'is_mayor' => 0,
          'is_serius' => 0,
          'is_kritis' => 0,
        ];

        switch ($this->input->post($item['id'])) {
          case 'is_minor':
            $nilai['is_minor'] = 1;
            $minor += 1;
            break;
          case 'is_mayor':
            $nilai['is_mayor'] = 1;
            $mayor += 1;
            break;
          case 'is_serius':
            $nilai['is_serius'] = 1;
            $serius += 1;
            break;
          case 'is_kritis':
            $nilai['is_kritis'] = 1;
            $kritis += 1;
            break;
        }

        array_push($penilaian_detail, $nilai);
      }
    }

    if (!$penilaian_detail) return FALSE;
    if ($this->db->insert_batch('penilaian_detail', $penilaian_detail)) return TRUE;
  }

  private function tambah_tahap_penanganan()
  {
    $penilaian_tahap_penanganan = [];
    foreach ($this->input->post('tahap_penanganan') as $item) {
      $tahap_penanganan = [
        'kd_penilaian' => $this->input->post('kd_penilaian'),
        'kd_penanganan' => $item['kd_penanganan'],
      ];

      array_push($penilaian_tahap_penanganan, $tahap_penanganan);
    }

    if ($this->db->insert_batch('penilaian_tahap_penanganan', $penilaian_tahap_penanganan)) return TRUE;
  }

  private function tambah_notes()
  {
    $penilaian_notes = [];
    foreach ($this->input->post('notes') as $item) {
      $notes = [
        'kd_penilaian' => $this->input->post('kd_penilaian'),
        'revisi' => $item['revisi'],
      ];

      array_push($penilaian_notes, $notes);
    }

    if ($this->db->insert_batch('penilaian_notes', $penilaian_notes)) return TRUE;
  }
}
