<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Tag_model');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
        
        // cek login 
        if(!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = "Manajemen Tag";
        $data['tags']  = $this->Tag_model->get_all();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/tags/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function create() {
        if ($this->input->method() === 'post') {
            $name = $this->input->post('name', TRUE);

            $this->Tag_model->insert(['name' => $name]);

            redirect('admin/tags');
        } else {
            $data['title'] = "Tambah Tag";

            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/tags/create', $data);
            $this->load->view('admin/templates/footer');
        }
    }

    public function edit($id) {
        $data['tag'] = $this->Tag_model->get_by_id($id);

        if ($this->input->method() === 'post') {
            $this->Tag_model->update($id, ['name' => $this->input->post('name', TRUE)]);
            redirect('admin/tags');
        }

        $data['title'] = "Edit Tag";

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/tags/edit', $data);
        $this->load->view('admin/templates/footer');
    }

    public function delete($id) {
        $this->Tag_model->delete($id);
        redirect('admin/tags');
    }
}
