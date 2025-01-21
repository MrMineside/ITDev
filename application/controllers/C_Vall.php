<?php
class C_Vall extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
			$this->load->model('M_Newtask');
        	$this->load->library('Mylibrary');
          
	}

	function index(){
		$this->load->view('Content/V_Penjualan');
	}

	function datatask(){
		$gettanggal=$this->input->post('gettanggal');
		$type=$this->input->post('type');
		$data=$this->M_Tasksales->dataviewall($gettanggal);
		echo json_encode($data);
	}
}
?>