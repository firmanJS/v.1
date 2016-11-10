<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		check_login();
	}
	public function index(){
		redirect($this->first_page());
	}

	public function not_found(){
		$data['web'] = $this->web_setting->get_all()->row();
		$this->load->view('errors/not_found',$data);
	}
}
