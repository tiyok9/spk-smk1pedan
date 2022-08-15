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
    $this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric', [
      'required' => 'nip harus diisi',
    ]);
    $this->form_validation->set_rules('password', 'Password', 'trim|required', [
      'required' => 'Password harus diisi',
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
    $nip = $this->input->post('nip');
    $password = $this->input->post('password');

    $user = $this->db->get_where('admin', ['nip' => $nip])->row_array();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $data = [
          'nama' => $user['nama_user'],
          'nip' => $user['nip'],
          'role_id' => $user['role_id']
        ];
        $this->session->set_userdata($data);
        if ($user['role_id'] == 1) {
          // Arahkan ke halaman Admin
          redirect('Admin');
        } else if ($user['role_id'] == 2) {
          // Arahkan ke halaman musyrif
          redirect('Guru');
        } else{
          redirect('kepsek');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum terdaftar lakukan registrasi terlebih dahulu</div>');
      redirect('auth');
    }
  }

  public function registrasi()
  {
    $this->form_validation->set_rules('nama_user', 'Nama User', 'trim|required', [
      'required' => 'Nama User harus diisi',
    ]);
    $this->form_validation->set_rules('nip', 'NIP', 'trim|required|is_unique[admin.nip]', [
      'required' => 'NIP User harus diisi',
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]|matches[password2]', [
      'required' => 'Password harus diisi',
      'min_length' => 'Password terlalu pendek',
      'matches' => 'Password tidak sama'
    ]);
    $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|required|matches[password2]', [
      'required' => 'Konfirmasi Password harus diisi',
      'matches' => 'Password tidak sama'
    ]);
    if ($this->form_validation->run() == false) {
      $data['tittle'] = 'Halaman Registrasi';
      $this->load->view('auth/registrasi', $data);
    } else {
      $nip = htmlspecialchars($this->input->post('nip', true));
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $nama = htmlspecialchars($this->input->post('nama_user', true));
      $role = htmlspecialchars($this->input->post('role_id', true));
      $data = [
        'nip' => $nip,
        'nama_user' => $nama,
        'password' => $password,
        'role_id' => $role 
      ];
      $this->db->insert('admin', $data);
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Registrasi telah <strong>berhasil!</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('nip');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout!</div>');
    redirect('auth');
  }
}

/* End of file Auth.php */
