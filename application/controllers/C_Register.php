<?php
class C_Register extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
			$this->load->model('MLogin');
        	$this->load->library('Mylibrary');
	}

	function index(){
		$this->load->view('Content/Register');
	}
}
?>