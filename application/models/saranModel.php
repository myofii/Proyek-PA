<?php

class saranModel extends CI_Model
{

    public function getAll()
    {
        return $this->db->query("SELECT s.*, u.nama AS nama_user FROM saran s, user u WHERE s.user_id = u.id ORDER BY s.id DESC")->result();
    }
}
