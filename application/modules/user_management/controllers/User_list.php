<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_list extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		check_login();
	}

	function index(){
		$data = $this->data;
		$data['akses'] = $this->get_akses($this->id_user_list);
		$data['all'] =$this->objactiv->get_all_()->result();
		$akses = $this->cek_akses($this->id_user_list);
		view('user_list/view',$data,$akses);
	}

	function form($id=0){
		$data = $this->data;
		$akses = ($id) ? $this->cek_akses($this->id_user_list,'edit') : $this->cek_akses($this->id_user_list,'input');
		$data['record'] = $this->objactiv->get_by_id('id',$id,'tbl_user')->row();
		$data['group']	= $this->objactiv->get_group()->result();
		view('user_management/user_list/form',$data,$akses);
	}

	function save(){
		$id = post('id');
		$data = input();

		// -----------------start upload new foto-------------------
		$config['upload_path']   = 'gbr/user/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);
    $upload1        = $this->upload->do_upload('foto');
    $file1          = $this->upload->data();
    $foto 					= $file1['file_name'];

    if($file1){
      $config2['image_library']    = 'gd2';
      $config2['source_image']     = 'gbr/user/'.$foto;
      $config2['maintain_ratio']   = TRUE;
      $config2['width']            = 500;
      $config2['height']           = 500;

      $this->load->library('image_lib', $config2);
      $this->image_lib->resize();
    }
    if($foto){
    	if($id && $data['foto2'] != 'default.png'){
    		@unlink('gbr/user/'.$data['foto2']);
    	}
    	$data['foto'] = $foto;
    }else{
    	$data['foto'] = $data['foto2'];
    }
    unset($data['foto2']);
    // ----------------END UPLOAD FOTO-----------------------

		if($id){
			$input = $this->objactiv->update('id',$id,'tbl_user',$data);
		}else{
			$input = $this->objactiv->insert_('tbl_user',$data);
		}
    if($input==TRUE){
      sukses('Data Has Saved');
      redirect('user_management/user_list/index');
    }else{
      gagal('Data Cannot Save');
      redirect('user_management/user_list/add');
    }
	}

	function delete($id){
		$akses = $this->cek_akses($this->id_user_list,'delete');
		if ($akses == 1) {
			$user = $this->objactiv->get_by_id('id',$id,'tbl_user')->row();
			$delete = $this->objactiv->delete_('id','tbl_user',$id);
			if($delete==TRUE){
				if($user->foto != 'default.png'){
					@unlink('gbr/user/'.$user->foto);
				}
				sukses('Data Has Deleted');
				redirect('user_management/user_list');
			}else{
				gagal('Data Failed To Delete');
				redirect('user_management/user_list');
			}
		}else{
			gagal('Anda tidak punya akses');
			redirect('user_management/user_list');
		}
	}
}
