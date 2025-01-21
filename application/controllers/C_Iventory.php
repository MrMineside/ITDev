<?php
class C_Iventory extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
			//$this->load->model('M_Unit');
			$this->load->library('Pagination');
        	$this->load->library('Mylibrary');
            //$this->load->library('Ciqrcode');
        	$this->load->helper('url');
        	$this->load->helper('date');
           // if($this->session->userdata('status')!='login'){
           //      redirect(base_url("index.php/C_Login"));
           //  }
	}

	function index(){
		$data['judul']='';
		$this->load->view('Content/Iventory/V_Unit',$data);
	}
}
?>