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
		$config['base_url'] = 'http://localhost:8888/daldms/u/search';
		$config['total_rows'] = 200;
		$config['per_page'] = 20;
		$this->pagination->initialize($config); 
		$this->data['base_url']=base_url();
		$this->load->model('dms_model');
		$this->data['course'] = '';
		$this->data['error'] = '';
		$this->data['search'] = '';
		$this->data['scripts']=array(
				'javascripts/jquery.min.js',
				'javascripts/app.js',
				'javascripts/jquery.customforms.js',
				'javascripts/jquery.orbit-1.4.0.js',
				'javascripts/jquery.reveal.js',
				'javascripts/jquery.tooltip.js',
				'javascripts/modernizr.foundation.js',
				'javascripts/script.js'
			);
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
		else
		{
			$this->index();
		}
	}
	public function index()
	{
		$check = $this->session->userdata('logged_in');
		$this->data['auth'] = $this->uri->segment(1);
		$this->data['title']='DalDMS - Login';
		if($this->data['auth'] == 'auth_fail'){
			$this->data['error'] = '<div class="alert-box [success alert secondary]">
  										Incorrect Username or Password
  										<a href="" class="close">&times;</a>
									</div>';
			$this->load->view('welcome', $this->data);
		}
		else if( $this->data['check'] ){
			redirect('u/', 'location');
		}
		else{
			$this->load->view('welcome', $this->data);
		}
	}
	function main_user($page)
	{
		if($this->session->userdata('session_id')){
			$this->data['user_title'] = $this->session->userdata('title');
			$this->data['firstname'] = $this->session->userdata('first_name');
			$this->data['lastname'] = $this->session->userdata('last_name');
			$this->data['status'] = $this->session->userdata('status');
			$this->data['user_email'] = $this->session->userdata('user_email');
			$this->data['university'] = $this->session->userdata('university');
			$this->data['address'] = $this->session->userdata('address');
			$this->data['profile_image'] = $this->load->view('profile_image', $this->data, TRUE);
			$this->data['check'] = $this->session->userdata('logged_in');
			$this->data['course_attr'] = array();
			$query = $this->dms_model->getCourse();
			if($query->num_rows() > 0){
				$this->data['course_attr'] = $query->result();
			}
		}
		else{
			$this->data['firstname'] = '';
			$this->data['lastname'] = '';
			$this->data['check'] = $this->session->userdata('logged_in');
		}

		if( $this->data['check'] && $page === 'course'){
			$segment = $this->uri->segment(3);
			$single_course = array();

			$course_info = array();
			if( !empty($segment) && $segment !== 'add'){
				$crs_exist = $this->dms_model->checkCourse($segment);
				if($crs_exist->num_rows() > 0){
					$this->data['single_course'] = $this->load->view('single_course_view', $this->data, TRUE);
				}
				else{
					$this->data['single_course'] = $this->load->view('error', $this->data, TRUE);;
				}
			}
			else{
				$this->data['single_course'] = $this->load->view('add_course_view', $this->data, TRUE);;
			}	
			
			
			$this->data['page'] = $page;
			$this->data['status'] = $this->session->userdata('status');
			$this->data['title'] = 'DalDMS - '.$this->data['firstname'];
	
			$this->data['course'] = $this->load->view('course_view', $this->data, TRUE);
			$this->load->view('header', $this->data);
			$this->load->view('body', $this->data);
			$this->load->view('footer', $this->data);
		}
		else if($this->data['check'] && $page === 'profile'){
			$this->data['status'] = $this->session->userdata('status');
			$this->data['title'] = 'DalDMS - '.$this->data['firstname'];
			$this->data['page'] = $page;
			$this->data['profile'] = $this->load->view('profile_view', $this->data, TRUE);

			$this->load->view('header', $this->data);
			$this->load->view('body', $this->data);
			$this->load->view('footer', $this->data);
		}
		else if($this->data['check'] && $page === 'search'){
			$this->data['status'] = $this->session->userdata('status');
			$this->data['title'] = 'DalDMS - '.$this->data['firstname'];
			$this->data['page'] = $page;
			$this->data['search'] = $this->load->view('search_view', $this->data, TRUE);

			$this->load->view('header', $this->data);
			$this->load->view('body', $this->data);
			$this->load->view('footer', $this->data);
		}
		else if( !$this->data['check'] ){
			redirect('auth_fail/', 'location');
		}
		else{
			$this->data['status'] = $this->session->userdata('status');
			$this->data['title'] = 'DalDMS - '.$this->data['firstname'];
			$this->data['page'] = $page;
			$this->data['land'] = $this->load->view('land_view', $this->data, TRUE);

			$this->load->view('header', $this->data);
			$this->load->view('body', $this->data);
			$this->load->view('footer', $this->data);
		}
	}
	function main_insert()
	{
		$result=$this->dms_model->add_user();
		$this->index();
	}
	function search()
    {
    	$this->dms_model->search($this->input->post('search'));
		redirect('u/search', 'location');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */