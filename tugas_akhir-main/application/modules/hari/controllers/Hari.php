<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pengajuan extends MX_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('m_pengajuan');
    }

    public function index(){
        $a['data'] = $this->m_pengajuan->getData();
        $a['layout'] = 'v_pengajuan';
        $a['modules'] = 'pengajuan';
        echo Modules::run('template/backend', $a);
    }

    public function simpan_data(){
        $id = $this->input->post('id_pengajuan');
        $data['pengajuan'] = $this->input->post('pengajuan');
        
        if($id == ""){
            $data['id_pengajuan'] = auto_inc("id_pengajuan", "m_pengajuan");
            $this->m_pengajuan->save_pengajuan($data);
        }else{
            $this->m_pengajuan->update_data($id, $data);
        }
        redirect('id='.md5('pengajuan'));
    }

    public function delete_data(){
        $dtdel = json_decode($_POST['id_del_arr']);
        foreach ($dtdel as $id){
            $this->m_pengajuan->hapus_data($id);
        }
        redirect('id='.md5('pengajuan'));
    }
}
