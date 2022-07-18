<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model("lokasiModel");
        $this->load->model("kategoriModel");
        $this->load->model("gambarModel");
        $this->load->model("ratingModel");
        $this->load->model("saranModel");
        $this->load->model("penggunaModel");
    }

    function getLokasi($id = null) 
    {
        header("Access-Control-Allow-Origin: *");
        if ($id == null) {
            $data = $this->lokasiModel->getAll();
        } else {
            $data = $this->lokasiModel->getById($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function getGambarByLokasi($id)
    {
        header("Access-Control-Allow-Origin: *");
        $data = $this->gambarModel->getAll($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function getKategori($id = null)
    {
        header("Access-Control-Allow-Origin: *");
        if ($id == null) {
            $data = $this->kategoriModel->getAll();
        } else {
            $data = $this->kategoriModel->getById($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function getUser($username, $password)
    {
        header("Access-Control-Allow-Origin: *");
        $data = $this->penggunaModel->get_where($username, $password);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    function createUser()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");

        $formdata = json_decode(file_get_contents('php://input'), true);

        if (!empty($formdata)) {
            $this->penggunaModel->insert($formdata);

            $response = array(
                'status' => 'success',
                'message' => 'Data berhasil ditambahkan'
            );
        } else    $response = array('status' => 'error');

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    function createRating()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");

        $formdata = json_decode(file_get_contents('php://input'), true);

        if (!empty($formdata)) {
            $this->ratingModel->insert($formdata);

            $response = array(
                'status' => 'success',
                'message' => 'Data berhasil ditambahkan'
            );
        } else    $response = array('status' => 'error');

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    function createSaran()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");

        $formdata = json_decode(file_get_contents('php://input'), true);

        if (!empty($formdata)) {
            $this->saranModel->insert($formdata);

            $response = array(
                'status' => 'success',
                'message' => 'Data berhasil ditambahkan'
            );
        } else    $response = array('status' => 'error');

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}
