<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function index()
  {
    $data = [
      'title' => 'Dashboard',
      'user' => $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array(),
      'isi' => 'admin/dashboard'
    ];
    // check($data['user']);
    $this->load->view('templates/wrapper', $data);
  }

  public function reset_data()
  {
    $this->db->truncate('ranking');
    $this->db->truncate('data_nilai');
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
    redirect('Admin');
  }
}

/* End of file Guru.php */
