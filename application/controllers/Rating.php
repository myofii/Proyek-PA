<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rating extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('user_logged') == null) redirect(site_url('auth'));

        $this->load->model("ratingModel");
    }

    public function index()
    {
        $data['title'] = "Tabel Rating";
        $data['active'] = "rating";
        $data['active_nav'] = "";
        $data['rating'] = $this->ratingModel->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('rating/index', $data);
        $this->load->view('templates/footer');
    }
}
