<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_isian extends CI_Controller
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
        $data['kd_kategori_daftar_isian_auto'] = $this->daftar_isian_model->kd_kategori_daftar_isian_auto();
        $data['kategori_daftar_isian'] = $this->daftar_isian_model->semuaKategori();

        $data['title'] = 'Daftar Isian';
        $this->loadView('daftar_isian', $data);
    }

    public function tambah_kategori()
    {
        $this->form_validation->set_rules('kd_daftar_isian', 'Kode Kategori', 'required');
        $this->form_validation->set_rules('nama_isian', 'Nama Kategori', 'required|is_unique[kategori_daftar_isian.nama_isian]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal Menambahkan Kategori !');
            $this->session->set_flashdata('hasModalID', 'tambah_kategori');
            $this->index();
        } else {
            if ($this->daftar_isian_model->tambah_kategori()) {
                $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Kategori !');
                redirect('daftar_isian');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Menambahkan Kategori !');
                $this->index();
            }
        }
    }

    public function ubah_kategori()
    {
        $kd_daftar_isian = $this->input->post('kd_daftar_isian');
        $daftar_isian = $this->db->get_where('kategori_daftar_isian', ['kd_daftar_isian' => $kd_daftar_isian])->row();

        $this->form_validation->set_rules('kd_daftar_isian', 'Kode Kategori', 'required');
        $this->form_validation->set_rules('nama_isian', 'Nama Kategori', 'required');
        if ($this->input->post('nama_isian') != $daftar_isian->nama_isian) $this->form_validation->set_rules('nama_isian', 'Nama Kategori', 'required|is_unique[kategori_daftar_isian.nama_isian]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal Mengubah Kategori !');
            $this->session->set_flashdata('hasModalID', 'ubah_kategori-' . $kd_daftar_isian);
            $this->index();
        } else {
            if ($this->daftar_isian_model->ubah_kategori()) {
                $this->session->set_flashdata('sukses', 'Berhasil Mengubah Kategori !');
                redirect('daftar_isian');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Mengubah Kategori !');
                $this->index();
            }
        }
    }

    public function hapus_kategori($kd_daftar_isian)
    {
        if ($this->daftar_isian_model->hapus_kategori($kd_daftar_isian)) {
            $this->session->set_flashdata('sukses', 'Berhasil Menghapus Kategori !');
            redirect('daftar_isian');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Kategori !');
            $this->index();
        }
    }

    public function tambah_isian()
    {
        $this->form_validation->set_rules('kd_daftar_isian', 'Kode Kategori', 'required');
        $this->form_validation->set_rules('nama_subisian', 'Nama Isian', 'required');
        $this->form_validation->set_rules('acuan', 'Acuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal Menambahkan Isian !');
            $this->session->set_flashdata('hasModalID', 'tambah_isian');
            $this->index();
        } else {
            if ($this->daftar_isian_model->tambah_isian()) {
                $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Isian !');
                redirect('daftar_isian');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Menambahkan Isian !');
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
            $this->session->set_flashdata('gagal', 'Gagal Mengubah Isian !');
            $this->session->set_flashdata('hasModalID', 'ubah_isian-' . $id);
            $this->index();
        } else {
            if ($this->daftar_isian_model->ubah_isian()) {
                $this->session->set_flashdata('sukses', 'Berhasil Mengubah Isian !');
                redirect('daftar_isian');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Mengubah Isian !');
                $this->index();
            }
        }
    }

    public function hapus_isian($id)
    {
        if ($this->daftar_isian_model->hapus_isian($id)) {
            $this->session->set_flashdata('sukses', 'Berhasil Menghapus Isian !');
            redirect('daftar_isian');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Isian !');
            $this->index();
        }
    }
}
