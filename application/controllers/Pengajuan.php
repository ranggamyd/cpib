<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
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
        //     'css' => 'supplier.css',
        //     'js' => 'supplier.js',
        // ];

        $this->load->view('admin/parts/header', $data);
        $this->load->view('admin/pengajuan/' . $file, $data);
        $this->load->view('admin/parts/footer', $data);
    }

    public function index()
    {
        $data['pengajuan'] = $this->pengajuan_model->semuaPengajuan();

        $data['title'] = 'Ajuan Supplier';
        $this->loadView('pengajuan', $data);
    }

    public function tambah_ajuan()
    {
        $data['kd_pengajuan_auto'] = $this->pengajuan_model->kd_pengajuan_auto();
        $data['suppliers'] = $this->supplier_model->suppliers();
        $data['jenis_produk'] = $this->jenis_produk_model->semuaJenisProduk();

        $data['title'] = 'Tambah Ajuan';
        $this->loadView('tambah_ajuan', $data);
    }

    public function ubah_ajuan($kd_pengajuan)
    {
        $data['pengajuan'] = $this->pengajuan_model->pengajuan($kd_pengajuan);
        $data['suppliers'] = $this->supplier_model->suppliers();
        $data['jenis_produk'] = $this->jenis_produk_model->semuaJenisProduk();

        $data['title'] = 'Ubah Ajuan';
        $this->loadView('ubah_ajuan', $data);
    }
}
