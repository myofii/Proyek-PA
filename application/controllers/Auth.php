<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->input->post()) {
            $post = $this->input->post();

            if ($post["username"] == "admin" && $post["password"] == "@admin") {
                $this->session->set_userdata('user_logged', $post["username"]);
                redirect('lokasi');
            } else {
                echo "<script>alert('Username atau password salah');history.go(-1);</script>";
            }
        }

        if ($this->session->userdata('user_logged') == NULL) {
            $this->load->view('login');
        } else {
            redirect('lokasi');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_logged');
        redirect('lokasi');
    }
}
