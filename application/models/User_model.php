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

  public function ubah_avatar()
  {
    $kd_admin = $this->input->post('kd_admin');
    $avatar = $this->db->get_where('users', ['kd_admin' => $kd_admin])->row('avatar');

    if ($_FILES['avatar']['name']) {
      if ($avatar) unlink('./assets/img/' . $avatar);

      $config['upload_path']    = './assets/img';
      $config['allowed_types']  = 'jpg|png|jpeg|';

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('avatar')) {
        echo "gagal";
      } else {
        $avatar = $this->upload->data('file_name');
      }
    };

    $data = [
      'avatar' => $avatar,
    ];
    $this->db->update('users', $data, ['kd_admin' => $kd_admin]);
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
    $password = $this->input->post('password');

    $avatar = $this->db->get_where('users', ['kd_admin' => $kd_admin])->row('avatar');

    if ($_FILES['avatar']['name']) {
      if ($avatar) unlink('./assets/img/' . $avatar);

      $config['upload_path']    = './assets/img';
      $config['allowed_types']  = 'jpg|png|jpeg|';

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('avatar')) {
        echo "gagal";
      } else {
        $avatar = $this->upload->data('file_name');
      }
    };

    $user = [
      'name' => $name,
      'avatar' => $avatar,
      'username' => $username,
      'phone' => $phone,
      'email' => $email,
    ];

    // $user = $this->db->get_where('users', ['kd_admin' => $kd_admin])->row();
    // if ($user->avatar) {
    //   unlink('./assets/img/' . $user->avatar);
    // }
    // $avatar = $_FILES['avatar']['name'];
    // if ($avatar = '') {
    //   $user['avatar'] = $user->avatar;
    // } else {
    //   $config['upload_path']    = './assets/img';
    //   $config['allowed_types']  = 'jpg|png|jpeg|';

    //   $this->load->library('upload', $config);
    //   if (!$this->upload->do_upload('avatar')) {
    //     echo "gagal";
    //   } else {
    //     $avatar = $this->upload->data('file_name');
    //   }
    // }



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
