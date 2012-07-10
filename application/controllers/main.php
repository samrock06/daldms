<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->data['base_url']=base_url();
		$this->data['scripts']=array(
				'javascripts/app.js',
				'javascripts/jquery.customforms.js',
				'javascripts/jquery.min.js',
				'javascripts/jquery.orbit-1.4.0.js',
				'javascripts/jquery.reveal.js',
				'javascripts/jquery.tooltip.js',
				'javascripts/modernizr.foundation.js'
			);
	}
	public function _remap($method)
	{
		if($method == 'u')
		{
			$this->professor = $this->uri->segment(3);
			$this->main_user($this->professor);	
		}
		else
		{
			$this->index();
		}
	}
	public function index()
	{
		$this->data['title']='DalDMS - Login';
		$this->load->view('welcome', $this->data);
	}
	function main_user($username=NULL){
		$this->data['title'] = 'DalDMS - '.$username;
		$this->data['user'] = $username;
		$this->data['header'] = $this->load->view('header', $this->data);
		$this->data['body'] = $this->load->view('body', $this->data);
		$this->data['footer'] = $this->load->view('footer', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */