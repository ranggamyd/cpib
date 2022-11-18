<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tim_inspeksi extends CI_Controller
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
        //     'css' => 'tim_inspeksi.css',
        //     'js' => 'tim_inspeksi.js',
        // ];

        $this->load->view('admin/parts/header', $data);
        $this->load->view('admin/' . $file, $data);
        $this->load->view('admin/parts/footer', $data);
    }

    public function index()
    {
        $data['tim_inspeksi'] = $this->tim_inspeksi_model->tim_inspeksi();
        $data['kd_tim_inspeksi_auto'] = $this->tim_inspeksi_model->kd_tim_inspeksi_auto();
        $data['kd_pengajuan'] = $this->db->get_where('pengajuan', ['status' => 'Tertunda']);
        $data['suppliers'] = $this->supplier_model->suppliers();
        $data['admin'] = $this->user_model->users();

        $data['title'] = 'Tim Inspeksi';
        $this->loadView('tim_inspeksi', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kd_tim_inspeksi', 'Kode Tim_inspeksi', 'required');
        $this->form_validation->set_rules('kd_pengajuan', 'Kode Pengajuan', 'required');
        $this->form_validation->set_rules('pimpinan_supplier', 'Pimpinan Supplier', 'required');
        $this->form_validation->set_rules('ketua_inspeksi', 'Ketua Inspeksi', 'required');
        $this->form_validation->set_rules('anggota1', 'Anggota 1', 'required|differs[ketua_inspeksi]');
        $this->form_validation->set_rules('anggota2', 'Anggota 2', 'differs[ketua_inspeksi]|differs[anggota1]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
            $this->session->set_flashdata('hasModalID', 'tambah_tim_inspeksi');
            $this->index();
        } else {
            if ($this->tim_inspeksi_model->tambah()) {
                $this->session->set_flashdata('sukses', 'Berhasil menambahkan !');
                redirect('tim_inspeksi');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal menambahkanas !');
                $this->index();
            }
        }
    }

    public function ubah()
    {
        $kd_tim_inspeksi = $this->input->post('kd_tim_inspeksi');
        $tim_inspeksi = $this->db->get_where('tim_inspeksi', ['kd_tim_inspeksi' => $kd_tim_inspeksi])->row('kd_tim_inspeksi');

        $this->form_validation->set_rules('kd_tim_inspeksi', 'Kode Tim_inspeksi', 'required');
        $this->form_validation->set_rules('pimpinan_supplier', 'Pimpinan Supplier', 'required');
        $this->form_validation->set_rules('ketua_inspeksi', 'Ketua Inspeksi', 'required');
        $this->form_validation->set_rules('anggota1', 'Anggota 1', 'required|differs[ketua_inspeksi]');
        $this->form_validation->set_rules('anggota2', 'Anggota 2', 'required|differs[ketua_inspeksi]|differs[anggota1]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal mengubah !');
            $this->session->set_flashdata('hasModalID', 'edit_tim_inspeksi' . $tim_inspeksi);
            $this->index();
        } else {
            if ($this->tim_inspeksi_model->ubah()) {
                $this->session->set_flashdata('sukses', 'Berhasil mengubah !');
                redirect('tim_inspeksi');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal mengubah !');
                $this->index();
            }
        }
    }

    public function hapus($kd_tim_inspeksi)
    {
        if ($this->tim_inspeksi_model->hapus($kd_tim_inspeksi)) {
            $this->session->set_flashdata('sukses', 'Berhasil menghapus !');
            redirect('tim_inspeksi');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal menghapus !');
            $this->index();
        }
    }
}
