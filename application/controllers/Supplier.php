<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    public function index()
    {
        $this->load->model('supplier_model');
        $data['supplier'] = $this->supplier_model->read_supplier();
        $data['kd_supplier_auto'] = $this->supplier_model->kd_supplier_auto();
        $this->load->view('admin_parts/header.php');
        $this->load->view('admin/data_supplier', $data);
        $this->load->view('admin_parts/footer.php');
    }

    public function tambah_supplier()
    {
        $data_supplier = array(
            'kd_supplier' => $this->input->post('kd_supplier'),
            'nama_supplier' => $this->input->post('nama_supplier'),
            'nama_miniplant' => $this->input->post('nama_miniplant'),
            'alamat' => $this->input->post('alamat'),
            'jenis_produk' => $this->input->post('jenis_produk'),
            // 'tanggal_masuk_supplier' => date('Y-m-d'),
            // 'id_anggota' => $this->session->userdata('id_anggota'),
        );

        $this->supplier_model->tambah_supplier($data_supplier);
        $this->session->set_flashdata('berhasil', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fas fa-check"></i><b> Berhasil!</b></h6>
                Berhasil menambahkan data supplier
            </div>
            ');
        redirect('supplier', 'refresh');

        // $cek = $this->supplier_model->read_supplier();
        // foreach ($cek as $index) {
        //     $kd_supplier = $index['kd_supplier'];
        //     $nama_miniplant = $index['nama_miniplant'];
        //     $email = $index['email'];
        // }
        // if ($kd_supplier == $this->input->post('kd_supplier') or $nama_miniplant == $this->input->post('nama_miniplant')) {
        //     $this->session->set_flashdata('gagal', '
        //     <div class="alert alert-danger alert-dismissible" role="alert">
        //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //             <span aria-hidden="true">&times;</span>
        //         </button>
        //         <h6><i class="fas fa-ban"></i><b> Terjadi Kesalahan!</b></h6>
        //         Gagal menambah data supplier. coba untuk refresh halaman atau coba cek data supplier mungkin ada nomor hp tau email yang sama !!!
        //     </div>
        //     ');
        //     redirect('barang/tambah_barang_masuk', 'refresh');
        // } else {
        //     $this->supplier_model->tambah_supplier($data_supplier);
        //     $this->session->set_flashdata('berhasil', '
        //     <div class="alert alert-success alert-dismissible" role="alert">
        //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //             <span aria-hidden="true">&times;</span>
        //         </button>
        //         <h6><i class="fas fa-check"></i><b> Berhasil!</b></h6>
        //         Berhasil menambahkan data supplier
        //     </div>
        //     ');
        //     redirect('barang/tambah_barang_masuk', 'refresh');
        // }
    }

    public function edit_supplier()
    {
        $data_supplier = array(
            'nama_supplier'     => $this->input->post('nama_supplier'),
            'nama_miniplant'    => $this->input->post('nama_miniplant'),
            'alamat'            => $this->input->post('alamat'),
            'jenis_produk'      => $this->input->post('jenis_produk'),
            // 'updated_by'        => $this->session->userdata('id_anggota'),
            // 'terakhir_update'   => date('Y-m-d H:i:s'),
        );

        $where = array(
            'kd_supplier'        => $this->input->post('kd_supplier'),
        );

        // var_dump($data_supplier, $where);

        $this->db->where($where);
        $this->db->update('supplier', $data_supplier);
        $this->session->set_flashdata('berhasil', '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fas fa-check"></i><b> Berhasil!</b></h6>
                Berhasil merubah data supplier
            </div>
            ');
        redirect('supplier', 'refresh');
    }

    // public function hapus_supplier()
    // {
    //     $kd_supplier       = $this->input->post('kd_supplier');
    //     // $data_supplier     = array(
    //     //     'deleted_by'    => $this->session->userdata('id_anggota'),
    //     //     'deleted_on'    => date('Y-m-d H:i:s'),
    //     // );

    //     $where = array(
    //         'kd_supplier' => $kd_supplier
    //     );

    //     $this->db->where($where);
    //     $this->db->update('supplier');
    //     // $this->db->update('supplier', $data_supplier);
    //     // $this->supplier_model->update_supplier($data_supplier, $where);
    //     $this->session->set_flashdata('berhasil', '
    //         <div class="alert alert-success alert-dismissible" role="alert">
    //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                 <span aria-hidden="true">&times;</span>
    //             </button>
    //             <h6><i class="fas fa-check"></i><b> Berhasil!</b></h6>
    //             Berhasil Menghapus Data supplier, silahkan cek Data supplier.
    //         </div>
    //         ');
    //     redirect('supplier', 'refresh');
    // }
}
