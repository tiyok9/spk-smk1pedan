<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Alternatif extends CI_Model
{
  public function getAllAlternatif()
  {
    return $this->db->get('alternatif')->result_array();
  }

  public function addAlternatif($data_alternatif)
  {
    $this->db->insert('alternatif', $data_alternatif);
  }

  public function addIdAlternatif($data_id_alternatif)
  {
    $this->db->insert('nilai', $data_id_alternatif);
    $this->db->insert('kecocokan', $data_id_alternatif);
  }

  public function updateAlternatif($data_alternatif)
  {
    $this->db->where('id_alternatif', $data_alternatif['id_alternatif']);
    $this->db->update('alternatif', $data_alternatif);
  }

  public function deleteAlternatif($data_alternatif)
  {
    $this->deleteKecocokanAlternatif($data_alternatif);
    $this->deleteNilaiAlternatif($data_alternatif);
    $this->db->where('id_alternatif', $data_alternatif['id_alternatif']);
    $this->db->delete('alternatif', $data_alternatif);
  }

  // Hapus data alternatif pada tabel penilaian dan kecocokan
  public function deleteNilaiAlternatif($data_alternatif)
  {
    $this->db->where('id_alternatif', $data_alternatif['id_alternatif']);
    $this->db->delete('nilai', $data_alternatif);
  }
  public function deleteKecocokanAlternatif($data_alternatif)
  {
    $this->db->where('id_alternatif', $data_alternatif['id_alternatif']);
    $this->db->delete('kecocokan', $data_alternatif);
  }
  // ./Hapus data alternatif pada tabel penilaian dan kecocokan
}

/* End of file M_Alternatif.php */
