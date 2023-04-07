<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajuan_mhs extends MX_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('m_ajuan_mhs');
    }

    public function index(){
        $nim = NULL;
        $lv= $this->session->userdata('security')->lv;
        if($this->session->userdata('security')->lv == 8){
            $nim= nim($this->session->userdata('security')->id_cession);
        }
        if($this->session->userdata('security')->lv >= 1 && $this->session->userdata('security')->lv <= 7 ){
            $nim = $this->session->userdata('security')->id_cession;
        }
      $a['kd_surat'] = $this->m_ajuan_mhs->getDataDariSurat($nim)->row()->kd_surat;
    //   print_r($a['kd_surat']);die;
        $a['data'] = $this->m_ajuan_mhs->getData($a['kd_surat']);
        $a['layout'] = 'v_ajuan_mhs';
        $a['modules'] = 'ajuan_mhs';
        echo Modules::run('template/backend', $a);
    }

    public function simpan_data(){
        $nim = nim($this->session->userdata('security')->id_cession);
        $a['kd_surat'] = $this->m_ajuan_mhs->getDataDariSurat($nim)->row()->kd_surat;
        $data ['kd_surat'] = $a['kd_surat'];
        $data ['pertanyaan'] = $this->input->post('pertanyaan');
       
      
            $this->m_ajuan_mhs->save_data($data);
        
        redirect('ajuan_mhs/?id='.$data ['kd_surat']);
    }

    public function delete_data(){
        $dtdel = json_decode($_POST['id_del_arr']);
        // print_r($dtdel); die;
        foreach ($dtdel as $id){
            $this->m_ajuan_mhs->hapus_data($id);
        }
        redirect('ajuan_mhs/?id='.$data ['kd_surat']);
    }
}
