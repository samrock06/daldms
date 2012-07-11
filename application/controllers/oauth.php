<?php
class Oauth extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('dms_model');
	}
	function login($email = NULL, $password = NULL){

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE){
			redirect('auth_fail/', 'location');
		}
		else{
			$email=$this->input->post('email');
        	$password=md5($this->input->post('password'));

        	$result=$this->dms_model->login($email,$password);
			if($result) 
        		redirect('u/', 'location');
        	else        
        		redirect('auth_fail/', 'location');
		}
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
    function search()
    {
    	$this->dms_model->search($this->input->post('search'));
		redirect('u#search', 'location');
    }
}
?>