<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perbaikan extends CI_Controller
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
        $this->load->view('admin/perbaikan/' . $file, $data);
        $this->load->view('admin/parts/footer', $data);
    }

    public function index()
    {
        $data['perbaikan_ajuan'] = $this->perbaikan_model->semuaPerbaikanAjuan();

        $data['title'] = 'Perbaikan Ajuan';
        $this->loadView('perbaikan', $data);
    }

    public function detail($kd_perbaikan)
    {
        $perbaikan = $this->db->get_where('perbaikan', ['kd_perbaikan' => $kd_perbaikan])->row();
        $this->db->join('penilaian_notes', 'penilaian_notes.id = perbaikan_detail.id_notes', 'left');
        $perbaikan_detail = $this->db->get_where('perbaikan_detail', ['kd_perbaikan' => $kd_perbaikan])->result_array();
        $penilaian = $this->db->get_where('penilaian', ['kd_penilaian' => $perbaikan->kd_penilaian])->row();
        $penilaian_detail = $this->db->get_where('penilaian_detail', ['kd_penilaian' => $perbaikan->kd_penilaian])->result_array();
        $supplier = $this->db->get_where('suppliers', ['kd_supplier' => $perbaikan->kd_supplier])->row();
        $jenis_produk = $this->db->get_where('jenis_produk', ['kd_pengajuan' => $penilaian->kd_pengajuan, 'kd_supplier' => $penilaian->kd_supplier])->result_array();
        $tim_inspeksi = $this->db->get_where('tim_inspeksi', ['kd_pengajuan' => $penilaian->kd_pengajuan])->row();
        $kategori_daftar_isian = $this->daftar_isian_model->semuaKategori();
        $this->db->join('penanganan', 'penanganan.kd_penanganan = penilaian_penanganan.kd_penanganan', 'left');
        $penanganan = $this->db->get_where('penilaian_penanganan', ['kd_penilaian' => $perbaikan->kd_penilaian])->result_array();
        $notes = $this->db->get_where('penilaian_notes', ['kd_penilaian' => $perbaikan->kd_penilaian])->result_array();

        $data = [
            'supplier' => $supplier,
            'jenis_produk' => $jenis_produk,
            'ketua_tim' => $this->db->get_where('admin', ['kd_admin' => $tim_inspeksi->ketua_inspeksi])->row(),
            'anggota1' => $this->db->get_where('admin', ['kd_admin' => $tim_inspeksi->anggota1])->row(),
            'anggota2' => $this->db->get_where('admin', ['kd_admin' => $tim_inspeksi->anggota2])->row(),
            'penilaian' => $penilaian,
            'penilaian_detail' => $penilaian_detail,
            'kategori_daftar_isian' => $kategori_daftar_isian,
            'penanganan' => $penanganan,
            'notes' => $notes,
            'perbaikan' => $perbaikan,
            'perbaikan_detail' => $perbaikan_detail,
        ];

        $data['title'] = 'Detail Perbaikan';
        $this->loadView('detail', $data);
    }

    public function validasi($kd_perbaikan)
    {
        if ($this->perbaikan_model->validasi($kd_perbaikan)) {
            $this->session->set_flashdata('sukses', 'Berhasil Memvalidasi Perbaikan !');
            redirect('penilaian');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Memvalidasi Perbaikan !');
            $this->index();
        }
    }
}
