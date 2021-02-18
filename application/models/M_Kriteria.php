<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Kriteria extends CI_Model
{
  public function getAllKriteria()
  {
    return $this->db->get('kriteria')->result_array();
  }

  // Hitung jumlah bobot seluruh kriteria
  public function jumlahBobotKriteria()
  {
    $this->db->select_sum('bobot');
    $query = $this->db->get('kriteria');
    if ($query->num_rows() > 0) {
      return $query->row()->bobot;
    } else {
      return 0;
    }
  }

  public function addKriteria($data)
  {
    $this->db->insert('kriteria', $data);
  }

  public function updateKriteria($data)
  {
    $this->db->where('id_kriteria', $data['id_kriteria']);
    $this->db->update('kriteria', $data);
  }

  public function deleteKriteria($data)
  {
    $this->db->delete('kriteria', ['id_kriteria' => $data['id_kriteria']]);
  }
}

/* End of file M_Kriteria.php */
