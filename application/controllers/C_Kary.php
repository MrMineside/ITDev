<?php
class C_Kary extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
			$this->load->model('M_User');
    		// $this->load->model('M_Store');
			$this->load->library('Pagination');
        	$this->load->library('Mylibrary');
        	$this->load->helper('url');
        	$this->load->helper('date');
        // 	if($this->session->userdata('status')!='login'){
        //         redirect(base_url("index.php/C_Login"));
        //     }
        if($this->session->userdata('id')==''){
			redirect(base_url("index.php/C_Login"));
		}
	}

	function index(){
		$data['judul']	= 'DATA KARYAWAN';
		$data['user'] 	= $this->session->nama;
		$data['akses']	= $this->session->akses;
		$data['gambar']	= $this->session->gambar;
		$data['notel']	= $this->session->notel;
		$data['id']		= $this->session->id;
		//$data['divisi']=$this->M_User->listdivisi();
		$this->load->view('Content/User/V_User',$data);
	}

	function opakses(){
		$data=$this->M_User->listakses();
		echo json_encode($data);
	}

	// Function Divisi
	function opdivisi(){
		$data=$this->M_User->listdivisi();
		echo json_encode($data);
	}

	// End Function
	// Function Edmplo
    function opemplo(){
		$data=$this->M_User->listemplo();
		echo json_encode($data);
	}

	function vemplo(){
		$data=$this->M_User->viewemplo();
		echo json_encode($data);
	}

	function getemplo(){
        $id=$this->input->get('id');
        $data=$this->M_User->getemplo($id);
        echo json_encode($data);
    }

    function updemplo(){
    	$opemplo= $this->input->post('opemplo');
    	$divisi= $this->input->post('divisi');
    	$notel= $this->input->post('notel');
    	$email= $this->input->post('email');
    	$username= $this->input->post('username');
    	$password= $this->input->post('password');
    	$alamat= $this->input->post('alamat');
    	$akses= $this->input->post('akses');
    	$data= $this->M_User->updemplo($opemplo,$divisi,$notel,$email,$username,$password,$alamat,$akses);
    	echo json_encode($data);		
    }

	// End Function Emplo
    public function updateAll()
    {
        $ids = $this->input->post('ids');
		$jmlleave = $this->input->post('jmlleave');
        $data=array('cuti'=> $jmlleave);
 
        $this->db->where_in('id', explode(",", $ids));
        $this->db->update('user',$data);
 
        echo json_encode(['success'=>"Approve successfully."]);
    }

}
?>