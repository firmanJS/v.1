<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_profil extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		check_login();
	}

	function index(){
		$data = $this->data;
		$data['edit'] = $this->objactiv->get_all('tbl_web_setting')->row();
    $akses = $this->cek_akses($this->id_web_setting);
		view('site/web_setting/form',$data,$akses);
	}

	function save($id = 1){
		$logo = $this->input->post('logo');
		$logo2 = $this->input->post('logo2');
		$favicon = $this->input->post('favicon');
		$favicon2 = $this->input->post('favicon2');

		$data = input();
		unset($data['logo2'],$data['favicon2'],$data['logo'],$data['favicon']);

		// ---------------- start favicon -----------------------
      $config['upload_path']   = 'gbr/site_profil/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif|ico|svg';
      $config['max_size']      = '10240';
      $config['encrypt_name']  = TRUE;

      $this->load->library('upload', $config);
      $upload1 = $this->upload->do_upload('favicon');
      $file1   = $this->upload->data();
      $favicon = $file1['file_name'];
      if($file1){
          $config2['image_library']    = 'gd2';
          $config2['source_image']     = 'gbr/site_profil'.$favicon;
          $config2['maintain_ratio']   = TRUE;
          $config2['width']            = 64;
          $config2['height']           = 64;

          $this->load->library('image_lib', $config2);
          $this->image_lib->resize();
        }

      if (!$upload1){
        $favicon = $favicon2;
      }else{
        unlink('gbr/site_profil/'.$favicon2);
      }
      // ---------------- end favicon -----------------------

      // ---------------- start logo ------------------------
      $config['upload_path']   = 'gbr/site_profil';
      $config['allowed_types'] = 'jpg|jpeg|png|gif|ico';
      $config['max_size']      = '10240';
      $config['encrypt_name']  = TRUE;

      $this->load->library('upload', $config);
      $upload2 = $this->upload->do_upload('logo');
      $file2   = $this->upload->data();
      $logo    = $file2['file_name'];

      if (!$upload2){
        $logo = $logo2;
      }else{
        @unlink('gbr/site_profil/'.$logo2);
      }

      $data['logo'] = $logo;
      $data['favicon'] = $favicon;

    $input = $this->objactiv->update('id',$id,'tbl_web_setting',$data);

    if($input==TRUE){
      sukses('Data Has Changed');
      redirect('site/site_profil');
    }else{
      msg_failed('Data Cannot Save');
      redirect('site/site_profil');
    }
  }
}
