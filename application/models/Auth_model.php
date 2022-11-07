<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	const SESSION_KEY = 'user_id';

	public function login()
	{
		$credential = $this->input->post('credential');
		$password = $this->input->post('password');

		$this->db->where('username', $credential)->or_where('phone', $credential)->or_where('email', $credential);
		$user = $this->db->get('users')->row();

		if ($user) {
			echo 'user ditemukan';
			if (password_verify($password, $user->password)) {
				echo 'bener';
			} else {
				echo 'gagal';
			}
			// if (password_verify($password, $user->password)) {
			// 	echo 'password sesuai';
			// 	if ($user->kd_admin) {
			// 		echo 'admin detected';
			// 		$this->session->set_userdata(["login_as" => 'admin']);

			// 		if ($user->jabatan == 'Administrator') {
			// 			echo 'jabatan administrator';
			// 			$this->session->set_userdata(["role" => 'administrator']);
			// 		} else {
			// 			echo 'jabatan inspektur';
			// 			$this->session->set_userdata(["role" => 'inspektur']);
			// 		}
			// 	} elseif ($user->kd_supplier) {
			// 		echo 'supplier detected';
			// 		$this->session->set_userdata(["login_as" => 'supplier']);
			// 	}

			// 	$this->session->set_userdata([self::SESSION_KEY => $user->id]);

			// 	return $this->session->has_userdata(self::SESSION_KEY);
			// }
		}
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) return null;

		return $this->db->get_where('user', ['id' => $this->session->userdata(self::SESSION_KEY)])->row();
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
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
