<?php 

 class BukuModel extends CI_Model
 {
    public function countBuku()
    {
        $sql = "SELECT count(judul) as judul FROM tbl_buku";
        $result = $this->db->query($sql);
        return $result->row()->judul;
    }
     public function getAllBuku()
     {
         $query = $this->db->get('tbl_buku')->result_array();
         return $query;
     }
     public function AddBuku()
     {
         $data =[
             "kd_buku" => $this->input->post('kd_buku', true),
             "judul" => $this->input->post('judul', true),
             "penulis" => $this->input->post('penulis', true),
             "penerbit" => $this->input->post('penerbit', true),
             "thn_terbit" => $this->input->post('thn_terbit', true),             
             "jumlah" => $this->input->post('jml_buku', true),             
        ];

        $this->db->insert('tbl_buku', $data);
     }
     public function deleteData($id)
     {
         $this->db->where('kd_buku', $id);
         $this->db->delete('tbl_buku');
     }
     public function getBukubyId($id)
     {
        $query = $this->db->get_where('tbl_buku',['kd_buku'=>$id])->row_array();
        return $query;
     }
     public function updateDataBuku()
     {
         $data =[
             "judul" => $this->input->post('judul', true),
             "penulis" => $this->input->post('penulis', true),
             "penerbit" => $this->input->post('penerbit', true),
             "thn_terbit" => $this->input->post('thn_terbit', true),             
             "jumlah" => $this->input->post('jml_buku', true),             
        ];

        $this->db->where('kd_buku', $this->input->post('kd_buku'));
        $this->db->update('tbl_buku', $data);
     }
     public function searchData()
     {
         $keyword = $this->input->post('keyword', true);
         $this->db->like('kd_buku', $keyword);
         $this->db->or_like('judul', $keyword);
         $this->db->or_like('penulis', $keyword);
         $this->db->or_like('penerbit', $keyword);
         $this->db->or_like('thn_terbit', $keyword);

         $query = $this->db->get('tbl_buku')->result_array();
         return $query;
     }

     public function kd_buku()
     {
         $sql = "SELECT MAX(MID(kd_buku,9,4)) AS kd_buku FROM tbl_buku WHERE 
         MID(kd_buku, 3, 6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
         $query = $this->db->query($sql);
         if ($query->num_rows() > 0) {
             $row = $query->row();
             $n = ((int)$row->kd_buku) + 1;
         $no = sprintf("%' .04d", $n);
         }else{
             $no="0001";
         }
         $kd = "BK".date('ymd').$no;
         return $kd;
     }
 }
 

?>