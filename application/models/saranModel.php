<?php

class saranModel extends CI_Model
{
    public $pesan;
    public $user_id;

    private $table = "saran";

    public function getAll()
    {
        return $this->db->query("SELECT s.*, u.nama AS nama_user FROM saran s, user u WHERE s.user_id = u.id ORDER BY s.id DESC")->result();
    }

    public function insert($data)
    {
        $this->pesan = $data["pesan"];
        $this->user_id = $data["user_id"];
        $this->db->insert($this->table, $this);
    }
}
