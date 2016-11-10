<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Core_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_menu($id_user_group=0){
		$this->db->where('id_user_group',$id_user_group);
		$this->db->where('akses_view',1);
		$user_akses = $this->db->get('tbl_user_akses')->result();

		$id_menu = array(0);
		foreach ($user_akses as $ua) {
			$id_menu[] = $ua->id_menu;
		}

		$this->db->where_in('id',$id_menu);
		$this->db->where('parent_id',0);
		$this->db->order_by('urutan');
		$data['menu'] = $this->db->get('tbl_menu')->result();
		foreach ($data['menu'] as $m) {
			$this->db->where_in('id',$id_menu);
			$this->db->where('parent_id',$m->id);
			$this->db->order_by('urutan');
			$data['submenu'][$m->id] = $this->db->get('tbl_menu')->result();
		}
		return $data;
	}

	function get_akses($idug,$idm){
		$this->db->where('id_user_group',$idug);
		$this->db->where('id_menu',$idm);
		return $this->db->get('tbl_user_akses');
	}

	function get_first_page($idug){
		$this->db->where('id_user_group',$idug);
		$this->db->where('akses_view',1);
		$user_akses = $this->db->get('tbl_user_akses')->result();

		$id_menu = array(0);
		foreach ($user_akses as $ua) {
			$id_menu[] = $ua->id_menu;
		}

		$this->db->where_in('id',$id_menu);
		$this->db->where('parent_id',0);
		$this->db->order_by('urutan');
		$menu = $this->db->get('tbl_menu')->row();

		if(isset($menu->id)){
			$this->db->where_in('id',$id_menu);
			$this->db->where('parent_id',$menu->id);
			$this->db->order_by('urutan');
			$submenu = $this->db->get('tbl_menu')->row();

			if(isset($submenu->id)){
				return $menu->target.'/'.$submenu->target;
			}else{
				return $menu->target;
			}
		}else{
			return 'auth/logout';
		}
	}
}
