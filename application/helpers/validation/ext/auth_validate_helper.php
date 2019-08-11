<?php

    function validate_form_auth()
    {
        $CI =& get_instance();
        $CI->load->library('form_validation');

        $config = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim'
            )
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() === FALSE)
        {
            return false;
        }else{
            return true;
        }
    }

    function validate_form_invoice()
    {
        $CI =& get_instance();
        $CI->load->library('form_validation');

        $config = array(
            array(
                'field' => 'order',
                'label' => 'order',
                'rules' => 'required'
            ),
            array(
                'field' => 'status_invoice',
                'label' => 'status_invoce',
                'rules' => 'required'
            ),
            array(
                'field' => 'tgl_invoice',
                'label' => 'tgl_invoice',
                'rules' => 'required'
            ),
            array(
                'field' => 'tgl_tempo',
                'label' => 'tgl_tempo',
                'rules' => 'required'
            )
        );
        $CI->form_validation->set_rules($config);
        if($CI->form_validation->run() === FALSE)
        {
            return false;
        }else{
            return true;
        }
    }

    function validate_form_shipping()
    {
        $CI =& get_instance();
        $CI->load->library('form_validation');

        $config = array(
            array(
                'field' => 'invoice',
                'label' => 'invoice',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'tgl_shipping',
                'label' => 'tgl_shipping',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'status_shipping',
                'label' => 'status_shipping',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'tgl_recieve',
                'label' => 'tgl_recieve',
                'rules' => 'required'
            )
        );
        $CI->form_validation->set_rules($config);

        if($CI->form_validation->run() === FALSE)
        {
            return false;
        }else{
            return true;
        }
    }

    