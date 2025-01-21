<?php
class M_Newtask extends CI_Model
{
	function opstore($gettanggal,$type,$idhead){
		$query=$this->db->query("SELECT id_store,store_name FROM store WHERE id_store NOT IN 
								(SELECT id_store FROM newtask s LEFT JOIN headts h ON s.idhead=h.id  
								WHERE h.tgl='$gettanggal' AND s.status ='1' AND s.type = '$type' AND idhead ='$idhead') 
								AND jenis!='2' ORDER BY id_store ASC");
		return $query->result();
	}

	function opstorenew(){
		$query=$this->db->query("SELECT id_store,store_name FROM store");
		return $query->result();
	}

	function getstore($id){
		$hsl=$this->db->query("SELECT * FROM store WHERE id_store='$id'");
			if($hsl->num_rows()>0){
			  foreach ($hsl->result() as $data) {
			    $hasil=array(
			      	'noremote' => $data->noremote,
			      	'noany' => $data->noany,
			      );
			  }
			}
			return $hasil;
		}

	function gethead($id){
		$hsl=$this->db->query("SELECT * FROM headts WHERE id='$id'");
			if($hsl->num_rows()>0){
			  foreach ($hsl->result() as $data) {
			    $hasil=array(
			      	'id' => $data->id,
			      );
			  }
			}
			return $hasil;
		}

    function datatask($gettanggal,$type){
		$sql = $this->db->query("SELECT u.name,s.id_store,s.store_name,r.status,r.jam,r.id as idtask,Coalesce(s.noremote,'-') as noremote 
		FROM newtask r LEFT JOIN store s ON r.id_store=s.id_store 
		LEFT JOIN user u ON r.id_user=u.id WHERE r.tanggal='$gettanggal' AND r.type = '$type' ORDER BY r.jam DESC");
		return $sql->result();
	}

	function simpantask($idreport,$store,$id,$type,$pilihtgl,$idhead){
		$jam = date('H:i:s');
	    $tgl = date('Y-m-d');
	    $data = array(
	            'id_report' => $idreport,
	            'id_store' => $store,
	            'type' => $type,
	            'status' => '1',
	            'tanggal' => $pilihtgl,
	            'jam' => $jam,
	            'alasan' => '-',
	            'id_user' => $id,
	            'idhead' => $idhead
	            );  
	    $result= $this->db->insert('newtask',$data);
	    return $result;
	}
	
	function dataviewall($gettanggal){
		$sql = $this->db->query("SELECT u.name,s.id_store,s.store_name,r.status,DATE_FORMAT(r.tanggal, '%d %M %Y') AS tanggal,r.jam,r.id as idtask,Coalesce(s.noremote,'-') as noremote FROM newtask r LEFT JOIN store s ON r.id_store=s.id_store LEFT JOIN user u ON r.id_user=u.id WHERE r.tanggal='$gettanggal' AND r.type = '1' ORDER BY r.jam DESC");
		return $sql->result();
	}

	public function get_next_number($type) {
        // Mendapatkan tanggal saat ini dalam format YYYY-MM-DD
        $date = date('Y-m-d');
        $jam = date('H:i');

        // Mendapatkan urutan terakhir dari database berdasarkan tanggal
        $this->db->select('MAX(tarik) as max_number');
        $this->db->from('headts');
        $this->db->where('tgl', $date);
        $this->db->where('type', $type);
        $query = $this->db->get();
        $row = $query->row();

        // Jika tidak ada urutan sebelumnya, mulai dari 1
        $next_number = 1;
        if ($row && $row->max_number) {
            $next_number = $row->max_number + 1; // Kelipatan 2
        }

        $data = array(
	            'tgl' => $date,
	            'jam' => $jam,
	            'tarik' => $next_number,
	            'type' => $type
	            );  
	    $this->db->insert('headts',$data);

	    $result = $this->db->insert_id();
	    return $result;
    }


   	public function get_data_by_date($date,$type,$idhead) {
        $query = $this->db->query("SELECT u.name,s.id_store,s.store_name,r.status,r.jam,r.tanggal,r.id as idtask,Coalesce(s.noremote,'-') as noremote 
		FROM newtask r LEFT JOIN store s ON r.id_store=s.id_store 
		LEFT JOIN user u ON r.id_user=u.id WHERE r.tanggal='$date' AND r.type = '$type' AND r.idhead = '$idhead' ORDER BY r.jam DESC");
        return $query->result();
    }

     public function delete_data($id) {
        $this->db->where('id', $id);
        return $this->db->delete('newtask');
    }

    function opcreat($gettanggal,$type){
		$query=$this->db->query("SELECT id,jam FROM headts WHERE tgl='$gettanggal' AND type='$type'");
		return $query->result();
	}

	function totalsession($gettanggal){
		$query=$this->db->query("SELECT 
								    s.id_store,
								    s.store_name,
								    t.status,
								    COALESCE(COUNT(t.id), 0) AS total_tarik,
								    COALESCE(t.tanggal, 'Not Day') AS tanggal
								  
								FROM 
								    store s
								LEFT JOIN 
								    newtask t ON s.id_store = t.id_store 
								    AND t.tanggal = '$gettanggal' AND t.`type`='1'
								GROUP BY 
								    s.id_store
								ORDER BY 
								    s.store_name ASC;");
		return $query->result();
	}

	public function get_data_by_store($id_store, $tanggal) {
        $this->db->select('s.store_name, t.jam,u.name');
        $this->db->from('newtask t');
        $this->db->join('store s', 't.id_store = s.id_store', 'left');
        $this->db->join('user u', 't.id_user = u.id', 'left');
        $this->db->where('t.id_store', $id_store);
        $this->db->where('t.tanggal', $tanggal);
        
        $query = $this->db->get();

        // Cek apakah ada data yang ditemukan
        if ($query->num_rows() > 0) {
            return $query->result();  // Mengembalikan data
        }
        return null;  // Mengembalikan null jika tidak ada data
    }

}
?>