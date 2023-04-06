<?php
defined('BASEPATH') or exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;

class Pengajuan2 extends RestController
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('m_pengajuan2', 'pngj');
	}
	public function index_get()
	{
		// $pngj = $this->pngj->getData();
		// if ($pngj){
		// 	$this->response([
		// 		'status' => true,
		// 		'data' => '$p'
		// 	], REST_Controller::HTTP_OK);
		// }
		$list = $this->pngj->getData();
		$this->response(['status'=>true,'data'=> $list],RestController::HTTP_OK);
	}
}
