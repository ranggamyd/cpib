<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
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
        $this->load->view('admin/pengajuan/' . $file, $data);
        $this->load->view('admin/parts/footer', $data);
    }

    public function index()
    {
        $data['pengajuan'] = $this->pengajuan_model->semuaPengajuan();

        $data['title'] = 'Ajuan Supplier';
        $this->loadView('pengajuan', $data);
    }

    public function tambah_ajuan()
    {
        $data['kd_pengajuan_auto'] = $this->pengajuan_model->kd_pengajuan_auto();
        $data['suppliers'] = $this->supplier_model->suppliers();
        $data['jenis_produk'] = $this->jenis_produk_model->semuaJenisProduk();

        $data['title'] = 'Tambah Ajuan';
        $this->loadView('tambah_ajuan', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kd_pengajuan', 'Kode Pengajuan', 'required');
        $this->form_validation->set_rules('tgl_pengajuan', 'Tanggal Pengajuan', 'required');
        $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('nama_miniplant', 'Nama Mini Plant', 'required');
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
            $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
            $this->tambah_ajuan();
        } else {
            if ($this->pengajuan_model->tambah()) {
                $this->session->set_flashdata('sukses', 'Berhasil mengubah !');
                redirect('pengajuan');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal mengubah !');
                $this->tambah_ajuan();
            }
        }
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
            $this->session->set_flashdata('sukses', 'Berhasil menghapus !');
            redirect('pengajuan');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal menghapus !');
            $this->index();
        }
    }

    public function create_team($kd_pengajuan)
    {
        $data['kd_tim_inspeksi_auto'] = $this->tim_inspeksi_model->kd_tim_inspeksi_auto();
        $data['kd_pengajuan'] = $kd_pengajuan;
        $this->db->join('suppliers', 'suppliers.kd_supplier = pengajuan.kd_supplier');
        $data['supplier'] = $this->db->get_where('pengajuan', ['kd_pengajuan' => $kd_pengajuan])->row();
        $data['admin'] = $this->db->get('admin')->result_array();

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
                redirect('pengajuan');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal membuat tim !');
                $this->create_team($this->input->post('kd_pengajuan'));
            }
        }
    }

    public function penilaian($kd_pengajuan)
    {
        $data['kd_daftar_isian_auto'] = $this->daftar_isian_model->kd_daftar_isian_auto();
        $pengajuan = $this->db->get_where('pengajuan', ['kd_pengajuan' => $kd_pengajuan])->row();
        $data['ajuan'] = $pengajuan;
        $data['supplier'] = $this->db->get_where('suppliers', ['kd_supplier' => $pengajuan->kd_supplier])->row();
        $data['nama_miniplant'] = $this->db->get_where('miniplant_supplier', ['kd_pengajuan' => $pengajuan->kd_pengajuan])->row('nama_miniplant');
        $data['tim_inspeksi'] = $this->db->get_where('tim_inspeksi', ['kd_pengajuan' => $pengajuan->kd_pengajuan])->row();
        $data['daftar_isian'] = $this->daftar_isian_model->semuaDaftar_isian();
        // $data['kd_penilaian_auto'] = $this->penilaian_model->kd_penilaian_auto();
        $data['kd_pengajuan'] = $kd_pengajuan;
        $data['admin'] = $this->db->get('admin')->result_array();

        $data['title'] = 'Form Penilaian Kelayakan Supplier';
        $this->loadView('penilaian', $data);
    }

    public function proses_inspeksi($kd_pengajuan)
    {
        $check_team = $this->pengajuan_model->check_team($kd_pengajuan);
        if (!$check_team) {
            $this->create_team($kd_pengajuan);
        } else {
            $this->penilaian($kd_pengajuan);
        };
    }

    public function proses_penilaian()
    {
        $data = [
            'kd_penilaian' => $this->input->post('kd_penilaian_auto'),
            'tgl_inspeksi' => $this->input->post('tgl_inspeksi'),
            'kd_supplier' => $this->input->post('kd_supplier'),
            'jenis_supplier' => $this->input->post('jenis_supplier'),
            'kd_tim_inspeksi' => $this->input->post('kd_tim_inspeksi'),
        ];

        $subisian = $this->db->get('sub_daftar_isian')->result_array();

        $nilai = [];
        foreach ($subisian as $item) {
            if ($this->input->post($item['id'])) {
                $subnilai = [
                    'kd_penilaian' => $this->input->post('kd_penilaian_auto'),
                    'id_subisian' => $item['id'],
                    'is_minor' => 0,
                    'is_mayor' => 0,
                    'is_serius' => 0,
                    'is_kritis' => 0,
                ];

                switch ($this->input->post($item['id'])) {
                    case 'is_minor':
                        $subnilai['is_minor'] = 1;
                        break;
                    case 'is_mayor':
                        $subnilai['is_mayor'] = 1;
                        break;
                    case 'is_serius':
                        $subnilai['is_serius'] = 1;
                        break;
                    case 'is_kritis':
                        $subnilai['is_kritis'] = 1;
                        break;
                }

                array_push($nilai, $subnilai);
            }
        }

        $data['nilai'] = $nilai;

        $revision_notes = [];
        foreach ($this->input->post('notes') as $item) {
            $revisi = [
                'kd_penilaian' => $this->input->post('kd_penilaian_auto'),
                'revisi' => $item['revisi'],
            ];

            array_push($revision_notes, $revisi);
        }

        $data['revision_notes'] = $revision_notes;

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
