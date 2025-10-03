<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Artikel_model'); 
        $this->load->model('Author_model');
        $this->load->model('Category_model');
        $this->load->model('Tag_model');
        $this->load->library('session');
        $this->load->helper(['url','form']);
    }

    public function index() {
        $data['title'] = "Manajemen Artikel"; // untuk header
        $data['articles'] = $this->Artikel_model->get_all_articles();

        // Tambahkan header, sidebar, footer
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/artikel/index', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambah() {
        if($_POST) {
            $title = $this->input->post('title', true);
            $content = $this->input->post('content', true);
            $author_id = $this->input->post('author_id');
            $category_id = $this->input->post('category_id');
            $tags = $this->input->post('tags');

            $this->Artikel_model->insert_article($title, $content, $author_id, $category_id, $tags);

redirect('admin/artikel');

        }

        $data['title'] = "Tambah Artikel"; // untuk header
        $data['authors'] = $this->Author_model->get_all();
        $data['categories'] = $this->Category_model->get_all();
        $data['tags'] = $this->Tag_model->get_all();

        // Tambahkan header, sidebar, footer
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/artikel/tambah', $data);
        $this->load->view('admin/templates/footer', $data);

        
    }



    public function edit($id)
    {
    $this->load->model('Artikel_model');
    $this->load->model('Author_model');
    $this->load->model('Category_model');
    $this->load->model('Tag_model');

    $data['title'] = 'Edit Artikel';
    $data['artikel'] = $this->Artikel_model->get_article_by_id($id);
    $data['authors'] = $this->Author_model->get_all();
    $data['categories'] = $this->Category_model->get_all();
    $data['tags'] = $this->Tag_model->get_all();
    $data['artikel_tags'] = $this->Artikel_model->get_article_tag($id);

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/artikel/edit', $data);
    $this->load->view('admin/templates/footer');
    }

    public function update($id)
    {
    $data = [
        'title'     => $this->input->post('title'),
        'content'   => $this->input->post('content'),
        'author_id' => $this->input->post('author_id')
    ];

    $tags = $this->input->post('tags') ?? [];
    $category_id = $this->input->post('category_id'); // tambahkan ini

    $this->Artikel_model->update_article($id, $data, $tags, $category_id); // sekarang 4 argumen

    redirect('admin/artikel');
    }



    public function detail($id)
    {
    // Load model jika belum otomatis
    $this->load->model('Artikel_model');

    // Ambil artikel berdasarkan ID, gabung author & category
    $data['artikel'] = $this->Artikel_model->get_article_by_id($id);

    // Ambil tags dari pivot table
    $data['tags'] = $this->Artikel_model->get_tags_by_article($id);

    // Judul untuk header
    $data['title'] = "Detail Artikel";

    // Load view dengan header, sidebar, footer
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/artikel/detail', $data);
    $this->load->view('admin/templates/footer', $data);
    }


    public function delete($id) {
        $this->Artikel_model->delete_article($id);
        redirect('admin/artikel');
    }



}
