<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghuni_model extends CI_Model {
    public function get_all_penghuni() {
        return $this->db->get('tb_penghuni')->result();
    }
    public function get_kamar_sebentar_lagi_bayar($batas_hari = 5) {
        $sql = "SELECT k.no_kamar, p.tgl_bayar_terakhir, p.nama
                FROM tb_penghuni p
                JOIN tb_kamar k ON p.id_kamar = k.id_kamar
                WHERE DATEDIFF(DATE_ADD(p.tgl_bayar_terakhir, INTERVAL 1 MONTH), CURDATE()) <= ?
                  AND DATEDIFF(DATE_ADD(p.tgl_bayar_terakhir, INTERVAL 1 MONTH), CURDATE()) > 0";
        return $this->db->query($sql, [$batas_hari])->result();
    }
    public function get_kamar_terlambat_bayar() {
        $sql = "SELECT k.no_kamar, p.tgl_bayar_terakhir, p.nama
                FROM tb_penghuni p
                JOIN tb_kamar k ON p.id_kamar = k.id_kamar
                WHERE DATE_ADD(p.tgl_bayar_terakhir, INTERVAL 1 MONTH) < CURDATE()";
        return $this->db->query($sql)->result();
    }
    // CRUD lainnya bisa ditambah sesuai kebutuhan
} 