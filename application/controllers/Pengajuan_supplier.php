<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_supplier extends CI_Controller
{
    private function loadView($file, $data)
    {
        // $data['style'] = [
        //     'css' => 'supplier.css',
        //     'js' => 'supplier.js',
        // ];

        $this->load->view('supplier/parts/header', $data);
        $this->load->view('supplier/pengajuan/' . $file, $data);
        $this->load->view('supplier/parts/footer', $data);
    }

    public function index()
    {
        $data['pengajuan_supplier'] = $this->pengajuan_supplier_model->getAll();

        $data['title'] = 'Pengajuan Saya';
        $this->loadView('data_ajuan', $data);
    }

    public function tambah_ajuan()
    {
        $data['kd_pengajuan_auto'] = $this->pengajuan_model->kd_pengajuan_auto();
        $data['suppliers'] = $this->supplier_model->suppliers();
        $data['jenis_produk'] = $this->jenis_produk_model->semuaJenisProduk();

        $data['title'] = 'Tambah Ajuan';
        $this->loadView('tambah_ajuan', $data);
    }
}
