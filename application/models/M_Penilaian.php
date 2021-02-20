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

  // Tampilkan data rating kecocokan join dengan alternatif
  // biar nampil nama alternatif dan data hasil rating kecocokannya
  public function getDataKecocokan()
  {
    $this->db->select('rk.*,a.nama_alternatif');
    $this->db->from('kecocokan rk');
    $this->db->join('alternatif a', 'a.id_alternatif = rk.id_alternatif', 'left');
    return $this->db->get()->result_array();
  }

  // Aksi tambah data penilaian ke tabel nilai dan kecocokan
  public function PenilaianAlternatif()
  {
    // Ambil data penilaian dan id alternatif
    $id_nilai = $this->input->post('id_nilai');
    $id_alternatif = $this->input->post('id_alternatif');
    $K1 = $this->input->post('K1');
    $K2 = $this->input->post('K2');
    $K3 = $this->input->post('K3');
    $K4 = $this->input->post('K4');
    $K5 = $this->input->post('K5');

    // Update data penilaian alternatif
    $data_penilaian = [
      'id_nilai' => $id_nilai,
      'K1' => $K1,
      'K2' => $K2,
      'K3' => $K3,
      'K4' => $K4,
      'K5' => $K5
    ];
    $this->db->where('id_nilai', $data_penilaian['id_nilai']);
    $this->db->update('nilai', $data_penilaian);



    // Buat rating kecocokan penilaian alternatif berdasarkan rating kecocokan yang aad di excel
    $KecocokanKriteria1 = $this->KecocokanKriteria1($K1);
    $KecocokanKriteria2 = $this->KecocokanKriteria2($K2);
    $KecocokanKriteria3 = $this->KecocokanKriteria3($K3);
    $KecocokanKriteria4 = $this->KecocokanKriteria4($K4);
    $KecocokanKriteria5 = $this->KecocokanKriteria5($K5);
    $data_kecocokan = [
      'id_alternatif' => $id_alternatif,
      'C1' => $KecocokanKriteria1,
      'C2' => $KecocokanKriteria2,
      'C3' => $KecocokanKriteria3,
      'C4' => $KecocokanKriteria4,
      'C5' => $KecocokanKriteria5,
    ];
    $this->db->where('id_alternatif', $data_kecocokan['id_alternatif']);
    $this->db->update('kecocokan', $data_kecocokan);
    // Update data rating kecocokan altternatif 
    // check($data);
  }

  // Konversi nilai alternatif ke rating kecocokan
  // Kriteria Rata-rata nilai raport
  private function KecocokanKriteria1($K1)
  {
    if ($K1 >= 86) {
      $KecocokanK1 = 5;
    } elseif ($K1 >= 76) {
      $KecocokanK1 = 4;
    } elseif ($K1 >= 66) {
      $KecocokanK1 = 3;
    } elseif ($K1 >= 51) {
      $KecocokanK1 = 2;
    } else {
      $KecocokanK1 = 1;
    }
    return $KecocokanK1;
  }
  // Kriteria Absensi
  private function KecocokanKriteria2($K2)
  {
    if ($K2 == 0) {
      $KecocokanK2 = 5;
    } elseif ($K2 >= 1) {
      $KecocokanK2 = 4;
    } elseif ($K2 >= 4) {
      $KecocokanK2 = 3;
    } elseif ($K2 >= 7) {
      $KecocokanK2 = 2;
    } else {
      $KecocokanK2 = 1;
    }
    return $KecocokanK2;
  }
  // Kriteria Piagam Penghargaan
  private function KecocokanKriteria3($K3)
  {
    if ($K3 >= 4) {
      $KecocokanK3 = 5;
    } elseif ($K3 == 3) {
      $KecocokanK3 = 4;
    } elseif ($K3 == 2) {
      $KecocokanK3 = 3;
    } elseif ($K3 == 1) {
      $KecocokanK3 = 2;
    } else {
      $KecocokanK3 = 1;
    }
    return $KecocokanK3;
  }
  // Kriteria Keaktifan (Ekstrakurikuler)
  private function KecocokanKriteria4($K4)
  {
    if ($K4 >= 4) {
      $KecocokanK4 = 5;
    } elseif ($K4 == 3) {
      $KecocokanK4 = 4;
    } elseif ($K4 == 2) {
      $KecocokanK4 = 3;
    } elseif ($K4 == 1) {
      $KecocokanK4 = 2;
    } else {
      $KecocokanK4 = 1;
    }
    return $KecocokanK4;
  }
  // Kriteria Usia
  private function KecocokanKriteria5($K5)
  {
    if ($K5 <= 7) {
      $KecocokanK5 = 5;
    } elseif ($K5 >= 9) {
      $KecocokanK5 = 4;
    } elseif ($K5 >= 11) {
      $KecocokanK5 = 3;
    } elseif ($K5 >= 13) {
      $KecocokanK5 = 2;
    } else {
      $KecocokanK5 = 1;
    }
    return $KecocokanK5;
  }

  // Cari nilai kecocokan tertinggi/terrendah tiap kriteria
  // berdasarkan jenis kriterianya (Benefit/Cost)
  // jika benefit maka cari nilai tertinggi, jikaa cost makaa cari nilai terrendah.

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
  public function cekKriteria5()
  {
    $data_kriteria = $this->getAllKriteria();
    if ($data_kriteria) {
      $data_kriteria1 = $data_kriteria[4];
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
    $queryMaxC1 = "SELECT MAX(`C1`) AS `C1`
                   FROM `kecocokan`
    ";
    return $this->db->query($queryMaxC1)->row_array();
  }
  public function MinC1()
  {
    $queryMinC1 = "SELECT MIN(`C1`) AS `C1`
                   FROM `kecocokan`
    ";
    return $this->db->query($queryMinC1)->row_array();
  }
  // Ambil nilai tertinggi/rendah kriteria 2
  public function MaxC2()
  {
    $queryMaxC2 = "SELECT MAX(`C2`) AS `C2`
                   FROM `kecocokan`
    ";
    return $this->db->query($queryMaxC2)->row_array();
  }
  public function MinC2()
  {
    $queryMinC2 = "SELECT MIN(`C2`) AS `C2`
                   FROM `kecocokan`
    ";
    return $this->db->query($queryMinC2)->row_array();
  }
  // Ambil nilai tertinggi/rendah kriteria 3
  public function MaxC3()
  {
    $queryMaxC3 = "SELECT MAX(`C3`) AS `C3`
                     FROM `kecocokan`
      ";
    return $this->db->query($queryMaxC3)->row_array();
  }
  public function MinC3()
  {
    $queryMinC3 = "SELECT MIN(`C3`) AS `C3`
                     FROM `kecocokan`
      ";
    return $this->db->query($queryMinC3)->row_array();
  }
  // Ambil nilai tertinggi/rendah kriteria 4
  public function MaxC4()
  {
    $queryMaxC4 = "SELECT MAX(`C4`) AS `C4`
                     FROM `kecocokan`
      ";
    return $this->db->query($queryMaxC4)->row_array();
  }
  public function MinC4()
  {
    $queryMinC4 = "SELECT MIN(`C4`) AS `C4`
                     FROM `kecocokan`
      ";
    return $this->db->query($queryMinC4)->row_array();
  }
  // Ambil nilai tertinggi/rendah kriteria 5
  public function MaxC5()
  {
    $queryMaxC5 = "SELECT MAX(`C5`) AS `C5`
                     FROM `kecocokan`
      ";
    return $this->db->query($queryMaxC5)->row_array();
  }
  public function MinC5()
  {
    $queryMinC5 = "SELECT MIN(`C5`) AS `C5`
                     FROM `kecocokan`
      ";
    return $this->db->query($queryMinC5)->row_array();
  }

  // Masukkan hasil perhitungan saw daalam tabel ranking
  public function addPerankingan($data)
  {
    $this->db->truncate('ranking');
    $this->db->insert_batch('ranking', $data);
  }

  public function getDataPerankingan()
  {
    $this->db->select('rank.*,a.nama_alternatif');
    $this->db->from('ranking rank');
    $this->db->join('alternatif a', 'rank.id_alternatif = a.id_alternatif', 'left');
    $this->db->order_by('rank.total_nilai', 'desc');
    return $this->db->get()->result_array();
  }
}

/* End of file M_Penilaian.php */
