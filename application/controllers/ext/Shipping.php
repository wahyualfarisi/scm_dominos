<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Shipping extends CI_Controller {

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    } 

    function __construct()
    {
        parent::__construct();
        $this->__resTraitConstruct();
        $this->load->helper(
            [
                'jwt', 
                'authorization',
                'validation/ext/auth_validate'
            ]);
        $this->load->helper('model/check_db');
        $this->load->model(['m_core','ShippingModel']);
        $this->token = $this->verify_request();
    }


    public function index_get()
    {
        if($this->token){
            $data = $this->token;
            try{
                $where['supplier'] = $data->supplier;
                $data_shipping = $this->ShippingModel->show($where);
                
                $res['status'] = true;
                $res['data']   = $data_shipping->result();
                $this->response($res, 200);
            }catch(Exception $e){
                $res['status'] = false;
                $res['msg']    = 'Internal Server Error';
                $this->response($res, 500);
            }
        }
    }

    public function index_post()
    {
        if($this->token)
        {
            if(!validate_form_shipping() ){
                $res['status'] = false;
                $res['errors'] = $this->form_validation->error_array();
                $this->response($res, 400);
                return;
            }

            try{
               $data_shipping['no_shipping'] = $this->generateCodeShipping();
               $data_shipping['invoice'] = $this->input->post('invoice');
               $data_shipping['tgl_shipping'] = $this->input->post('tgl_shipping');
               $data_shipping['status_shipping'] = $this->input->post('status_shipping');
               $data_shipping['tgl_recieve'] = $this->input->post('tgl_recieve');

               $insert = $this->m_core->add_data('shipping', $data_shipping);
               if(!$insert){
                   $res['status'] = false;
                   $res['msg']    = 'Gagal Menambahkan Shipping';
                   $this->response($res, 200);
                   return; 
               }

               $res['status'] = true;
               $res['msg']    = 'Berhasil Menambahkan Shipping';
               $this->response($res, 200);

            }catch(Exception $e){
                $res['status'] = false;
                $res['msg']    = 'Internal Server Error';
                $this->response($res, 400);
            }

        }
    }

    public function delete_delete($id)
    {
        if($this->token)
        {
            if(!$id){
                $res['status'] = false;
                $res['msg']    = 'Parameter ID is required';
                $this->response($res, 400);
                return;
            }

            $where_shipping['no_shipping'] = $id;

            if(check_field_value_exists('shipping', $where_shipping) == 0){
                $res['status'] = false;
                $res['msg']    = 'ID Not Found on Database';
                $this->response($res, 404);
                return;
            }

            try{
                
                $delete = $this->m_core->delete_rows('shipping', $where_shipping);
                if(!$delete){
                    $res['status'] = false;
                    $res['msg']    = 'Gagal Menghapus Data';
                    $this->response($res, 404);
                    return;
                }

                $res['status'] = true;
                $res['msg']    = 'Berhasil Menghapus Data';
                $this->response($res, 200);

            }catch(Exception $e){
                $res['status'] = false;
                $res['msg']    = 'Internal Server Error';
                $this->response($res, 500);
            }




        }
    }


    public function generateCodeShipping()
    {
        $data   = $this->m_core->autoNumber('no_shipping', 'shipping');
        $kode   = $data->result()[0]->maxKode;
        $nourut = (int) substr($kode, 4, 4);
        $nourut++;
        
        $char  = 'SHP';
        $newID = $char . sprintf('%05s', $nourut);
        return $newID;
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