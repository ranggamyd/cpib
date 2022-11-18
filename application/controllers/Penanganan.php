<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penanganan extends CI_Controller
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
        //     'css' => 'penanganan.css',
        //     'js' => 'penanganan.js',
        // ];

        $this->load->view('admin/parts/header', $data);
        $this->load->view('admin/' . $file, $data);
        $this->load->view('admin/parts/footer', $data);
    }

    public function index()
    {
        $data['kd_penanganan_auto'] = $this->penanganan_model->kd_penanganan_auto();
        $data['penanganan'] = $this->penanganan_model->semuaPenanganan();

        $data['title'] = 'Tahapan Penanganan';
        $this->loadView('penanganan', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kd_penanganan', 'Kode Penanganan', 'required');
        $this->form_validation->set_rules('nama_penanganan', 'Nama Penanganan', 'required|is_unique[penanganan.nama_penanganan]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal Menambahkan Penanganan !');
            $this->session->set_flashdata('hasModalID', 'tambah_penanganan');
            $this->index();
        } else {
            if ($this->penanganan_model->tambah()) {
                $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Penanganan !');
                redirect('penanganan');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Menambahkan Penanganan !');
                $this->index();
            }
        }
    }

    public function ubah()
    {
        $kd_penanganan = $this->input->post('kd_penanganan');
        $penanganan = $this->db->get_where('penanganan', ['kd_penanganan' => $kd_penanganan])->row('nama_penanganan');

        $this->form_validation->set_rules('kd_penanganan', 'Kode Penanganan', 'required');
        $this->form_validation->set_rules('nama_penanganan', 'Nama Penanganan', 'required');
        if ($this->input->post('penanganan') != $penanganan) $this->form_validation->set_rules('nama_penanganan', 'Nama Penanganan', 'required|is_unique[penanganan.nama_penanganan]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal Mengubah Penanganan !');
            $this->session->set_flashdata('hasModalID', 'edit_penanganan-' . $kd_penanganan);
            $this->index();
        } else {
            if ($this->penanganan_model->ubah()) {
                $this->session->set_flashdata('sukses', 'Berhasil Mengubah Penanganan !');
                redirect('penanganan');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Mengubah Penanganan !');
                $this->index();
            }
        }
    }

    public function hapus($kd_penanganan)
    {
        if ($this->penanganan_model->hapus($kd_penanganan)) {
            $this->session->set_flashdata('sukses', 'Berhasil Menghapus Penanganan !');
            redirect('penanganan');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Penanganan !');
            $this->index();
        }
    }
}
