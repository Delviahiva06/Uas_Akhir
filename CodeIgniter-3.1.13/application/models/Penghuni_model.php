<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghuni_model extends CI_Model {
    public function get_all_penghuni() {
        return $this->db->get('tb_penghuni')->result();
    }
    public function get_kamar_sebentar_lagi_bayar($batas_hari = 5) {
        // Kolom yang ada: tb_kamar (id, nomor, harga), tb_penghuni (id, nama, no_ktp, no_hp, tgl_masuk, tgl_keluar)
        // Tidak ada tgl_bayar_terakhir, gunakan tgl_masuk sebagai contoh jatuh tempo
        $sql = "SELECT k.nomor, p.tgl_masuk, p.nama
                FROM tb_penghuni p
                JOIN tb_kamar k ON p.id = k.id
                WHERE DATEDIFF(DATE_ADD(p.tgl_masuk, INTERVAL 1 MONTH), CURDATE()) <= ?
                  AND DATEDIFF(DATE_ADD(p.tgl_masuk, INTERVAL 1 MONTH), CURDATE()) > 0";
        return $this->db->query($sql, [$batas_hari])->result();
    }
    public function get_kamar_terlambat_bayar() {
        $sql = "SELECT k.nomor, p.tgl_masuk, p.nama
                FROM tb_penghuni p
                JOIN tb_kamar k ON p.id = k.id
                WHERE DATE_ADD(p.tgl_masuk, INTERVAL 1 MONTH) < CURDATE()";
        return $this->db->query($sql)->result();
    }
    // CRUD lainnya bisa ditambah sesuai kebutuhan
} 