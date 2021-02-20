<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->model('M_Kriteria');
    $this->load->model('M_Penilaian');
  }


  public function index()
  {
    $data = [
      'title' => 'Penilaian Alternatif',
      'user' => $this->db->get_where('guru', ['nip' => $this->session->userdata('nik')])->row_array(),
      'kriteria' => $this->M_Kriteria->getAllKriteria(),
      'penilaian' => $this->M_Penilaian->getDataPenilaian(),
      'isi' => 'penilaian/index'
    ];
    // check($data['user']);
    $this->load->view('templates/wrapper', $data);
  }

  public function aksi_penilaian_alternatif()
  {
    $this->M_Penilaian->PenilaianAlternatif();
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Penilaian berhasil dilakukan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('Penilaian');
  }

  // Tampilkan hasil kecocokan
  public function Rating_kecocokan()
  {
    $data = [
      'title' => 'Hasil Rating Kecocokan',
      'user' => $this->db->get_where('guru', ['nip' => $this->session->userdata('nik')])->row_array(),
      'kriteria' => $this->M_Kriteria->getAllKriteria(),
      'kecocokan' => $this->M_Penilaian->getDataKecocokan(),
      'isi' => 'penilaian/rating_kecocokan'
    ];
    // check($data['user']);
    $this->load->view('templates/wrapper', $data);
  }

  public function Normalisasi()
  {
    $data = [
      'title' => 'Hasil Rating Kecocokan',
      'user' => $this->db->get_where('guru', ['nip' => $this->session->userdata('nik')])->row_array(),
      'kriteria' => $this->M_Kriteria->getAllKriteria(),
      'kecocokan' => $this->M_Penilaian->getDataKecocokan(),
      'isi' => 'penilaian/normalisasi',
      'jKriteria1' => $this->M_Penilaian->cekKriteria1(),
      'jKriteria2' => $this->M_Penilaian->cekKriteria2(),
      'jKriteria3' => $this->M_Penilaian->cekKriteria3(),
      'jKriteria4' => $this->M_Penilaian->cekKriteria4(),
      'jKriteria5' => $this->M_Penilaian->cekKriteria5(),
      'MaxC1' => $this->M_Penilaian->MaxC1(),
      'MinC1' => $this->M_Penilaian->MinC1(),
      'MaxC2' => $this->M_Penilaian->MaxC2(),
      'MinC2' => $this->M_Penilaian->MinC2(),
      'MaxC3' => $this->M_Penilaian->MaxC3(),
      'MinC3' => $this->M_Penilaian->MinC3(),
      'MaxC4' => $this->M_Penilaian->MaxC4(),
      'MinC4' => $this->M_Penilaian->MinC4(),
      'MaxC5' => $this->M_Penilaian->MaxC5(),
      'MinC5' => $this->M_Penilaian->MinC5(),
    ];
    // check($data['jKriteria1']);
    $this->load->view('templates/wrapper', $data);
  }

  public function Hasil_saw()
  {
    $data = [
      'title' => 'Hasil Perhitungan SAW',
      'user' => $this->db->get_where('guru', ['nip' => $this->session->userdata('nik')])->row_array(),
      'kriteria' => $this->M_Kriteria->getAllKriteria(),
      'kecocokan' => $this->M_Penilaian->getDataKecocokan(),
      'isi' => 'penilaian/hasil_perhitungan',
      'jKriteria1' => $this->M_Penilaian->cekKriteria1(),
      'jKriteria2' => $this->M_Penilaian->cekKriteria2(),
      'jKriteria3' => $this->M_Penilaian->cekKriteria3(),
      'jKriteria4' => $this->M_Penilaian->cekKriteria4(),
      'jKriteria5' => $this->M_Penilaian->cekKriteria5(),
      'MaxC1' => $this->M_Penilaian->MaxC1(),
      'MinC1' => $this->M_Penilaian->MinC1(),
      'MaxC2' => $this->M_Penilaian->MaxC2(),
      'MinC2' => $this->M_Penilaian->MinC2(),
      'MaxC3' => $this->M_Penilaian->MaxC3(),
      'MinC3' => $this->M_Penilaian->MinC3(),
      'MaxC4' => $this->M_Penilaian->MaxC4(),
      'MinC4' => $this->M_Penilaian->MinC4(),
      'MaxC5' => $this->M_Penilaian->MaxC5(),
      'MinC5' => $this->M_Penilaian->MinC5(),
      'bobotC1' => $this->M_Kriteria->bobotC1(),
      'bobotC2' => $this->M_Kriteria->bobotC2(),
      'bobotC3' => $this->M_Kriteria->bobotC3(),
      'bobotC4' => $this->M_Kriteria->bobotC4(),
      'bobotC5' => $this->M_Kriteria->bobotC5(),
    ];
    // check($data['bobotC1']);
    $this->load->view('templates/wrapper', $data);
  }

  public function aksi_perankingan()
  {
    $id_alternatif = $this->input->post('id_alternatif');
    $total_nilai = $this->input->post('total_nilai');
    foreach ($total_nilai as $keys => $values) {
      foreach ($id_alternatif as $key => $value) {
        # code...
        $data[$key]['id_alternatif'] = $value;
        $data[$keys]['total_nilai'] = $values;
      }
    }
    $this->M_Penilaian->addPerankingan($data);
    redirect('Penilaian/tampil_ranking');
    // die;
    // check($data);
  }

  public function tampil_ranking()
  {
    $data = [
      'title' => 'Data Hasil Perankingan',
      'user' => $this->db->get_where('guru', ['nip' => $this->session->userdata('nik')])->row_array(),
      'perankingan' => $this->M_Penilaian->getDataPerankingan(),
      'isi' => 'penilaian/perankingan'
    ];
    // check($data['user']);
    $this->load->view('templates/wrapper', $data);
  }
}

/* End of file Penilaian.php */