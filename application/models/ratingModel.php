<?php

class ratingModel extends CI_Model
{

    public function getAll()
    {
        return $this->db->query("SELECT r.*, u.nama AS nama_user, l.nama AS nama_lokasi FROM rating r, user u, lokasi l WHERE r.user_id = u.id AND r.lokasi_id = l.id ORDER BY r.id DESC")->result();
    }
}
