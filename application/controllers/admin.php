<?
class Admin extends Main{
	public function __construct(){
		parent::__construct();
		$this->data['title'] = 'DalDMS - Admin';
	}
	public function admin(){
		$this->load->view('admin', $this->data);
	}
	function add_user(){
		
	}
	function remove_user(){

	}
}
?>