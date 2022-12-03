<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat_supplier extends CI_Controller
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
    //     'css' => 'sertifikat.css',
    //     'js' => 'sertifikat.js',
    // ];

    $this->load->view('supplier/parts/header', $data);
    $this->load->view('supplier/sertifikat/' . $file, $data);
    $this->load->view('supplier/parts/footer', $data);
  }

  public function index()
  {
    $this->db->join('suppliers', 'suppliers.kd_supplier = users.kd_supplier', 'left');
    $supplier = $this->db->get_where('users', ['users.id' => $this->session->userdata('id')])->row();

    $this->db->select('suppliers.nama_miniplant, suppliers.nama_pimpinan, sertifikat.*, penilaian.kd_pengajuan');
    $this->db->join('penilaian', 'penilaian.kd_penilaian = sertifikat.kd_penilaian', 'left');
    $this->db->join('suppliers', 'suppliers.kd_supplier = sertifikat.kd_supplier', 'left');
    $this->db->order_by('tgl', 'desc');
    $this->db->order_by('id', 'desc');
    $data['sertifikat'] = $this->db->get_where('sertifikat', ['sertifikat.kd_supplier' => $supplier->kd_supplier])->result_array();

    $data['title'] = 'Sertifikat Supplier';
    $this->loadView('sertifikat', $data);
  }

  public function detail($id)
  {
    $this->db->join('penilaian', 'penilaian.kd_penilaian=sertifikat.kd_penilaian');
    $sertifikat = $this->db->get_where('sertifikat', ['sertifikat.id' => $id])->row();
    $this->db->join('suppliers', 'suppliers.kd_supplier=pengajuan.kd_supplier');
    $pengajuan = $this->db->get_where('pengajuan', ['kd_pengajuan' => $sertifikat->kd_pengajuan])->row();
    $this->db->join('penanganan', 'penanganan.kd_penanganan=penilaian_penanganan.kd_penanganan');
    $tahapan_penanganan = $this->db->get_where('penilaian_penanganan', ['kd_penilaian' => $sertifikat->kd_penilaian])->result_array();

    $data['pengajuan'] = $pengajuan;
    $data['sertifikat'] = $sertifikat;
    $data['tahapan_penanganan'] = $tahapan_penanganan;

    $data['title'] = 'Detail Sertifikat';
    $this->loadView('detail', $data);
  }
}
