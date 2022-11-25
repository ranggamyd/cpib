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
            // 'css' => 'supplier.css',
            'js' => 'pengajuan.js',
        ];

        $this->load->view('supplier/parts/header', $data);
        $this->load->view('supplier/pengajuan/' . $file, $data);
        $this->load->view('supplier/parts/footer', $data);
    }

    public function index()
    {
        $supplier = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row();
        $this->db->join('suppliers', 'suppliers.kd_supplier = pengajuan.kd_supplier', 'left');
        $data['pengajuan'] = $this->db->get_where('pengajuan', ['pengajuan.kd_supplier' => $supplier->kd_supplier])->result_array();

        $data['title'] = 'Ajuan Saya';
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

        $supplier = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row();
        $data['kd_pengajuan_auto'] = $this->pengajuan_model->kd_pengajuan_auto();
        $data['supplier'] = $this->db->get_where('suppliers', ['kd_supplier' => $supplier->kd_supplier])->row();
        $data['jenis_produk'] = $this->jenis_produk_model->semuaJenisProduk();

        $data['title'] = 'Tambah Ajuan';
        $this->loadView('tambah_ajuan', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kd_pengajuan', 'Kode Pengajuan', 'required');
        $this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan', 'required');
        $this->form_validation->set_rules('kd_supplier', 'Supplier', 'required');
        $this->form_validation->set_rules('kd_jenis_produk[]', 'Jenis Produk', 'required');
        if (empty($_FILES['ktp']['name'])) $this->form_validation->set_rules('ktp', 'KTP', 'required|trim|xss_clean');
        if (empty($_FILES['npwp']['name'])) $this->form_validation->set_rules('npwp', 'NPWP', 'required|trim|xss_clean');
        if (empty($_FILES['layout']['name'])) $this->form_validation->set_rules('layout', 'Layout', 'required|trim|xss_clean');
        if (empty($_FILES['panduan_mutu']['name'])) $this->form_validation->set_rules('panduan_mutu', 'Panduan Mutu', 'required|trim|xss_clean');
        $this->form_validation->set_rules('akta_usaha', 'Akta Usaha', 'trim|xss_clean');
        $this->form_validation->set_rules('imb', 'IMB', 'trim|xss_clean');
        $this->form_validation->set_rules('nib', 'NIB', 'trim|xss_clean');
        $this->form_validation->set_rules('siup', 'SIUP', 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal Menambahkan Ajuan !');
            $this->tambah_ajuan();
        } else {
            if ($this->pengajuan_model->tambah()) {
                $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Ajuan !');
                redirect('pengajuan_supplier');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Menambahkan Ajuan !');
                $this->tambah_ajuan();
            }
        }
    }

    public function detail($kd_pengajuan)
    {
        $data['pengajuan'] = $this->pengajuan_model->pengajuanDetail($kd_pengajuan);

        $data['title'] = 'Detail Ajuan';
        $this->loadView('detail_ajuan', $data);
    }

    public function ubah($kd_pengajuan)
    {
        $data['pengajuan'] = $this->pengajuan_model->pengajuan($kd_pengajuan);

        $data['suppliers'] = $this->supplier_model->suppliers();
        $data['jenis_produk'] = $this->jenis_produk_model->semuaJenisProduk();

        $data['title'] = 'Ubah Ajuan';
        $this->loadView('ubah_ajuan', $data);
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
