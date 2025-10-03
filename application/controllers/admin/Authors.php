<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authors extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Author_model');
        $this->load->library('session');
        $this->load->helper(['url','form']);

        if(!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index(){
        $data['title'] = "Manajemen Author";
        $data['authors'] = $this->Author_model->get_all();

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/authors/index',$data);
        $this->load->view('admin/templates/footer');
    }

    public function create(){
        if($this->input->method() === 'post'){
            $this->Author_model->insert([
                'name'  => $this->input->post('name'),
                'email' => $this->input->post('email')
            ]);
            redirect('admin/authors');
        }
        $data['title'] = "Tambah Author";
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/authors/create',$data);
        $this->load->view('admin/templates/footer');
    }

    public function edit($id){
        $data['author'] = $this->Author_model->get_by_id($id);
        if($this->input->method() === 'post'){
            $this->Author_model->update($id,[
                'name'  => $this->input->post('name'),
                'email' => $this->input->post('email')
            ]);
            redirect('admin/authors');
        }
        $data['title'] = "Edit Author";
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/sidebar',$data);
        $this->load->view('admin/authors/edit',$data);
        $this->load->view('admin/templates/footer');
    }

    public function delete($id){
        $this->Author_model->delete($id);
        redirect('admin/authors');
    }
}
