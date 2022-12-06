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
    $this->db->join('suppliers', 'suppliers.kd_supplier = penilaian.kd_supplier', 'left');
    $this->db->order_by('tgl_inspeksi', 'desc');
    $this->db->order_by('kd_penilaian', 'desc');
    return $this->db->get('penilaian')->result_array();
  }

  public function penilaian($kd_penilaian)
  {
    $this->db->join('suppliers', 'suppliers.kd_supplier = penilaian.kd_supplier', 'left');
    return $this->db->get_where('penilaian', ['kd_penilaian' => $kd_penilaian])->row();
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
      'catatan' => $this->input->post('catatan'),
      'jml_minor' => $this->input->post('jmlMinor'),
      'jml_mayor' => $this->input->post('jmlMayor'),
      'jml_serius' => $this->input->post('jmlSerius'),
      'jml_kritis' => $this->input->post('jmlKritis'),
      'klasifikasi' => $this->input->post('klasifikasi'),
      'is_need_revisi' => $this->input->post('is_needRevisi') ? 1 : 0,
      'status' => $this->input->post('is_needRevisi') ? 'Perlu Revisi' : 'Menunggu Sertifikat'
    ];

    // update status pengajuan
    $status = $this->input->post('is_needRevisi') ? 'Perlu Revisi' : 'Menunggu Sertifikat';
    if (!$this->db->update('pengajuan', ['status' => $status], ['kd_pengajuan' => $this->input->post('kd_pengajuan')])) return FALSE;

    // insert penilaian
    if (!$this->tambah_tahap_penanganan()) return FALSE;
    if (!$this->tambah_detail()) return FALSE;
    if ($this->input->post('notes')[0]['revisi']) $this->tambah_notes();
    if ($this->db->insert('penilaian', $penilaian)) return TRUE;
  }

  private function tambah_detail()
  {
    $penilaian_detail = [];
    $minor = 0;
    $mayor = 0;
    $serius = 0;
    $kritis = 0;
    foreach ($this->db->get('daftar_isian')->result_array() as $item) {
      if ($this->input->post($item['id'])) {
        $nilai = [
          'kd_penilaian' => $this->input->post('kd_penilaian'),
          'id_daftar_isian' => $item['id'],
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
    $penilaian_penanganan = [];
    foreach ($this->input->post('tahap_penanganan') as $item) {
      $tahap_penanganan = [
        'kd_penilaian' => $this->input->post('kd_penilaian'),
        'kd_penanganan' => $item['kd_penanganan'],
      ];

      array_push($penilaian_penanganan, $tahap_penanganan);
    }

    if ($this->db->insert_batch('penilaian_penanganan', $penilaian_penanganan)) return TRUE;
  }

  private function tambah_notes()
  {
    $penilaian_notes = [];
    foreach ($this->input->post('notes') as $item) {
      $notes = [
        'kd_penilaian' => $this->input->post('kd_penilaian'),
        'notes' => $item['revisi'],
      ];

      array_push($penilaian_notes, $notes);
    }

    if ($this->db->insert_batch('penilaian_notes', $penilaian_notes)) return TRUE;
  }

  public function perbaiki_ajuan()
  {
    $config['upload_path']    = './assets/dokumen';
    $config['allowed_types']  = 'jpg|png|jpeg|pdf';

    $this->load->library('upload', $config);

    $notes = $this->db->get_where('penilaian_notes', ['kd_penilaian' => $this->input->post('kd_penilaian'), 'is_submit' => 0])->result_array();

    foreach ($notes as $item) {
      if ($this->upload->do_upload($item['id'])) {
        $perbaikan_detail = [
          'kd_perbaikan' => $this->input->post('kd_perbaikan'),
          'id_notes' => $item['id'],
          'file_perbaikan' => $this->upload->data('file_name'),
        ];

        if (!$this->db->update('penilaian_notes', ['is_submit' => 1], ['kd_penilaian' => $this->input->post('kd_penilaian')])) return FALSE;

        if (!$this->db->insert('perbaikan_detail', $perbaikan_detail)) return FALSE;
      } else {
        return FALSE;
      }
    };

    $perbaikan = [
      'kd_perbaikan' => $this->input->post('kd_perbaikan'),
      'kd_penilaian' => $this->input->post('kd_penilaian'),
      'kd_supplier' => $this->input->post('kd_supplier'),
      'tgl_perbaikan' => $this->input->post('tgl_perbaikan'),
      'status' => 'Menunggu validasi perbaikan',
    ];

    $notifikasi = [
      'kd_supplier' => $this->input->post('kd_supplier'),
      'kd_perbaikan' => $this->input->post('kd_perbaikan'),
      'type' => 'perbaikan',
      'pesan' => 'Supplier telah melakukan perbaikan, validasi sekarang?'
    ];

    if (!$this->db->insert('notifikasi', $notifikasi)) return FALSE;

    $penilaian = $this->db->get_where('penilaian', ['kd_penilaian' => $this->input->post('kd_penilaian')])->row();
    if (!$this->db->update('pengajuan', ['status' => 'Menunggu validasi perbaikan'], ['kd_pengajuan' => $penilaian->kd_pengajuan])) return FALSE;
    if (!$this->db->update('penilaian', ['status' => 'Menunggu validasi perbaikan'], ['kd_penilaian' => $penilaian->kd_penilaian])) return FALSE;
    if ($this->db->insert('perbaikan', $perbaikan)) return TRUE;
  }
}
