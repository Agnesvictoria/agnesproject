<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testdb extends CI_Controller {

    public function index()
    {
        if ($this->db->conn_id) {
            echo "Koneksi database BERHASIL!";
        } else {
            echo "Koneksi database GAGAL!";
        }
    }
}
