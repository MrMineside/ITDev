<?php
class M_User extends CI_Model
{
	function listakses(){
    	$hasil=$this->db->query("SELECT * FROM akses WHERE id !='3' ORDER BY akses ASC");
    	return $hasil->result();
	}
	// Function Divisi
	function listdivisi(){
    	$hasil=$this->db->query("SELECT * FROM divisi ORDER BY divisi ASC");
    	return $hasil->result();
	}

	function simpandiv($divisi){
	    $data = array(
	        	'divisi' => $divisi
	            );  
	    $result= $this->db->insert('divisi',$data);
	    return $result;
	}

	function updatedivisi($id,$divisi){
	    $hasil=$this->db->query("UPDATE divisi SET divisi='$divisi' WHERE id='$id'");
	    return $hasil;
	}
	// End Function Divisi
	// Cek Data 
	public function getUsername($username)
	{
	  	$this->db->where('username' , $username);
	  	$query = $this->db->get('user');

	  	if($query->num_rows()>0){
	   		return true;
	  	}
	  	else {
	   		return false;
	  	}
	}
	// End Cek Data
	// Function Emplo
	function listemplo(){
    	$hasil=$this->db->query("SELECT * FROM user ORDER BY name ASC");
    	return $hasil->result();
	}

	function viewemplo(){
		$hasil = $this->db->query("SELECT u.id,u.gambar,u.name,u.no_telpon,u.alamat,u.email,u.username,md5(u.password),d.divisi,a.akses,u.cuti,s.store_name,u.minuscuti 
									FROM user u 
									LEFT JOIN divisi d 
									ON u.id_divisi=d.id 
									LEFT JOIN akses a 
									ON u.hak_akses=a.id
									LEFT JOIN store s 
									ON u.lokasi=s.id
									ORDER BY name ASC");
		return $hasil->result();
	}

	function viewemplobydivisi($divisi){
		if ($divisi == "0") {
			$hasil = $this->db->query("SELECT u.id,u.gambar,u.name,u.no_telpon,u.alamat,u.email,u.username,md5(u.password),d.divisi,a.akses,u.cuti,s.store_name,u.minuscuti 
									FROM user u 
									LEFT JOIN divisi d 
									ON u.id_divisi=d.id 
									LEFT JOIN akses a 
									ON u.hak_akses=a.id
									LEFT JOIN store s 
									ON u.lokasi=s.id
									ORDER BY name ASC");
		}else{
			$hasil = $this->db->query("SELECT u.id,u.gambar,u.name,u.no_telpon,u.alamat,u.email,u.username,md5(u.password),d.divisi,a.akses,u.cuti,s.store_name,u.minuscuti 
									FROM user u 
									LEFT JOIN divisi d 
									ON u.id_divisi=d.id 
									LEFT JOIN akses a 
									ON u.hak_akses=a.id
									LEFT JOIN store s 
									ON u.lokasi=s.id
									WHERE d.id = '$divisi'
									ORDER BY name ASC");
		}
		return $hasil->result();
	}

	function simemplo($newemplo,$divisi,$notel,$email,$username,$password,$alamat,$akses){
		$date = date('Y-m-d');
		$data = array(
				'gambar'	=> 'default.png',
				'name'		=> $newemplo,
				'no_telpon'	=> $notel,
				'id_divisi'	=> $divisi,
				'alamat'	=> $alamat,
				'email'		=> $email,
				'username'	=> $username,
				'password'	=> $password,
				'hak_akses'	=> $akses,
				'cuti' => '12',
				'tgllahir' => $date,
				'tmtlahir' => '-',
				'status' => '1'
				);
		$result = $this->db->insert('user',$data);
		return $result;
	}

	function updemplo($opemplo,$divisi,$notel,$email,$username,$password,$alamat,$akses){
		$data = array(
				'no_telpon'	=> $notel,
				'id_divisi'	=> $divisi,
				'alamat'	=> $alamat,
				'email'		=> $email,
				'username'	=> $username,
				'password'	=> $password,
				'hak_akses'	=> $akses
				);
		$this->db->where('id', $opemplo);
		$hasil =  $this->db->update('user',$data);
		return $hasil;
	}

	function getemplo($id){
	$hsl=$this->db->query("SELECT * FROM user WHERE id='$id'");
	if($hsl->num_rows()>0){
	  foreach ($hsl->result() as $data) {
	    $hasil=array(
	      'no_telpon' => $data->no_telpon,
	      'id_divisi' => $data->id_divisi ,
	      'alamat' => $data->alamat,
	      'email' => $data->email,
	      'username' => $data->username,
	      'password' => $data->password,
	      'akses' => $data->hak_akses,
	      );
	  }
	}
	return $hasil;
	}
	// End Function Emplo
	// Function Akses
	function simpanakses($akses){
		$data=array(
				'akses' => $akses
		);
		$hasil = $this->db->insert('akses',$data);
		return $hasil;
	}

	function vakses(){
    	$hasil=$this->db->query("SELECT * FROM akses ORDER BY akses ASC");
    	return $hasil->result();
	}

	function updateakses($id,$akses){
	    $hasil=$this->db->query("UPDATE akses SET akses='$akses' WHERE id='$id'");
	    return $hasil;
	}

	function hapus_emplo($autokode){
        $hasil=$this->db->query("DELETE FROM user WHERE id='$autokode'");
        return $hasil;
    }
    
}
?>