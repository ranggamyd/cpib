<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat extends CI_Controller
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
    //     'css' => 'sertifikat.css',
    //     'js' => 'sertifikat.js',
    // ];

    $this->load->view('admin/parts/header', $data);
    $this->load->view('admin/sertifikat/' . $file, $data);
    $this->load->view('admin/parts/footer', $data);
  }

  public function index()
  {
    $data['sertifikat'] = $this->sertifikat_model->semuaSertifikat();

    $data['title'] = 'sertifikat';
    $this->loadView('sertifikat', $data);
  }

  public function cetak($sertif_id)
  {
    # HEHE
  }

  public function edit_template()
  {
    $data['title'] = 'Edit Template Sertifikat';
    $this->loadView('edit_template', $data);
  }
}
