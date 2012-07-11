<?php
class Oauth extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('dms_model');
	}
	function login($email = NULL, $password = NULL){
		$email=$this->input->post('email');
        $password=md5($this->input->post('password'));

        $result=$this->dms_model->login($email,$password);

        if($result) 
        	redirect('u/', 'location');
        else        
        	redirect('auth_fail/', 'location');
	}
	function logout()
    {
        $newdata = array(
        	'user_id'   =>'',
        	'first_name'  =>'',
        	'last_name'  =>'',
        	'user_email'     => '',
        	'logged_in' => FALSE,
        );
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect('/', 'location');
    }
}
?>