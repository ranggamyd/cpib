<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{

    public function index()
    {
        $this->load->view('admin_parts/header.php');
        $this->load->view('admin/ajuan_supplier');
        $this->load->view('admin_parts/footer.php');
    }

    public function tambah_pengajuan()
    {
        $data_pengajuan = array(
            'ktp' => $this->input->post('ktp'),
            'npwp' => $this->input->post('npwp'),
            'nib' => $this->input->post('nib'),
            'siup' => $this->input->post('siup'),
            'akta_usaha' => $this->input->post('akta_usaha'),
            'imb' => $this->input->post('imb'),
            'layout' => $this->input->post('layout'),
            'panduan_mutu' => $this->input->post('panduan_mutu'),
        );

        $where = array(
            'kd_supplier' => $this->input->post('kd_supplier'),
        );

        // var_dump($data_supplier, $where);

        $this->db->where($where);
        $this->db->update('supplier', $data_pengajuan);

        // $this->pengajuan_model->tambah_pengajuan($data_pengajuan);
        $this->session->set_flashdata('berhasil', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fas fa-check"></i><b> Berhasil!</b></h6>
                Berhasil menambahkan data pengajuan
            </div>
            ');
        redirect('pengajuan', 'refresh');
    }
}
