<?php
class C_Nologin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
			$this->load->model('M_Newtask');
        	$this->load->library('Mylibrary');
          
	}

	function index(){
		$this->load->view('Content/Task/Alltask');
	}

	function datatask(){
		$gettanggal=$this->input->post('gettanggal');
		$data=$this->M_Newtask->totalsession($gettanggal);
		echo json_encode(['data' => $data]);
	}

	public function get_data_by_store() {
        $id_store = $this->input->post('id_store');  // Mendapatkan data id_store dari POST
        $tanggal = $this->input->post('tanggal');    // Mendapatkan data tanggal dari POST

        // Memanggil model untuk mendapatkan data
        $data = $this->M_Newtask->get_data_by_store($id_store, $tanggal);

        // Cek apakah data ditemukan
        if ($data) {
            echo json_encode($data);  // Mengembalikan data dalam format JSON
        } else {
            echo json_encode(['message' => 'Data not found']);  // Mengembalikan pesan jika data tidak ditemukan
        }
    }

}
?>