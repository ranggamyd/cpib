<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suppliers extends CI_Controller
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
        $this->load->view('admin/' . $file, $data);
        $this->load->view('admin/parts/footer', $data);
    }

    public function index()
    {
        $data['kd_supplier_auto'] = $this->supplier_model->kd_supplier_auto();
        $data['suppliers'] = $this->supplier_model->suppliers();
        $data['jenis_produk'] = $this->jenis_produk_model->semuaJenisProduk();

        $data['title'] = 'Suppliers';
        $this->loadView('suppliers', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('nama_miniplant', 'Nama Mini Plant', 'required');
        $this->form_validation->set_rules('kd_jenis_produk', 'Jenis Produk', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
            $this->index();
        } else {
            if ($this->supplier_model->tambah()) {
                $this->session->set_flashdata('sukses', 'Berhasil menambahkan !');
                redirect('suppliers');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
                $this->index();
            }
        }
    }

    public function ubah()
    {
        $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('nama_miniplant', 'Nama Mini Plant', 'required');
        $this->form_validation->set_rules('kd_jenis_produk', 'Jenis Produk', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal mengubah !');
            $this->index();
        } else {
            if ($this->supplier_model->ubah()) {
                $this->session->set_flashdata('sukses', 'Berhasil mengubah !');
                redirect('suppliers');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal mengubah !');
                $this->index();
            }
        }
    }

    public function hapus()
    {
        if ($this->supplier_model->hapus()) {
            $this->session->set_flashdata('sukses', 'Berhasil menghapus !');
            redirect('suppliers');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal menghapus !');
            $this->index();
        }
    }
}
