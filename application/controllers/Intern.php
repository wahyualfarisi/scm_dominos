<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intern extends CI_Controller {

	function index()
	{
		$this->load->view('int/app');
	}

	function main($level){
		$this->load->view('int/container/'.$level);
	}

	function dashboard($level){
		$this->load->view('int/dashboard/'.$level);
	}

	function user($param = null){
		if($param == null){
			$this->load->view('int/user/data');
		} else {
			switch ($param) {
				case 'add':
					$this->load->view('int/user/add');
					break;
				case 'edit':
					$this->load->view('int/user/edit');
					break;
				default:
					$this->load->view('int/user/detail');
			}
		}
	}

	function warehouse($param = null){
		if($param == null){
			$this->load->view('int/warehouse/data');
		} else {
			switch ($param) {
				case 'add':
					$this->load->view('int/warehouse/add');
					break;
				case 'edit':
					$this->load->view('int/warehouse/edit');
					break;
				default:
					$this->load->view('int/warehouse/detail');
			}
		}
	}

	function supplier($param = null){
		if($param == null){
			$this->load->view('int/supplier/data');
		} else {
			switch ($param) {
				case 'add':
					$this->load->view('int/supplier/add');
					break;
				case 'edit':
					$this->load->view('int/supplier/edit');
					break;
				default:
					$this->load->view('int/supplier/detail');
			}
		}
	}
    
}
