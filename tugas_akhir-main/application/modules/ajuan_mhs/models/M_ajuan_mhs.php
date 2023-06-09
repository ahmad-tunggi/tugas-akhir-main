<?php

class M_ajuan_mhs extends CI_Model
{
    //put your code here
    public function getData($kd_surat)
    {
        return $this->db->query('SELECT a.* , if((isnull(a.kd_surat))," disabled=\"disabled\" "," ") as ada FROM t_ajuan_mhs a  where a.kd_surat != "0" AND a.kd_surat="'.$kd_surat.'"  order by a.lvl_short desc')->result();
    }
    public function getDataDariSurat($nim=null,$lv=null)
    {
        $wh = "";
        if($lv == 8){
            $wh = " AND a.nim= '".$nim."' ";
        }elseif($lv >= 1 && $lv <= 7){
            $wh = " AND a.nim in (select nim from t_pa_final where md5(nik) = '".$nim."' ) ";

        }
        return $this->db->query('SELECT a.* , if((isnull(a.kd_surat))," disabled=\"disabled\" "," ") as ada 
        FROM t_surat_ajuan a 
        where a.kd_surat != "0"
        '.$wh.'
        group by a.kd_surat 
        ORDER BY `a`.`no_surat` desc');
    }
    public function save_data($data = array())
    {
        return $this->db->insert("t_ajuan_mhs", $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('pertanyaan', $id);
        return $this->db->delete('t_ajuan_mhs');
    }
    
}
