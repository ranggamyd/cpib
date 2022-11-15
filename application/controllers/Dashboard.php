<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

        $this->load->view('admin/parts/header', $data);
        $this->load->view('admin/' . $file, $data);
        $this->load->view('admin/parts/footer', $data);
    }

    public function index()
    {
        $data['pengajuan_tertunda'] = $this->db->get_where('pengajuan', ['status' => 'Tertunda'])->num_rows();
        $data['menunggu_perbaikan'] = $this->db->get_where('pengajuan', ['status' => 'Perlu Revisi'])->num_rows();
        // $data['total_sertifikat'] = $this->db->get_where('', ['status' => 'Tertunda'])->num_rows();
        $data['total_supplier'] = $this->db->get('suppliers')->num_rows();
        $data['pengajuan'] = $this->pengajuan_model->pengajuanTertunda();
        $data['title'] = 'Dashboard';
        $this->loadView('dashboard', $data);
    }
}
