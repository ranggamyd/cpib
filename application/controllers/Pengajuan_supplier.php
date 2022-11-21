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
        // $data['style'] = [
        //     'css' => 'supplier.css',
        //     'js' => 'supplier.js',
        // ];

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
        $supplier = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row();
        $data['kd_pengajuan_auto'] = $this->pengajuan_model->kd_pengajuan_auto();
        $data['supplier'] = $this->db->get_where('suppliers',['kd_supplier'=>$supplier->kd_supplier])->row();
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
        if (empty($_FILES['nib']['name'])) $this->form_validation->set_rules('nib', 'NIB', 'required|trim|xss_clean');
        if (empty($_FILES['siup']['name'])) $this->form_validation->set_rules('siup', 'SIUP', 'required|trim|xss_clean');
        $this->form_validation->set_rules('akta_usaha', 'Akta Usaha', 'trim|xss_clean');
        $this->form_validation->set_rules('imb', 'IMB', 'trim|xss_clean');
        $this->form_validation->set_rules('layout', 'LAYOUT', 'trim|xss_clean');
        $this->form_validation->set_rules('panduan_mutu', 'Panduan Mutu', 'trim|xss_clean');

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

    public function proses_inspeksi($kd_pengajuan)
    {
        $check_team = $this->pengajuan_model->check_team($kd_pengajuan);
        if (!$check_team) {
            $this->session->set_flashdata('gagal', 'Mohon membuat Tim terlebih dahulu !');
            $this->create_team($kd_pengajuan);
        } else {
            $this->penilaian($kd_pengajuan);
        };
    }

    public function create_team($kd_pengajuan)
    {
        $data['kd_tim_inspeksi_auto'] = $this->tim_inspeksi_model->kd_tim_inspeksi_auto();
        $data['kd_pengajuan'] = $kd_pengajuan;
        $this->db->join('suppliers', 'suppliers.kd_supplier = pengajuan.kd_supplier');
        $data['supplier'] = $this->db->get_where('pengajuan', ['kd_pengajuan' => $kd_pengajuan])->row();
        $data['supplier'] = $this->db->get('supplier')->result_array();

        $data['title'] = 'Buat Tim Inspeksi';
        $this->loadView('create_team', $data);
    }

    public function proses_create_team()
    {
        $this->form_validation->set_rules('kd_tim_inspeksi', 'Kode Tim_inspeksi', 'required');
        $this->form_validation->set_rules('kd_pengajuan', 'Kode Pengajuan', 'required');
        $this->form_validation->set_rules('pimpinan_supplier', 'Pimpinan Supplier', 'required');
        $this->form_validation->set_rules('ketua_inspeksi', 'Ketua Inspeksi', 'required');
        $this->form_validation->set_rules('anggota1', 'Anggota 1', 'required|differs[ketua_inspeksi]');
        $this->form_validation->set_rules('anggota2', 'Anggota 2', 'required|differs[ketua_inspeksi]|differs[anggota1]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal membuat tim !');
            $this->create_team($this->input->post('kd_pengajuan'));
        } else {
            if ($this->tim_inspeksi_model->tambah()) {
                $this->session->set_flashdata('sukses', 'Berhasil membuat tim !');
                redirect('pengajuan_supplier');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal membuat tim !');
                $this->create_team($this->input->post('kd_pengajuan'));
            }
        }
    }

    public function penilaian($kd_pengajuan)
    {
        $pengajuan = $this->db->get_where('pengajuan', ['kd_pengajuan' => $kd_pengajuan])->row();
        $data['kd_penilaian_auto'] = $this->penilaian_model->kd_penilaian_auto();
        $data['ajuan'] = $pengajuan;
        $data['supplier'] = $this->db->get_where('suppliers', ['kd_supplier' => $pengajuan->kd_supplier])->row();
        $this->db->join('jenis_produk', 'jenis_produk.kd_jenis_produk = jenis_produk_supplier.kd_jenis_produk', 'left');
        $data['jenis_produk_supplier'] = $this->db->get_where('jenis_produk_supplier', ['kd_pengajuan' => $pengajuan->kd_pengajuan, 'kd_supplier' => $pengajuan->kd_supplier])->result_array();
        $data['cek_pengajuan'] = $this->db->get_where('pengajuan', ['kd_pengajuan' => $pengajuan->kd_pengajuan, 'kd_supplier' => $pengajuan->kd_supplier])->num_rows();
        $data['tim_inspeksi'] = $this->db->get_where('tim_inspeksi', ['kd_pengajuan' => $pengajuan->kd_pengajuan])->row();
        $data['kategori_daftar_isian'] = $this->daftar_isian_model->semuaKategori();
        $data['supplier'] = $this->db->get('supplier')->result_array();
        $data['tahap_penanganan'] = $this->db->get('penanganan')->result_array();

        $data['title'] = 'Form Isian (Checklist) Penilaian Kelayakan Supplier';
        $this->loadView('penilaian', $data);
    }

    public function proses_penilaian()
    {
        $this->form_validation->set_rules('kd_penilaian', 'Kode Penilaian', 'required|is_unique[penilaian.kd_penilaian]');
        $this->form_validation->set_rules('tgl_inspeksi', 'Tanggal Inspeksi', 'required');
        $this->form_validation->set_rules('kd_pengajuan', 'Kode Pengajuan', 'required');
        $this->form_validation->set_rules('kd_supplier', 'Supplier', 'required');
        $this->form_validation->set_rules('jenis_supplier', 'Jenis Supplier', 'required');
        $this->form_validation->set_rules('kd_tim_inspeksi', 'Tim Inspeksi', 'required');
        $this->form_validation->set_rules('jmlMinor', 'Jumlah Minor', 'required');
        $this->form_validation->set_rules('jmlMayor', 'Jumlah Mayor', 'required');
        $this->form_validation->set_rules('jmlSerius', 'Jumlah Serius', 'required');
        $this->form_validation->set_rules('jmlKritis', 'Jumlah Kritis', 'required');
        $this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required');
        // $this->form_validation->set_rules('penilaian_detail', 'Checklist', 'callback_penilaianDetail');
        $this->form_validation->set_rules('tahap_penanganan[]', 'Tahapan Penanganan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', "Mohon isi data dengan lengkap dan teliti !");
            $this->penilaian($this->input->post('kd_pengajuan'));
        } else {
            if ($this->penilaian_model->tambah()) {
                $this->session->set_flashdata('sukses', 'Berhasil menambahkan hasil Inspeksi !');
                redirect('pengajuan_supplier');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
                $this->penilaian($this->input->post('kd_pengajuan'));
            }
        }
    }
}
