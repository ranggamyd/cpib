<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  private function loadView($file, $data)
  {
    $data['style'] = [
      // 'css' => 'auth.css',
      // 'js' => 'auth.js',
    ];

    $this->load->view('auth/parts/header', $data);
    $this->load->view('auth/' . $file, $data);
    $this->load->view('auth/parts/footer', $data);
  }

  public function index()
  {
    $data['title'] = 'Masuk';
    $this->loadView('login', $data);
  }

  public function login()
  {
    $this->form_validation->set_rules('credential', 'Credential', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Gagal Masuk !');
      $this->index();
    } else {
      if ($this->auth_model->login()) {
        if ($this->session->userdata("login_as") == "admin") {
          $page = 'dashboard';
        } else if ($this->session->userdata("login_as") == "supplier") {
          $page = 'dashboard_supplier';
        }

        if ($this->session->userdata('referred_from')) {
          $referred_from = $this->session->userdata('referred_from');
          $this->session->set_flashdata('sukses', 'Berhasil masuk !');
          redirect($referred_from);
        } else {
          $this->session->set_flashdata('sukses', 'Berhasil masuk !');
          redirect($page);
        }
      } else {
        $this->session->set_flashdata('gagal', 'Pastikan Username dan Password sesuai !');
        $this->index();
      }

      // echo "<pre>";
      // print_r($this->session->userdata());
      // echo "</pre>";
    }
  }

  public function logout()
  {
    $this->auth_model->logout();
    $this->session->set_flashdata('sukses', 'Berhasil keluar !');
    redirect('auth');
  }

  public function register()
  {
    $data['title'] = 'Daftar';
    $this->loadView('register', $data);
  }

  // public function forgot_password()
  // {
  //     $data['title'] = 'Lupa Password';
  //     $this->loadView('forgot_password', $data);
  // }

  // public function get_token()
  // {
  //     $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

  //     if ($this->form_validation->run() == FALSE) {
  //         $this->session->set_flashdata('gagal', 'Masukkan Email yang valid !');
  //         $this->forgot_password();
  //     } else {
  //         $email = $this->input->post('email');
  //         $token = base64_encode(random_bytes(32));

  //         $is_generated = $this->auth_model->get_token($email, $token);

  //         if ($is_generated) {

  //             // SEND EMAIL
  //             $config['charset'] = 'utf-8';
  //             $config['useragent'] = 'Codeigniter';
  //             $config['protocol'] = "smtp";
  //             $config['mailtype'] = "html";
  //             $config['smtp_host'] = "ssl://smtp.gmail.com";
  //             $config['smtp_port'] = "465";
  //             $config['smtp_timeout'] = "10";
  //             $config['smtp_user'] = "prakarsaputra18@gmail.com";
  //             $config['smtp_pass'] = "prakarsaputra2018";
  //             $config['crlf'] = "\r\n";
  //             $config['newline'] = "\r\n";
  //             $config['wordwrap'] = TRUE;

  //             $this->email->initialize($config);

  //             //konfigurasi pengiriman
  //             $this->email->from($config['smtp_user']);
  //             $this->email->to($email);
  //             $this->email->subject("Permintaan reset password");

  //             $message = "<p>Anda melakukan permintaan reset password</p>";
  //             $message .= "Klik <a href='" . base_url('auth/reset_password/' . urlencode($token)) . "'>disini</a> untuk mereset dan merubah password anda";
  //             $this->email->message($message);

  //             if ($this->email->send()) {
  //                 $this->session->set_flashdata('sukses', 'Silahkan periksa email anda !');
  //                 $this->forgot_password();
  //             } else {
  //                 echo 'error';
  //             }
  //         } else {
  //             $this->session->set_flashdata('gagal', 'Pastikan Email terdaftar !');
  //             $this->forgot_password();
  //         }
  //     }
  // }

  // public function reset_password($token)
  // {
  //     $data['token'] = urldecode($token);

  //     $this->db->order_by('created_at', 'desc');
  //     $user_token = $this->db->get_where('user_token', ['token' => $data['token'], 'is_activated' => 0])->row();

  //     if ($user_token) {
  //         $data['title'] = 'Reset Password';
  //         $this->loadView('reset_password', $data);
  //     } else {
  //         $this->session->set_flashdata('gagal', 'Token tidak sesuai !');
  //         redirect('auth/forgot_password');
  //     }
  // }

  // public function validate_token()
  // {
  //     $this->form_validation->set_rules('token', 'Token', 'required');
  //     $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.{3,10}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/]');
  //     $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|matches[password]|regex_match[/^(?=.{3,10}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/]');

  //     if ($this->form_validation->run() == FALSE) {
  //         $this->session->set_flashdata('gagal', 'Gagal reset password !');
  //         $this->reset_password($this->input->post('token'));
  //     } else {
  //         $this->auth_model->reset_password();

  //         $this->session->set_flashdata('sukses', 'Password telah diperbarui, silahkan login ulang !');
  //         redirect('auth');
  //     }
  // }
}
