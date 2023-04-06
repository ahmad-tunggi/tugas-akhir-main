<?php

class M_pengajuan2 extends CI_Model
{
    //put your code here
    public function getData()
    {
    
       

            return $this->db->query('SELECT a.* , if((isnull(a.kd_surat))," disabled=\"disabled\" "," ") as ada FROM t_surat_ajuan a  where a.kd_surat != "0" group by a.kd_surat order by a.tanggal_buat desc')->result();
        
    }
}