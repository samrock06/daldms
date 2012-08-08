<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * DalDMS
 *
 * An open source course dependency management system
 *
 * @package   DalDMS
 * @author    Samuel Haruna
 * @copyright Copyright (c) 2012 - 2022, DalDMS
 * @license   
 * @link  	  http://ca.linkedin.com/pub/samuel-haruna/24/90/182      
 * @since     Version 1.0
 * @filesource BASEPATH/application/controllers/sessions.php
 */

// ------------------------------------------------------------------------

/**
* Sessions controller.
*
* Handles authentication and provides a framework for authorization.
*/

class Sessions extends My_controller
{
  
  	public $validation_rules = array();
  
  	// Call Parent
  	function __construct()
  	{
		parent::__construct();
	
		$this->validation_rules = array(
	  		array("field" => "email", "label" => "Username", "rules" => "required"),
	  		array("field" => "password", "label" => "Password", "rules" => "required")
		);
  	}
  
  	public function create()
  	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required');
	
		if ($this->form_validation->run() == FALSE)
		{
	  		// probably should add some flash statement here too. but I don't know if
	 		// the current form validation errors are sufficient
	  		redirect('/');
		}
		else{
			$username = $this->input->post('email');
        	$password = md5($this->input->post('password'));

			$user = $this->user_model->authenticate($username, $password);
			if ($user)
			{
	  			
	  			// do some redirect to the current user's page.
	  			redirect('user/');
			}
			else
			{
	  			// return a message saying that this user has not been authenticated
	  			// render the login for the individual to retry (you may want to restrict the number of retry times)echo $user;
	  			$this->load->view('sessions/fresh', $this->data);
			}
		}
  	}
  
  	public function fresh()
  	{
		$this->load->view('users/fresh');
  	}
  
  	public function logout()
  	{
		$this->user_model->de_authenticate();
		redirect("/");
  	}
}