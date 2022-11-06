<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perbaikan_ajuan extends CI_Controller
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
        //     'css' => 'supplier.css',
        //     'js' => 'supplier.js',
        // ];

        $this->load->view('admin/parts/header', $data);
        $this->load->view('admin/perbaikan_ajuan/' . $file, $data);
        $this->load->view('admin/parts/footer', $data);
    }

    public function index()
    {
        $data['perbaikan_ajuan'] = $this->perbaikan_ajuan_model->semuaPerbaikanAjuan();

        $data['title'] = 'Perbaikan Ajuan';
        $this->loadView('perbaikan_ajuan', $data);
    }

    public function perbaiki_ajuan($kd_pengajuan)
    {
        $data['kd_perbaikan_ajuan_auto'] = $this->perbaikan_ajuan_model->kd_perbaikan_ajuan_auto();
        $data['pengajuan'] = $this->pengajuan_model->pengajuan($kd_pengajuan);
        $data['suppliers'] = $this->supplier_model->suppliers();
        $data['jenis_produk'] = $this->jenis_produk_model->semuaJenisProduk();

        $data['title'] = 'Perbaiki Ajuan';
        $this->loadView('perbaiki_ajuan', $data);
    }

    public function ubah_perbaikan($kd_perbaikan_ajuan)
    {
        $data['perbaikan_ajuan'] = $this->perbaikan_ajuan_model->perbaikan_ajuan($kd_perbaikan_ajuan);
        $data['suppliers'] = $this->supplier_model->suppliers();
        $data['jenis_produk'] = $this->jenis_produk_model->semuaJenisProduk();

        $data['title'] = 'Ubah Perbaikan';
        $this->loadView('ubah_perbaikan', $data);
    }
}
