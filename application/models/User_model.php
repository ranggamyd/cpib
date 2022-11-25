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
    $this->db->join('users', 'users.kd_admin = admin.kd_admin');
    return $this->db->get('admin')->result_array();
  }

  public function tambah()
  {
    $kd_admin = $this->input->post('kd_admin');
    $no_reg = $this->input->post('no_reg');
    $nama_admin = $this->input->post('nama_admin');
    $no_telp = $this->input->post('no_telp');
    $email = $this->input->post('email');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $alamat = $this->input->post('alamat');

    $admin = [
      'kd_admin' => $kd_admin,
      'no_reg' => $no_reg,
      'nama_admin' => $nama_admin,
      'no_telp' => $no_telp,
      'email' => $email,
      'jenis_kelamin' => $jenis_kelamin,
      'alamat' => $alamat,
    ];

    if (!$this->db->insert('admin', $admin)) return FALSE;

    $user = [
      'name' => $nama_admin,
      'phone' => $no_telp,
      'email' => $email,
      'password' => md5($no_telp),
      'kd_admin' => $kd_admin,
      'is_active' => 1
    ];

    if ($this->db->insert('users', $user)) return TRUE;
  }

  public function ubah()
  {
    $kd_admin = $this->input->post('kd_admin');
    $no_reg = $this->input->post('no_reg');
    $nama_admin = $this->input->post('nama_admin');
    $no_telp = $this->input->post('no_telp');
    $email = $this->input->post('email');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $alamat = $this->input->post('alamat');

    $admin = [
      'no_reg' => $no_reg,
      'nama_admin' => $nama_admin,
      'no_telp' => $no_telp,
      'email' => $email,
      'jenis_kelamin' => $jenis_kelamin,
      'alamat' => $alamat,
    ];

    if (!$this->db->update('admin', $admin, ['kd_admin' => $kd_admin])) return FALSE;

    $user = [
      'name' => $nama_admin,
      'phone' => $no_telp,
      'email' => $email,
      'password' => md5($no_telp),
    ];

    if ($this->db->update('users', $user, ['kd_admin' => $kd_admin])) return TRUE;
  }

  public function hapus($kd_admin)
  {
    if (!$this->db->delete('admin', ['kd_admin' => $kd_admin])) return FALSE;
    if ($this->db->delete('users', ['kd_admin' => $kd_admin])) return TRUE;
  }

  public function profil_saya()
  {
    $this->db->join('admin', 'admin.kd_admin = users.kd_admin');
    return $this->db->get_where('users', ['users.id' => $this->session->userdata('id')])->row();
  }


  private function upload_avatar()
  {
    $kd_admin = $this->input->post('kd_admin');
    $avatar = $this->db->get_where('users', ['kd_admin' => $kd_admin])->row('avatar');

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
    if ($this->db->update('admin', ['avatar' => $avatar], ['kd_admin' => $this->input->post('kd_admin')])) return TRUE;
  }


  public function ubah_profil()
  {
    $kd_admin = $this->input->post('kd_admin');
    $nama_admin = $this->input->post('nama_admin');
    $no_telp = $this->input->post('no_telp');
    $email = $this->input->post('email');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $alamat = $this->input->post('alamat');
    $password = $this->input->post('password');

    $admin = [
      'nama_admin' => $nama_admin,
      'no_telp' => $no_telp,
      'email' => $email,
      'jenis_kelamin' => $jenis_kelamin,
      'alamat' => $alamat,
    ];

    $avatar = $this->upload_avatar();

    if ($avatar) $admin['avatar'] = $avatar;

    if (!$this->db->update('admin', $admin, ['kd_admin' => $kd_admin])) return FALSE;

    $user = [
      'name' => $nama_admin,
      'phone' => $no_telp,
      'email' => $email,
    ];

    if ($password) $user['password'] = md5($password);

    if ($this->db->update('users', $user, ['kd_admin' => $kd_admin])) return TRUE;
  }
}
