<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies
    $this->load->model('M_Kriteria');
  }

  // List all your items
  public function index($offset = 0)
  {
    $data = [
      'title' => 'Data Kriteria',
      'user' => $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array(),
      'kriteria' => $this->M_Kriteria->getAllKriteria(),
      'kode_kriteria' => $this->M_Kriteria->KodeKriteria(),
      'isi' => 'kriteria/index'
    ];
    // check($data['user']);
    $this->load->view('templates/wrapper', $data);
  }

  // Add a new item
  public function add()
  {
    $jumlahBobot = round($this->M_Kriteria->jumlahBobotKriteria(), 2);
    $kode_kriteria = $this->input->post('kode_kriteria');
    $nama_kriteria = $this->input->post('nama_kriteria');
    $jenis_kriteria = $this->input->post('jenis_kriteria');
    $keterangan = $this->input->post('keterangan');
    $bobot = $this->input->post('bobot');

    // Validasi jika jumlah bobot sudah lebih dari 100 maka gagal menambah kriteria
    if ($jumlahBobot + $bobot > 100) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          Data kriteria gagal ditambahkan <strong>Jumlah bobot sudah lebih dari 1</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('Kriteria');
    } else {
      $data = [
        'kode_kriteria' => $kode_kriteria,
        'nama_kriteria' => $nama_kriteria,
        'jenis_kriteria' => $jenis_kriteria,
        'bobot' => $bobot,
        'keterangan' => $keterangan
      ];
      $this->M_Kriteria->addKriteria($data);
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
          Data kriteria berhasil <strong>Ditambahkan</strong>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
      );
      redirect('Kriteria');
    }
  }

  //Update one item
  public function update($id)
  {
    $data = [
      'id_kriteria' => $id,
      'kode_kriteria' => $this->input->post('kode_kriteria'),
      'nama_kriteria' => $this->input->post('nama_kriteria'),
      'jenis_kriteria' => $this->input->post('jenis_kriteria'),
      'bobot' => $this->input->post('bobot'),
      'keterangan' => $this->input->post('keterangan')
    ];
    $this->M_Kriteria->updateKriteria($data);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data kriteria berhasil <strong>Diubah</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('Kriteria');
  }

  //Delete one item
  public function delete($id)
  {
    $data = ['id_kriteria' => $id];
    $this->M_Kriteria->deleteKriteria($data);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data kriteria berhasil <strong>Dihapus</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('Kriteria');
  }
}

/* End of file Kriteria.php */
