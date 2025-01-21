<?php
class C_Print extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Print');
		$this->load->library('Pagination');
       	$this->load->library('Mylibrary');
        $this->load->helper('url');
        $this->load->helper('date');
        // if($this->session->userdata('iduser')==''){
        //     redirect(base_url("index.php/Auth"));
        // }
	}

    function index(){
        $data['title'] = 'PRINT DATA';
        $data['iduser']=$this->session->iduser;
        $data['namauser']=$this->session->namauser;
        $data['tipeuser']=$this->session->tipeuser;
        $data['akses']=$this->session->akses;
        $data['tahun']=$this->session->tahun;
        $this->load->view('Content/Printdata',$data);
    }

    function onprint(){
        $data['iduser']=$this->session->iduser;
        $data['namauser']=$this->session->namauser;
        $data['tipeuser']=$this->session->tipeuser;
        $data['akses']=$this->session->akses;
        $data['tahun']=$this->session->tahun;
        $this->load->view('Themeprint/onprintall',$data);
    }

    function printcuti(){
        $this->load->library('Mypdf');
        $iduser=$this->session->id;
        $data['datauser'] = $this->M_Print->viewemplo($iduser);
        $data['datacuti'] = $this->M_Print->datacuti($iduser);
        $filename='Pengajuan Cuti ';
        $this->mypdf->set_paper('A4', 'potrait');
        $this->mypdf->generate('Themeprint/PrintCuti', $data, 'Pengajuan Cuti ');
    }
}
?>