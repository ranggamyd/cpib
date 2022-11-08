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
      'password' => md5($username),
      'kd_admin' => $kd_admin,
      'is_active' => 1
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

  public function profil_saya()
  {
    $cekUser = $this->db->get_where('users', ['users.id' => $this->session->userdata('user_id')])->row();
    if ($cekUser->kd_admin) {
      $this->db->join('admin', 'admin.kd_admin = users.kd_admin', 'left');
      return $this->db->get_where('users', ['users.id' => $this->session->userdata('user_id')])->row();
    } else {
      $this->db->join('suppliers', 'suppliers.kd_supplier = users.kd_supplier', 'left');
      return $this->db->get_where('users', ['users.id' => $this->session->userdata('user_id')])->row();
    }
  }

  public function ubah_profil()
  {
    $kd_admin = $this->input->post('kd_admin');
    $name = $this->input->post('nama_admin');

    $data = [
      'nama_admin' => $name,
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'alamat' => $this->input->post('alamat'),
      'jabatan' => $this->input->post('jabatan'),
    ];

    if (!$this->db->update('admin', $data, ['kd_admin' => $kd_admin])) return FALSE;

    $username = $this->input->post('username');
    $phone = $this->input->post('phone');
    $email = $this->input->post('email');
    $password = $this->input->post('password1');

    $user = [
      'name' => $name,
      // 'avatar'=>blm jln
      'username' => $username,
      'phone' => $phone,
      'email' => $email,
    ];

    if ($password) $user['password'] = md5($password);

    if ($this->db->update('users', $user, ['kd_admin' => $kd_admin])) return TRUE;
  }

  public function activation($kd_admin)
  {
    $where = ['kd_admin' => $kd_admin];
    $supp = $this->db->get_where('users', $where)->row('is_active');

    if ($supp == 0) {
      $this->db->update('users', ['is_active' => 1], $where);
      return 'activated';
    } else {
      $this->db->update('users', ['is_active' => 0], $where);
      return 'nonactivated';
    }
  }
}
