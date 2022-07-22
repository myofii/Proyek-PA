<?php

class penggunaModel extends CI_Model
{

    private $table = "user";

    public $username;
    public $password;
    public $nama;

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    
    public function get_where($username, $password)
    {
        return $this->db->get_where($this->table, ["username" => $username, 'password' => $password])->row();
    }

    public function insert($data)
    {
        $this->username = $data["username"];
        $this->password = $data["password"];
        $this->nama = $data["nama"];
        $this->db->insert($this->table, $this);
    }
}
