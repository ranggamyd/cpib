<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller
{

    public function index()
    {
        $this->load->view('admin_parts/header.php');
        $this->load->view('admin/dashboard');
        $this->load->view('admin_parts/footer.php');
    }
}
