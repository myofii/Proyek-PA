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
        
        public function save()
        {
            $post = $this->input->post();
            $this->nama = $post["nama_kategori"];
            $this->db->insert($this->table, $this);
        }

        public function update()
        {
            $post = $this->input->post();
            $this->nama = $post["nama_kategori"];
            $this->db->update($this->table, $this, array('id' => $post['id']));
        }

        public function delete($id)
        {
            return $this->db->delete($this->table, array("id" => $id));
        }
    }
