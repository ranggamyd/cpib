<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
    $data['style'] = [
      //     'css' => 'user.css',
      'js' => 'previewImg.js',
    ];

    $this->load->view('admin/parts/header', $data);
    $this->load->view('admin/' . $file, $data);
    $this->load->view('admin/parts/footer', $data);
  }

  public function index()
  {
    $data['user'] = $this->user_model->profil_saya();

    $data['title'] = 'Profil Saya';
    $this->loadView('user', $data);
  }

  public function setting()
  {
    $data['user'] = $this->user_model->profil_saya();

    $data['title'] = 'Pengaturan Akun';
    $this->loadView('setting', $data);
  }

  public function ubah_avatar()
  {
    $this->form_validation->set_rules('kd_admin', 'Kode Pengguna', 'required');
    if (empty($_FILES['avatar']['name'])) $this->form_validation->set_rules('avatar', 'Foto Profil', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Gagal Memperbarui Avatar !');
      $this->session->set_flashdata('hasModalID', 'edit_avatar');
      $this->index();
    } else {
      if ($this->user_model->ubah_avatar()) {
        $this->session->set_flashdata('sukses', 'Berhasil Memperbarui Avatar !');
        redirect('user');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal Memperbarui Avatar !');
        $this->index();
      }
    }
  }

  public function ubah_profil()
  {
    $user = $this->db->get_where('users', ['kd_admin' => $this->input->post('kd_admin')])->row();

    $this->form_validation->set_rules('nama_admin', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|is_numeric');
    if ($this->input->post('no_telp') != $user->phone) $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|is_numeric|is_unique[users.phone]');
    $this->form_validation->set_rules('email', 'Email', 'valid_email');
    if ($this->input->post('email') != $user->email) $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Gagal Memperbarui Profil !');
      $this->session->set_flashdata('hasModalID', 'edit_user');
      $this->index();
    } else {
      if ($this->user_model->ubah_profil()) {
        $this->session->set_flashdata('sukses', 'Berhasil Memperbarui Profil !');
        redirect('user');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal Memperbarui Profil !');
        $this->index();
      }
    }
  }
}
