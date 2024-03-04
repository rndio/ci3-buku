<?php

class Kategori_buku_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function find($id)
  {
    $query = $this->db->get_where('kategori', array('id_buku' => $id));
    return $query->row();
  }

  public function all()
  {
    $this->db->select('*');
    $this->db->from('kategori');
    $query = $this->db->get();
    return $query->result();
  }

  public function insert($data)
  {
    $this->db->insert('kategori', $data);
  }

  public function update($id, $data)
  {
    $this->db->where('id_kategori', $id);
    $this->db->update('kategori', $data);
  }

  public function delete($id)
  {
    $this->db->delete('kategori', array('id_kategori' => $id));
  }
}
