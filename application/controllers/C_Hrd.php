<?php
class C_Hrd extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
			$this->load->library('Mylibrary');
            $this->load->helper('url');
            $this->load->helper('date');
	}

	function index(){
		$data['judul']='';
		$this->load->view('Content/Ds_Hrd',$data);
	}

	function cutikaryawan(){
		$this->load->model('M_Cuti');
		$sorby = $this->input->post('sorby');
		$data = $this->M_Cuti->datacutikaryawan($sorby);
		echo json_encode($data);
	}

	function d_cuti(){
		$this->load->model('M_Cuti');
		$idhrd = $this->session->id;
 		$id = $this->input->post('id');
 		$sts = $this->input->post('sts');
 		$data = $this->M_Cuti->d_cuti($id,$idhrd,$sts);
 		echo json_encode($data);
 	}

 	function total_store(){
 		$this->load->model('M_Cuti');
 		$tot = $this->M_Cuti->total_store();
        $result['tot'] = $tot;
        echo json_encode($result);
 	}

 	function total_newcuti(){
 		$this->load->model('M_Cuti');
 		$tot = $this->M_Cuti->total_newcuti();
        $result['tot'] = $tot;
        echo json_encode($result);
 	}

 	function u_approv(){
 		$this->load->model('M_Cuti');
 		$idhrd = $this->session->id;
 		$no_aju = $this->input->post('no_aju');
 		$data = $this->M_Cuti->approv($no_aju,$idhrd);
 		echo json_encode($data);
 	}

 	function sendnote(){
 		$idhrd = $this->session->id;
 		$this->load->model('M_Cuti');
 		$kodeju = $this->input->post('kodeju');
 		$note = $this->input->post('note');
 		$data = $this->M_Cuti->sendnote($kodeju,$note,$idhrd);
 		echo json_encode($data);
 	}

 	function withoutnote(){
 		$idhrd = $this->session->id;
 		$this->load->model('M_Cuti');
 		$kodeju = $this->input->post('kodeju');
 		$data = $this->M_Cuti->withoutnote($kodeju,$idhrd);
 		echo json_encode($data);
 	}

 	function download_file($file){
        force_download('assets/gambarcuti/'.$file,NULL);
    }
}
?>