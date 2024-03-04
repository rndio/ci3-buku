<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_buku extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kategori_buku_model');
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');
  }

  public function index()
  {
    $data['categories'] = $this->Kategori_buku_model->all();
    $data['title'] = 'Daftar Kategori Buku';

    $this->load->view('templates/header', $data);
    $this->load->view('kategori/index', $data);
    $this->load->view('templates/footer');
  }

  public function store()
  {
    $this->form_validation->set_rules('nama_kategori', 'Kategori', 'required|max_length[150]');

    if ($this->form_validation->run() == FALSE) {
      $this->index();
    } else {
      $data = array(
        'nama_kategori' =>  $this->input->post('nama_kategori'),
      );
      $this->Kategori_buku_model->insert($data);
      redirect('kategori_buku');
    }
  }

  public function update($id)
  {
    $this->form_validation->set_rules('nama_kategori', 'Kategori', 'required|max_length[150]');

    if ($this->form_validation->run() == FALSE) {
      $this->index();
    } else {
      $data = array(
        'nama_kategori' =>  $this->input->post('nama_kategori'),
      );
      $this->Kategori_buku_model->update($id, $data);
      redirect('kategori_buku');
    }
  }

  public function delete($id)
  {
    $this->Kategori_buku_model->delete($id);
    redirect('kategori_buku');
  }
}
