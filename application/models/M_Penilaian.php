<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Penilaian extends CI_Model
{
  // Tampilkan data penilaian join dengan alternatif
  // biar nampil nama alternatif dan data nilainya
  public function getDataPenilaian()
  {
    $this->db->select('n.*,a.nama_alternatif');
    $this->db->from('nilai n');
    $this->db->join('alternatif a', 'a.id_alternatif = n.id_alternatif', 'left');
    return $this->db->get()->result_array();
  }
  public function getNilai()
  {
    //data tabel data_nilai join dengan alternatif
  // biar nampil nama alternatif 
    $this->db->select('n.*,a.nama_alternatif');
    $this->db->from('data_nilai n');
    $this->db->join('alternatif a', 'a.id_alternatif = n.id_alternatif', 'left');
    return $this->db->get()->result_array();
  }
   // Tampilkan data rating kecocokan join dengan alternatif
  // biar nampil nama alternatif dan data hasil rating kecocokannya
  public function getDataKecocokan()
  {
    $this->db->select('rk.*,a.nama_alternatif');
    $this->db->from('nilai rk');
    $this->db->join('alternatif a', 'a.id_alternatif = rk.id_alternatif', 'left');
    return $this->db->get()->result_array();
  }

  public function getDataCuma()
  {
    $user = $this->db->get_where('admin', ['nip' => $this->session->userdata('nip')])->row_array();

    $this->db->select('rk.*,a.nama_alternatif');
    $this->db->from('nilai rk');
    $this->db->join('alternatif a', 'a.id_alternatif = rk.id_alternatif','left');
  
    return $this->db->get()->result_array();
  }

  // Aksi tambah data penilaian ke tabel nilai 
  public function PenilaianAlternatif()
  {
    // Ambil data penilaian dan id alternatif
    // post menyimpan data di database
    $id_data = $this->input->post('id_data');
    $id_alternatif = $this->input->post('id_alternatif');
    $P1 = $this->input->post('P1');
    $P2 = $this->input->post('P2');
    $P3 = $this->input->post('P3');
    $P4 = $this->input->post('P4');
    $P5 = $this->input->post('P5');
    $P6 = $this->input->post('P6');
    $P7 = $this->input->post('P7');
    $K1 = $this->input->post('K1');
    $K2 = $this->input->post('K2');
    $K3 = $this->input->post('K3');
    $S1 = $this->input->post('S1');
    $S2 = $this->input->post('S2');
    $G1 = $this->input->post('G1');
    $G2 = $this->input->post('G2');
    
     
    // $tai=['K1'];

    
    // Update perubahan nilai data alternatif
    $data_penilaian = [
      'id_data' => $id_data,
      'P1' => $P1,
      'P2' => $P2,
      'P3' => $P3,
      'P4' => $P4,
      'P5' => $P5,
      'P6' => $P6,
      'P7' => $P7,
      'K1' => $K1,
      'K2' => $K2,
      'K3' => $K3,
      'S1' => $S1,
      'S2' => $S2,
      'G1' => $G1,
      'G2' => $G2,
    ];
    // array_sum($data_penilaian);
    // var_dump( $data_penilaian );
    // query untuk menyimpan update data tabel data_nilai
    $this->db->where('id_data', $data_penilaian['id_data']);
    $this->db->update('data_nilai', $data_penilaian);

    $Nilai1 = $this->Nilai1($P1,$P2,$P3,$P4,$P5,$P6,$P7);
    $Nilai2 = $this->Nilai2($K1,$K2,$K3);
    $Nilai3 = $this->Nilai3($S1,$S2);
    $Nilai4 = $this->Nilai4($G1,$G2);
    $data_nilai = [
      'id_alternatif' => $id_alternatif,
      'K1' => $Nilai1,
      'K2' => $Nilai2,
      'K3' => $Nilai3,
      'K4' => $Nilai4,
    ];
    // query update data tabel nilai
    $this->db->where('id_alternatif', $data_nilai['id_alternatif']);
    $this->db->update('nilai', $data_nilai);


  }
  // perhitungan matematik pendagogoik
  public function Nilai1($P1,$P2,$P3,$P4,$P5,$P6,$P7){
    $pendagogik = (($P1+$P2+$P3+$P4+$P5+$P6+$P7)/7);
    return $pendagogik; //menyimpan nilais
  }
  public function Nilai2($K1,$K2,$K3){
    $CAC = (($K1+$K2+$K3)/3);
    return $CAC;
  }
  public function Nilai3($S1,$S2){
    $BAB = (($S1+$S2)/2);
    return $BAB;
  }
  public function Nilai4($G1,$G2){
    $CU = (($G1+$G2)/2);
    return $CU;
  }

  public function getAllKriteria()
  {
    return $this->db->get('kriteria')->result_array();
  }


  // Cek jenis kriterianya (Benefit/Cost)
  public function cekKriteria1()
  {
    $data_kriteria = $this->getAllKriteria();
    if ($data_kriteria) {
      $data_kriteria1 = $data_kriteria[0];
      if ($data_kriteria1['jenis_kriteria'] == 'Benefit') {
        $jenis = "Benefit";
      } else {
        $jenis = "Cost";
      }
      return $jenis;
    }
    // check($data_kriteria1);
  }
  public function cekKriteria2()
  {
    $data_kriteria = $this->getAllKriteria();
    if ($data_kriteria) {
      $data_kriteria1 = $data_kriteria[1];
      if ($data_kriteria1['jenis_kriteria'] == 'Benefit') {
        $jenis = "Benefit";
      } else {
        $jenis = "Cost";
      }
      return $jenis;
    }
    // check($data_kriteria1);
  }
  public function cekKriteria3()
  {
    $data_kriteria = $this->getAllKriteria();
    if ($data_kriteria) {
      $data_kriteria1 = $data_kriteria[2];
      if ($data_kriteria1['jenis_kriteria'] == 'Benefit') {
        $jenis = "Benefit";
      } else {
        $jenis = "Cost";
      }
      return $jenis;
    }
    // check($data_kriteria1);
  }
  public function cekKriteria4()
  {
    $data_kriteria = $this->getAllKriteria();
    if ($data_kriteria) {
      $data_kriteria1 = $data_kriteria[3];
      if ($data_kriteria1['jenis_kriteria'] == 'Benefit') {
        $jenis = "Benefit";
      } else {
        $jenis = "Cost";
      }
      return $jenis;
    }
    // check($data_kriteria1);
  }

  // ./Cek jenis kriterianya (Benefit/Cost)

  // Ambil nilai tertinggi/rendah kriteria 1
  public function MaxC1()
  {
    $queryMaxC1 = "SELECT MAX(`K1`) AS `K1`
                   FROM `nilai`
    ";
    return $this->db->query($queryMaxC1)->row_array();
  }
  public function MinC1()
  {
    $queryMinC1 = "SELECT MIN(`K1`) AS `K1`
                   FROM `nilai`
    ";
    return $this->db->query($queryMinC1)->row_array();
  }
  // Ambil nilai tertinggi/rendah kriteria 2
  public function MaxC2()
  {
    $queryMaxC2 = "SELECT MAX(`K2`) AS `K2`
                   FROM `nilai`
    ";
    return $this->db->query($queryMaxC2)->row_array();
  }
  public function MinC2()
  {
    $queryMinC2 = "SELECT MIN(`K2`) AS `K2`
                   FROM `nilai`
    ";
    return $this->db->query($queryMinC2)->row_array();
  }
 // Ambil nilai tertinggi/rendah kriteria 3
 public function MaxC3()
 {
   $queryMaxC3 = "SELECT MAX(`K3`) AS `K3`
                    FROM `nilai`
     ";
   return $this->db->query($queryMaxC3)->row_array();
 }
 public function MinC3()
 {
   $queryMinC3 = "SELECT MIN(`K3`) AS `K3`
                    FROM `nilai`
     ";
   return $this->db->query($queryMinC3)->row_array();
 }
 // Ambil nilai tertinggi/rendah kriteria 4
 public function MaxC4()
 {
   $queryMaxC4 = "SELECT MAX(`K4`) AS `K4`
                    FROM `nilai`
     ";
   return $this->db->query($queryMaxC4)->row_array();
 }
 public function MinC4()
 {
   $queryMinC4 = "SELECT MIN(`K4`) AS `K4`
                    FROM `nilai`
     ";
   return $this->db->query($queryMinC4)->row_array();
 }
  

  // Masukkan hasil perhitungan saw daalam tabel ranking
  public function addPerankingan($data)
  {
    $this->db->truncate('ranking');
    $this->db->insert_batch('ranking', $data);
  }

  public function getDataPerankingan()
  {
    $this->db->select('rank.*,a.*');
    $this->db->from('ranking rank');
    $this->db->join('alternatif a', 'rank.id_alternatif = a.id_alternatif', 'left');
    $this->db->order_by('rank.total_nilai', 'desc');
    return $this->db->get()->result_array();
  }
}

/* End of file M_Penilaian.php */
