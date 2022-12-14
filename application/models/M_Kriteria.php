<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Kriteria extends CI_Model
{
  public function getAllKriteria()
  {
    return $this->db->get('kriteria')->result_array();
  }

  public function KodeKriteria()
  {
    $query = $this->db->query("select max(kode_kriteria) as max_id from kriteria");
    $rows = $query->row();
    $kode = $rows->max_id;
    $noUrut = (int) substr($kode, 1, 2);
    $noUrut++;
    $char = "C";
    $kode = $char . sprintf("%s", $noUrut);
    return $kode;
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
// ambil bobot nilai dari tabel kriteria
  public function bobotC1()
  {
    return $this->db->get_where('kriteria', ['kode_kriteria' => 'C1'])->row_array();
  }
  public function bobotC2()
  {
    return $this->db->get_where('kriteria', ['kode_kriteria' => 'C2'])->row_array();
  }
  public function bobotC3()
  {
    return $this->db->get_where('kriteria', ['kode_kriteria' => 'C3'])->row_array();
  }
  public function bobotC4()
  {
    return $this->db->get_where('kriteria', ['kode_kriteria' => 'C4'])->row_array();
  }
  
}

/* End of file M_Kriteria.php */
