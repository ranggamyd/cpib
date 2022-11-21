<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_supplier extends CI_Controller
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
            //     'css' => 'user.css',
            'js' => 'previewImg.js',
        ];

        $this->load->view('supplier/parts/header', $data);
        $this->load->view('supplier/' . $file, $data);
        $this->load->view('supplier/parts/footer', $data);
    }

    public function index()
    {
        $data['user_supplier'] = $this->user_model->profil_supplier();

        $data['title'] = 'Profil Saya';
        $this->loadView('user_supplier', $data);
    }

    public function setting()
    {
        $data['user_supplier'] = $this->user_model->profil_supplier();

        $data['title'] = 'Pengaturan Akun';
        $this->loadView('setting_supplier', $data);
    }

    public function ubah_avatar_supplier()
    {
        $this->form_validation->set_rules('kd_supplier', 'Kode Pengguna', 'required');
        if (empty($_FILES['avatar']['name'])) $this->form_validation->set_rules('avatar', 'Foto Profil', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal Memperbarui Avatar !');
            $this->session->set_flashdata('hasModalID', 'edit_avatar');
            $this->index();
        } else {
            if ($this->user_model->ubah_avatar()) {
                $this->session->set_flashdata('sukses', 'Berhasil Memperbarui Avatar !');
                redirect('user_supplier');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Memperbarui Avatar !');
                $this->index();
            }
        }
    }

    public function ubah_profil_supplier()
    {
        $user = $this->db->get_where('users', ['kd_supplier' => $this->input->post('kd_supplier')])->row();

        $this->form_validation->set_rules('nama_pimpinan', 'Nama Pimpinan', 'required');
        $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|is_numeric');
        if ($this->input->post('no_telp') != $user->phone) $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|is_numeric|is_unique[users.phone]');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        if ($this->input->post('email') != $user->email) $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal Memperbarui Profil !');
            $this->session->set_flashdata('hasModalID', 'edit_user');
            $this->index();
        } else {
            if ($this->user_model->ubah_profil_supplier()) {
                $this->session->set_flashdata('sukses', 'Berhasil Memperbarui Profil !');
                redirect('user_supplier');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal Memperbarui Profil !');
                $this->index();
            }
        }
    }
}
