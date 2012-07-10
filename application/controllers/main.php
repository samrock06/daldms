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
		$this->data['scripts']=array(
				'app.js',
				'jquery.customforms.js',
				'jquery.min.js',
				'jquery.orbit-1.4.0.js',
				'jquery.reveal.js',
				'jquery.tooltip.js',
				'modernizr.foundation.js'
			);
	}
	public function index()
	{
		$this->data['title']='DalDMS - Login';
		$this->load->view('welcome', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */