<?php

class M_tb_transaksi extends CI_Model
{
    //put your code here
      // Mendapatkan kode transaksi terakhir pada bulan yang sama
      public function get_last_kode_transaksi($bulan, $tahun) {
        $this->db->select_max('kode_transaksi');
        $this->db->where('MONTH(tanggal)', $bulan);
        $this->db->where('YEAR(tanggal)', $tahun);
        $query = $this->db->get('tb_transaksi');
        return $query->row_array();
    }

    // Menambahkan data transaksi baru
    public function add_transaksi($data) {
        $this->db->insert('tb_transaksi', $data);
    }

}
