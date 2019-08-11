<?php

    function check_field_value_exists( $table = null,  $where = [] )
    {
        $CI =& get_instance();
        $CI->load->model('m_core');

        $check = $CI->m_core->get_where($table, $where);
        if($check->num_rows() > 0)
        {
            return 1;
        }else{
            return 0;
        }
    }