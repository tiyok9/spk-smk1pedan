<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies
    $this->load->model('M_Alternatif');
  }

  // List all your items
  public function index($offset = 0)
  {
    $data = [
      'title' => 'Data Alternatif',
      'user' => $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array(),
      'alternatif' => $this->M_Alternatif->getAllAlternatif(),
      'isi' => 'alternatif/index'
    ];
    // check($data['user']);
    $this->load->view('templates/wrapper', $data);
  }

  // Add a new item
  public function add()
  {
    $nama_alternatif = $this->input->post('nama_alternatif');
    $nip = $this->input->post('nip');
    $jabatan = $this->input->post('jabatan');
    $jenkel = $this->input->post('jenkel');
    $pendidikan = $this->input->post('pendidikan');
    $data_alternatif = [
      'nama_alternatif' => $nama_alternatif,
      'jenkel' => $jenkel,
      'nip' => $nip,
      'jabatan' => $jabatan,
      'pendidikan' => $pendidikan
    ];
    $this->M_Alternatif->addAlternatif($data_alternatif);
    // Ambil id_alternatif buat dimasukkin ke tabel nilai & kecocokan
    $id_alternatif = $this->db->insert_id();
    $data_id_alternatif = ['id_alternatif' => $id_alternatif];
    $this->M_Alternatif->addIdAlternatif($data_id_alternatif);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        Data Alternatif berhasil <strong>Ditambahkan</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('Alternatif');
  }

  //Update one item
  public function update($id)
  {
    $id_alternatif = $id;
    $nama_alternatif = $this->input->post('nama_alternatif');
    $jenkel = $this->input->post('jenkel');
    $nip = $this->input->post('nip');
    $jabatan = $this->input->post('jabatan');
    $pendidikan = $this->input->post('pendidikan');
    $data_alternatif = [
      'id_alternatif' => $id_alternatif,
      'nama_alternatif' => $nama_alternatif,
      'nip' => $nip,
      'jabatan' => $jabatan,
      'jenkel' => $jenkel,
      'pendidikan' => $pendidikan
    ];
    $this->M_Alternatif->updateAlternatif($data_alternatif);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Alternatif berhasil <strong>Diubah</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('Alternatif');
  }

  //Delete one item
  public function delete($id)
  {
    $data_alternatif = ['id_alternatif' => $id];
    $this->M_Alternatif->deleteAlternatif($data_alternatif);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data alternatif berhasil <strong>Dihapus</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('Alternatif');
  }
}

/* End of file Alternatif.php */
