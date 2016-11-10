<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Menu_model extends CI_Model
	{

		function insert($data){
			return $this->db->insert('tbl_menu',$data);
		}

		function update($id, $data){
			$this->db->where('id',$id);
			return $this->db->update('tbl_menu',$data);
		}

		function get_by_id($id){
			$this->db->where('id',$id);
			return $this->db->get('tbl_menu');
		}

		function get_parent(){
			$this->db->where('parent_id',0);
			return $this->db->get('tbl_menu');
		}

		function get_all($parent_id=0){
			$this->db->order_by('urutan');
			$this->db->where('parent_id',$parent_id);
			return $this->db->get('tbl_menu');
		}

		function delete($id){
			$this->db->where('id',$id);
			return $this->db->delete('tbl_menu');
		}

		function get_icon(){
			return $this->db->get('tbl_fa_icon');
		}
	}
