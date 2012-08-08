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
 * @filesource BASEPATH/application/models/user_model.php
 */

// ------------------------------------------------------------------------

/**
 * User Model
 *
 * @package		DalDMS
 * @subpackage	daldms
 * @category	Model
 * @author		Samuel Haruna
 */

class User_model extends CI_Model
{

  public $validations;
  private $user;
  
  function __construct()
  {
    parent::__construct();

    $this->user = null;
    $this->validations = array(
      array("field" => "firstname", "label" => "First Name", "rules" => "required|alpha"),
      array("field" => "lastname", "label" => "Last Name", "rules" => "required|alpha"),
      array("field" => "username", "label" => "UserName", "rules" => "required|alpha"),
      array("field" => "email", "label" => "Email", "rules" => "required|valid_email"),
      array("field" => "status", "label" => "Status", "rules" => "required"),
      array("field" => "password", "label" => "Password", "rules" => "required|matches[confirm]|min_length[6]")
    );
  }
  
  public function add_user($user)
  {
    if ($user == null || ! is_array($user))
    {
      return FALSE;
    }
    
    $this->user = $user;
    
    $this->digest_password($this->user["password"], TRUE);
    unset($this->user["password"]);
    // var_dump($this->user);
    
    $this->db->insert('users', $this->user);
    return true;
  }
  
  public function authenticate($identifier, $password)
  {
     $value = explode("@", $identifier);
      if(count($value) > 1){
        $this->db->where("email", $identifier);
          $this->db->where("password",$password);
          $query=$this->db->get("users");
      }

      if(count($value) == 1){
        $this->db->where("username", $identifier);
          $this->db->where("password",$password);
          $query=$this->db->get("users");
      }
      
        if($query->num_rows()>0)
        {
          $uni_name = "";
            $uni_adr = "";
            foreach($query->result() as $rows)
            {
              $this->db->where("uid", $rows->university);
              $university = $this->db->get("university");
              if($university->num_rows()>0){
                foreach($university->result() as $row){
                  $uni_name = $row->university;
                  $uni_adr = $row->address;
                }
              }
                //add all data to session
                $newdata = array(
                        'user_id'     => $rows->user_id,
                        'user_name'   =>$rows->username,
                        'title'     =>$rows->title,
                        'first_name'     => $rows->firstname,
                        'last_name'     => $rows->lastname,
                        'user_email'    => $rows->email,
                        'university'  => $uni_name,
                        'address'   => $uni_adr,
                        'status'    => $rows->status,
                        'search'    => array(),
                        'logged_in'     => TRUE,
                );
            }
            $this->session->set_userdata($newdata);

            return true;
        }
        return false;
  }
  public function de_authenticate()
  {
    $newdata = array(
                        'user_id'     => '',
                        'user_name'   =>'',
                        'title'     =>'',
                        'first_name'     => '',
                        'last_name'     => '',
                        'user_email'    => '',
                        'university'  => '',
                        'address'   => '',
                        'status'    => '',
                        'search'    => array(),
                        'logged_in'     => FALSE,
                );
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
  }
  private function secure_hash($str)
  {
    if ($str == null || !is_string($str))
    {
      show_error("There is no string to be hashed.");
      return;
    }
    
    $this->load->library("encrypt");
    
    return $this->encrypt->sha1($str);
  }
  
  private function digest_password($password, $registering = FALSE)
  {
    // this should be only called when the user is being registered
    // can be seen as sort of a hook answering to the intent of
    // inserting a record to the user table in the database.
    if ($registering)
    {
      $this->user["created_at"] = date('Y-m-d H:i:s');
      $this->user["password_salt"] = $this->spice_up($this->user["created_at"]);
    }
    $this->user["password_digest"] = $this->digest($password);
  }
  
  private function digest($password)
  {
    // var_dump($this->user);
    return $this->secure_hash('hot soup with ' . $password . ' and ' . $this->user["password_salt"]);
  }
  
  private function spice_up($creation_time)
  {
    // this has to be heavilyy cryptographic
    $this->load->helper('date');
    
    if ($this->user["username"] == null)
    {
      show_error('username cannot be null for spicing.');
      log_message('info', 'check params for username because username is null in spicing');
      return;
    }
    
    if ($this->user["password"] == null)
    {
      show_error('password cannot be null for spicing.');
      log_message('info', 'check params for password because password is null in spicing');
      return;
    }
    
    return $this->secure_hash('Registered ' . $creation_time . ' as ' . $this->user["username"] . ' with ' . $this->user["password"]);
  }
}