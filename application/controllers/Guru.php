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

  public function reset_data()
  {
    $this->db->truncate('ranking');
    $this->db->truncate('kecocokan');
    $this->db->truncate('nilai');
    $this->db->truncate('kriteria');
    $this->db->truncate('alternatif');
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Seluruh data berhasil dikosongkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('Guru');
  }
}

/* End of file Guru.php */
