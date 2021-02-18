<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->library('form_validation');
  }

  public function index()
  {
    $this->form_validation->set_rules('nik', 'NIK', 'trim|required', [
      'required' => 'Field NIK harus diisi',
    ]);
    $this->form_validation->set_rules('password', 'Password', 'trim|required', [
      'required' => 'Field Password harus diisi',
    ]);
    if ($this->form_validation->run() == false) {
      $data['tittle'] = 'Halaman Login';
      $this->load->view('auth/login', $data);
    } else {
      $this->_aksi_login();
    }
  }

  private function _aksi_login()
  {
    $nik = $this->input->post('nik');
    $password = $this->input->post('password');

    $user = $this->db->get_where('guru', ['nip' => $nik])->row_array();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $data = [
          'nama' => $user['nama_guru'],
          'nik' => $user['nip'],
          'role_id' => $user['role_id']
        ];
        $this->session->set_userdata($data);
        if ($user['role_id'] == 1) {
          // Arahkan ke halaman Admin
          redirect('Guru');
        } else {
          // Arahkan ke halaman musyrif
          redirect('Kepsek');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum terdaftar</div>');
      redirect('auth');
    }
  }

  public function registrasi()
  {
    $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'trim|required', [
      'required' => 'Field Nama Guru harus diisi',
    ]);
    $this->form_validation->set_rules('nik', 'NIK', 'trim|required|is_unique[guru.nip]', [
      'required' => 'Field NIK Guru harus diisi',
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]|matches[password2]', [
      'required' => 'Field Password harus diisi',
      'min_length' => 'Password terlalu pendek',
      'matches' => 'Password tidak sama'
    ]);
    $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|required|matches[password2]', [
      'required' => 'Field Konfirmasi Password harus diisi',
      'matches' => 'Password tidak sama'
    ]);
    if ($this->form_validation->run() == false) {
      $data['tittle'] = 'Halaman Registrasi';
      $this->load->view('auth/registrasi', $data);
    } else {
      $nip = htmlspecialchars($this->input->post('nik', true));
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $nama = htmlspecialchars($this->input->post('nama_guru', true));
      $data = [
        'nip' => $nip,
        'nama_guru' => $nama,
        'password' => $password,
        'role_id' => 1
      ];
      $this->db->insert('guru', $data);
      redirect('auth');
    }
  }
}

/* End of file Auth.php */
