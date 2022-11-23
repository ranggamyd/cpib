<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perbaikan extends CI_Controller
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
        //     'css' => 'supplier.css',
        //     'js' => 'supplier.js',
        // ];

        $this->load->view('admin/parts/header', $data);
        $this->load->view('admin/perbaikan/' . $file, $data);
        $this->load->view('admin/parts/footer', $data);
    }

    public function index()
    {
        $data['perbaikan_ajuan'] = $this->perbaikan_model->semuaPerbaikanAjuan();

        $data['title'] = 'Perbaikan Ajuan';
        $this->loadView('perbaikan', $data);
    }

    public function validasi($kd_perbaikan)
    {
        $perbaikan = $this->perbaikan_model->perbaikan($kd_perbaikan);
        $data['perbaikan'] = $perbaikan;
        $this->db->join('penilaian_notes', 'penilaian_notes.id = perbaikan_detail.id_notes', 'left');
        $data['perbaikan_detail'] = $this->db->get_where('perbaikan_detail', ['kd_perbaikan' => $kd_perbaikan])->result_array();

        $data['title'] = 'Validasi Perbaikan Ajuan';
        $this->loadView('validasi', $data);
    }
}
