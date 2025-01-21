<?php
class C_Profile extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
			$this->load->model('M_User');
    		// $this->load->model('M_Store');
			$this->load->library('Mylibrary');
            $this->load->helper('url');
            $this->load->helper('date');
	}

	function index(){
		$this->load->view('Content/V_Profile');
	}

}
?>