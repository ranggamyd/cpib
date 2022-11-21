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
    $nama_admin = $this->input->post('nama_admin');
    $no_telp = $this->input->post('no_telp');
    $email = $this->input->post('email');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $alamat = $this->input->post('alamat');

    $admin = [
      'kd_admin' => $kd_admin,
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
    $nama_admin = $this->input->post('nama_admin');
    $no_telp = $this->input->post('no_telp');
    $email = $this->input->post('email');
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $alamat = $this->input->post('alamat');

    $admin = [
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
      'is_active' => 1
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
      'is_active' => 1
    ];
    
    if ($password) $user['password'] = md5($password);
    
    if ($this->db->update('users', $user, ['kd_admin' => $kd_admin])) return TRUE;
  }
  
  
  
  // supplier
  public function profil_supplier()
  {
    $this->db->join('suppliers', 'suppliers.kd_supplier = users.kd_supplier');
    return $this->db->get_where('users', ['users.id' => $this->session->userdata('id')])->row();
  }

  private function upload_avatar_supplier()
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


  public function ubah_avatar_supplier()
  {
    $avatar = $this->upload_avatar_supplier();

    if (!$avatar) return FALSE;
    if ($this->db->update('suppliers', ['avatar' => $avatar], ['kd_supplier' => $this->input->post('kd_supplier')])) return TRUE;
  }


  public function ubah_profil_supplier()
  {
    $kd_supplier = $this->input->post('kd_supplier');
    $nama_miniplant = $this->input->post('nama_miniplant');
    $nama_pimpinan = $this->input->post('nama_pimpinan');
    $no_telp = $this->input->post('no_telp');
    $no_fax = $this->input->post('no_fax');
    $email = $this->input->post('email');
    $alamat = $this->input->post('alamat');
    $password = $this->input->post('password');

    $user_supplier = [
      'nama_miniplant' => $nama_miniplant,
      'nama_pimpinan' => $nama_pimpinan,
      'no_telp' => $no_telp,
      'no_fax' => $no_fax,
      'email' => $email,
      'alamat' => $alamat,
    ];

    $avatar = $this->upload_avatar_supplier();

    if ($avatar) $user_supplier['avatar'] = $avatar;

    if (!$this->db->update('suppliers', $user_supplier, ['kd_supplier' => $kd_supplier])) return FALSE;

    $user = [
      'name' => $nama_pimpinan,
      'phone' => $no_telp,
      'email' => $email,
      'is_active' => 1
    ];

    if ($password) $user['password'] = md5($password);

    if ($this->db->update('users', $user, ['kd_supplier' => $kd_supplier])) return TRUE;
  }


}