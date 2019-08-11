<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Auth extends CI_Controller {

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    } 

    function __construct()
    {
        parent::__construct();
        $this->__resTraitConstruct();
        $this->load->helper(['jwt', 'authorization']);
        $this->load->helper('model/check_db');
        $this->load->helper('validation/ext/auth_validate_helper');

    }

    public function index_post()
    {
        if(!validate_form_auth()){
            $res['errors'] = $this->form_validation->error_array();
            $res['status'] = false;
            $this->response($res, 400);
            return;
        }

        $where['username'] = $this->input->post('username');
        $where['password'] = $this->input->post('password');

        $from_resource = $this->AuthModel->cekAuthExt($where);

        if($from_resource->num_rows() == 0) {
            $res['status'] = false;
            $res['error']  = 'Username Not Found';
            $this->response($res, 404);
            return;
        }

        $auth  = $from_resource->row();
        $res['token'] = AUTHORIZATION::generateToken($auth);
        $res['status'] = true;
        $this->response($res, 200); 
    }

    public function whoAmI_get()
    {
        $data = $this->verify_request();
        $res['data']   =  $data;
        $res['status'] = true;
        $this->response($res, 200);
        
    }

    private function verify_request()
    {
        //get all the headers 
        try{
            $headers = $this->input->request_headers();
            $token   = $headers['SCM-INT-KEY'];
            if(!$token) {
                $res    = ['status' => false, 'msg' => 'Unauthorized access!'];
                $this->response($res, 401);
                return;
            }

            $data = AUTHORIZATION::validateToken($token);
            if($data === false){
                $res    = ['status' => false, 'msg' => 'Unauthorized accesss'];
                $this->response($res, 401);
                exit();
            }else{
                return $data;
            }

        }catch(Exception $e){
            
            $res    = ['status' => false, 'msg' => 'Unauthorized access!'];
            $this->response($res, 401);
        }
    }

    


}