<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->model('M_Penilaian');
  }

  public function index()
  {
  }

  public function cetak_laporan()
  {
    $data['title'] = 'SPK PEMILIHAN GURU';
    $data['hasil_rank'] = $this->M_Penilaian->getDataPerankingan();
    $this->load->view('hasil/cetak', $data);
    // check($data['hasil_rank']);
  }
}

/* End of file Cetak.php */
