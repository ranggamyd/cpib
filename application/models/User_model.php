<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  public function kd_user_auto()
  {
    $this->db->select('RIGHT(admin.kd_admin,3) as kd_admin', FALSE);
    $this->db->order_by('kd_admin', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('admin');
    if ($query->num_rows() <> 0) {
      $data = $query->row();
      $kd = intval($data->kd_admin) + 1;
    } else {
      $kd = 1;
    }
    $batas = str_pad($kd, 3, "0", STR_PAD_LEFT);
    $kduser = "ADM-" . $batas;
    return $kduser;
  }

  public function users()
  {
    $this->db->join('users', 'users.kd_admin = admin.kd_admin', 'INNER');
    return $this->db->get_where('admin')->result_array();
  }

  public function tambah()
  {
    $data = [
      'kd_admin' => $this->input->post('kd_admin'),
      'nama_admin' => $this->input->post('nama_admin'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'alamat' => $this->input->post('alamat'),
      'jabatan' => $this->input->post('jabatan'),
    ];

    if (!$this->db->insert('admin', $data)) return FALSE;

    $kd_admin = $this->input->post('kd_admin');
    $name = $this->input->post('nama_admin');
    $username = $this->input->post('kd_admin') . '_' . strtok($name, ' ');
    $user = [
      'name' => $name,
      'username' => $username,
      'password' => $username,
      'kd_admin' => $kd_admin,
    ];

    if ($this->db->insert('users', $user)) return TRUE;
  }

  public function ubah()
  {
    $data = [
      'nama_admin' => $this->input->post('nama_admin'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'alamat' => $this->input->post('alamat'),
      'jabatan' => $this->input->post('jabatan'),
    ];

    if ($this->db->update('admin', $data, ['kd_admin' => $this->input->post('kd_admin')])) return TRUE;
  }

  public function hapus()
  {
    $kd_admin = $this->input->post('kd_admin');
    if (!$this->db->delete('admin', ['kd_admin' => $kd_admin])) return FALSE;
    if ($this->db->delete('users', ['kd_admin' => $kd_admin])) return TRUE;
  }
}
