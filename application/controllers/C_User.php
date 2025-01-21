<?php
class C_User extends MY_Controller
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
		$data['judul']	= 'EMPLOYEES USER';
		$data['user'] 	= $this->session->nama;
		$data['akses']	= $this->session->akses;
		$data['gambar']	= $this->session->gambar;
		$data['notel']	= $this->session->notel;
		$data['id']		= $this->session->id;
		//$data['divisi']=$this->M_User->listdivisi();
		$this->load->view('Content/User/F_User',$data);
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

	function v_divisi(){
		$data=$this->M_User->listdivisi();
		echo json_encode($data);
	}

	function simpandiv(){
		$divisi=$this->input->post('newdiv');
		$data=$this->M_User->simpandiv($divisi);
		echo json_encode($data);
	}

	function updatediv(){
		$divisi=$this->input->post('newdiv');
		$id=$this->input->post('id');
		$data=$this->M_User->updatedivisi($id,$divisi);
		echo json_encode($data);
	}

	public function delete_divisi($id)
    {
       $this->db->delete('divisi', array('id' => $id));
       echo 'Deleted successfully.';
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
	
	function vemplobtdivisi(){
		$divisi = $this->input->post('divisi');
		$data=$this->M_User->viewemplobydivisi($divisi);
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

    function simemplo(){
    	$newemplo= $this->input->post('newemplo');
    	$divisi= $this->input->post('divisi');
    	$notel= $this->input->post('notel');
    	$email= $this->input->post('email');
    	$username= $this->input->post('username');
    	$password= $this->input->post('password');
    	$alamat= $this->input->post('alamat');
    	$akses= $this->input->post('akses');
    	$data= $this->M_User->simemplo($newemplo,$divisi,$notel,$email,$username,$password,$alamat,$akses);
    	echo json_encode($data);		
    }

    function simpanprofile(){
        $id=$this->input->post('id');
                
        $nm_foto='';
        $image = $id.$_FILES["foto"]['file_name'];
        
        $config['upload_path']          = 'assets/Image/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;
        $config['file_name']            = $image;
 
        $this->load->library('upload', $config);
    
        if ( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
            $nm_foto  = 'default.png'; 
        }else{
            $data1 = array('upload_data' => $this->upload->data());
            $nm_foto  = $data1['upload_data']['file_name'];
        }

        $this->session->set_userdata('nama',$namalengkap);
        $this->session->set_userdata('gambar',$nm_foto);
        $this->session->set_userdata('notel',$nomor);

        $result= $this->M_User->simpanprof($namalengkap,$nomor,$nm_foto,$id);
        //$result= $this->M_datakaryawan->simpandatakaryawan($nik,$nipkaryawan,$namakaryawan,$nm_foto,$jabatan);
        echo json_decode($result);

    }

    function hapusemplo(){
        $autokode=$this->input->post('autokode');
        $data=$this->M_User->hapus_emplo($autokode);
        echo json_encode($data);
    }
	// End Function Emplo
	// Cek username
	public function checkUsername()
	{
	  if($this->M_User->getUsername($_POST['username'])){
	   echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
	   </i> This user is already registered</span></label>';
	  }
	  else {
	   echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Username is available</span></label>';
	  }
	}

    // Function Akses
    function simpanakses(){
       $akses=$this->input->post('akses');
       $data=$this->M_User->simpanakses($akses);
       echo json_encode($data); 
    }

    function v_akses(){
        $data=$this->M_User->vakses();
        echo json_encode($data);
    }

    function updateakses(){
        $akses=$this->input->post('akses');
        $id=$this->input->post('id');
        $data=$this->M_User->updateakses($id,$akses);
        echo json_encode($data);
    }

}
?>