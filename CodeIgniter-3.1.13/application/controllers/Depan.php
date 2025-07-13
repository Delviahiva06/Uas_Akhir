<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kamar_model');
        $this->load->model('Penghuni_model');
    }
    public function index() {
        $data['kamar_kosong'] = $this->Kamar_model->get_kamar_kosong();
        $data['kamar_segera_bayar'] = $this->Penghuni_model->get_kamar_sebentar_lagi_bayar();
        $data['kamar_terlambat'] = $this->Penghuni_model->get_kamar_terlambat_bayar();
        $this->load->view('depan', $data);
    }
} 