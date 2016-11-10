<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		check_login();
	}

	function index(){
		$data = $this->data;
		$data['akses'] = $this->get_akses($this->id_user_group);
		$akses = $this->cek_akses($this->id_dashboard);
		view('dashboard/view',$data,$akses);
	}
}
