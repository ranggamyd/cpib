<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_isian extends CI_Controller
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
        $this->load->view('admin/daftar_isian/' . $file, $data);
        $this->load->view('admin/parts/footer', $data);
    }

    public function index()
    {
        $data['kd_daftar_isian_auto'] = $this->daftar_isian_model->kd_daftar_isian_auto();
        $data['daftar_isian'] = $this->daftar_isian_model->semuaDaftar_isian();

        $data['title'] = 'Daftar Isian';
        $this->loadView('daftar_isian', $data);
    }

    public function tambah_kategori()
    {
        $this->form_validation->set_rules('kd_daftar_isian', 'Kode Daftar Isian', 'required');
        $this->form_validation->set_rules('nama_isian', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
            $this->session->set_flashdata('hasModalID', 'tambah_kategori');
            $this->index();
        } else {
            if ($this->daftar_isian_model->tambah_kategori()) {
                $this->session->set_flashdata('sukses', 'Berhasil menambahkan !');
                redirect('daftar_isian');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal menambahkanas !');
                $this->index();
            }
        }
    }

    public function ubah_kategori()
    {
        $kd_daftar_isian = $this->input->post('kd_daftar_isian');

        $this->form_validation->set_rules('kd_daftar_isian', 'Kode Daftar Isian', 'required');
        $this->form_validation->set_rules('nama_isian', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal mengubah !');
            $this->session->set_flashdata('hasModalID', 'ubah_kategori-' . $kd_daftar_isian);
            $this->index();
        } else {
            if ($this->daftar_isian_model->ubah_kategori()) {
                $this->session->set_flashdata('sukses', 'Berhasil mengubah !');
                redirect('daftar_isian');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal mengubah !');
                $this->index();
            }
        }
    }

    public function hapus_kategori($kd_daftar_isian)
    {
        if ($this->daftar_isian_model->hapus_kategori($kd_daftar_isian)) {
            $this->session->set_flashdata('sukses', 'Berhasil menghapus !');
            redirect('daftar_isian');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal menghapus !');
            $this->index();
        }
    }

    public function tambah_isian()
    {
        $this->form_validation->set_rules('kd_daftar_isian', 'Kode Kategori', 'required');
        $this->form_validation->set_rules('nama_subisian', 'Nama Isian', 'required');
        $this->form_validation->set_rules('acuan', 'Acuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
            $this->session->set_flashdata('hasModalID', 'tambah_isian');
            $this->index();
        } else {
            if ($this->daftar_isian_model->tambah_isian()) {
                $this->session->set_flashdata('sukses', 'Berhasil menambahkan !');
                redirect('daftar_isian');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
                $this->index();
            }
        }
    }

    public function ubah_isian()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('kd_daftar_isian', 'Kode Kategori', 'required');
        $this->form_validation->set_rules('nama_subisian', 'Nama Isian', 'required');
        $this->form_validation->set_rules('acuan', 'Acuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal mengubah !');
            $this->session->set_flashdata('hasModalID', 'ubah_isian-' . $id);
            $this->index();
        } else {
            if ($this->daftar_isian_model->ubah_isian()) {
                $this->session->set_flashdata('sukses', 'Berhasil mengubah !');
                redirect('daftar_isian');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal mengubah !');
                $this->index();
            }
        }
    }

    public function hapus_isian($id)
    {
        if ($this->daftar_isian_model->hapus_isian($id)) {
            $this->session->set_flashdata('sukses', 'Berhasil menghapus !');
            redirect('daftar_isian');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal menghapus !');
            $this->index();
        }
    }

    // public function tambah_ajuan()
    // {
    //     $data['kd_daftar_isian_auto'] = $this->daftar_isian_model->kd_daftar_isian_auto();
    //     $data['suppliers'] = $this->supplier_model->suppliers();
    //     $data['jenis_produk'] = $this->jenis_produk_model->semuaJenisProduk();

    //     $data['title'] = 'Tambah Ajuan';
    //     $this->loadView('tambah_ajuan', $data);
    // }
    // public function simpan_ajuan()
    // {
    //     $this->form_validation->set_rules('kd_daftar_isian', 'Kode daftar_isian', 'required');
    //     $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required');
    //     $this->form_validation->set_rules('tgl_daftar_isian', 'Tanggal daftar_isian', 'required');
    //     $this->form_validation->set_rules('ktp', 'KTP', 'trim|xss_clean');
    //     $this->form_validation->set_rules('npwp', 'NPWP', 'trim|xss_clean');
    //     $this->form_validation->set_rules('nib', 'NIB', 'trim|xss_clean');
    //     $this->form_validation->set_rules('siup', 'SIUP', 'trim|xss_clean');
    //     $this->form_validation->set_rules('akta_usaha', 'Akta Usaha', 'trim|xss_clean');
    //     $this->form_validation->set_rules('imb', 'IMB', 'trim|xss_clean');
    //     $this->form_validation->set_rules('layout', 'LAYOUT', 'trim|xss_clean');
    //     $this->form_validation->set_rules('panduan_mutu', 'Panduan Mutu', 'trim|xss_clean');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
    //         $this->index();
    //     } else {
    //         if ($this->daftar_isian_model->tambah()) {
    //             $this->session->set_flashdata('sukses', 'Berhasil mengubah !');
    //             redirect('daftar_isian');
    //         } else {
    //             $this->session->set_flashdata('gagal', 'Gagal mengubah !');
    //             $this->index();
    //         }
    //     }
    // }

    // public function ubah_ajuan($kd_daftar_isian)
    // {
    //     $data['daftar_isian'] = $this->daftar_isian_model->daftar_isian($kd_daftar_isian);
    //     $data['suppliers'] = $this->supplier_model->suppliers();
    //     $data['jenis_produk'] = $this->jenis_produk_model->semuaJenisProduk();

    //     $data['title'] = 'Ubah Ajuan';
    //     $this->loadView('ubah_ajuan', $data);
    // }
}
