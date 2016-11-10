<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller
{

	function index(){
		if($this->session->userdata('user_id')){
			redirect('home');
		}else{
			$this->load->view('login');
		}
	}
	
	function do_login(){
		$username = post('username');
		$password = md5(post('password'));
		$check_login = $this->objactiv->check_login($username,$password)->row();
		if(isset($check_login->id)){
			sukses('Login Success');
			$this->session->set_userdata('user_id',$check_login->id);
			redirect('home');
		}else{
			gagal('Invalid Username or Password');
			redirect('auth');
		}
	}

	function logout(){
		$this->session->unset_userdata('user_id');
		redirect('auth');
	}

}
