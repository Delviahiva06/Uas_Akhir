<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar_model extends CI_Model {
    public function get_kamar_kosong() {
        return $this->db->get_where('tb_kamar', ['status' => 'kosong'])->result();
    }
    public function get_all_kamar() {
        return $this->db->get('tb_kamar')->result();
    }
    public function get_kamar_by_id($id_kamar) {
        return $this->db->get_where('tb_kamar', ['id_kamar' => $id_kamar])->row();
    }
    // CRUD lainnya bisa ditambah sesuai kebutuhan
} 