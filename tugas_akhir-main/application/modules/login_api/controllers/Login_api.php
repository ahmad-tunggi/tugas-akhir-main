<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require APPPATH . `libraries/RestController.php`;

use chriskacerguis\RestServer\RestController;


class Login_api extends RestController
{
	public function __construct() {
        parent::__construct();
        $this->load->model('m_login');
    } 
// 	public function index_post() {
//         $username = $this->post('username');
//         $password = $this->post('password');

//         $cekLogin = $this->m_login->cekLogin($username, $password);
//         if ($cekLogin) {
//             if ($cekLogin->status == '1') {
//                 $this->response(['status' => true, 'message' => 'Berhasil login', 'data' => $cekLogin], RESTController::HTTP_OK);
//             } elseif($cekLogin->status == '0') {
//                 $this->response(['status' => false, 'message' => 'Maaf, username belum aktif'], RESTController::HTTP_OK);
//             } else {
//                 $this->response(['status' => false, 'message' => 'Data belum lengkap'], RESTController::HTTP_OK);
//             }
//         } else {
//             $this->response(['status' => false, 'message' => 'Maaf, username atau password salah'], RESTController::HTTP_OK);
//         }
// 		echo json_decode($resulut);	
//     }
// }
	public function index_post()
    {
        $username = $this->post('username');
        $password = $this->post('password');

        $ceklogin = $this->m_login->ceklogin($username, $password);

        if ($ceklogin) {
            if ($ceklogin->status == '1') {
                $this->response(array(
                    'status' => true,
                    'message' => 'Login success',
                    'data' => $ceklogin
                ), RESTController::HTTP_OK);
            } elseif ($ceklogin->status == '0') {
                $this->response(array(
                    'status' => false,
                    'message' => 'User is not active'
                ), RESTController::HTTP_BAD_REQUEST);
            } else {
                $this->response(array(
                    'status' => false,
                    'message' => 'Incomplete data'
                ), RESTController::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response(array(
                'status' => false,
                'message' => 'Invalid username or password'
            ), RESTController::HTTP_BAD_REQUEST);
        }
		
    }
}