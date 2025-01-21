<?php
class M_Print extends CI_Model
{
	function viewemplo($iduser){
		$hasil = $this->db->query("SELECT d.divisi,s.store_name,u.name,u.cuti 
									FROM user u
									LEFT JOIN divisi d
									ON u.id_divisi=d.id
									LEFT JOIN store s
									ON u.lokasi=s.id
									WHERE u.id ='$iduser'");
		return $hasil->row();
	}

	function datacuti($iduser){
		$hasil = $this->db->query("SELECT d.id,d.nocuti,DATE_FORMAT(d.tglawal, '%d %M %Y') AS tglawal,DATE_FORMAT(d.tglakhir, '%d %M %Y') AS tglakhir,
									DATE_FORMAT(d.tglkirim, '%d %M %Y') AS tglkirim,d.jmlhari,d.note ,j.jenis
									FROM 
									dtcuti d 
									LEFT JOIN 
									jnscuti j
									ON d.jeniscuti=j.id
									WHERE d.iduser ='$iduser'");
		return $hasil->row();
	}
    
}
?>