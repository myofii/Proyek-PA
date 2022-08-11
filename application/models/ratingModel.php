<?php

class ratingModel extends CI_Model
{

    private $table = "rating";

    public $rating;
    public $lokasi_id;
    public $user_id;

    public function getAll()
    {
        return $this->db->query("SELECT r.*, u.nama AS nama_user, l.nama AS nama_lokasi FROM rating r, user u, lokasi l WHERE r.user_id = u.id AND r.lokasi_id = l.id ORDER BY r.id DESC")->result();
    }

    public function insert($data)
    {
        $this->rating = $data["rating"];
        $this->lokasi_id = $data["lokasi_id"];
        $this->user_id = $data["user_id"];
        $this->db->insert($this->table, $this);
    }
}
