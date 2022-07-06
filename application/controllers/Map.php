<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Map extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('user_logged') == null) redirect(site_url('auth'));

        $this->load->model("lokasiModel");
        $this->load->model("kategoriModel");
    }

    public function index()
    {
        $kategori = $this->kategoriModel->getAll();
        foreach ($kategori as $key => $value) {
            $data[$value->nama] = $this->lokasiModel->getKategori($value->id);
        }
        $data['allLokasi'] = $this->lokasiModel->getAll();
        // $json = json_encode($data);
        // die(var_dump($data));

        $data['kategori'] = $kategori;
        $data['title'] = "Maps";
        $data['active'] = "map";
        $data['active_nav'] = "";
        $this->load->view('templates/header', $data);
        $this->load->view('map/index', $data);
        $this->load->view('templates/footer');
    }
}
