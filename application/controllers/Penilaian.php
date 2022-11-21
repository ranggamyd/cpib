<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('login_as') != 'admin') {
      $this->session->set_userdata('referred_from', current_url());
      $this->session->set_flashdata('gagal', 'Gagal mengakses, Silahkan login kembali !');
      redirect('auth');
    }
  }

  private function loadView($file, $data)
  {
    // $data['style'] = [
    //     'css' => 'supplier.css',
    //     'js' => 'supplier.js',
    // ];

    $this->load->view('admin/parts/header', $data);
    $this->load->view('admin/penilaian/' . $file, $data);
    $this->load->view('admin/parts/footer', $data);
  }

  public function index()
  {
    $data['penilaian'] = $this->penilaian_model->semuaPenilaian();

    $data['title'] = 'List Penilaian Ajuan';
    $this->loadView('penilaian', $data);
  }

  public function detail($kd_penilaian)
  {
    $data['penilaian'] = $this->penilaian_model->penilaian($kd_penilaian);
    $pengajuan = $this->db->get_where('pengajuan', ['kd_pengajuan' => $data['penilaian']->kd_pengajuan])->row();
    $this->db->join('jenis_produk', 'jenis_produk.kd_jenis_produk = jenis_produk_supplier.kd_jenis_produk', 'left');
    $data['jps'] = $this->db->get_where('jenis_produk_supplier', ['kd_pengajuan' => $pengajuan->kd_pengajuan])->result_array();
    $data['jenis_supplier'] = $this->db->get_where('pengajuan', ['kd_supplier' => $pengajuan->kd_supplier])->num_rows() > 1 ? 'Lama' : 'Baru';
    $tim_inspeksi = $this->db->get_where('tim_inspeksi', ['kd_pengajuan' => $pengajuan->kd_pengajuan])->row();
    $data['ketua_tim'] = $this->db->get_where('admin', ['kd_admin' => $tim_inspeksi->ketua_inspeksi])->row('nama_admin');
    $data['anggota1'] = $this->db->get_where('admin', ['kd_admin' => $tim_inspeksi->anggota1])->row('nama_admin');
    $data['anggota2'] = $this->db->get_where('admin', ['kd_admin' => $tim_inspeksi->anggota2])->row('nama_admin');
    $data['kategori_daftar_isian'] = $this->daftar_isian_model->semuaKategori();
    $data['penilaian_detail'] = $this->db->get_where('penilaian_detail', ['kd_penilaian' => $kd_penilaian])->result_array();
    $this->db->join('penanganan', 'penanganan.kd_penanganan = penilaian_penanganan.kd_penanganan', 'left');
    $data['penanganan'] = $this->db->get_where('penilaian_penanganan', ['kd_penilaian' => $kd_penilaian])->result_array();
    $data['notes'] = $this->db->get_where('penilaian_notes', ['kd_penilaian' => $kd_penilaian])->result_array();

    $data['title'] = 'Detail Penilaian';
    $this->loadView('detail', $data);
  }

  public function perbaikan($kd_penilaian)
  {
    $this->db->join('suppliers', 'suppliers.kd_supplier = penilaian.kd_supplier', 'left');
    $data['penilaian'] = $this->db->get_where('penilaian', ['kd_penilaian' => $kd_penilaian])->row();

    $data['title'] = 'Perbaiki Ajuan';
    $this->loadView('perbaikan', $data);
  }
}
