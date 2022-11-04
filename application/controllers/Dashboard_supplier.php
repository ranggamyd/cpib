<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_supplier extends CI_Controller
{

    public function index()
    {
        $this->load->view('supplier_parts/header.php');
        $this->load->view('supplier/dashboard');
        $this->load->view('supplier_parts/footer.php');
    }
}
