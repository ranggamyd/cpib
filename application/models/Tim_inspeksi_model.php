<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tim_inspeksi_model extends CI_Model
{
  public function kd_tim_inspeksi_auto()
  {
    $this->db->select('RIGHT(tim_inspeksi.kd_tim_inspeksi,3) as kd_tim_inspeksi', FALSE);
    $this->db->order_by('kd_tim_inspeksi', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('tim_inspeksi');
    if ($query->num_rows() <> 0) {
      $data = $query->row();
      $kd = intval($data->kd_tim_inspeksi) + 1;
    } else {
      $kd = 1;
    }
    $batas = str_pad($kd, 3, "0", STR_PAD_LEFT);
    $kdtim_inspeksi = "INS-" . $batas;
    return $kdtim_inspeksi;
  }

  public function tim_inspeksi()
  {
    $this->db->join('pengajuan', 'pengajuan.kd_pengajuan = tim_inspeksi.kd_pengajuan', 'left');
    $this->db->join('suppliers', 'suppliers.kd_supplier = pengajuan.kd_supplier', 'left');
    return $this->db->get('tim_inspeksi')->result_array();
  }

  public function tambah()
  {
    $kd_pengajuan = $this->input->post('kd_pengajuan');
    $data = [
      'kd_tim_inspeksi' => $this->input->post('kd_tim_inspeksi'),
      'kd_pengajuan' => $this->input->post('kd_pengajuan'),
      'pimpinan_supplier' => $this->input->post('pimpinan_supplier'),
      'ketua_inspeksi' => $this->input->post('ketua_inspeksi'),
      'anggota1' => $this->input->post('anggota1'),
      'anggota2' => $this->input->post('anggota2'),
    ];

    if (!$this->db->update('pengajuan', ['status' => 'Dalam proses Inspeksi'], ['kd_pengajuan' => $this->input->post('kd_pengajuan')])) return FALSE;
    if ($this->db->insert('tim_inspeksi', $data)) return TRUE;
  }

  public function ubah()
  {
    $data = [
      'kd_pengajuan' => $this->input->post('kd_pengajuan'),
      'pimpinan_supplier' => $this->input->post('pimpinan_supplier'),
      'ketua_inspeksi' => $this->input->post('ketua_inspeksi'),
      'anggota1' => $this->input->post('anggota1'),
      'anggota2' => $this->input->post('anggota2'),
    ];

    if ($this->db->update('tim_inspeksi', $data, ['kd_tim_inspeksi' => $this->input->post('kd_tim_inspeksi')])) return TRUE;
  }

  public function hapus($kd_tim_inspeksi)
  {
    if ($this->db->delete('tim_inspeksi', ['kd_tim_inspeksi' => $kd_tim_inspeksi])) return TRUE;
  }
}
