<?php
class C_Tasksales extends MY_Controller
{
	
	Public function __construct()
	{
		parent::__construct();
			$this->load->model('M_Tasksales');
        	$this->load->library('Mylibrary');
            // if($this->session->userdata('id')==''){
            //     redirect(base_url("index.php/C_Login"));
            // }

	}

	function index(){
		$data['judul']='TASK SALES';
	    // $data['id']=$this->session->id;
		$this->load->view('Content/Task/Tasksales',$data);
	}

	function op_store(){
		$gettanggal=$this->input->post('gettanggal');
		$type=$this->input->post('type');
		$idhead=$this->input->post('idhead');
		$data=$this->M_Tasksales->opstore($gettanggal,$type,$idhead);
		echo json_encode($data);
	}

	function op_storenew(){
		$data=$this->M_Tasksales->opstorenew();
		echo json_encode($data);
	}

	function getstore(){
		$id = $this->input->get('id');
		$data = $this->M_Tasksales->getstore($id);
		echo json_encode($data);
	}

	function gethead(){
		$id = $this->input->get('id');
		$data = $this->M_Tasksales->gethead($id);
		echo json_encode($data);
	}

	function datatask(){
		$gettanggal=$this->input->post('gettanggal');
		$type=$this->input->post('type');
		$data=$this->M_Tasksales->datatask($gettanggal,$type);
		echo json_encode($data);
	}

	 public function get_data() {
        $date = $this->input->get('date');
        $type = $this->input->get('type');
        $idhead = $this->input->get('idhead');
        $data = $this->M_Tasksales->get_data_by_date($date,$type,$idhead);
        
        // Debugging: periksa data yang dikembalikan
        if (empty($data)) {
            echo json_encode(['status' => 'no_data']);
        } else {
            echo json_encode(['status' => 'success', 'data' => $data]);
        }
    }

   public function delete_data() {
        $id = $this->input->post('id');
        $result = $this->M_Tasksales->delete_data($id);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan']);
        }
    }

	function simpantask(){
		$idreport=$this->input->post('idreport');
        $store=$this->input->post('store');
        $type=$this->input->post('type');
        $pilihtgl=$this->input->post('pilihtgl');
        $idhead=$this->input->post('idhead');
        $id=$this->session->id;
        $data=$this->M_Tasksales->simpantask($idreport,$store,$id,$type,$pilihtgl,$idhead);
        echo json_encode($data);
	}

	public function delete_task($id)
    {
       $this->db->delete('tasksales', array('id' => $id));
       echo 'Deleted successfully.';
    }

   // public function generate_number() {
   //      // Mendapatkan angka berikutnya
   //    $next_number = $this->M_Tasksales->get_next_number();

   //      // Menampilkan angka
   //    echo "Angka berikutnya: " . $next_number;

   //      // Simpan angka ke database
   //      // $this->Code_model->save_number($next_number);
   // }

   function create(){
   	$type=$this->input->post('type');
   	$data = $this->M_Tasksales->get_next_number($type);
   	echo json_encode($data);
   }

   function op_creat(){
		$gettanggal=$this->input->post('gettanggal');
		$type=$this->input->post('type');
		$data=$this->M_Tasksales->opcreat($gettanggal,$type);
		echo json_encode($data);
	}
}
?>