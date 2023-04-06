<?php

class M_pengajuan extends CI_Model
{
    //put your code here
    public function getData($nim)
    {
        return $this->db->query('SELECT a.* , if((isnull(a.kd_surat))," disabled=\"disabled\" "," ") as ada FROM t_surat_ajuan a where a.kd_surat != "0" AND a.nim="'.$nim.'" group by a.kd_surat ORDER BY `a`.`no_surat` desc')->result();
    }
function getSurAkhir($bulan,$tahun){
    $this->db->select_max('no_surat');
        $this->db->where('MONTH(tanggal_buat)', $bulan);
        $this->db->where('YEAR(tanggal_buat)', $tahun);
        $query = $this->db->get('t_surat_ajuan');
        return $query->row_array();
}

public function ambilRomawi($ngeh){
    switch ($ngeh){
        case 1: 
            return "I";
        break;
        case 2:
            return "II";
        break;
        case 3:
            return "III";
        break;
        case 4:
            return "IV";
        break;
        case 5:
            return "V";
        break;
        case 6:
            return "VI";
        break;
        case 7:
            return "VII";
        break;
        case 8:
            return "VIII";
        break;
        case 9:
            return "IX";
        break;
        case 10:
            return "X";
        break;
        case 11:
            return "XI";
        break;
        case 12:
            return "XII";
        break;
    }
}
    public function save_pengajuan($data = array())
    {
        return $this->db->insert("t_surat_ajuan", $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('kd_surat', $id);
        return $this->db->delete('t_surat_ajuan');
    }
    public function update_data($where, $data)
    {
        $this->db->where(array('kd_surat' => $where));
        return $this->db->update('t_surat_ajuan', $data);
    }
}
