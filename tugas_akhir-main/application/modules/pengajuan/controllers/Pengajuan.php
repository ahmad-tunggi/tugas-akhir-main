<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends MX_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('m_pengajuan');
    }

    public function index(){
        $nim = nim($this->session->userdata('security')->id_cession);
        // var_dump($kd);die;
        $a['data'] = $this->m_pengajuan->getData($nim);
        $a['perihal'] = "Permohonan Penelitian";
        $bulan = date('n');
        $tahun = date('Y');
        $noterakhir = $this->m_pengajuan->getSurAkhir($bulan, $tahun);
        $noUrut = intval(substr($noterakhir['no_surat'], 0, 2)) + 1;
        $kode = sprintf("%02d", $noUrut);
        $a['nosurat'] = $kode."/"."PT.A1/". $this->m_pengajuan->ambilRomawi($bulan) . '/' . $tahun;
        $a['layout'] = 'v_pengajuan';
        $a['modules'] = 'pengajuan';
        echo Modules::run('template/backend', $a);
    }

    

    public function simpan_data(){
        $kd = nim($this->session->userdata('security')->id_cession);
        
        $id = $this->input->post('kd_surat');
        $bulan = date('n');
        $tahun = date('Y');
        $noterakhir = $this->m_pengajuan->getSurAkhir($bulan, $tahun);
        $noUrut = intval(substr($noterakhir['no_surat'], 0, 2)) + 1;
        $kode = sprintf("%02d", $noUrut);
        $romawi= $bulan;
        $data['no_surat'] = $kode."/"."PT.A1/". $this->m_pengajuan->ambilRomawi($romawi) . '/' . $tahun;
        $data['perihal'] = "Permohonan Penelitian";
        $data['tujuan_surat'] = $this->input->post('tujuan_surat');
        $data['lokasi_penelitian'] = $this->input->post('lokasi_penelitian');
        $data['nim'] = $kd;
        $data['judul'] = $this->input->post('judul');
        $data['tanggal_buat'] = date('Y-m-d');
        
        if($id == ""){
            $data['kd_surat'] = uuid_generator();
           
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
