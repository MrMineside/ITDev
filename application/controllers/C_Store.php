<?php
class C_Store extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
			$this->load->model('M_Store');
        	$this->load->library('Mylibrary');
            // if($this->session->userdata('id')==''){
            //     redirect(base_url("index.php/C_Login"));
            // }
	}

	function index(){
		$data['judul']='STORE DATA';
	    // $data['id']=$this->session->id;
		$this->load->view('Content/Setting/Store',$data);
	}

	function datastore(){
		$data = $this->M_Store->datastore();
		echo json_encode($data);
	}

	function simpan_store(){
        $id=$this->input->post('id');
        $store=$this->input->post('store');
        $ipvpn=$this->input->post('ipvpn');
        $accvpn=$this->input->post('accvpn');
        $noremote=$this->input->post('noremote');
        $noany=$this->input->post('noany');
        $type=$this->input->post('type');
        $telepon=$this->input->post('telepon');
        $jambuka=$this->input->post('jambuka');
        $jamtutup=$this->input->post('jamtutup');
        $email=$this->input->post('email');
        $alamat=$this->input->post('alamat');
        $data=$this->M_Store->save_store($id,$store,$type,$ipvpn,$accvpn,$telepon,$jambuka,$jamtutup,$email,$alamat,$noremote,$noany);
        echo json_encode($data);
    }

    function update_store(){
        $id=$this->input->post('id');
        $idupdate=$this->input->post('idupdate');
        $store=$this->input->post('store');
        $ipvpn=$this->input->post('ipvpn');
        $noremote=$this->input->post('noremote');
        $noany=$this->input->post('noany');
        $accvpn=$this->input->post('accvpn');
        $type=$this->input->post('type');
        $telepon=$this->input->post('telepon');
        $email=$this->input->post('email');
        $jambuka=$this->input->post('jambuka');
        $jamtutup=$this->input->post('jamtutup');
        $alamat=$this->input->post('alamat');
        $data=$this->M_Store->updatestore($id,$idupdate,$store,$noremote,$ipvpn,$accvpn,$type,$telepon,$email,$jambuka,$jamtutup,$alamat,$noany);
        echo json_encode($data);
    }


	function get_store(){
        $id=$this->input->get('id');
        $data=$this->M_Store->getstore($id);
        echo json_encode($data);
    }

    public function delete_store($id){
       $this->db->delete('store', array('id' => $id));
       echo 'Deleted successfully.';
    }
}
?>