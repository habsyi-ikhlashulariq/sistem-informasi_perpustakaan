<?php 
class PetugasModel extends CI_Model
{
    public function getAllPetugas()
    {
        $query = $this->db->get('tbl_petugas')->result_array();
        return $query;
    }
    public function addData()
    {
        $data = [
            "kd_petugas" => $this->input->post('kd_petugas', true),
            "nama" => $this->input->post('nama', true),
            "jk" => $this->input->post('jk', true),
            "telp" => $this->input->post('telp', true),
            "alamat" => $this->input->post('alamat', true)
        ];

        $this->db->insert('tbl_petugas', $data);
    }

    public function getDatabyId($id)
    {
       $query = $this->db->get_where('tbl_petugas',["kd_petugas"=> $id])->row_array();
       return $query;
    }
    public function updateData($id)
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "jk" => $this->input->post('jk', true),
            "telp" => $this->input->post('telp', true),
            "alamat" => $this->input->post('alamat', true),
        ];

        $this->db->where('kd_petugas', $this->input->post('kd_petugas'));
        $this->db->update('tbl_petugas', $data);
    }
    public function searchData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kd_petugas', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('jk', $keyword);
        $this->db->or_like('telp', $keyword);
        $this->db->or_like('alamat', $keyword);

        $query = $this->db->get('tbl_petugas')->result_array();
        return $query;
    }

}

?>