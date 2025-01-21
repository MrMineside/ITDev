<?php
class C_Cuti extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
			$this->load->model('M_Cuti');
    		// $this->load->model('M_Store');
			$this->load->library('Mylibrary');
            $this->load->helper('url');
            $this->load->helper('date');
	}

	function index(){
		$this->load->view('Content/F_Cuti');
	}

    function getdatauser(){
        $id = $this->session->id;
        $data = $this->M_Cuti->getdatauser($id);
        echo json_encode($data);
    }

    function jnscuti(){
        $data = $this->M_Cuti->jeniscuti();
        echo json_encode($data);
    }

    function hitungjml(){
        $tglawal = $this->input->post('tglawal');
        $jenis = $this->input->post('jenis');
        $data = $this->M_Cuti->itunghari($tglawal,$jenis);
        echo json_encode($data);
    }

	function get_day_without_weekend($begin,$end){  

        $start = new DateTime($begin);
        $over = new DateTime($end);
        $over = $over->modify("+1 day");

        // Get Tgl Databse
        //$gettgldb = $this->M_Profile->cekholiday($begin,$end);
         
        $daterange     = new DatePeriod($start, new DateInterval('P1D'), $over);               
        //mendapatkan range antara dua tanggal dan di looping

        $i      = 0;
        // $x      = 0;
        // $end    = 1;

        foreach($daterange as $date){
            $daterange     = $date->format("Y-m-d");
            $datetime     = DateTime::createFromFormat('Y-m-d', $daterange);

            //Convert tanggal untuk mendapatkan nama hari
            $day    = $datetime->format('D');

            //Check untuk menghitung yang bukan hari sabtu dan minggu dan hari libur
            $harilibur = $this->M_Cuti->getholidaybydate($date->format("Y-m-d"));
            if (count($harilibur) < 1){
                if($day!="Sun" && $day!="Sat" ) {
                    //echo $i;
                    // $x    +=    $end-$i;
                    $i += 1;
                }    
            }
            
            // $end++;
            // $i++;
        }
        // return $x+1;
        return $i;
    }

    function interval()
    {
        $begin = $this->input->post('awalpengajuan');
        $end = $this->input->post('akhirpengajuan');

        
        //$get_day = $this->get_day($awal_p,$lama_p); 
        $day_without_weekend = $this->get_day_without_weekend($begin,$end); 

        //echo 'Jumlah hari dengan hari libur adalah :'.$get_day.'<br>';
        //echo 'Jumlah hari selain hari libur adalah :'.$day_without_weekend.'<br>';
        echo json_encode($day_without_weekend);

    }

    function simpan(){
        $iduser = $this->session->id;
        $tglawal = $this->input->post('tglawal');
        $tglakhir = $this->input->post('tglakhir');
        $jenis = $this->input->post('perihal');
        $lain = $this->input->post('lain');
        $totday = $this->input->post('totday');
        $bfcuti = $this->input->post('bfcuti');
        $sisa = $this->input->post('sisa');

        $image = $iduser.date("Y/m/d").date("hs");
        $nm_foto='';
        
        $config['upload_path']          = 'assets/gambarcuti/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 6000;
        $config['max_width']            = 50000;
        $config['max_height']           = 50000;
        $config['file_name']            = $image;
 
        $this->load->library('upload', $config);
    
        if ( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
            $nm_foto  = '-'; 
        }else{
            unlink('assets/Image/'.$fotolama);
            $data1 = array('upload_data' => $this->upload->data());
            $nm_foto  = $data1['upload_data']['file_name'];
        }
        
        if ($jenis == "2") {
            $data = $this->M_Cuti->simpancutihamil($tglawal,$tglakhir,$jenis,$lain,$totday,$bfcuti,$sisa,$iduser,$nm_foto);
        }else{
            $data = $this->M_Cuti->simpancuti($tglawal,$tglakhir,$jenis,$lain,$totday,$bfcuti,$sisa,$iduser,$nm_foto);
        }

        echo json_encode($data);
    }

}
?>