<?php
class M_Cuti extends CI_Model
{
    function getholidaybydate($tanggal){
		$sql = $this->db->query("SELECT * from holiday where tanggal='". $tanggal  ."'");
		return $sql->result();
	}

	function getdatauser($id){
		$hsl=$this->db->query("SELECT u.id,u.gambar,u.name,u.no_telpon,u.alamat,u.email,u.username,u.password,d.divisi,a.akses,u.cuti,s.store_name
								FROM user u 
								LEFT JOIN divisi d 
								ON u.id_divisi=d.id 
								LEFT JOIN akses a 
								ON u.hak_akses=a.id
								LEFT JOIN store s 
								ON u.lokasi=s.id 
								WHERE u.id = '$id'");
			if($hsl->num_rows()>0){
			  foreach ($hsl->result() as $data) {
			    $hasil=array(
			      'no_telpon' => $data->no_telpon,
			      'divisi' => $data->divisi ,
			      'alamat' => $data->alamat,
			      'email' => $data->email,
			      'username' => $data->username,
			      'name' => $data->name,
			      'lokasi' => $data->store_name,
			      'password' => $data->password,
			      'akses' => $data->akses,
			      'cuti'=> $data->cuti,
			      );
			  }
			}
		return $hasil;
	}

	function jeniscuti(){
		$sql = $this->db->query("SELECT * FROM jnscuti WHERE id !='3'");
		return $sql->result();
	}

	function itunghari($tglawal,$jenis){
		$query = $this->db->query("SELECT setting FROM jnscuti WHERE id = '$jenis'");
		$row = $query->row();
		$seting = $row->setting;


		$sql = $this->db->query("SELECT DATE_ADD('$tglawal', INTERVAL '$seting'+1 DAY) as tglmulai, DATE_ADD('$tglawal', INTERVAL '$seting' DAY) as endtgl,setting,jenis,id FROM jnscuti WHERE id = '$jenis';");
		return $sql->row();
	}


	function simpancuti($tglawal,$tglakhir,$jenis,$lain,$totday,$bfcuti,$sisa,$iduser,$nm_foto){
		$nocuti=date('myhis');
	    $data = array(
	    		'nocuti' => 'CT/'.$nocuti,
	            'iduser' => $iduser,
	            'jeniscuti' => $jenis,
	            'tglawal' => $tglawal,
	            'tglakhir' => $tglakhir,
	            'jmlhari' => $totday,
	            'file' => $nm_foto,
	            'status' => '1',
	            'tglkirim' => date('Y-m-d'), 
	            );  
	    $this->db->insert('dtcuti',$data);
	    $idcuti = $this->db->insert_id();
	    
	    $datainfo = array(
	    	'idcuti' => $idcuti,
			'tanggal' => date('Y-m-d'),
			'jam' => date('H:i'),
			'info' => '-',
			'status' => 'Terkirim To HRD',
	    );
	    $this->db->insert('prcuti',$datainfo);
	    
	    $dataupdt = array(
			'cuti' => $sisa,
		);
		$this->db->where('id',$iduser);
		$result = $this->db->update('user',$dataupdt);
			    
	    return $result;
	}

	function simpancutihamil($tglawal,$tglakhir,$jenis,$lain,$totday,$bfcuti,$sisa,$iduser,$nm_foto){
		$nocuti=date('myhis');
	    $data = array(
	    		'nocuti' => 'CT/'.$nocuti,
	            'iduser' => $iduser,
	            'jeniscuti' => $jenis,
	            'tglawal' => $tglawal,
	            'tglakhir' => $tglakhir,
	            'jmlhari' => $totday,
	            'file' => $nm_foto,
	            'status' => '1',
	            'tglkirim' => date('Y-m-d'), 
	            );  
	    $this->db->insert('dtcuti',$data);
	    $idcuti = $this->db->insert_id();
	    
	    $datainfo = array(
	    	'idcuti' => $idcuti,
			'tanggal' => date('Y-m-d'),
			'jam' => date('H:i'),
			'info' => '1',
			'status' => 'Terkirim To HRD',
	    );
	    $result = $this->db->insert('prcuti',$datainfo);
			    
	    return $result;
	}

	function datacutiuser($id){
		$sql = $this->db->query("SELECT c.id,c.jeniscuti,j.Jenis,c.tglawal,c.tglakhir,c.jmlhari,c.`status`,c.jmlhari,u.id as iduser,u.cuti
								FROM dtcuti c 
								LEFT JOIN user u 
								ON c.iduser=u.id 
								LEFT JOIN jnscuti j 
								ON c.jeniscuti=j.id
								WHERE u.id = '$id'");
		return $sql->result();
	}

	function histcuti($id){
		$sql = $this->db->query("SELECT j.Jenis,c.`status`,DATE_FORMAT(p.tanggal, '%d %M %Y') AS tanggal,p.`status`,u.name,p.info,p.jam
								FROM prcuti p 
								LEFT JOIN user u 
								ON p.iduser=u.id
								LEFT JOIN dtcuti c
								ON p.idcuti=c.id
								LEFT JOIN jnscuti j
								ON c.jeniscuti=j.id  
								WHERE c.id = '$id' ORDER BY p.tanggal,p.jam DESC");
		return $sql->result();

	}

	function datacutikaryawan($sorby){
		if ($sorby == "0") {
			$sql = $this->db->query("SELECT d.id,u.name,v.divisi,s.store_name,j.Jenis,d.jmlhari,d.`status`,d.`file`,DATE_FORMAT(d.tglawal, '%d %M %Y') AS tglawal,DATE_FORMAT(d.tglakhir, '%d %M %Y') AS tglakhir,DATE_FORMAT(d.tglkirim, '%d %M %Y') AS tglkirim  
								FROM dtcuti d 
								LEFT JOIN user u
								ON d.iduser=u.id
								LEFT JOIN divisi v 
								ON u.id_divisi=v.id
								LEFT JOIN store s 
								ON u.lokasi=s.id
								LEFT JOIN jnscuti j
								ON d.jeniscuti=j.id");	
		}else{
			$sql = $this->db->query("SELECT d.id,u.name,v.divisi,s.store_name,j.Jenis,d.jmlhari,d.`status`,d.`file`,DATE_FORMAT(d.tglawal, '%d %M %Y') AS tglawal,DATE_FORMAT(d.tglakhir, '%d %M %Y') AS tglakhir,DATE_FORMAT(d.tglkirim, '%d %M %Y') AS tglkirim  
								FROM dtcuti d 
								LEFT JOIN user u
								ON d.iduser=u.id
								LEFT JOIN divisi v 
								ON u.id_divisi=v.id
								LEFT JOIN store s 
								ON u.lokasi=s.id
								LEFT JOIN jnscuti j
								ON d.jeniscuti=j.id
								WHERE d.`status`='$sorby'");
		}
		return $sql->result();
	}

	function d_cuti($id,$idhrd,$sts){
		if ($sts = "4") {
			$sql = $this->db->query("SELECT d.id,d.nocuti,u.name,v.divisi,s.store_name,j.Jenis,DATE_FORMAT(d.tglawal, '%d %M %Y') AS tglawal,DATE_FORMAT(d.tglakhir, '%d %M %Y') AS tglakhir,DATE_FORMAT(d.tglkirim, '%d %M %Y') AS tglkirim ,d.jmlhari,d.`status`,d.`file`,u.minuscuti,u.cuti,d.note 
									FROM dtcuti d 
									LEFT JOIN user u
									ON d.iduser=u.id
									LEFT JOIN divisi v 
									ON u.id_divisi=v.id
									LEFT JOIN store s 
									ON u.lokasi=s.id
									LEFT JOIN jnscuti j
									ON d.jeniscuti=j.id
									WHERE d.id = '$id'");
		}else{
			$this->db->query("UPDATE dtcuti SET status = '2', idhrd = '$idhrd' WHERE id='$id'");	    
		    $datainfo = array(
		    	'idcuti' => $id,
				'tanggal' => date('Y-m-d'),
				'jam' => date('H:i'),
				'info' => '2',
				'status' => 'Cuti anda sedang direview',
				'iduser' => $idhrd,
		    );
		    $this->db->insert('prcuti',$datainfo);
			$sql = $this->db->query("SELECT d.id,d.nocuti,u.name,v.divisi,s.store_name,j.Jenis,DATE_FORMAT(d.tglawal, '%d %M %Y') AS tglawal,DATE_FORMAT(d.tglakhir, '%d %M %Y') AS tglakhir,DATE_FORMAT(d.tglkirim, '%d %M %Y') AS tglkirim ,d.jmlhari,d.`status`,d.`file`,u.minuscuti,u.cuti,d.note 
									FROM dtcuti d 
									LEFT JOIN user u
									ON d.iduser=u.id
									LEFT JOIN divisi v 
									ON u.id_divisi=v.id
									LEFT JOIN store s 
									ON u.lokasi=s.id
									LEFT JOIN jnscuti j
									ON d.jeniscuti=j.id
									WHERE d.id = '$id'");
		}
		return $sql->result();
	}

	function total_store($q = '1') {
	    $this->db->like('jenis', $q);
	    $this->db->from('store');
	    return $this->db->count_all_results();
	}

	function total_newcuti($q = '1') {
	    $this->db->like('status', $q);
	    $this->db->from('dtcuti');
	    return $this->db->count_all_results();
	}

	function approv($no_aju,$idhrd){
		$this->db->query("UPDATE dtcuti SET status = '4', idhrd = '$idhrd' WHERE id='$no_aju'");	    
	    $datainfo = array(
	    	'idcuti' => $no_aju,
			'tanggal' => date('Y-m-d'),
			'jam' => date('H:i'),
			'info' => '4',
			'status' => 'Selamat pengajuan cuti diSetujui',
			'iduser' => $idhrd,
	    );
	    $sql = $this->db->insert('prcuti',$datainfo);

		return $sql;
	}

	function sendnote($kodeju,$note,$idhrd){
		$data = array(
			'notereject' => $note,
			'status' => '3',
			'idhrd' => $idhrd
		);
		$this->db->where('id',$kodeju);
		$this->db->update('dtcuti',$data);
		$datainfo = array(
	    	'idcuti' => $kodeju,
			'tanggal' => date('Y-m-d'),
			'jam' => date('H:i'),
			'info' => '3',
			'status' => 'Maaf cuti anda ditolak',
			'iduser' => $idhrd,
	    );
	    $sql = $this->db->insert('prcuti',$datainfo);

		return $sql;

	}

	function withoutnote($kodeju,$idhrd){
		$data = array(
			'notereject' => '-',
			'status' => '3',
			'idhrd' => $idhrd
		);
		$this->db->where('id',$kodeju);
		$sql = $this->db->update('dtcuti',$data);
		$datainfo = array(
	    	'idcuti' => $kodeju,
			'tanggal' => date('Y-m-d'),
			'jam' => date('H:i'),
			'info' => '3',
			'status' => 'Maaf cuti anda ditolak',
			'iduser' => $idhrd,
	    );
	    $sql = $this->db->insert('prcuti',$datainfo);

		return $sql;

	}

	function updatecuti($id,$sisa){
		$data=array(
			'cuti' => $sisa,
		);
		$this->db->where('id', $id);
		$result=$this->db->update('user',$data);
		return $result;
	}

	function deletecuti($no_aju){
		$sql = $this->db->query("DELETE FROM dtcuti WHERE id = '$no_aju'");
		$this->db->query("DELETE FROM prcuti WHERE idcuti = '$no_aju'");
		return $sql;
	}

}
?>