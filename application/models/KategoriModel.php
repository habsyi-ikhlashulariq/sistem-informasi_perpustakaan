<?php 

 class KategoriModel extends CI_Model
 {
    public function getAllKategori()
    {
        $query = $this->db->get('tbl_kategori_buku')->result_array();
        return $query;
    }
    public function AddKategori()
    {
        $data =[
            "kd_kategori_buku" => $this->input->post('kd_kategori_buku', true),
            "nama" => $this->input->post('nama', true),
       ];

       $this->db->insert('tbl_kategori_buku', $data);
    }

    public function deleteData($id)
    {
        $this->db->where('kd_kategori_buku', $id);
        $this->db->delete('tbl_kategori_buku');
    }

    public function getKategoribyId($id)
     {
        $query = $this->db->get_where('tbl_kategori_buku',['kd_kategori_buku'=>$id])->row_array();
        return $query;
     }
     public function updateDataKategori()
     {
         $data =[
             "nama" => $this->input->post('nama', true),
        ];

        $this->db->where('kd_kategori_buku', $this->input->post('kd_kategori_buku'));
        $this->db->update('tbl_kategori_buku', $data);
     }

     public function searchData()
     {
         $keyword = $this->input->post('keyword', true);
         $this->db->like('kd_kategori_buku', $keyword);
         $this->db->or_like('nama', $keyword);

         $query = $this->db->get('tbl_kategori_buku')->result_array();
         return $query;
     }

    public function kd_kategori()
     {
         $sql = "SELECT MAX(MID(kd_kategori_buku,9,4)) AS kd_kategori_buku FROM tbl_kategori_buku WHERE 
         MID(kd_kategori_buku, 3, 6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
         $query = $this->db->query($sql);
         if ($query->num_rows() > 0) {
             $row = $query->row();
             $n = ((int)$row->kd_kategori_buku) + 1;
         $no = sprintf("%' .04d", $n);
         }else{
             $no="0001";
         }
         $kd = "KB".date('ymd').$no;
         return $kd;
     }
 }