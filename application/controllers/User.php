<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
    //     'css' => 'user.css',
    //     'js' => 'user.js',
    // ];

    $this->load->view('admin/parts/header', $data);
    $this->load->view('admin/' . $file, $data);
    $this->load->view('admin/parts/footer', $data);
  }

  public function index()
  {
    $data['title'] = 'Profil Saya';
    $this->loadView('user', $data);
  }
}