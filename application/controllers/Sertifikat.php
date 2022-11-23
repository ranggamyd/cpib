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
    $data['kd_sertifikat_auto'] = $this->sertifikat_model->kd_sertifikat_auto();
    $data['sertifikat'] = $this->sertifikat_model->semuaSertifikat();

    $data['title'] = 'sertifikat';
    $this->loadView('sertifikat', $data);
  }

  public function tambah()
  {
    $this->form_validation->set_rules('kd_sertifikat', 'Kode Sertifikat', 'required');
    $this->form_validation->set_rules('nama_sertifikat', 'Nama Sertifikat', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
      $this->session->set_flashdata('hasModalID', 'tambah_sertifikat');
      $this->index();
    } else {
      if ($this->sertifikat_model->tambah()) {
        $this->session->set_flashdata('sukses', 'Berhasil menambahkan !');
        redirect('sertifikat');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
        $this->index();
      }
    }
  }

  public function edit($kd_sertifikat)
  {
    $data['sertifikat'] = $this->sertifikat_model->sertifikat($kd_sertifikat);

    $data['title'] = 'Edit Template Sertifikat';
    $this->loadView('edit', $data);
  }
}
