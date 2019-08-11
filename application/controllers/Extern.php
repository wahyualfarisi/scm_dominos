<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extern extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('ext/main');
	}
	
	public function dashboard()
	{
		$this->load->view('ext/dashboard');
	}
	
	public function invoice()
	{
		$this->load->view('ext/invoice');
	}
	public function shipping()
	{
		$this->load->view('ext/shipping');
	}
	public function order()
	{
		$this->load->view('ext/order');
	}

	public function payment()
	{
		$this->load->view('ext/payment');
	}

	public function recap_hutang()
	{
		$this->load->view('ext/recap_hutang');
	}

	public function add_invoice()
	{
		$this->load->view('ext/add_invoice');
	}
}
