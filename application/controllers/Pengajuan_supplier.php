<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login_as') != 'supplier') {
            $this->session->set_userdata('referred_from', current_url());
            $this->session->set_flashdata('gagal', 'Gagal mengakses, Silahkan login kembali !');
            redirect('auth');
        }
    }

    private function loadView($file, $data)
    {
        $data['style'] = [
            // 'css' => 'pengajuan.css',
            'js' => 'pengajuan.js',
        ];

        $this->load->view('supplier/parts/header', $data);
        $this->load->view('supplier/pengajuan/' . $file, $data);
        $this->load->view('supplier/parts/footer', $data);
    }

    public function index()
    {
        $this->db->join('suppliers', 'suppliers.kd_supplier = users.kd_supplier', 'left');
        $supplier = $this->db->get_where('users', ['users.id' => $this->session->userdata('id')])->row();

        $this->db->join('suppliers', 'suppliers.kd_supplier = pengajuan.kd_supplier', 'left');
        $this->db->order_by('tgl_pengajuan', 'desc');
        $this->db->order_by('kd_pengajuan', 'desc');
        $data['pengajuan'] = $this->db->get_where('pengajuan', ['pengajuan.kd_supplier' => $supplier->kd_supplier])->result_array();

        $data['title'] = 'Daftar Permohonan Sertifikasi CPIB';
        $this->loadView('pengajuan', $data);
    }

    public function tambah_ajuan()
    {
        $this->db->join('suppliers', 'suppliers.kd_supplier = users.kd_supplier', 'left');
        $supplier = $this->db->get_where('users', ['users.id' => $this->session->userdata('id')])->row();

        if (!$supplier->nama_pimpinan) {
            $this->session->set_flashdata('gagal', 'Mohon lengkapi profil anda sebelum mengajukan permohonan !');
            redirect('user_supplier/setting');
        }

        $data['kd_pengajuan_auto'] = $this->pengajuan_model->kd_pengajuan_auto();
        $data['supplier'] = $supplier;

        $data['title'] = 'Form Permohonan Sertifikasi CPIB';
        $this->loadView('tambah_ajuan', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kd_pengajuan', 'Kode Pengajuan', 'required');
        $this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan', 'required');
        $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('jenis_produk[]', 'Jenis Produk', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal Mengajukan Permohonan !');
            $this->tambah_ajuan();
        } else {
            if ($this->pengajuan_model->tambah()) {
                $this->session->set_flashdata('sukses', 'Berhasil Mengajukan Permohonan !');
                redirect('pengajuan_supplier');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Mengajukan Permohonan !');
                $this->tambah_ajuan();
            }
        }
    }

    public function detail($kd_pengajuan)
    {
        $data['pengajuan'] = $this->pengajuan_model->pengajuan($kd_pengajuan);

        $data['title'] = 'Detail Permohonan Sertifikasi';
        $this->loadView('detail_ajuan', $data);
    }

    public function ubah($kd_pengajuan)
    {
        // $this->db->join('suppliers', 'suppliers.kd_supplier = users.kd_supplier', 'left');
        // $supplier = $this->db->get_where('users', ['users.id' => $this->session->userdata('id')])->row();
        
        // $data['pengajuan'] = $this->pengajuan_model->pengajuan($kd_pengajuan);
        // $data['supplier'] = $supplier;

        // $data['title'] = 'Form Permohonan Sertifikasi CPIB Supplier';
        // $this->loadView('ubah_ajuan', $data);
    }

    public function ubah_ajuan()
    {
        // $this->form_validation->set_rules('kd_pengajuan', 'Kode Pengajuan', 'required');
        // $this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan', 'required');
        // $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required');
        // $this->form_validation->set_rules('jenis_produk[]', 'Jenis Produk', 'required');

        // if ($this->form_validation->run() == FALSE) {
        //     $this->session->set_flashdata('gagal', 'Gagal Mengajukan Permohonan !');
        //     $this->tambah_ajuan();
        // } else {
        //     if ($this->pengajuan_model->ubah()) {
        //         $this->session->set_flashdata('sukses', 'Berhasil Mengajukan Permohonan !');
        //         redirect('pengajuan');
        //     } else {
        //         $this->session->set_flashdata('gagal', 'Gagal Mengajukan Permohonan !');
        //         $this->tambah_ajuan();
        //     }
        // }
    }

    public function hapus($kd_pengajuan)
    {
        if ($this->pengajuan_model->hapus($kd_pengajuan)) {
            $this->session->set_flashdata('sukses', 'Berhasil Menghapus Ajuan !');
            redirect('pengajuan_supplier');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Ajuan !');
            $this->index();
        }
    }
}
