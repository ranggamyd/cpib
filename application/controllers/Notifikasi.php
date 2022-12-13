<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
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
        $data['style'] = [
            // 'css' => 'notifikasi.css',
            'js' => 'notifikasi.js',
        ];

        $this->load->view('admin/parts/header', $data);
        $this->load->view('admin/notifikasi/' . $file, $data);
        $this->load->view('admin/parts/footer', $data);
    }

    public function index()
    {
        $this->db->select('notifikasi.*, suppliers.nama_miniplant, suppliers.nama_pimpinan, suppliers.no_telp, suppliers.alamat, suppliers.avatar, users.is_active');
        $this->db->join('suppliers', 'suppliers.kd_supplier=notifikasi.kd_supplier');
        $this->db->join('users', 'users.kd_supplier=suppliers.kd_supplier');
        $this->db->order_by('datetime', 'desc');
        $data['notifikasi'] = $this->db->get('notifikasi')->result_array();

        $this->db->select('notifikasi.*, suppliers.nama_miniplant, suppliers.nama_pimpinan, suppliers.no_telp, suppliers.alamat, suppliers.avatar, users.is_active');
        $this->db->join('suppliers', 'suppliers.kd_supplier=notifikasi.kd_supplier');
        $this->db->join('users', 'users.kd_supplier=suppliers.kd_supplier');
        $this->db->order_by('datetime', 'desc');
        $data['unread_notifikasi'] = $this->db->get_where('notifikasi', ['is_read' => 0])->result_array();

        $this->db->select('notifikasi.*, suppliers.nama_miniplant, suppliers.nama_pimpinan, suppliers.no_telp, suppliers.alamat, suppliers.avatar, users.is_active');
        $this->db->join('suppliers', 'suppliers.kd_supplier=notifikasi.kd_supplier');
        $this->db->join('users', 'users.kd_supplier=suppliers.kd_supplier');
        $this->db->order_by('datetime', 'desc');
        $data['read_notifikasi'] = $this->db->get_where('notifikasi', ['is_read' => 1])->result_array();

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

        if (!$this->db->update('notifikasi', ['is_read' => 1], ['id' => $this->input->post('id')])) return false;
        $cb = [
            'id' => $this->db->get_where('notifikasi', ['id' => $this->input->post('id')])->row('id'),
            'total' => $data['unread_notifikasi'] = $this->db->get_where('notifikasi', ['is_read' => 0])->num_rows()
        ];
        echo json_encode($cb);
    }
}
