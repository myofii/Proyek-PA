<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('user_logged') == null) redirect(site_url('auth'));

        $this->load->model("lokasiModel");
        $this->load->model("kategoriModel");
        $this->load->model("gambarModel");
    }

    public function index()
    {
        $data['title'] = "Tabel Lokasi Fotografi";
        $data['active'] = "lokasi";
        $data['active_nav'] = "tabel_lokasi";
        $data['lokasi'] = $this->lokasiModel->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('lokasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_lokasi()
    {
        $this->form_validation->set_rules('nama', '<strong>Nama Lokasi', 'required', array(
            'required' => '%s harus diisi!</strong>'
        ));
        $this->form_validation->set_rules('kategori', '<strong>Kategori', 'required', array(
            'required' => '%s harus diisi!</strong>'
        ));
        $this->form_validation->set_rules('alamat', '<strong>Alamat', 'required', array(
            'required' => '%s harus diisi!</strong>'
        ));
        $this->form_validation->set_rules('lat_coord', '<strong>Latitude', 'required', array(
            'required' => '%s harus diisi!</strong>'
        ));
        $this->form_validation->set_rules('long_coord', '<strong>Longitude', 'required', array(
            'required' => '%s harus diisi!</strong>'
        ));
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tambah Lokasi Fotografi";
            $data['active'] = "lokasi";
            $data['active_nav'] = "tambah_lokasi";
            $data['kategori'] = $this->kategoriModel->getAll();
            $this->load->view('templates/header', $data);
            $this->load->view('lokasi/tambah_lokasi', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->input->post()) {
                $this->lokasiModel->save();
                // redirect('lokasi');
                $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
                redirect('lokasi/tambah_lokasi');
            }
        }
    }

    public function edit_lokasi($id = null)
    {
        $this->form_validation->set_rules('nama', '<strong>Nama Lokasi', 'required', array(
            'required' => '%s harus diisi</strong>'
        ));
        $this->form_validation->set_rules('kategori', '<strong>Kategori', 'required', array(
            'required' => '%s harus diisi</strong>'
        ));
        $this->form_validation->set_rules('alamat', '<strong>Alamat', 'required', array(
            'required' => '%s harus diisi</strong>'
        ));
        $this->form_validation->set_rules('lat_coord', '<strong>Latitude', 'required', array(
            'required' => '%s harus diisi</strong>'
        ));
        $this->form_validation->set_rules('long_coord', '<strong>Longitude', 'required', array(
            'required' => '%s harus diisi</strong>'
        ));

        if ($this->form_validation->run() == FALSE) {
            if ($id == null) {
                $id = $this->input->post('id');
            }
            $data['lokasi'] = $this->lokasiModel->getById($id);
            $data['title'] = "Edit Lokasi Fotografi";
            $data['active'] = "lokasi";
            $data['active_nav'] = "tabel_lokasi";
            $data['kategori'] = $this->kategoriModel->getAll();
            $this->load->view('templates/header', $data);
            $this->load->view('lokasi/edit_lokasi', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->input->post()) {
                // die(var_dump($this->input->post()));
                $this->lokasiModel->update();
                $this->session->set_flashdata('pesan', 'Data berhasil diedit');
                redirect('lokasi');
            }
        }
    }

    public function hapus($id) 
    {
        if (isset($id)) {
            $data = $this->gambarModel->getAll($id);
            foreach ($data as $key => $value) {
                unlink('uploads/'.$value->url);
            }
            $this->lokasiModel->delete($id);
            $this->gambarModel->deleteGambar($id);
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
            redirect('lokasi');
        } else {
            show_404();
        }
    }

    public function gambar($id) 
    {
        $data['title'] = "Tabel Lokasi Fotografi";
        $data['active'] = "lokasi";
        $data['active_nav'] = "tabel_lokasi";
        $data['lokasi_id'] = $id;
        $data['gambar'] = $this->gambarModel->getAll($id);
        $this->load->view('templates/header', $data);
        $this->load->view('lokasi/gambar', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_gambar($id)
    {
        $data['title'] = "Tabel Lokasi Fotografi";
        $data['active'] = "lokasi";
        $data['active_nav'] = "tabel_lokasi";
        $data['lokasi_id'] = $id;
        $this->load->view('templates/header', $data);
        $this->load->view('lokasi/tambah_gambar', $data);
        $this->load->view('templates/footer');
    }

    public function add($id)
	{
		$data = array();
		if (!empty($_FILES)) {
			$count = count($_FILES['files']['name']);
			for ($i = 0; $i < $count; $i++) {
				$_FILES["file"]['name'] = $_FILES['files']['name'][$i][$i];
				$_FILES["file"]['type'] = $_FILES['files']['type'][$i][$i];
				$_FILES["file"]['tmp_name'] = $_FILES['files']['tmp_name'][$i][$i];
				$_FILES["file"]['error'] = $_FILES['files']['error'][$i][$i];
				$_FILES["file"]['size'] = $_FILES['files']['size'][$i][$i];

				$upload = $this->do_upload("file", $id);
				if ($upload["status"]) {
					$data = [
						"url" => $upload["pic"],
						"lokasi_id" => $id,
					];
					$this->gambarModel->createGambar($data);
				}
			}
		}
    }

    public function pilih_gambar($lokasi_id, $id)
    {
        $this->lokasiModel->background(["gambar" => $id], ["id" => $lokasi_id]);
        redirect('lokasi/gambar/' . $lokasi_id);
    }

    public function hapus_gambar($lokasiId, $id)
    {
        $gambar = $this->gambarModel->getById($id);
        $lokasi = $this->lokasiModel->getById($lokasiId);
        if ($lokasi->gambar == $id) {
            $this->lokasiModel->updateGambar(["gambar" => 0], ["id" => $lokasiId]);
        }
        unlink('uploads/'.$gambar->url);
        $this->gambarModel->deleteGambar(["id" => $id]);
        redirect('lokasi/gambar/' . $lokasiId);
    }

    public function do_upload($type, $id)
    {
        $gambar = $this->gambarModel->getLastId()->id;
        if ($gambar == NULL) {
            $gambar = 0;
        }
        $gambar++;
        $lokasi = $this->lokasiModel->getById($id);
        $ext = explode('.', $_FILES[$type]['name']);
        $ext = $ext[count($ext) - 1];
        $new_name = $lokasi->nama . "-" . $gambar . "." . $ext;
        $new_name = str_replace(" ", "_", $new_name);
        $new_name = str_replace(["'", "/"], "", $new_name);
        // $new_name = time() . str_replace(' ', '_', $_FILES[$type]['name']);

        $config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = $new_name;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($type)) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
            return array("status" => false, "error" => $error);
        } else {
            echo "berhasil";
            return array("status" => true, "pic" => $new_name);
        }
    }
}
