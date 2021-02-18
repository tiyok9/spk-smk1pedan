<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

  public function index()
  {
    $data = [
      'title' => 'Dashboard Guru',
      'user' => $this->db->get_where('guru', ['nip' => $this->session->userdata('nik')])->row_array(),
      'isi' => 'guru/dashboard'
    ];
    // check($data['user']);
    $this->load->view('templates/wrapper', $data);
  }
}

/* End of file Guru.php */
