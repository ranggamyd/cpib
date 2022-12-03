<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perbaikan_supplier extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('login_as') != 'supplier') {
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

    $this->load->view('supplier/parts/header', $data);
    $this->load->view('supplier/perbaikan/' . $file, $data);
    $this->load->view('supplier/parts/footer', $data);
  }

  public function index()
  {
    $this->db->join('suppliers', 'suppliers.kd_supplier = users.kd_supplier', 'left');
    $supplier = $this->db->get_where('users', ['users.id' => $this->session->userdata('id')])->row();

    $this->db->join('suppliers', 'suppliers.kd_supplier = perbaikan.kd_supplier', 'left');
    $this->db->order_by('tgl_perbaikan', 'desc');
    $this->db->order_by('kd_perbaikan', 'desc');
    $data['perbaikan_ajuan'] = $this->db->get_where('perbaikan', ['perbaikan.kd_supplier' => $supplier->kd_supplier])->result_array();

    $data['title'] = 'Perbaikan Ajuan';
    $this->loadView('perbaikan', $data);
  }

  public function detail($kd_perbaikan)
  {
    $perbaikan = $this->db->get_where('perbaikan', ['kd_perbaikan' => $kd_perbaikan])->row();
    $this->db->join('penilaian_notes', 'penilaian_notes.id = perbaikan_detail.id_notes', 'left');
    $perbaikan_detail = $this->db->get_where('perbaikan_detail', ['kd_perbaikan' => $kd_perbaikan])->result_array();
    $penilaian = $this->db->get_where('penilaian', ['kd_penilaian' => $perbaikan->kd_penilaian])->row();
    $penilaian_detail = $this->db->get_where('penilaian_detail', ['kd_penilaian' => $perbaikan->kd_penilaian])->result_array();
    $supplier = $this->db->get_where('suppliers', ['kd_supplier' => $perbaikan->kd_supplier])->row();
    $jenis_produk = $this->db->get_where('jenis_produk', ['kd_pengajuan' => $penilaian->kd_pengajuan, 'kd_supplier' => $penilaian->kd_supplier])->result_array();
    $tim_inspeksi = $this->db->get_where('tim_inspeksi', ['kd_pengajuan' => $penilaian->kd_pengajuan])->row();
    $kategori_daftar_isian = $this->daftar_isian_model->semuaKategori();
    $this->db->join('penanganan', 'penanganan.kd_penanganan = penilaian_penanganan.kd_penanganan', 'left');
    $penanganan = $this->db->get_where('penilaian_penanganan', ['kd_penilaian' => $perbaikan->kd_penilaian])->result_array();
    $notes = $this->db->get_where('penilaian_notes', ['kd_penilaian' => $perbaikan->kd_penilaian])->result_array();

    $data = [
      'supplier' => $supplier,
      'jenis_produk' => $jenis_produk,
      'ketua_tim' => $this->db->get_where('admin', ['kd_admin' => $tim_inspeksi->ketua_inspeksi])->row(),
      'anggota1' => $this->db->get_where('admin', ['kd_admin' => $tim_inspeksi->anggota1])->row(),
      'anggota2' => $this->db->get_where('admin', ['kd_admin' => $tim_inspeksi->anggota2])->row(),
      'penilaian' => $penilaian,
      'penilaian_detail' => $penilaian_detail,
      'kategori_daftar_isian' => $kategori_daftar_isian,
      'penanganan' => $penanganan,
      'notes' => $notes,
      'perbaikan' => $perbaikan,
      'perbaikan_detail' => $perbaikan_detail,
    ];

    $data['title'] = 'Detail Perbaikan';
    $this->loadView('detail', $data);
  }

  public function validasi()
  {
    $this->form_validation->set_rules('kd_perbaikan', 'Kode Perbaikan', 'required');
    $this->form_validation->set_rules('kd_penilaian', 'Kode Penilaian', 'required');
    $this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', "Mohon isi data dengan lengkap !");
      $this->session->set_flashdata('hasModalID', 'terimaPerbaikan');
      $this->detail($this->input->post('kd_perbaikan'));
    } else {
      if ($this->perbaikan_model->validasi()) {
        $this->session->set_flashdata('sukses', 'Berhasil Terima Perbaikan !');
        redirect('perbaikan');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal Terima Perbaikan !');
        $this->detail($this->input->post('kd_perbaikan'));
      }
    }
  }

  public function revisiKembali()
  {
    if ($this->perbaikan_model->revisiKembali()) {
      $this->session->set_flashdata('sukses', 'Berhasil Menambah Catatan Perbaikan !');
      redirect('perbaikan');
    } else {
      $this->session->set_flashdata('gagal', 'Gagal Menambah Catatan Perbaikan !');
      $this->index();
    }
  }
}
