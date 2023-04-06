<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tb_transaksi extends MX_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('m_tb_transaksi');
        
    }

    public function index(){
        //$a['data'] = $this->m_tb_transaksi->getData();
        $a['layout'] = 'v_tb_transaksi';
        $a['modules'] = 'tb_transaksi';
        echo Modules::run('template/backend', $a);
    }

    public function add() {
        // Load model dan helper yang dibutuhkan
        $this->load->model('tb_transaksi_model');
        $this->load->helper('url');

        // Ambil bulan dan tahun sekarang
        $bulan = date('n');
        $tahun = date('Y');

        // Dapatkan kode transaksi terakhir pada bulan yang sama
        $last_kode_transaksi = $this->tb_transaksi_model->get_last_kode_transaksi($bulan, $tahun);
        $noUrut = intval(substr($last_kode_transaksi['kode_transaksi'], 0, 2)) + 1;

        // Buat nomor surat baru
        $kode = sprintf("%02d", $noUrut);
        $nomor_surat = $kode . '/SPD/' . getRomawi($bulan) . '/' . $tahun;

        // Siapkan data untuk ditambahkan ke database
        $data = array(
            'kode_transaksi' => $nomor_surat,
            'nama_transaksi' => $this->input->post('nama_transaksi'),
            'tanggal' => $this->input->post('tanggal')
        );

        // Tambahkan data ke database
        $this->tb_transaksi_model->add_transaksi($data);

        // Redirect ke halaman daftar transaksi
        redirect('transaksi/list');
    }
}
