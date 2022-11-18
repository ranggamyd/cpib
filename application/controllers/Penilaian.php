<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if (!$this->auth_model->current_user()) {
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
    // $data['penilaian'] = $this->penilaian_model->detail($kd_penilaian);

    // $data['title'] = 'Detail Penilaian';
    // $this->loadView('detail_penilaian', $data);
  }

  public function perbaikan($kd_penilaian)
  {
    $this->db->join('suppliers', 'suppliers.kd_supplier = penilaian.kd_supplier', 'left');
    $data['penilaian'] = $this->db->get_where('penilaian', ['kd_penilaian' => $kd_penilaian])->row();

    $data['title'] = 'Perbaiki Ajuan';
    $this->loadView('perbaikan', $data);
  }
}
