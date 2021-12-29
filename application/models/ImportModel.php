<?php 

 class ImportModel extends CI_Model
 {
    public function insert_kategori($data){
		$this->db->insert_batch('tbl_kategori_buku',$data);
		if($this->db->affected_rows()>0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
    public function insert_buku($data){
		$this->db->insert_batch('tbl_buku',$data);
		if($this->db->affected_rows()>0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}

    public function insert_anggota($data){
		$this->db->insert_batch('tbl_anggota',$data);
		if($this->db->affected_rows()>0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}

    public function insert_pegawai($data){
		$this->db->insert_batch('tbl_user',$data);
		if($this->db->affected_rows()>0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
 }