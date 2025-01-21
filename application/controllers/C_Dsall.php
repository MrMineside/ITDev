<?php
class C_Dsall extends MY_Controller
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
		$this->load->view('Content/Ds_All');
	}

	function datacuti(){
		$this->load->model('M_Cuti');
		$id = $this->session->id;
		$data = $this->M_Cuti->datacutiuser($id);
		echo json_encode($data);
	}

	function histcuti(){
		$this->load->model('M_Cuti');
		$id = $this->input->post('id');
		$data = $this->M_Cuti->histcuti($id);
		echo json_encode($data);	
	}

	function cancelcuti(){
		$this->load->model('M_Cuti');
        $no_aju = $this->input->post('no_aju');
        $id = $this->input->post('no_user');
        $jml_day = $this->input->post('jml_day');
        $cuti = $this->input->post('cuti');
        $jenis = $this->input->post('jenis');
        if ($jenis == "1") {
        	$sisa = $cuti + $jml_day;
        	$data = $this->M_Cuti->updatecuti($id,$sisa);
        	$this->M_Cuti->deletecuti($no_aju);
        }else{
        	$data = $this->M_Cuti->deletecuti($no_aju);
        }
        echo json_encode($data);
    }

}
?>