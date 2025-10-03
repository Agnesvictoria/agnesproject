<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function do_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->get_by_username($username);

        if ($user) {
    $this->session->set_userdata([
        'username' => $user->username,
        'logged_in' => TRUE
    ]);
    redirect('admin/dashboard'); 
} else {
    $this->session->set_flashdata('error', 'Username/Password salah');
    redirect('auth/login');
}

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
