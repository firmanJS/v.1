<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends MY_Controller
{
	function index(){
		$data = $this->data;
		$this->load->view('errors/forbidden',$data);
	}
}
