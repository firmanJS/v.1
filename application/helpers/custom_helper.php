<?
  function view($view,$data = array(),$akses=0){
    $CI =& get_instance();
    if($akses == 1){
      $CI->load->view('menu/header',$data);
      $CI->load->view('menu/nav');
      $CI->load->view('menu/left');
      $CI->load->view($view);
      $CI->load->view('menu/footer');
    }else{
      $CI->load->view('errors/forbidden',$data);
    }
  }
  function post($param = ''){
    $CI =& get_instance();
    return $CI->input->post($param);
  }

  function debug($data = array()){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
  }

  function check_login(){
    $CI =& get_instance();
    if(!$CI->session->userdata('user_id')){
      redirect('auth');
    }
  }

  function input(){
    $CI =& get_instance();
    $input = $CI->input->post();
    $data = array();
    foreach($input as $key => $value){
      if($key=='password'){
        if($value){
          $data[$key] = md5($value);
        }
      }else{
        $data[$key] = $value;
      }
    }
    return $data;
  }

  function sukses($message = '')
  {
    $CI =& get_instance();
    return $CI->session->set_flashdata('pesan', "<div class='alert alert-success'>
            <button type='button' class='close' data-dismiss='alert'>x</button>
            <center><strong>Success ! </strong>
             $message.</center>
          </div>");
  }

  function gagal($message = '')
  {
    $CI =& get_instance();
    return $CI->session->set_flashdata('pesan',"<div class='alert alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>x</button>
            <center><strong>Error ! </strong>
             $message.</center>
          </div>");
  }

  function tampil_pesan(){
		$CI =& get_instance();
		return $CI->session->flashdata('pesan');
	}
