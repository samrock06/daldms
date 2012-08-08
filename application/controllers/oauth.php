<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * DalDMS
 *
 * An open source course dependency management system
 *
 * @package     DalDMS
 * @author      Samuel Haruna
 * @copyright   Copyright (c) 2012 - 2022, DalDMS
 * @license   
 * @link        http://ca.linkedin.com/pub/samuel-haruna/24/90/182      
 * @since       Version 1.0
 * @filesource BASEPATH/application/controllers/oauth.php
 */

// ------------------------------------------------------------------------

/**
* Sessions controller.
*
* Handles authentication and provides a framework for user login/sign out.
*/

class Oauth extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
	}
	function login($email = NULL, $password = NULL)
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE){
			redirect('auth_fail/', 'location');
		}
		else{
			$email = $this->input->post('email');
        	$password = md5($this->input->post('password'));

        	$result = $this->main_model->login($email,$password);
			if($result) 
        		redirect('u/', 'location');
        	else        
        		redirect('auth_fail/', 'location');
		}
	}
	function logout()
    {
        $newdata = array(
                        'user_id'     => '',
                        'user_name'		=>'',
                        'title'			=>'',
                        'first_name'     => '',
                        'last_name'     => '',
                        'user_email'    => '',
                        'university'	=> '',
                        'address'		=> '',
                        'status'		=> '',
                        'search'		=> array(),
                        'logged_in'     => FALSE,
                );
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect('/', 'location');
    }
}