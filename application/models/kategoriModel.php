<?php

    class kategoriModel extends CI_Model {

        private $table = "kategori";

        public $nama;

        public function getAll()
        {
            return $this->db->get($this->table)->result();
        }

        public function getById($id)
        {
            return $this->db->get_where($this->table, ["id" => $id])->row();
        }
        
        public function save($data)
        {
            $this->db->insert($this->table, $data);
        }

        public function update($data,$id)
        {
            $this->db->update($this->table, $data, array('id' => $id));
        }

        public function delete($id)
        {
            return $this->db->delete($this->table, array("id" => $id));
        }
    }
