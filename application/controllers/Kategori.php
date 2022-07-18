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
        $this->form_validation->set_rules('nama_kategori', '<strong>Nama Kategori', 'required', array(
            'required' => '%s harus diisi</strong>'
        ));
        // if (empty($_FILES['url_gambar']['name'])) {
        //     $this->form_validation->set_rules('url_gambar', '<strong>Gambar', 'required', array(
        //         'required' => '%s harus diisi!</strong>'
        //     ));
        // }

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tambah Kategori";
            $data['active'] = "kategori";
            $data['active_nav'] = "tambah_kategori";
            $this->load->view('templates/header', $data);
            $this->load->view('kategori/tambah_kategori', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->input->post()) {
                $ext = explode('.', $_FILES["url_gambar"]['name']);
                $ext = $ext[count($ext) - 1];
                $new_name = $this->input->post('nama_kategori') . "." . $ext;

                $config['upload_path']          = 'uploads/kategori/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 2048;
                $config['file_name']            = $new_name;

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if (!$this->upload->do_upload("url_gambar")) {
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);
                    return array("status" => false, "error" => $error);
                }

                $data = [
                    "nama" => $this->input->post('nama_kategori'),
                    "url_gambar"    => $config['upload_path'] . $new_name
                ];

                $kategori = $this->kategoriModel;
                $kategori->save($data);
                $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
                redirect('kategori/tambah');
            }
        }
    }

    public function ubah($id = null)
    {
        $kategori = $this->kategoriModel;
        if ($this->input->post()) {
            if (!empty($_FILES)) {
                $gambar = $kategori->getById($this->input->post('id'));
                unlink($gambar->url_gambar);

                $ext = explode('.', $_FILES["url_gambar"]['name']);
                $ext = $ext[count($ext) - 1];
                $new_name = $this->input->post('nama_kategori') . "." . $ext;

                $config['upload_path']          = 'uploads/kategori/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 2048;
                $config['file_name']            = $new_name;

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('url_gambar')) {
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);
                    return array("status" => false, "error" => $error);
                }

                $data = [
                    "nama"          => $this->input->post('nama_kategori'),
                    "url_gambar"    => $config['upload_path'] . $new_name
                ];
            } else {
                $data = [
                    "nama"          => $this->input->post('nama_kategori')
                ];
            }

            $kategori->update($data, $this->input->post('id'));
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

        $gambar = $this->kategoriModel->getById($id);
        unlink($gambar->url_gambar);
        if ($this->kategoriModel->delete($id)) {
            redirect(site_url('kategori/index'));
        }
    }
}
