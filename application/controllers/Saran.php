<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('user_logged') == null) redirect(site_url('auth'));

        $this->load->model("saranModel");
    }

    public function index()
    {
        $data['title'] = "Tabel Saran";
        $data['active'] = "saran";
        $data['active_nav'] = "";
        $data['saran'] = $this->saranModel->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('saran/index', $data);
        $this->load->view('templates/footer');
    }
}
