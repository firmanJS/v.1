<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_group extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		check_login();
	}

	function index(){
		$data = $this->data;
		$data['akses'] = $this->get_akses($this->id_user_group);
		$data['all'] =$this->objactiv->get_all('tbl_user_group')->result();
		$akses = $this->cek_akses($this->id_user_group);
		view('user_group/view',$data,$akses);
	}

	function form($id=0){
		$data = $this->data;
		$data['record'] = $this->objactiv->get_by_id('id',$id,'tbl_user_group')->row();
		$data['akses']	= $this->objactiv->get_by_id_user_group('id_user_group',$id,'tbl_user_akses')->result();
		$data['all'] =$this->menu->get_all()->result();

		foreach ($data['akses'] as $akses) {
			$data['view'][$akses->id_menu] = $akses->akses_view;
			$data['input'][$akses->id_menu] = $akses->akses_input;
			$data['edit'][$akses->id_menu] = $akses->akses_edit;
			$data['delete'][$akses->id_menu] = $akses->akses_delete;
		}

		foreach ($data['all'] as $all){
			$data['child'][$all->id] = $this->menu->get_all($all->id)->result();
		}

		$akses = ($id) ? $this->cek_akses($this->id_user_group,'edit') : $this->cek_akses($this->id_user_group,'input');

		view('user_management/user_group/form',$data,$akses);
	}

	function save(){
		$id = post('id');
		$data = array(
				'nama' => post('nama'),
				'keterangan' => post('keterangan'),
				'status' => post('status')
			);
		$id_menu = post('id_menu');
		$akses_view = post('akses_view');
		$akses_input = post('akses_input');
		$akses_edit = post('akses_edit');
		$akses_delete = post('akses_delete');

		if($id){
			$input = $this->objactiv->update('id',$id,'tbl_user_group',$data);
		}else{
			$input = $this->objactiv->insert('tbl_user_group',$data);
			$id = $input;
		}

		foreach ($id_menu as $idm) {
			$view = 0;
			$input = 0;
			$edit = 0;
			$delete = 0;
			if(isset($akses_view[$idm])) $view = 1;
			if(isset($akses_input[$idm])) $input = 1;
			if(isset($akses_edit[$idm])) $edit = 1;
			if(isset($akses_delete[$idm])) $delete = 1;
			$data2 = array(
					'id_user_group' => $id,
					'id_menu' => $idm,
					'akses_view' => $view,
					'akses_input' => $input,
					'akses_edit' => $edit,
					'akses_delete' => $delete
				);

			$cek = $this->objactiv->cek_akses('id_user_group','id_menu',$id,$idm,'tbl_user_akses')->row();
			if(isset($cek->id)){
				$this->objactiv->update_akses('id',$cek->id,'tbl_user_akses',$data2);
			}else{
				$this->objactiv->insert_akses('tbl_user_akses',$data2);
			}
		}

    if($input){
      sukses('Data Has Saved');
      redirect('user_management/user_group/index');
    }else{
      gagal('Data Cannot Save');
      redirect('user_management/user_group/index');
    }
	}

	function delete($id){
		$akses = $this->cek_akses($this->id_user_group,'delete');
		if ($akses == 1) {
			$user = $this->objactiv->get_by_id('id',$id,'tbl_user_group')->row();
			$delete = $this->objactiv->delete('id',$id,'tbl_user_group','id_user_group','tbl_user_akses');
			if($delete==!FALSE){
				sukses('Data Has Deleted');
				redirect('user_management/user_group');
			}else{
				gagal('Data Failed To Delete');
				redirect('user_management/user_group');
			}
		}else{
			gagal('Anda tidak punya akses');
			redirect('user_management/user_group');
		}
	}

}
