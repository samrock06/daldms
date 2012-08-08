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
 * @link      http://ca.linkedin.com/pub/samuel-haruna/24/90/182      
 * @since     Version 1.0
 * @filesource BASEPATH/application/controllers/users.php
 */

// ------------------------------------------------------------------------

class My_controller extends CI_Controller
{
	public $lastActivity = '';
	public $timeOut = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('session_helper');
		$this->load->library('debugger');
		$this->load->model('main_model');
		$this->load->model('course_model');
		$this->load->model('user_model');

		$this->data['base_url'] = base_url();
		
		$this->lastActivity = $this->session->userdata('last_activity');
    	$this->timeOut = time() - 7200;

		$this->data['scripts']	=	array(
			'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
			'javascripts/jquery.customforms.js',
			'javascripts/jquery.orbit-1.4.0.js',
			'javascripts/jquery.reveal.js',
			'javascripts/jquery.tooltip.js',
			'javascripts/modernizr.foundation.js',
			'javascripts/script.js'
		);
	}
}