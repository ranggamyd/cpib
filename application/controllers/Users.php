<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
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
    //     'css' => 'users.css',
    //     'js' => 'users.js',
    // ];

    $this->load->view('admin/parts/header', $data);
    $this->load->view('admin/' . $file, $data);
    $this->load->view('admin/parts/footer', $data);
  }

  public function index()
  {
    $data['kd_admin_auto'] = $this->user_model->kd_user_auto();
    $data['users'] = $this->user_model->users();

    $data['title'] = 'Daftar Pengguna';
    $this->loadView('users', $data);
  }

  public function tambah()
  {
    $this->form_validation->set_rules('kd_admin', 'Kode Admin', 'required|is_unique[users.kd_admin]');
    $this->form_validation->set_rules('no_reg', 'No Reg', 'required');
    $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
    $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|is_numeric|is_unique[users.phone]');
    $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.phone]');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Gagal Menambahkan Pengguna !');
      $this->session->set_flashdata('hasModalID', 'tambah_user');
      $this->index();
    } else {
      if ($this->user_model->tambah()) {
        $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Pengguna !');
        redirect('users');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal Menambahkan Pengguna !');
        $this->index();
      }
    }
  }

  public function ubah()
  {
    $admin = $this->db->get_where('admin', ['kd_admin' => $this->input->post('kd_admin')])->row();
    $this->form_validation->set_rules('kd_admin', 'Kode Admin', 'required');
    $this->form_validation->set_rules('no_reg', 'No Reg', 'required');
    $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required');
    $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|is_numeric');
    if ($this->input->post('no_telp') != $admin->no_telp) $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|is_numeric|is_unique[users.phone]');
    $this->form_validation->set_rules('email', 'Email', 'valid_email');
    if ($this->input->post('email') != $admin->email) $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.phone]');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Gagal Mengubah Pengguna !');
      $this->session->set_flashdata('hasModalID', 'edit_user-' . $admin->kd_admin);
      $this->index();
    } else {
      if ($this->user_model->ubah()) {
        $this->session->set_flashdata('sukses', 'Berhasil Mengubah Pengguna !');
        redirect('users');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal Mengubah Pengguna !');
        $this->index();
      }
    }
  }

  public function hapus($kd_admin)
  {
    if ($this->user_model->hapus($kd_admin)) {
      $this->session->set_flashdata('sukses', 'Berhasil Menghapus Pengguna !');
      redirect('users');
    } else {
      $this->session->set_flashdata('gagal', 'Gagal Menghapus Pengguna !');
      $this->index();
    }
  }
}
