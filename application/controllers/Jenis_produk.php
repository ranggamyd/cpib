<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_produk extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    // if (!$this->auth_model->current_user()) {
    //     $this->session->set_userdata('referred_from', current_url());
    //     redirect('auth');
    // }
  }

  private function loadView($file, $data)
  {
    // $data['style'] = [
    //     'css' => 'jenis_produk.css',
    //     'js' => 'jenis_produk.js',
    // ];

    $this->load->view('admin/parts/header', $data);
    $this->load->view('admin/' . $file, $data);
    $this->load->view('admin/parts/footer', $data);
  }

  public function index()
  {
    $data['kd_jenis_produk_auto'] = $this->jenis_produk_model->kd_jenis_produk_auto();
    $data['jenis_produk'] = $this->jenis_produk_model->semuaJenisProduk();

    $data['title'] = 'Jenis Produk';
    $this->loadView('jenis_produk', $data);
  }

  public function tambah()
  {
    $this->form_validation->set_rules('kd_jenis_produk', 'Kode Jenis_produk', 'required');
    $this->form_validation->set_rules('jenis_produk', 'Jenis Produk', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
      $this->index();
    } else {
      if ($this->jenis_produk_model->tambah()) {
        $this->session->set_flashdata('sukses', 'Berhasil menambahkan !');
        redirect('jenis_produk');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
        $this->index();
      }
    }
  }

  public function ubah()
  {
    $this->form_validation->set_rules('kd_jenis_produk', 'Kode Jenis_produk', 'required');
    $this->form_validation->set_rules('jenis_produk', 'Jenis Produk', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Gagal mengubah !');
      $this->index();
    } else {
      if ($this->jenis_produk_model->ubah()) {
        $this->session->set_flashdata('sukses', 'Berhasil mengubah !');
        redirect('jenis_produk');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal mengubah !');
        $this->index();
      }
    }
  }

  public function hapus()
  {
    if ($this->jenis_produk_model->hapus()) {
      $this->session->set_flashdata('sukses', 'Berhasil menghapus !');
      redirect('jenis_produk');
    } else {
      $this->session->set_flashdata('gagal', 'Gagal menghapus !');
      $this->index();
    }
  }
}
