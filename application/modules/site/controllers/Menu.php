<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		check_login();
	}

	function index(){
		$data = $this->data;
		$data['all'] =$this->objactiv->get_all_menu()->result();
		foreach ($data['all'] as $all){
			$data['child'][$all->id] = $this->objactiv->get_all_menu($all->id)->result();
		}
		$akses = $this->cek_akses($this->id_menu);

		view('menu/view',$data,$akses);
	}

	function form($id=0){
		$data = $this->data;
		$data['parent'] = $this->objactiv->get_parent()->result();
		$data['record'] = $this->objactiv->get_by_id('id',$id,'tbl_menu')->row();
		$data['icon']		= $this->objactiv->get_all('tbl_fa_icon')->result();
		$akses = ($id) ? $this->cek_akses($this->id_menu,'edit') : $this->cek_akses($this->id_menu,'input');

		view('site/menu/form',$data,$akses);
	}

	function save(){
		$id = post('id');
		$data = input();
		$data['akses_view'] = 1;

		if( post('akses_input') ){
			$data['akses_input'] = post('akses_input');
		}else{
			$data['akses_input'] = 0;
		}

		if( post('akses_edit') ){
			$data['akses_edit'] = post('akses_edit');
		}else{
			$data['akses_edit'] = 0;
		}

		if( post('akses_delete') ){
			$data['akses_delete'] = post('akses_delete');
		}else{
			$data['akses_delete'] = 0;
		}

		//--------------- CARA SINGKAT IF ----------------------//

		// $data['akses_input'] = (post('akses_input')) ? post('akses_input') : 0;
		// $data['akses_edit'] = (post('akses_edit')) ? post('akses_edit') : 0;
		// $data['akses_delete'] = (post('akses_delete')) ? post('akses_delete') : 0;

		if($id){
			$input = $this->objactiv->update('id',$id,'tbl_menu',$data);
		}else{
			$input = $this->objactiv->insert_('tbl_menu',$data);
		}

    if($input==TRUE){
      sukses('Data Has Changed');
      redirect('site/menu/index');
    }else{
      gagal('Data Cannot Save');
      redirect('site/menu/add');
    }
	}

	function delete($id){
		$delete = $this->objactiv->delete_('id','tbl_menu',$id);
		if($delete==TRUE){
			sukses('Data Has Deleted');
			redirect('site/menu');
		}else{
			gagal('Data Failed To Delete');
			redirect('site/menu');
		}
	}

}
