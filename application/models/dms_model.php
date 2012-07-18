<?php
class Dms_model extends CI_Model{
	var $archive = array();
	public function __construct()
	{
		$this->load->database();
		parent::__construct();
	}
	function login($email,$password)
    {
    	$value = explode("@", $email);
    	if(count($value) > 1){
    		$this->db->where("email", $email);
        	$this->db->where("password",$password);
        	$query=$this->db->get("users");
    	}

    	if(count($value) == 1){
    		$this->db->where("username", $email);
        	$this->db->where("password",$password);
        	$query=$this->db->get("users");
    	}
    	
        if($query->num_rows()>0)
        {
            foreach($query->result() as $rows)
            {
                //add all data to session
                $newdata = array(
                        'user_id'     => $rows->user_id,
                        'user_name'		=>$rows->username,
                        'title'			=>$rows->title,
                        'first_name'     => $rows->firstname,
                        'last_name'     => $rows->lastname,
                        'user_email'    => $rows->email,
                        'status'		=> $rows->status,
                        'search'		=> array(),
                        'logged_in'     => TRUE,
                );
            }
            $this->session->set_userdata($newdata);

            return true;
        }
        return false;
    }
    function getCourse(){
    	$course = array();
    	$userid = $this->session->userdata('user_id');
    	$this->db->where("prof_id", $userid);
    	$query=$this->db->get("course");
		return $query;
    }
    function search($term){
    	$entire_term = $term;
    	$split_term = explode(" ", $term);
    	array_push($this->archive, $term);
    	$this->session->set_userdata('search', $this->archive);
    }
    function add_user($email=NULL)
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
                'firstname'=>'Kevin',
                'lastname'=>'Smith',
                'email'=>'ksmith@dal.ca',
                'password'=>md5('sqlroot2'),
                'status'=>'professor'
        	);
        	$this->db->insert('users',$data);
    	}
    }
}
?>