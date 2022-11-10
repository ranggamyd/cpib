<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    // if (!$this->auth_model->current_user()) {
    //     $this->session->set_userdata('referred_from', current_url());
    //     $this->session->set_flashdata('gagal', 'Gagal mengakses, Silahkan login kembali !');
    //     redirect('auth');
    // }
  }

  private function loadView($file, $data)
  {
    // $data['style'] = [
    //     'css' => 'user.css',
    //     'js' => 'user.js',
    // ];

    $this->load->view('admin/parts/header', $data);
    $this->load->view('admin/' . $file, $data);
    $this->load->view('admin/parts/footer', $data);
  }

  public function index()
  {
    $data['kd_admin_auto'] = $this->user_model->kd_user_auto();
    $data['users'] = $this->user_model->users();

    $data['title'] = 'Admin';
    $this->loadView('users', $data);
  }

  public function tambah()
  {
    $this->form_validation->set_rules('kd_admin', 'Kode Admin', 'required');
    $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
      $this->session->set_flashdata('hasModalID', 'tambah_user');
      $this->index();
    } else {
      if ($this->user_model->tambah()) {
        $this->session->set_flashdata('sukses', 'Berhasil menambahkan !');
        redirect('users');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
        $this->index();
      }
    }
  }

  public function ubah()
  {
    $kd_admin = $this->input->post('kd_admin');
    $admin = $this->db->get_where('admin', ['kd_admin' => $kd_admin])->row('kd_admin');

    $this->form_validation->set_rules('kd_admin', 'Kode Admin', 'required');
    $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Gagal mengubah !');
      $this->session->set_flashdata('hasModalID', 'edit_user' . $admin);
      $this->index();
    } else {
      if ($this->user_model->ubah()) {
        $this->session->set_flashdata('sukses', 'Berhasil mengubah !');
        redirect('users');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal mengubah !');
        $this->index();
      }
    }
  }

  public function hapus()
  {
    if ($this->user_model->hapus()) {
      $this->session->set_flashdata('sukses', 'Berhasil menghapus !');
      redirect('users');
    } else {
      $this->session->set_flashdata('gagal', 'Gagal menghapus !');
      $this->index();
    }
  }

  public function activation($kd_admin)
  {
    $activation = $this->user_model->activation($kd_admin);

    if ($activation == 'activated') {
      $this->session->set_flashdata('sukses', 'Berhasil mengaktifkan Admin !');
      redirect('users');
    } else {
      $this->session->set_flashdata('sukses', 'Berhasil menonaktifkan Admin !');
      $this->index();
    }
  }
}
