<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->auth_model->current_user()) {
            $this->session->set_userdata('referred_from', current_url());
            $this->session->set_flashdata('gagal', 'Gagal mengakses, Silahkan login kembali !');
            redirect('auth');
        }
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
        $supplier = $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row();
        $data['pengajuan_tertunda'] = $this->db->get_where('pengajuan', ['kd_supplier' => $supplier->kd_supplier, 'status' => 'Tertunda'])->num_rows();
        $data['menunggu_perbaikan'] = $this->db->get_where('pengajuan', ['kd_supplier' => $supplier->kd_supplier, 'status' => 'Perlu Revisi'])->num_rows();

        $data['pengajuan'] = $this->db->get_where('pengajuan', ['kd_supplier' => $supplier->kd_supplier])->result_array();
        $data['title'] = 'Dashboard Supplier';
        $this->loadView('dashboard', $data);
    }
}
