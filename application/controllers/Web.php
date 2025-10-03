<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Artikel_model');
        $this->load->helper(['url']);
    }

    public function index() {
        $data['title'] = "Beranda";
        $data['articles'] = $this->Artikel_model->get_all_articles();
        $this->load->view('web/templates/header', $data);
        $this->load->view('web/index', $data);
        $this->load->view('web/templates/footer');
    }

    public function detail($id) {
        $data['artikel'] = $this->Artikel_model->get_article_by_id($id);
        $data['tags'] = $this->Artikel_model->get_tags_by_article($id);
        $data['title'] = $data['artikel']->title;

        $this->load->view('web/templates/header', $data);
        $this->load->view('web/detail', $data);
        $this->load->view('web/templates/footer');
    }
}
