<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Active_model extends CI_Model
	{
		function get_all($table){
			return $this->db->get($table);
		}

		function get_all_menu($parent_id=0){
			$this->db->order_by('urutan');
			$this->db->where('parent_id',$parent_id);
			return $this->db->get('tbl_menu');
		}

		function get_all_(){
			$this->db->select('tbl_user.*,tbl_user_group.nama as nm_group');
			$this->db->join('tbl_user_group','tbl_user.id_group=tbl_user_group.id','LEFT');
			return $this->db->get('tbl_user');
		}

		function get_group(){
			$this->db->where('status',1);
      return $query = $this->db->get('tbl_user_group');
		}

		function get_parent(){
			$this->db->where('parent_id',0);
			return $this->db->get('tbl_menu');
		}

		function get_by_id($idnya,$id,$table){
			$this->db->where($idnya,$id);
			return $this->db->get($table);
		}

		function insert($table,$data){
			$this->db->insert($table,$data);
			return $this->db->insert_id();
		}

		function insert_($tabel,$data){
			return $this->db->insert($tabel,$data);
		}

		function update($idnya,$id,$table,$data){
			$this->db->where($idnya,$id);
			return $this->db->update($table,$data);
		}

		function cek_akses($idnya,$idnya1,$idug,$idm,$table){
			$this->db->where($idnya,$idug);
			$this->db->where($idnya1,$idm);
			return $this->db->get($table);
		}

		function insert_akses($table,$data){
			return $this->db->insert($table,$data);
		}

		function update_akses($id,$idua,$table,$data2){
			$this->db->where($id,$idua);
			return $this->db->update($table,$data2);
		}

		function get_by_id_user_group($idnya,$idug,$table){
			$this->db->where($idnya,$idug);
			return $this->db->get($table);
		}

		function delete($idnya,$id,$table,$idnya1,$table1){
			$this->db->where($idnya,$id);
			$this->db->delete($table);
			$this->db->where($idnya1,$id);
			return $this->db->delete($table1);
		}

		function delete_($idnya,$table,$id){
			$this->db->where($idnya,$id);
			return $this->db->delete($table);
		}

		function check_login($user='',$pass=''){
			$this->db->where('username',$user);
			$this->db->where('password',$pass);
			$this->db->where('status',1);
			return $this->db->get('tbl_user');
		}

		function get_profile($id=0){
			$this->db->where('id',$id);
			return $this->db->get('tbl_user');
		}
	}
