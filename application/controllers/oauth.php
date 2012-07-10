<?php
class Oauth extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	function login($email = NULL, $password = NULL){
		$email=$this->input->post('email');
        $password=md5($this->input->post('password'));

        //$result=$this->deal_model->login($email,$password);
        $result = explode("@", $email);
        if($email) 
        	redirect('main/u/'.$result[0], 'location');
        else        
        	redirect('/oauth/1', 'location');
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
        $this->session->unset_userdata($newdata );
        $this->session->sess_destroy();
        redirect('/city/Abuja', 'location');
    }
}
?>