<?php

class M_pengajuan extends CI_Model
{
    //put your code here
    public function getData()
    {
        return $this->db->query('SELECT a.* , if((!isnull(jp.id_pengajuan))," disabled=\"disabled\" "," ") as ada FROM m_pengajuan a left join t_jadwal_perkuliahan jp on (jp.id_pengajuan = a.id_pengajuan) where a.id_pengajuan != 0 group by a.id_pengajuan order by a.id_pengajuan asc')->result();
    }
    public function save_pengajuan($data = array())
    {
        return $this->db->insert("m_pengajuan", $data);
    }
    public function hapus_data($id)
    {
        $this->db->where('id_pengajuan', $id);
        return $this->db->delete('m_pengajuan');
    }
    public function update_data($where, $data)
    {
        $this->db->where(array('id_pengajuan' => $where));
        return $this->db->update('m_pengajuan', $data);
    }
}
