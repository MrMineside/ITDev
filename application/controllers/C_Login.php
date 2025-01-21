<?php
class C_Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
			$this->load->model('MLogin');
        	$this->load->library('Mylibrary');
	}

	function index(){
		$this->load->view('Content/Newlogin');
	}

	function newlogin(){
		$username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->MLogin->cek_login($username, $password);
        if ($user) {
        	if ($user['id_divisi']=='1' or $user['id_divisi']=='9' ) {
        		$this->session->set_userdata('id', $user['id']);
        		$this->session->set_userdata('divisi', "IT");
        		$this->session->set_userdata('status', "Login");
            	redirect('C_Store'); // Ganti 'dashboard' dengan halaman setelah login
        	}else{
        		$this->session->set_userdata('id', $user['id']);
        		$this->session->set_userdata('divisi', 'All');
        		$this->session->set_userdata('status', "Login");
            	redirect('C_Profile'); // Ganti 'dashboard' dengan halaman setelah login
        	}
        } else {
            // Login gagal, tampilkan pesan error atau redirect ke halaman login lagi
            $this->session->set_flashdata('error', 'Username atau password salah.');
            redirect('C_Login'); // Ganti 'login' dengan halaman login
        }
	}

	function login(){
		$iduser=$this->input->post('id');
		$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
        $this->session->set_userdata('id',$iduser);

        $cek_login=$this->MLogin->cek_login($username,$password);
        $data=$cek_login->row_array();
        if($cek_login->num_rows() > 0){
        	if($data['id_divisi']=='1' or $data['id_divisi']=='9'){ //Akses admin
		        $data_session = array(
					'user' => $username,
					'status' => "login",
					'divisi' => 'IT'
				);

				$this->session->set_userdata($data_session);
		        redirect(base_url('index.php/C_Store'));
		    }elseif($data['id_divisi']=='2'){
		    	$data_session = array(
					'user' => $username,
					'status' => "login",
					'divisi' => "HRD"
				);

				$this->session->set_userdata($data_session);
		        redirect(base_url('index.php/C_Hrd'));
		    }else{
		        $data_session = array(
					'user' => $username,
					'status' => "login"
				);

				$this->session->set_userdata($data_session);
	            redirect(base_url('index.php/C_Dsall'));
         	}
        }else{
			// if ($data['status'] == 0) {
			// 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            //         Waiting Confirmation from IT
            //        </div>');
			// }else{
			// 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            //         Username atau Password Salah !
            //        </div>');
			// }
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Username atau Password Salah !
                   </div>');
			redirect('C_Login');
        
        }
	}

	function get_infouser(){
		$username=$this->input->post('username');
        $data=$this->MLogin->get_infouser($username);
        echo json_encode($data);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect();
	}
	
	function opdivisi(){
		$data = $this->MLogin->opdivisi();
		echo json_encode($data);
	}

	function opstore(){
		$data = $this->MLogin->opstore();
		echo json_encode($data);
	}

	public function check_username()
	{
	    $username = $this->input->post('username');
	    $is_username_exists = $this->MLogin->is_username_exists($username);

	    if ($is_username_exists) {
	        echo 'false';
	    } else {
	        echo 'true';
	    }
	}

	function simpanregis(){
		$name = $this->input->post('name');
		$notelp = $this->input->post('notelp');
		$tmplahir = $this->input->post('tmplahir');
		$tgllahir = $this->input->post('tgllahir');
		$store = $this->input->post('store');
		$divisi = $this->input->post('divisi');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$data = $this->MLogin->simpanregis($email,$name,$notelp,$tmplahir,$tgllahir,$store,$divisi,$username,$password,$alamat);
		echo json_encode($data);
	}
}
?>