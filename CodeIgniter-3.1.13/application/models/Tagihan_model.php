<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_model extends CI_Model {
    public function get_all_tagihan() {
        return $this->db->get('tb_tagihan')->result();
    }
    public function generate_tagihan($id_penghuni, $periode) {
        $data = [
            'id_penghuni' => $id_penghuni,
            'periode' => $periode,
            'status' => 'belum'
        ];
        $this->db->insert('tb_tagihan', $data);
        return $this->db->insert_id();
    }
    // CRUD lainnya bisa ditambah sesuai kebutuhan
} 