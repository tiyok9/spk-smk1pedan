<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepsek extends CI_Controller
{

  public function index()
  {
    $data = [
      'title' => 'Dashboard',
      'user' => $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array(),
      'isi' => 'kepsek/dashboard'
    ];
    // check($data['user']);
    $this->load->view('templates/wrapper', $data);
  }
}

/* End of file Kepsek.php */
