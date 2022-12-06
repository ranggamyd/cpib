<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_supplier extends CI_Controller
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
        //     'css' => 'dashboard.css',
        //     'js' => 'dashboard.js',
        // ];

        $this->load->view('supplier/parts/header', $data);
        $this->load->view('supplier/' . $file, $data);
        $this->load->view('supplier/parts/footer', $data);
    }

    public function index()
    {
        $supplier = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row();
        $data['pengajuan_tertunda'] = $this->db->get_where('pengajuan', ['kd_supplier' => $supplier->kd_supplier, 'status' => 'Tertunda'])->num_rows();
        $data['menunggu_perbaikan'] = $this->db->get_where('pengajuan', ['kd_supplier' => $supplier->kd_supplier, 'status' => 'Perlu Revisi'])->num_rows();
        $data['total_sertifikat'] = $this->db->get_where('sertifikat', ['kd_supplier' => $supplier->kd_supplier])->num_rows();
        $data['sertifikat'] = $this->db->get_where('sertifikat', ['kd_supplier' => $supplier->kd_supplier])->result_array();

        $this->db->join('suppliers', 'suppliers.kd_supplier = users.kd_supplier', 'left');
        $supplier = $this->db->get_where('users', ['users.id' => $this->session->userdata('id')])->row();

        $this->db->select('suppliers.nama_miniplant, suppliers.nama_pimpinan, sertifikat.*, penilaian.kd_pengajuan');
        $this->db->join('penilaian', 'penilaian.kd_penilaian = sertifikat.kd_penilaian', 'left');
        $this->db->join('suppliers', 'suppliers.kd_supplier = sertifikat.kd_supplier', 'left');
        $data['sertifikat'] = $this->db->get_where('sertifikat', ['sertifikat.kd_supplier' => $supplier->kd_supplier])->result_array(); 

        $this->db->join('suppliers', 'suppliers.kd_supplier = pengajuan.kd_supplier', 'left');
        $data['pengajuan'] = $this->db->get_where('pengajuan', ['pengajuan.kd_supplier' => $supplier->kd_supplier, 'status' => 'Tertunda'])->result_array();

        $data['title'] = 'Dashboard Supplier';
        $this->loadView('dashboard', $data);
    }
}
