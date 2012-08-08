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
 * @filesource BASEPATH/application/model/main_model.php
 */

// ------------------------------------------------------------------------

/**
* dms_model model.
*
* Handles login.
*/

class Main_model extends CI_Model{
	
    var $archive = array();

	function __construct()
	{
		$this->load->database();
		parent::__construct();
	}
    public function search($term){
    	$entire_term = $term;
    	$split_term = explode(" ", $term);
    	array_push($this->archive, $term);
    	$this->session->set_userdata('search', $this->archive);
    }
    public function add_user($email=NULL)
    {
    	$this->db->where("email",$email);
    	$query=$this->db->get("users");
        
        if($query->num_rows()>0){
        	$data=array(
                'firstname'=>'Kevin',
                'lastname'=>'Smith',
                'email'=>'ksmith@dal.ca',
                'password'=>md5('sqlroot2'),
                'status'=>'admin'
        	);
        	$this->db->insert('users',$data);
    	}
    	else{
    		$data=array(
    			'title'=>'Dr.',
    			'username'=>'epresley',
                'firstname'=>'Elvis',
                'lastname'=>'Presley',
                'email'=>'epresley@smu.ca',
                'university'=>'2',
                'password'=>md5('sqlroot3'),
                'status'=>'director'
        	);
        	$this->db->insert('users',$data);
    	}
    }
}