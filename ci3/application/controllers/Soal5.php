<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal5 extends CI_Controller
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
        $this->load->view('soal5_view');
    }

    public function hitungPajak()
    {
        // Get data dari view
        $total = $this->input->post('total');
        $persen_pajak = $this->input->post('persen_pajak');

        // Hitung pajak
        $pajak_rp = $total * $persen_pajak / 100;
        $net_sales = $total - $pajak_rp;

        // Mengembalikan data ke view
        $data = array(
            'net_sales' => $net_sales,
            'pajak_rp' => $pajak_rp
        );
        print_r(json_encode($data));
    }
}
