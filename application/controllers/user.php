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

class User extends My_controller
{

  function __construct()
  {
    // Call parent
    parent::__construct();
    
    // Necessary needs from CI
    

    $this->data['base_url']=base_url();
    $this->data['h_active'] = '';
    $this->data['p_active'] = '';
    $this->data['c_active'] = '';

    // Authentication
    if($this->session->userdata('logged_in'))
    {
      $this->data['title'] = 'DalDMS - '.$this->session->userdata['first_name'];
      $this->data['user_id'] = $this->session->userdata('user_id');
      $this->data['user_title'] = $this->session->userdata['title'];
      $this->data['firstname'] = $this->session->userdata['first_name'];
      $this->data['lastname'] = $this->session->userdata['last_name'];
      $this->data['status'] = $this->session->userdata['status'];
      $this->data['user_email'] = $this->session->userdata['user_email'];
      $this->data['university'] = $this->session->userdata['university'];
      $this->data['address'] = $this->session->userdata['address'];
      $this->data['profile_image'] = $this->load->view('users/profile_image', $this->data, TRUE);
      $this->data['assoc_unis'] = $this->course_model->getUniversity();
      $this->data['course_info'] = $this->course_model->getCourse();
		}
		else{
			$this->data['firstname'] = '';
			$this->data['lastname'] = '';
			$this->data['status'] = '';
		}
  }
  
  public function index()
  {
    // Authentication
    if($this->session->userdata('logged_in'))
    {
      if($this->lastActivity <= $this->timeOut)
      {
        $this->fresh();
      }
      else{
        $this->land();
      }
    }
    else{
      $this->fresh();
    }
  }
  public function land()
  {
    $this->data['h_active'] = 'active';
    $this->data['page'] = $this->load->view('land_view', $this->data, TRUE);

    $this->load->view('shared/header', $this->data);
    $this->load->view('users/content', $this->data);
    $this->load->view('shared/footer', $this->data);
  }
  public function profile(){
    $this->data['p_active'] = 'active';
    $this->data['status'] = $this->session->userdata('status');
    $this->data['title'] = 'DalDMS - '.$this->data['firstname'];
    $this->data['page'] = $this->load->view('profile_view', $this->data, TRUE);

    $this->load->view('shared/header', $this->data);
    $this->load->view('users/content', $this->data);
    $this->load->view('shared/footer', $this->data);
  }
  public function course($id = null){
    $this->data['c_active'] = 'active';
    $segment = $id;
    $single_course = array();

    $course_info = array();
    if( !empty($segment) && $segment !== 'add'){
        $crs_exist = $this->course_model->checkCourse($segment);
        if(count($crs_exist) > 0){
          $this->data['single_course'] = $this->load->view('users/single_course_view', $this->data, TRUE);
        }
        else{
          $this->data['single_course'] = $this->load->view('error', $this->data, TRUE);;
        }
      }
      
      $this->data['status'] = $this->session->userdata('status');
      $this->data['title'] = 'DalDMS - '.$this->data['firstname'];
  
      $this->data['page'] = $this->load->view('users/course_view', $this->data, TRUE);
      $this->load->view('shared/header', $this->data);
      $this->load->view('users/content', $this->data);
      $this->load->view('shared/footer', $this->data);
  }
  public function search(){
    $this->data['status'] = $this->session->userdata('status');
    $this->data['title'] = 'DalDMS - '.$this->data['firstname'];
    $this->data['page'] = $page;
    $this->main_model->search($this->input->post('search'));
    $this->data['page'] = $this->load->view('search_view', $this->data, TRUE);

    $this->load->view('shared/header', $this->data);
    $this->load->view('users/content', $this->data);
    $this->load->view('shared/footer', $this->data);
  }
  public function add_course()
  {
    $this->data['c_active'] = 'active';
    $this->data['status'] = $this->session->userdata('status');
    $this->data['title'] = 'DalDMS - '.$this->data['firstname'];
    $this->data['single_course'] = $this->load->view('users/add_course_view', $this->data, TRUE);
    $this->data['page'] = $this->load->view('users/course_view', $this->data, TRUE);

    $this->load->view('shared/header', $this->data);
    $this->load->view('users/content', $this->data);
    $this->load->view('shared/footer', $this->data);
  }
  
  public function fresh()
  {  
    $this->data['error'] = '<div class="alert-box [success alert secondary]">
                      Incorrect Username or Password
                      <a href="" class="close">&times;</a>
                  </div>';
    $this->data['title'] = 'DalDMS';
    $this->load->view('users/fresh', $this->data);
  }
  
  public function create()
  {
    $this->form_validation->set_rules($this->user_model->validations);
    
    if ( ! $this->form_validation->run() )
    {
      $this->load->view('users/fresh');
      return;
    }
    
    $new_user = array(
      'title'     => $this->input->post('title'),
      'firstname' => $this->input->post('firstname'),
      'lastname'  => $this->input->post('lastname'),
      'username'  => $this->input->post('username'),
      'email'     => $this->input->post('email'),
      'status'    => $this->input->post('status'),
      'password'  => $this->input->post('password')
    );
    
    if ($new_user = $this->user_model->add_user($new_user))
    {
      sign_in($new_user);
  		redirect('sessions/fresh'); // For now just show the index action to make sure that the user has been added to the DB
    }
    else
    {
      show_error("Something went wrong. We are working to fix this!");
      log_message('error', 'An issue with inserting a new user into the DB');
    }
  }

  public function show($id)
  {
    // log_message('info', $id);
    $user = (array)$this->db->get_where('users', array('id' => $id))->result();
    // var_dump($user);
    
    if (! empty($user))
    {
      
      $this->data["fn"] = $user["firstname"];
      $this->data["ln"] = $user["lastname"];
      $this->data["st"] = $user["status"];
      $this->data["ut"] = $user["title"];
      $this->data["id"] = $user["id"];
    }

    $this->data["title"] = title($this->data["firstname"]);
    
		$this->load->view('shared/header', $this->data);
    $this->load->view('users/show', $this->data);
		$this->load->view('shared/footer', $this->data);
  }
}