<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class MY_Controller extends CI_Controller
  {
  	public $data;
    public $id_user_management;
    public $id_user_group=2;
    public $id_user_list=3;
    public $id_site;
    public $id_menu=5;
    public $id_web_setting=7;
    public $id_dashboard=17;
    public $id_user_profil=15;

    public function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Asia/Jakarta');
      $this->load->model('Active_model','objactiv');
      $this->load->model('Core_model','core');
      $session = $this->session->userdata('user_id');
      if($session){
      	$profile = $this->objactiv->get_profile($session)->row();
        $web = $this->objactiv->get_all('tbl_web_setting')->row();
        $get_menu = $this->core->get_menu($profile->id_group);
      	$array_profile = array(
      		'user_id' => $profile->id,
      		'namalengkap' => $profile->nama,
          'user_name' => $profile->username,
          'user_thumb' => $profile->thumb,
      		'user_foto' => $profile->foto,
      		'user_id_group' => $profile->id_group,
          'favicon' => $web->favicon,
          'logo' => $web->logo,
          'title' => $web->title,
          'deskripsi' => $web->description,
          'kunci' => $web->keywords,
          'pembuat' => $web->footer_tags,
          'menu' => $get_menu
      	);
      	$this->data = $array_profile;
      }
    }

    function cek_akses($id_menu=0,$akses='view'){
      $data = $this->data;
      $record = $this->core->get_akses($data['user_id_group'],$id_menu)->row();
      if($akses == 'view'){
        return $record->akses_view;
      }elseif($akses == 'input'){
        return $record->akses_input;
      }elseif ($akses == 'edit') {
        return $record->akses_edit;
      }else{
        return $record->akses_delete;
      }
    }

    function get_akses($id_menu=0){
      $data = $this->data;
      $record = $this->core->get_akses($data['user_id_group'],$id_menu)->row();
      return $record;
    }

    function first_page(){
      $data = $this->data;
      $page = $this->core->get_first_page($data['user_id_group']);
      return $page;
    }

   }
