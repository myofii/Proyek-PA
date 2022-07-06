<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('user_logged') == null) redirect(site_url('auth'));

        $this->load->model("kategoriModel");
    }

    public function index()
    {
        $data['title'] = "Tabel Kategori";
        $data['active'] = "kategori";
        $data['active_nav'] = "tabel_kategori";
        $data["kategori"] = $this->kategoriModel->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->input->post()) {
            $kategori = $this->kategoriModel;
            $kategori->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('kategori/index');
        }

        $data['title'] = "Tambah Kategori";
        $data['active'] = "kategori";
        $data['active_nav'] = "tambah_kategori";
        $this->load->view('templates/header', $data);
        $this->load->view('kategori/tambah_kategori', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id = null)
    {
        $kategori = $this->kategoriModel;
        if ($this->input->post()) {
            $kategori->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('kategori/index');
        }

        $data["kategori"] = $kategori->getById($id);
        if (!$data["kategori"]) show_404();

        $data['title'] = "Ubah Kategori";
        $data['active'] = "kategori";
        $data['active_nav'] = "tabel_kategori";
        $this->load->view('templates/header', $data);
        $this->load->view('kategori/ubah_kategori', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->kategoriModel->delete($id)) {
            redirect(site_url('kategori/index'));
        }
    }
}
