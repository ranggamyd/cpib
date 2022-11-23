<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_supplier_model extends CI_Model
{
  public function getSupplier()
  {
    return $this->db->get_where('suppliers', ['kd_supplier' => $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row('kd_supplier')])->row();
  }

  private function upload_avatar()
  {
    $kd_supplier = $this->input->post('kd_supplier');
    $avatar = $this->db->get_where('users', ['kd_supplier' => $kd_supplier])->row('avatar');

    if ($_FILES['avatar']['name']) {
      if ($avatar) unlink('./assets/img/' . $avatar);

      $config['upload_path']    = './assets/img';
      $config['allowed_types']  = 'jpg|png|jpeg|';

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('avatar')) return FALSE;

      return $this->upload->data('file_name');
    };
  }


  public function ubah_avatar()
  {
    $avatar = $this->upload_avatar();

    if (!$avatar) return FALSE;
    if ($this->db->update('suppliers', ['avatar' => $avatar], ['kd_supplier' => $this->input->post('kd_supplier')])) return TRUE;
  }


  public function ubah_profil()
  {
    $kd_supplier = $this->input->post('kd_supplier');
    $nama_miniplant = $this->input->post('nama_miniplant');
    $nama_pimpinan = $this->input->post('nama_pimpinan');
    $no_telp = $this->input->post('no_telp');
    $no_fax = $this->input->post('no_fax');
    $email = $this->input->post('email');
    $alamat = $this->input->post('alamat');
    $password = $this->input->post('password');

    $supplier = [
      'nama_miniplant' => $nama_miniplant,
      'nama_pimpinan' => $nama_pimpinan,
      'no_telp' => $no_telp,
      'no_fax' => $no_fax,
      'email' => $email,
      'alamat' => $alamat,
    ];

    $avatar = $this->upload_avatar();

    if ($avatar) $supplier['avatar'] = $avatar;

    if (!$this->db->update('suppliers', $supplier, ['kd_supplier' => $kd_supplier])) return FALSE;

    $user = [
      'name' => $nama_miniplant,
      'phone' => $no_telp,
      'email' => $email,
    ];

    if ($password) $user['password'] = md5($password);

    if ($this->db->update('users', $user, ['kd_supplier' => $kd_supplier])) return TRUE;
  }
}
