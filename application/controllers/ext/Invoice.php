<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Invoice extends CI_Controller {

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    } 

    function __construct()
    {
        parent::__construct();
        $this->__resTraitConstruct();
        $this->load->helper(['jwt', 'authorization']);
        $this->load->helper('validation/ext/auth_validate');
        $this->load->helper('model/check_db');
        $this->load->model('m_core');
        $this->load->model('InvoiceModel');
        $this->token = $this->verify_request();
    }


    public function index_get()
    {
        if($this->token)
        {
            $data = $this->token;
            $where_supplier['id_supplier'] = $data->supplier;

            $data_invoice = $this->InvoiceModel->show($where_supplier);

            $invoice = array();
            
            foreach($data_invoice->result() as $key)
            {
                $json = array();

                $json['no_invoice']     = $key->no_invoice;
                $json['order']          = $key->order;
                $json['status_invoice'] = $key->status_invoice;
                $json['tgl_invoice']    = $key->tgl_invoice;
                $json['tgl_tempo']      = $key->tgl_tempo;

                $json['order']          = array(
                                            'no_order'     => $key->no_order,
                                            'warehouse'    => $key->warehouse,
                                            'supplier'     => $key->supplier,
                                            'status_order' => $key->status_invoice,
                                            'tgl_order'    => $key->tgl_order
                );

                $json['warehouse']      = array(
                                            'id_warehouse'      => $key->id_warehouse,
                                            'group'             => $key->group,
                                            'user'              => $key->user,
                                            'nama_warehouse'    => $key->nama_warehouse,
                                            'alamat'            => $key->alamat,
                                            'telepon'           => $key->telepon,
                                            'fax'               => $key->fax,
                                            'email'             => $key->email,
                                            'tgl_reg_warehouse' => $key->tgl_reg_warehouse
                );

                $json['supplier']       = array(
                                            'id_supplier' => $key->id_supplier,
                                            'nama_supplier' => $key->nama_supplier,
                                            'alamat' => $key->alamat,
                                            'telepon' => $key->telepon,
                                            'fax' => $key->fax,
                                            'npwp' => $key->npwp,
                                            'email' => $key->email,
                                            'tgl_reg_supplier' => $key->tgl_reg_supplier,
                                            'status_supplier' => $key->status_supplier
                );

                $json['invoice_detail'] = array();
                
                $where_detail_supplier['invoice'] = $key->no_invoice;
                
                $data_invoice_detail = $this->m_core->get_where('invoice_detail', $where_detail_supplier);

                foreach($data_invoice_detail->result() as $key1){
                    $json_det_invo = array();

                    $json_det_invo['deskripsi'] = $key1->deskripsi;
                    $json_det_invo['harga']     = $key1->harga;
                    $json_det_invo['qty']       = $key1->qty;
                    $json_det_invo['ppn']       = $key1->ppn;
                    
                    $json['invoice_detail'][] = $json_det_invo;
                }
                
                $invoice[] = $json;
            }
            $this->response($invoice, 200);

        }
    }

    public function index_post()
    {
        if(!$this->token){
            $res['status'] = false;
            $res['msg']    = 'Authorized Denied';
            $this->response($res, 401);
            return;
        }

        if(!validate_form_invoice()){
            $res['status'] = false;
            $res['errors'] = $this->form_validation->error_array();
            $this->response($res, 400);
            return;
        }

        try{
            $no_invoice = $this->generateCodeInvoice();
            $count = count($this->input->post('deskripsi')) ? count($this->input->post('deskripsi')) : 0;
            $data = array(
                'no_invoice' => $no_invoice,
                'order' => $this->input->post('order'),
                'status_invoice' => $this->input->post('status_invoice'),
                'tgl_invoice' => $this->input->post('tgl_invoice'),
                'tgl_tempo' => $this->input->post('tgl_tempo')
            );
    
            $insert = $this->m_core->add_data('invoice', $data);
            if(!$insert){
                $res['status'] = false;
                $res['msg']    = 'Gagal Insert';
                $this->response($res, 400);
                return;
            }

            for($i = 0; $i<$count; $i++)
            {
                $invoive_detail = array(
                    'invoice' => $no_invoice,
                    'deskripsi' => $this->input->post('deskripsi')[$i],
                    'harga' => $this->input->post('harga')[$i],
                    'qty' => $this->input->post('qty')[$i],
                    'ppn' => $this->input->post('ppn')[$i],
                    'total_harga' => $this->input->post('total_harga')[$i]
                );
                $insert_detail = $this->m_core->add_data('invoice_detail', $invoive_detail);
            }
            
            if(!$insert_detail){
                $res['status'] = false;
                $res['msg']    = 'Gagal Menambahkan Detail Invoice';
                $this->repsonse($res, 400);
                return;
            }

            $res['status'] = true;
            $res['msg']    = 'Berhasil Menambahkan Invoice';
            $this->response($res, 200);
    

        }catch(Exception $e){
            $res['status'] = false;
            $res['msg']    = 'Internal Server Error';
            $this->response($res, 500);
        }
           
    }

    public function delete_delete($id)
    {
        if(!$this->token){
            $res['status'] = false;
            $res['msg']    = 'Authorized denied';
            $this->response($res, 200);
            return;
        }

        if(!$id){
            $res['status'] = false;
            $res['msg']    = 'Parameter is required';
            $this->response($res, 400);
            return;
        }

        try{
            $where['no_invoice'] = $id;

            if(check_field_value_exists('invoice', $where) == 0){
                $res['status'] = 'false';
                $res['msg']    = 'No Invoice Tidak Ada';
                $this->response($res, 404);
                return;
            }

            $delete = $this->m_core->delete_rows('invoice', $where);
            if(!$delete){
                $res['status'] = false;
                $res['msg']    = 'Gagal Menghapus Invoice';
                $this->response($res, 400);
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

    public function edit_put()
    {
        
    }

    public function generateCodeInvoice()
    {
        $data   = $this->m_core->autoNumber('no_invoice', 'invoice');
        $kode   = $data->result()[0]->maxKode;
        $nourut = (int) substr($kode, 4, 4);
        $nourut++;
        
        $char  = 'INV';
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