<?php

class gambarModel extends CI_Model
{

    private $table = "gambar";

    public $url;

    public function getAll($id)
    {
        $this->db->select('gambar.*, l.nama as nama_lokasi, l.gambar as background');
        $this->db->join('lokasi l', 'l.id = gambar.lokasi_id');
        $this->db->where('lokasi_id', $id);
        return $this->db->get($this->table)->result();
    }

    public function getById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row();
    }

    public function getLastId()
    {
        $this->db->select_max('id');
        return $this->db->get($this->table)->row();
    }

    public function createGambar($dataGambar)
    {
        return $this->db->insert($this->table, $dataGambar);
    }

    public function updateGambar($dataGambar, $where)
    {
        return $this->db->update($this->table, $dataGambar, $where);
    }

    public function deleteGambar($where)
    {
        return $this->db->delete($this->table, $where);
    }
}
