<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

    function cekAuthInt($where)
    {
      $this->db->select('a.*')
               ->select('b.id_warehouse, b.nama_warehouse, b.alamat as alm_warehouse, b.telepon as telp_supplier, b.fax, b.tgl_reg_warehouse')
               ->select('c.*')

               ->from('user a')
               ->join('warehouse b', 'b.user = a.id_user', 'left')
               ->join('group c', 'c.id_group = b.group', 'left');

      if(!empty($where)){
        foreach($where as $key => $value){
            if($value != null){
                $this->db->where($key, $value);
            }
        }
      }
               
      $this->db->limit(1);
      return $this->db->get();
    }

    function updateAuthInt($where, $data)
    {
      return $this->db->where($where)->update('user', $data);
    }

    function cekAuthExt($where)
    {
      return $this->db->select('*')->from('pic')->where($where)->limit(1)->get();
    }

    function updateAuthExt($where, $data)
    {
      return $this->db->where($where)->update('pic', $data);
    }



}

?>
