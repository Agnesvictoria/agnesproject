<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->library('session');
        $this->load->helper(['url','form']);
    }

    public function index() {
        $data['title'] = "Manajemen Kategori";
        $data['categories'] = $this->Category_model->get_all();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/categories/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function create() {
        if ($this->input->method() === 'post') {
            $name = $this->input->post('name', TRUE);
            $this->Category_model->insert(['name' => $name]);
            redirect('admin/categories');
        } else {
            $data['title'] = "Tambah Kategori";
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/categories/create', $data);
            $this->load->view('admin/templates/footer');
        }
    }

    public function edit($id)
{
    $data['title'] = 'Edit Kategori';
    $data['category'] = $this->Category_model->get_category($id);

    if (empty($data['category'])) {
        show_404();
    }

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data); // kalau ada
    $this->load->view('admin/categories/edit', $data);
    $this->load->view('admin/templates/footer');

}

public function update($id)
{
    $this->Category_model->update_category($id);
    redirect('admin/categories');
}


public function delete($id) {
    $this->Category_model->delete($id);
    redirect('admin/categories');
}






}
