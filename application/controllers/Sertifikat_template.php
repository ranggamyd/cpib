<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat_template extends CI_Controller
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
    $this->load->view('admin/sertifikat_template/' . $file, $data);
    $this->load->view('admin/parts/footer', $data);
  }

  public function index()
  {
    $data['kd_sertifikat_auto'] = $this->sertifikat_template_model->kd_sertifikat_auto();
    $data['sertifikat'] = $this->sertifikat_template_model->semuaSertifikat();

    $data['title'] = 'sertifikat';
    $this->loadView('sertifikat', $data);
  }

  public function tambah()
  {
    $this->form_validation->set_rules('kd_sertifikat', 'Kode Sertifikat', 'required');
    $this->form_validation->set_rules('nama_sertifikat', 'Nama Sertifikat', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
      $this->session->set_flashdata('hasModalID', 'tambah_sertifikat');
      $this->index();
    } else {
      if ($this->sertifikat_template_model->tambah()) {
        $this->session->set_flashdata('sukses', 'Berhasil menambahkan !');
        redirect('sertifikat_template');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal menambahkan !');
        $this->index();
      }
    }
  }

  public function edit($kd_sertifikat)
  {
    $data['sertifikat'] = $this->sertifikat_template_model->sertifikat($kd_sertifikat);

    $data['title'] = 'Edit Template Sertifikat';
    $this->loadView('edit', $data);
  }
  public function saveChanges()
  {

    $this->form_validation->set_rules('s_no_surat', 'Size Nomor Sertifikat', 'required');
    $this->form_validation->set_rules('x_no_surat', 'Y Nomor Sertifikat', 'required');
    $this->form_validation->set_rules('y_no_surat', 'X Nomor Sertifikat', 'required');
    $this->form_validation->set_rules('s_supplier', 'Size Unit Pengumpul', 'required');
    $this->form_validation->set_rules('x_supplier', 'X Unit Pengumpul', 'required');
    $this->form_validation->set_rules('y_supplier', 'Y Unit Pengumpul', 'required');
    $this->form_validation->set_rules('w_alamat', 'Widh Alamat', 'required');
    $this->form_validation->set_rules('s_alamat', 'Size Alamat', 'required');
    $this->form_validation->set_rules('x_alamat', 'X Alamat', 'required');
    $this->form_validation->set_rules('y_alamat', 'Y Alamat', 'required');
    $this->form_validation->set_rules('y_alamat', 'Y Alamat', 'required');
    $this->form_validation->set_rules('s_jenis_produk', 'Size Jenis Produk', 'required');
    $this->form_validation->set_rules('x_jenis_produk', 'X Jenis Produk', 'required');
    $this->form_validation->set_rules('y_jenis_produk', 'Y Jenis Produk', 'required');
    $this->form_validation->set_rules('w_penanganan', 'Width Tahap Penanganan', 'required');
    $this->form_validation->set_rules('s_penanganan', 'Size Tahap Penanganan', 'required');
    $this->form_validation->set_rules('x_penanganan', 'X Tahap Penanganan', 'required');
    $this->form_validation->set_rules('y_penanganan', 'Y Tahap Penanganan', 'required');
    $this->form_validation->set_rules('s_klasifikasi', 'Size Klasifikasi', 'required');
    $this->form_validation->set_rules('x_klasifikasi', 'X Klasifikasi', 'required');
    $this->form_validation->set_rules('y_klasifikasi', 'Y Klasifikasi', 'required');
    $this->form_validation->set_rules('s_tgl_inspeksi', 'Size Tanggal Inspeksi', 'required');
    $this->form_validation->set_rules('x_tgl_inspeksi', 'X Tanggal Inspeksi', 'required');
    $this->form_validation->set_rules('y_tgl_inspeksi', 'Y Tanggal Inspeksi', 'required');
    $this->form_validation->set_rules('s_berlaku_sampai', 'Size Berlaku Sampai', 'required');
    $this->form_validation->set_rules('x_berlaku_sampai', 'X Berlaku Sampai', 'required');
    $this->form_validation->set_rules('y_berlaku_sampai', 'Y Berlaku Sampai', 'required');
    $this->form_validation->set_rules('s_dikeluarkan_di', 'Size Dikeluarkan Di', 'required');
    $this->form_validation->set_rules('x_dikeluarkan_di', 'X Dikeluarkan Di', 'required');
    $this->form_validation->set_rules('y_dikeluarkan_di', 'Y Dikeluarkan Di', 'required');
    $this->form_validation->set_rules('s_tgl', 'Size Tanggal Validasi', 'required');
    $this->form_validation->set_rules('x_tgl', 'X Tanggal Validasi', 'required');
    $this->form_validation->set_rules('y_tgl', 'Y Tanggal Validasi', 'required');
    $this->form_validation->set_rules('s_kepala_upt', 'Size Kepala UPT BKIPM', 'required');
    $this->form_validation->set_rules('x_kepala_upt', 'X Kepala UPT BKIPM', 'required');
    $this->form_validation->set_rules('y_kepala_upt', 'Y Kepala UPT BKIPM', 'required');
    $this->form_validation->set_rules('s_head_of', 'Size FQIA TIU', 'required');
    $this->form_validation->set_rules('x_head_of', 'X FQIA TIU', 'required');
    $this->form_validation->set_rules('y_head_of', 'Y FQIA TIU', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', "Mohon isi data dengan lengkap !");
      $this->edit($this->input->post('kd_sertifikat'));
      // var_dump(validation_errors());
    } else {
      if ($this->sertifikat_template_model->save()) {
        $this->session->set_flashdata('sukses', 'Berhasil Edit Template !');
        redirect('sertifikat_template');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal Mengedit Sertifikat !');
        $this->edit($this->input->post('kd_sertifikat'));
      }
    }
  }
}
