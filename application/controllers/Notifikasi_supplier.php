<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi_supplier extends CI_Controller
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
            // 'css' => 'notifikasi.css',
            'js' => 'notifikasi_supplier.js',
        ];

        $this->load->view('supplier/parts/header', $data);
        $this->load->view('supplier/notifikasi/' . $file, $data);
        $this->load->view('supplier/parts/footer', $data);
    }

    public function index()
    {
        $this->db->join('suppliers', 'suppliers.kd_supplier = users.kd_supplier', 'left');
        $supplier = $this->db->get_where('users', ['users.id' => $this->session->userdata('id')])->row();
        $this->db->select('notifikasi_supplier.*, suppliers.nama_miniplant, suppliers.nama_pimpinan, suppliers.no_telp, suppliers.alamat, suppliers.avatar, users.is_active');
        $this->db->join('suppliers', 'suppliers.kd_supplier=notifikasi_supplier.kd_supplier');
        $this->db->join('users', 'users.kd_supplier=suppliers.kd_supplier');
        $this->db->order_by('datetime', 'desc');
        $data['notifikasi_supplier'] = $this->db->get_where('notifikasi_supplier',['notifikasi_supplier.kd_supplier'=>$supplier->kd_supplier])->result_array();

        $this->db->select('notifikasi_supplier.*, suppliers.nama_miniplant, suppliers.nama_pimpinan, suppliers.no_telp, suppliers.alamat, suppliers.avatar, users.is_active');
        $this->db->join('suppliers', 'suppliers.kd_supplier=notifikasi_supplier.kd_supplier');
        $this->db->join('users', 'users.kd_supplier=suppliers.kd_supplier');
        $this->db->order_by('datetime', 'desc');
        $data['unread_notifikasi'] = $this->db->get_where('notifikasi_supplier', ['is_read' => 0, 'notifikasi_supplier.kd_supplier' => $supplier->kd_supplier])->result_array();

        $this->db->select('notifikasi_supplier.*, suppliers.nama_miniplant, suppliers.nama_pimpinan, suppliers.no_telp, suppliers.alamat, suppliers.avatar, users.is_active');
        $this->db->join('suppliers', 'suppliers.kd_supplier=notifikasi_supplier.kd_supplier');
        $this->db->join('users', 'users.kd_supplier=suppliers.kd_supplier');
        $this->db->order_by('datetime', 'desc');
        $data['read_notifikasi'] = $this->db->get_where('notifikasi_supplier', ['is_read' => 1, 'notifikasi_supplier.kd_supplier' => $supplier->kd_supplier])->result_array();

        $data['title'] = 'Notifikasi';
        $this->loadView('notifikasi', $data);
    }

    public function detail($id)
    {
        $this->session->set_flashdata('showModal', 'detail-' . $id);
        $this->index();
    }

    public function read()
    {

        if (!$this->db->update('notifikasi_supplier', ['is_read' => 1], ['id' => $this->input->post('id')])) return false;
        $cb = [
            'id' => $this->db->get_where('notifikasi_supplier', ['id' => $this->input->post('id')])->row('id'),
            'total' => $data['unread_notifikasi'] = $this->db->get_where('notifikasi_supplier', ['is_read' => 0])->num_rows()
        ];
        echo json_encode($cb);
    }
}
