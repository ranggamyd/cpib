<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suppliers extends CI_Controller
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
        $this->load->view('admin/' . $file, $data);
        $this->load->view('admin/parts/footer', $data);
    }

    public function index()
    {
        $data['kd_supplier_auto'] = $this->supplier_model->kd_supplier_auto();
        $data['suppliers'] = $this->supplier_model->suppliers();

        $data['title'] = 'Supplier Terdaftar';
        $this->loadView('suppliers', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required|is_unique[users.kd_supplier]');
        $this->form_validation->set_rules('nama_miniplant', 'Nama Miniplant', 'required|is_unique[suppliers.nama_miniplant]');
        $this->form_validation->set_rules('nama_pimpinan', 'Nama Pimpinan', 'required');
        $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|is_numeric|is_unique[users.phone]');
        $this->form_validation->set_rules('no_fax', 'No. Faximile', 'is_unique[suppliers.no_fax]');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal Menambahkan Supplier !');
            $this->session->set_flashdata('hasModalID', 'tambah_supplier');
            $this->index();
        } else {
            if ($this->supplier_model->tambah()) {
                $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Supplier !');
                redirect('suppliers');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Menambahkan Supplier !');
                $this->index();
            }
        }
    }

    public function detail($kd_supplier)
    {
        $data['supplier'] = $this->supplier_model->supplier($kd_supplier);
        $data['pengajuan'] = $this->db->get_where('pengajuan', ['kd_supplier' => $kd_supplier])->result_array();

        $data['title'] = 'Detail Supplier';
        $this->loadView('detail_supplier', $data);
    }

    public function ubah()
    {
        $supplier = $this->db->get_where('suppliers', ['kd_supplier' => $this->input->post('kd_supplier')])->row();

        $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('nama_miniplant', 'Nama Miniplant', 'required');
        if ($this->input->post('nama_miniplant') != $supplier->nama_miniplant) $this->form_validation->set_rules('nama_miniplant', 'Nama Miniplant', 'required|is_unique[suppliers.nama_miniplant]');
        $this->form_validation->set_rules('nama_pimpinan', 'Nama Pimpinan', 'required');
        $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|is_numeric');
        if ($this->input->post('no_telp') != $supplier->no_telp) $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|is_numeric|is_unique[users.phone]');
        if ($this->input->post('no_fax') != $supplier->no_fax) $this->form_validation->set_rules('no_fax', 'No. Faximile', 'is_unique[suppliers.no_fax]');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        if ($this->input->post('email') != $supplier->email) $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal Mengubah Supplier !');
            $this->session->set_flashdata('hasModalID', 'edit_supplier-' . $supplier);
            $this->index();
        } else {
            if ($this->supplier_model->ubah()) {
                $this->session->set_flashdata('sukses', 'Berhasil Mengubah Supplier !');
                redirect('suppliers');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Mengubah Supplier !');
                $this->index();
            }
        }
    }

    public function hapus($kd_supplier)
    {
        if ($this->supplier_model->hapus($kd_supplier)) {
            $this->session->set_flashdata('sukses', 'Berhasil Menghapus Supplier !');
            redirect('suppliers');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Supplier !');
            $this->index();
        }
    }

    public function activation($kd_supplier)
    {
        $activation = $this->supplier_model->activation($kd_supplier);

        if ($activation == 'activated') {
            $this->session->set_flashdata('sukses', 'Berhasil Mengaktifkan Supplier !');
            redirect('suppliers');
        } else {
            $this->session->set_flashdata('sukses', 'Berhasil Menonaktifkan Supplier !');
            $this->index();
        }
    }
}
