<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal6 extends CI_Controller
{
    // GET/POST
    // Menghitung total harga sebelum pajak
    // Menampilkan besaran pajak
    public function __construct()
    {
        parent::__construct();
        // Load base_url
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('soal6_view');
    }

    public function bagiHasil()
    {
        // Get data dari view
        $harga_sebelum_markup = $this->input->post('harga_sebelum_markup');
        $markup_persen = $this->input->post('markup_persen');
        $share_persen = $this->input->post('share_persen');

        // Perhitungan harga
        $markup_harga = $harga_sebelum_markup * $markup_persen / 100;
        $harga = $harga_sebelum_markup + $markup_harga;
        $share_ojol = $harga * $share_persen / 100;

        // Pembagian share
        $data = array(
            'net_untuk_resto' => $harga - $share_ojol,
            'share_untuk_ojol' => $share_ojol
        );

        print_r(json_encode($data));
    }
}
