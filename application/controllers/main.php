<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * DalDMS
 *
 * An open source course dependency management system
 *
 * @package   	DalDMS
 * @author    	Samuel Haruna
 * @copyright 	Copyright (c) 2012 - 2022, DalDMS
 * @license   
 * @link  		http://ca.linkedin.com/pub/samuel-haruna/24/90/182      
 * @since     	Version 1.0
 * @filesource BASEPATH/application/controllers/main.php
 */

// ------------------------------------------------------------------------

/**
* Main controller.
*
* Main Controller that maps to other controllers
*/

class Main extends My_controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		base_url()/daldms/
	 *	- or -  
	 * 		base_url()/daldms/index.php/main/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at base_url()
	 */
	function __construct(){
		parent::__construct();
		$config['base_url'] = 'http://localhost:8888/daldms/u/search';
		$config['total_rows'] = 200;
		$config['per_page'] = 20;
		//$this->pagination->initialize($config); 

		$this->data['title'] = 'DalDMS';
		$this->data['course'] = '';
		$this->data['error'] = '';
		$this->data['search'] = '';

		
		$this->data['auth'] = '';
		$this->data['check'] = $this->session->userdata('logged_in');
	}
	public function _remap($method)
	{
		if($method == 'u')
		{
			$page = $this->uri->segment(2);
			$this->main_user($page);
		}
		else if($method == 'i'){
			$this->main_insert();
		}
		else if($method == 'add'){
			$this->main_add_course();
		}
		else
		{
			$this->index();
		}
	}
	public function index()
	{
		$this->data['auth'] = $this->uri->segment(1);
		$this->data['title']='DalDMS - Login';
		/*if($this->data['auth'] == 'auth_fail'){
			$this->data['error'] = '<div class="alert-box [success alert secondary]">
  										Incorrect Username or Password
  										<a href="" class="close">&times;</a>
									</div>';
			$this->load->view('welcome', $this->data);
		}
		else */
		if($this->session->userdata('logged_in')){
			redirect('/users/', 'location');
		}
		else{
			$this->load->view('welcome', $this->data);
		}
	}
	function main_user($page)
	{
		if($this->session->userdata('logged_in')){
			redirect('/users/', 'location');
		}
		else{
			redirect('/', 'location');
		}
	}
	function main_add_course(){

	}
	function main_insert()
	{
		$result=$this->main_model->add_user();
		$this->index();
	}
	function search()
    {
    	$this->main_model->search($this->input->post('search'));
		redirect('u/search', 'location');
    }
}