<?php

class Buku_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function find($id)
  {
    $query = $this->db->get_where('buku', array('id_buku' => $id));
    return $query->row();
  }

  public function all()
  {
    $this->db->select('*');
    $this->db->from('buku');
    $this->db->join('kategori', 'kategori.id_kategori = buku.id_kategori', 'left');
    $query = $this->db->get();

    return $query->result();
  }

  public function insert($data)
  {
    $this->db->insert('buku', $data);
  }

  public function update($id, $data)
  {
    $this->db->where('id_buku', $id);
    $cover_filename = $this->db->get('buku')->row()->cover;

    if (!empty($data['cover']) && $cover_filename != 'default.webp') {
      if (file_exists(FCPATH . 'assets/img/buku/' . $cover_filename)) {
        unlink(FCPATH . 'assets/img/buku/' . $cover_filename);
      }
    }
    $this->db->update('buku', $data);
  }

  public function delete($id)
  {
    if ($this->db->get_where('buku', array('id_buku' => $id))->row()->cover != 'default.webp') {
      unlink(FCPATH . 'assets/img/buku/' . $this->db->get_where('buku', array('id_buku' => $id))->row()->cover);
    }
    $this->db->delete('buku', array('id_buku' => $id));
  }
}
