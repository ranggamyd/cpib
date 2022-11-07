<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_supplier extends CI_Controller
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
        //     'css' => 'dashboard.css',
        //     'js' => 'dashboard.js',
        // ];

        $this->load->view('supplier/parts/header', $data);
        $this->load->view('supplier/' . $file, $data);
        $this->load->view('supplier/parts/footer', $data);
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->loadView('dashboard', $data);
    }
}