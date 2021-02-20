<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepsek extends CI_Controller
{

  public function index()
  {
    $data = [
      'title' => 'Dashboard Kepala Sekolah',
      'user' => $this->db->get_where('guru', ['nip' => $this->session->userdata('nik')])->row_array(),
      'isi' => 'kepsek/dashboard'
    ];
    // check($data['user']);
    $this->load->view('templates/wrapper', $data);
  }
}

/* End of file Kepsek.php */
