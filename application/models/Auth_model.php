<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	const SESSION_KEY = 'user_id';

	public function login()
	{
		$credential = $this->input->post('credential');
		$password = $this->input->post('password');

		$this->db->select('admin.*, suppliers.*, users.*');
		$this->db->join('admin', 'admin.kd_admin=users.kd_admin', 'left');
		$this->db->join('suppliers', 'suppliers.kd_supplier=users.kd_supplier', 'left');
		$this->db->where('username', $credential)
			->where('is_active', 1)
			->or_where('phone', $credential)
			->or_where('email', $credential);

		$user = $this->db->get('users')->row();

		if ($user) {
			if (md5($password) == $user->password) {
				if ($user->kd_admin) {
					$this->session->set_userdata(["login_as" => 'admin']);
					if ($user->jabatan == 'Administrator') {
						$this->session->set_userdata(["role" => 'Administrator']);
					} else {
						$this->session->set_userdata(["role" => 'Inspektur']);
					}
				} elseif ($user->kd_supplier) {
					$this->session->set_userdata(["login_as" => 'supplier']);
				}

				$this->session->set_userdata(['username' => $user->username]);
				$this->session->set_userdata(['avatar' => $user->avatar]);
				$this->session->set_userdata([self::SESSION_KEY => $user->id]);

				return $this->session->has_userdata(self::SESSION_KEY);
			}
		}
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) return null;

		return $this->db->get_where('users', ['id' => $this->session->userdata(self::SESSION_KEY)])->row();
	}

	public function logout()
	{
		session_destroy();

		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}

	public function register()
	{
		$kd_supplier = $this->supplier_model->kd_supplier_auto();
		$name = $this->input->post('name');

		$data = [
			'kd_supplier' => $kd_supplier,
			'nama_supplier' => $name
		];

		if (!$this->db->insert('suppliers', $data)) return FALSE;

		$user = [
			'name' => $name,
			'username' => $this->input->post('username'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password1')),
			'kd_supplier' => $kd_supplier,
			'is_active' => 0
		];

		if ($this->db->insert('users', $user)) return TRUE;
	}

	// private function _update_last_login($id)
	// {
	// 	$data = [
	// 		'last_login' => date("Y-m-d H:i:s"),
	// 	];

	// 	return $this->db->update('user', $data, ['id' => $id]);
	// }

	// public function get_token($email, $token)
	// {
	// 	$user = $this->db->get_where('user', ['email' => $email])->row();

	// 	if ($user) {
	// 		$data = [
	// 			'user_id' => $user->id,
	// 			'token' => $token,
	// 			'is_activated' => 0,
	// 			'created_at' => date('Y-m-d H:i:s')
	// 		];

	// 		return $this->db->insert('user_token', $data);
	// 	} else {
	// 		return FALSE;
	// 	}
	// }

	// public function reset_password()
	// {
	// 	$token = $this->input->post('token');

	// 	$this->db->order_by('created_at', 'desc');
	// 	$user_token = $this->db->get_where('user_token', ['token' => $token, 'is_activated' => 0])->row();

	// 	if ($user_token) {
	// 		$this->db->update('user_token', ['is_activated' => 1], ['id' => $user_token->id]);

	// 		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
	// 		$this->db->update('user', ['password' => $password], ['id' => $user_token->user_id]);
	// 	}else{
	// 		return FALSE;
	// 	}
	// }
}
