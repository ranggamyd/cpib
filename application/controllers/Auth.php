<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  private function loadView($file, $data)
  {
    $data['style'] = [
      // 'css' => 'auth.css',
      // 'js' => 'auth.js',
    ];

    $this->load->view('auth/parts/header', $data);
    $this->load->view('auth/' . $file, $data);
    $this->load->view('auth/parts/footer', $data);
  }

  public function index()
  {
    $data['title'] = 'Masuk';
    $this->loadView('login', $data);
  }

  public function login()
  {
    $this->form_validation->set_rules('credential', 'Kredensial', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Gagal Masuk !');
      $this->index();
    } else {
      if ($this->auth_model->login()) {
        if ($this->session->userdata("login_as") == "admin") {
          $page = 'dashboard';
        } else if ($this->session->userdata("login_as") == "supplier") {
          $page = 'dashboard_supplier';
        }

        if ($this->session->userdata('referred_from')) {
          $referred_from = $this->session->userdata('referred_from');
          $this->session->set_flashdata('sukses', 'Berhasil Masuk !');
          redirect($referred_from);
        } else {
          $this->session->set_flashdata('sukses', 'Berhasil Masuk !');
          redirect($page);
        }
      } else {
        $this->session->set_flashdata('gagal', 'Pastikan kredensial anda sesuai !');
        $this->index();
      }
    }
  }

  public function logout()
  {
    $this->auth_model->logout();
    $this->session->set_flashdata('sukses', 'Berhasil Keluar !');
    redirect('auth');
  }

  public function register()
  {
    $data['title'] = 'Mendaftar';
    $this->loadView('register', $data);
  }

  public function register_account()
  {
    $this->form_validation->set_rules('name', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('phone', 'No. Telepon', 'required|is_numeric|is_unique[users.phone]');
    $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password1', 'Password', 'required');
    $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password1]');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Gagal Mendaftarkan Akun !');
      $this->register();
    } else {
      if ($this->auth_model->register()) {
        $this->session->set_flashdata('sukses', 'Berhasil Mendaftarkan Akun !<br>Mohon menunggu konfirmasi admin sebelum melakukan login !');
        redirect('auth');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal Mendaftarkan Akun !');
        $this->index();
      }
    }
  }
}
