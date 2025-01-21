<?php
	class M_Store extends CI_Model
	{
		function datastore(){
		    $hasil=$this->db->query("SELECT *,Coalesce(email,'-') as email,Coalesce(alamat,'-') as alamat,Coalesce(noremote,'-') as noremote,Coalesce(noany,'-') as noany  FROM store ORDER BY id_store ASC");
		    return $hasil->result();
		}

		function save_store($id,$store,$ipvpn,$accvpn,$telepon,$jambuka,$jamtutup,$email,$alamat,$type,$noremote,$noany){
		  	$hasil=$this->db->query("INSERT INTO store(id_store,store_name,ip_vpn,jenis,account_vpn,telepon,jam_buka,jam_tutup,email,alamat,noremote,noany)VALUES('$id','$store','$ipvpn','$type','$accvpn','$telepon','$jambuka','$jamtutup','$email','$alamat','$noremote','$noany')");
		  	return $hasil;
		}

		function getstore($id){
			$hsl=$this->db->query("SELECT * FROM store WHERE id='$id'");
			if($hsl->num_rows()>0){
			  foreach ($hsl->result() as $data) {
			    $hasil=array(
			    	'id_store' => $data->id_store,
			      	'store_name' => $data->store_name,
			      	'ip_vpn' => $data->ip_vpn,
			      	'account_vpn' => $data->account_vpn,
			      	'telepon' => $data->telepon,
			      	'jambuka' => $data->jam_buka,
			      	'jamtutup' => $data->jam_tutup,
			      	'email' => $data->email,
			      	'alamat' => $data->alamat,
			      	'noremote' => $data->noremote,
			      	'noany' => $data->noany
			      );
			  }
			}
			return $hasil;
		}

		function updatestore($id,$idupdate,$store,$noremote,$ipvpn,$accvpn,$type,$telepon,$email,$jambuka,$jamtutup,$alamat,$noany){
			$sql = $this->db->query("UPDATE store SET id_store='$id',store_name='$store',noremote='$noremote',ip_vpn='$ipvpn',account_vpn='$accvpn',jenis='$type',telepon='$telepon',email='$email',jam_buka='$jambuka',jam_tutup='$jamtutup',alamat='$alamat',noany='$noany' WHERE id='$idupdate'");
			return $sql;
		}

		function datacctv(){
			$sql = $this->db->query("SELECT * FROM cctv_store WHERE id_store=''");
			return $sql->result();
		}
	}
?>