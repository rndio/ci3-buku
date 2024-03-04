<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Buku_model');
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');
  }

  public function index()
  {
    $data['buku'] = $this->Buku_model->all();
    $data['title'] = 'Daftar Buku';

    $this->load->view('templates/header', $data);
    $this->load->view('buku/index', $data);
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $data['title'] = 'Tambah Buku';
    $data['kategori'] = $this->db->get('kategori')->result();
    $data['validation_errors'] = $this->form_validation->error_array();

    $this->load->view('templates/header', $data);
    $this->load->view('buku/create', $data);
    $this->load->view('templates/footer');
  }

  public function store()
  {
    $this->form_validation->set_rules('judul', 'Judul Buku', 'required|max_length[150]');
    $this->form_validation->set_rules('id_kategori', 'Kategori', 'required|numeric');
    $this->form_validation->set_rules('penulis', 'Penulis', 'required|max_length[150]');
    $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|numeric|min_length[4]|max_length[4]');
    $this->form_validation->set_rules('cover', 'Image Cover', 'callback_upload_image');

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $data = array(
        'judul'         => $this->input->post('judul'),
        'id_kategori'   => $this->input->post('id_kategori'),
        'penulis'       => $this->input->post('penulis'),
        'tahun_terbit'  => $this->input->post('tahun_terbit'),
      );
      // Check if file was uploaded before attempting to save it
      if (!empty($_FILES['cover']['name'])) {
        $data['cover'] = $this->upload->data('file_name');
      }
      $this->Buku_model->insert($data);
      redirect('buku');
    }
  }

  public function edit($id)
  {
    $data['buku'] = $this->Buku_model->find($id);
    $data['title'] = "Edit Buku: " . $data['buku']->judul;
    $data['validation_errors'] = $this->form_validation->error_array();
    $data['kategori'] = $this->db->get('kategori')->result();

    $this->load->view('templates/header', $data);
    $this->load->view('buku/edit', $data);
    $this->load->view('templates/footer');
  }

  public function update($id)
  {
    $this->form_validation->set_rules('judul', 'Judul Buku', 'required|max_length[150]');
    $this->form_validation->set_rules('id_kategori', 'Kategori', 'required|numeric');
    $this->form_validation->set_rules('penulis', 'Penulis', 'required|max_length[150]');
    $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|numeric|min_length[4]|max_length[4]');
    $this->form_validation->set_rules('cover', 'Image Cover', 'callback_upload_image');

    if ($this->form_validation->run() == FALSE) {
      $this->edit($id);
    } else {
      $data = array(
        'id_buku'       => $id,
        'judul'         => $this->input->post('judul'),
        'id_kategori'   => $this->input->post('id_kategori'),
        'penulis'       => $this->input->post('penulis'),
        'tahun_terbit'  => $this->input->post('tahun_terbit'),
      );
      // Check if file was uploaded before attempting to save it
      if (!empty($_FILES['cover']['name'])) {
        $data['cover'] = $this->upload->data('file_name');
      }
      $this->Buku_model->update($id, $data);
      redirect('buku');
    }
  }

  public function delete($id)
  {
    $this->Buku_model->delete($id);
    redirect('buku');
  }

  public function upload_image()
  {
    if (!empty($_FILES['cover']['name'])) {
      $config['upload_path']    = './assets/img/buku';
      $config['allowed_types']  = 'gif|jpg|jpeg|png';
      $config['file_name']      = 'buku-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.' . pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
      $config['overwrite']      = true;
      $config['max_size']       = 2048;
      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('cover')) {
        // Upload failed, set an error message
        $this->form_validation->set_message('cover', $this->upload->display_errors());
        return false;
      } else {
        // Upload successful
        return true;
      }
    } else {
      // No file uploaded, return true (as it's optional)
      return true;
    }
  }
}
