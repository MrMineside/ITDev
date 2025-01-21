<?php
class MLogin extends CI_Model
{
	function cek_login($username,$password){
		$this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get('user');
        return $query->row_array();
		//$sql = $this->db->query("SELECT * FROM user WHERE username='$username' AND password=MD5('$password')");
		 //return $sql;
		//return $this->db->query("SELECT * FROM user WHERE username='$username' and password='$password'");
		
	}

	function get_infouser($username){
		$hsl=$this->db->query("SELECT * FROM user WHERE username='$username' or email='$username'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'id' => $data->id,
                );
            }
        }
        return $hasil;
	}

	function opdivisi(){
    	$hasil=$this->db->query("SELECT * FROM divisi WHERE id !='1' AND id !='2' AND id !='9' ORDER BY divisi ASC");
    	return $hasil->result();
	}

	function opstore(){
    	$hasil=$this->db->query("SELECT * FROM store ORDER BY jenis DESC");
    	return $hasil->result();
	}

	public function is_username_exists($username)
	{
	    $query = $this->db->get_where('user', array('username' => $username));
	    return $query->num_rows() > 0;
	}

	function simpanregis($email,$name,$notelp,$tmplahir,$tgllahir,$store,$divisi,$username,$password,$alamat){
		$data = array(
			'name' => $name,
			'no_telpon' => $notelp,
			'tmtlahir' => $tmplahir,
			'tgllahir' => $tgllahir,
			'lokasi' => $store,
			'id_divisi' => $divisi,
			'username' => $username,
			'password' => md5('$password'),
			'alamat' => $alamat,
			'cuti' => '14',
			'gambar' => 'default.png',
			'hak_akses' => '4',
			'status' => '1',
			'tgl_bikin' => date('Y-m-d'),
			'email' => $email
		);

		$data = $this->db->insert('user',$data);
		return $data;
	}

}
?>