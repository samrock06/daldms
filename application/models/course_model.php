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
 * @filesource BASEPATH/application/model/course_model.php
 */

// ------------------------------------------------------------------------

/**
* dms_model model.
*
* Handles Courses.
*/

class Course_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	public function getUniversity(){
    	$this->db->select("*");
    	$query = $this->db->get("university");
    	return $query->result_array();
    }
	public function getCourse(){
    	$course = array();
    	$userid = $this->session->userdata('user_id');
    	$this->db->where("prof_id", $userid);
    	$query=$this->db->get("course");
		return $query->result_array();
    }
    public function checkCourse($cid){
    	$this->db->select("*");
    	$this->db->where("c_id", $cid);
    	$this->db->having("prof_id", $this->session->userdata('user_id'));
    	$query=$this->db->get("course");
    	return $query->result_array();
    }
}
