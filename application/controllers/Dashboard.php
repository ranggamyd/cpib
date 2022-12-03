<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        //     'css' => 'dashboard.css',
        //     'js' => 'dashboard.js',
        // ];

        $this->load->view('admin/parts/header', $data);
        $this->load->view('admin/' . $file, $data);
        $this->load->view('admin/parts/footer', $data);
    }

    public function index()
    {
        $data['pengajuan_tertunda'] = $this->db->get_where('pengajuan', ['status' => 'Tertunda'])->num_rows();
        $data['menunggu_perbaikan'] = $this->db->get_where('pengajuan', ['status' => 'Perlu Revisi'])->num_rows();
        $data['total_sertifikat'] = $this->db->get_where('sertifikat')->num_rows();
        $data['total_supplier'] = $this->db->get('suppliers')->num_rows();
        $data['pengajuan'] = $this->pengajuan_model->pengajuanTertunda();
        $data['suppliers'] = $this->supplier_model->suppliersBaru();

        $this->db->join('suppliers', 'suppliers.kd_supplier = perbaikan.kd_supplier');
        $data['perbaikan'] = $this->db->get_where('perbaikan', ['status' => 'Menunggu Validasi'])->result_array();

        $this->db->join('suppliers', 'suppliers.kd_supplier = penilaian.kd_supplier');
        $data['penilaian'] = $this->db->get_where('penilaian', ['status' => 'Menunggu Sertifikat'])->result_array();

        $data['title'] = 'Dashboard';
        $this->loadView('dashboard', $data);
    }
}
