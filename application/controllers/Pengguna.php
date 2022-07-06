<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('user_logged') == null) redirect(site_url('auth'));

        $this->load->model("penggunaModel");
    }

    public function index()
    {
        $data['title'] = "Tabel Pengguna";
        $data['active'] = "pengguna";
        $data['active_nav'] = "";
        $data['pengguna'] = $this->penggunaModel->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('pengguna/index', $data);
        $this->load->view('templates/footer');
    }
}
