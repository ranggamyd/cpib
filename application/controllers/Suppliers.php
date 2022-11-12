<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suppliers extends CI_Controller
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

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
            $this->session->set_flashdata('hasModalID', 'tambah_supplier');
            $this->index();
        } else {
            if ($this->supplier_model->tambah()) {
                $this->session->set_flashdata('sukses', 'Berhasil menambahkan !');
                redirect('suppliers');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal menambahkanas !');
                $this->index();
            }
        }
    }

    public function ubah()
    {
        $kd_supplier = $this->input->post('kd_supplier');
        $supplier = $this->db->get_where('suppliers', ['kd_supplier' => $kd_supplier])->row('kd_supplier');

        $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal mengubah !');
            $this->session->set_flashdata('hasModalID', 'edit_supplier' . $supplier);
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

    public function activation($kd_supplier)
    {
        $activation = $this->supplier_model->activation($kd_supplier);

        if ($activation == 'activated') {
            $this->session->set_flashdata('sukses', 'Berhasil mengaktifkan Supplier !');
            redirect('suppliers');
        } else {
            $this->session->set_flashdata('sukses', 'Berhasil menonaktifkan Supplier !');
            $this->index();
        }
    }
}
