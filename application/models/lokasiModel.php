<?php

    class lokasiModel extends CI_Model {

        private $table = "lokasi";

        public $nama;
        public $alamat;
        public $kategori;
        public $lat_coord;
        public $long_coord;

        public function getAll()
        {
            // return $this->db->query("SELECT lokasi.*, kategori.nama as nama_kategori, gambar.url as background FROM lokasi, kategori, gambar WHERE lokasi.kategori = kategori.id AND lokasi.gambar = gambar.id")->result();
            $this->db->select('lokasi.*, k.nama as nama_kategori, g.url as background');
            $this->db->join('kategori k', 'k.id = lokasi.kategori');
            $this->db->join('gambar g', 'g.id = lokasi.gambar', 'left');
            return $this->db->get($this->table)->result();
        }

        public function getKategori($kategori_id)
        {
            $this->db->select('lokasi.*, k.nama as nama_kategori, g.url as background');
            $this->db->join('kategori k', 'k.id = lokasi.kategori');
            $this->db->join('gambar g', 'g.id = lokasi.gambar', 'left');
            return $this->db->get_where($this->table, array('k.id' => $kategori_id))->result();
        }

        public function getLokasiKategori($kategori_id)
        {
            return $this->db->query("SELECT lokasi.*, kategori.nama as nama_kategori, gambar.url as background FROM lokasi, kategori, gambar WHERE lokasi.kategori = kategori.id AND gambar.id = lokasi.gambar AND lokasi.kategori = $kategori_id")->result();
        }

        public function getById($id)
        {
            return $this->db->query("SELECT lokasi.*, kategori.nama as nama_kategori, gambar.url as background FROM lokasi, kategori, gambar WHERE lokasi.kategori = kategori.id AND gambar.id = lokasi.gambar AND lokasi.id = $id")->row();
        }

        public function save()
        {
            $post = $this->input->post();
            $this->nama = $post["nama"];
            $this->alamat = $post["alamat"];
            $this->kategori = $post["kategori"];
            $this->lat_coord = $post["lat_coord"];
            $this->long_coord = $post["long_coord"];
            $this->deskripsi = $post["deskripsi"];
            $this->db->insert($this->table, $this);
        }

        public function update()
        {
            $post = $this->input->post();
            $this->nama = $post["nama"];
            $this->alamat = $post["alamat"];
            $this->kategori = $post["kategori"];
            $this->lat_coord = $post["lat_coord"];
            $this->long_coord = $post["long_coord"];
            $this->deskripsi = $post["deskripsi"];
            $this->db->update($this->table, $this, array('id' => $post["id"]));
        }

        public function background($dataLokasi, $where)
        {
            return $this->db->update($this->table, $dataLokasi, $where);
        }

        public function updateGambar($dataLokasi, $where)
        {
            return $this->db->update($this->table, $dataLokasi, $where);
        }

        public function delete($id)
        {
            return $this->db->delete($this->table, array("id" => $id));
        }
    }
