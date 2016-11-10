<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		check_login();
	}

	function index(){
		$data = $this->data;
		$sess = $this->session->userdata('user_id');
		$data['record'] = $this->objactiv->get_by_id('id',$sess,'tbl_user')->row();
		$data['group']	= $this->objactiv->get_group()->result();
		$akses = $this->cek_akses($this->id_user_profil);
		view('user/profil',$data,$akses);
	}
}
