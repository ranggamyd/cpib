<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat extends CI_Controller
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
    //     'css' => 'sertifikat.css',
    //     'js' => 'sertifikat.js',
    // ];

    $this->load->view('admin/parts/header', $data);
    $this->load->view('admin/sertifikat/' . $file, $data);
    $this->load->view('admin/parts/footer', $data);
  }

  public function index()
  {
    $this->db->select('suppliers.nama_miniplant, suppliers.nama_pimpinan, sertifikat.*, penilaian.kd_pengajuan');
    $this->db->join('penilaian', 'penilaian.kd_penilaian = sertifikat.kd_penilaian', 'left');
    $this->db->join('suppliers', 'suppliers.kd_supplier = sertifikat.kd_supplier', 'left');
    $this->db->order_by('tgl', 'desc');
    $this->db->order_by('id', 'desc');
    $data['sertifikat'] = $this->db->get('sertifikat')->result_array();

    $data['title'] = 'Sertifikat Supplier';
    $this->loadView('sertifikat', $data);
  }

  public function generate($kd_penilaian)
  {
    $penilaian = $this->db->get_where('penilaian', ['kd_penilaian' => $kd_penilaian])->row();
    $data['sertifikat_template'] = $this->db->get('sertifikat_template')->result_array();
    $data['penilaian'] = $penilaian;
    $data['supplier'] = $this->db->get_where('suppliers', ['kd_supplier' => $penilaian->kd_supplier])->row();
    $data['jenis_produk'] = $this->db->get_where('jenis_produk', ['kd_pengajuan' => $penilaian->kd_pengajuan, 'kd_supplier' => $penilaian->kd_supplier])->result_array();
    $this->db->join('penanganan', 'penanganan.kd_penanganan = penilaian_penanganan.kd_penanganan', 'left');
    $data['tahapan_penanganan'] = $this->db->get_where('penilaian_penanganan', ['kd_penilaian' => $penilaian->kd_penilaian])->result_array();

    $data['title'] = 'Generate Certificate';
    $this->loadView('generate', $data);
  }

  public function generate_certificate()
  {
    $this->form_validation->set_rules('kd_sertifikat', 'Jenis Sertifikat', 'required');
    $this->form_validation->set_rules('no_surat', 'No. Sertifikat', 'required');
    $this->form_validation->set_rules('tgl_inspeksi', 'Tanggal Inspeksi', 'required');
    $this->form_validation->set_rules('nama_miniplant', 'Mini Plant', 'required');
    $this->form_validation->set_rules('nama_pimpinan', 'Pimpinan Supplier', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required');
    $this->form_validation->set_rules('tgl', 'Tanggal Validasi', 'required');
    $this->form_validation->set_rules('berlaku_sampai', 'Berlaku Sampai', 'required');
    $this->form_validation->set_rules('dikeluarkan_di', 'Dikeluarkan di', 'required');
    $this->form_validation->set_rules('kepala_upt', 'Kepala UPT BKIPM', 'required');
    $this->form_validation->set_rules('head_of', 'Head of TIU', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', "Mohon isi data dengan lengkap !");
      $this->generate($this->input->post('kd_penilaian'));
    } else {
      if ($this->sertifikat_model->generate()) {
        $this->session->set_flashdata('sukses', 'Berhasil Membuat Sertifikat !');
        redirect('sertifikat');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal Membuat Sertifikat !');
        $this->generate($this->input->post('kd_penilaian'));
      }
    }
  }

  public function detail($id)
  {

    $this->db->join('penilaian', 'penilaian.kd_penilaian=sertifikat.kd_penilaian');
    $sertifikat = $this->db->get_where('sertifikat', ['sertifikat.id' => $id])->row();
    $this->db->join('suppliers', 'suppliers.kd_supplier=pengajuan.kd_supplier');
    $pengajuan = $this->db->get_where('pengajuan', ['kd_pengajuan' => $sertifikat->kd_pengajuan])->row();
    $this->db->join('penanganan', 'penanganan.kd_penanganan=penilaian_penanganan.kd_penanganan');
    $tahapan_penanganan = $this->db->get_where('penilaian_penanganan', ['kd_penilaian' => $sertifikat->kd_penilaian])->result_array();

    $data['pengajuan'] = $pengajuan;
    $data['sertifikat'] = $sertifikat;
    $data['tahapan_penanganan'] = $tahapan_penanganan;

    $data['title'] = 'Detail Sertifikat';
    $this->loadView('detail', $data);
  }

  public function hapus($id)
  {
    if ($this->sertifikat_model->hapus($id)) {
      $this->session->set_flashdata('sukses', 'Berhasil Menghapus sertifikat !');
      redirect('sertifikat');
    } else {
      $this->session->set_flashdata('gagal', 'Gagal Menghapus sertifikat !');
      $this->index();
    }
  }
}
