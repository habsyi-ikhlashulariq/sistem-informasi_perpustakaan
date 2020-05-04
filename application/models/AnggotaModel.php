<?php 

class AnggotaModel extends CI_Model{
    public function countAnggota()
    {
        $sql = "SELECT count(nama) as nama FROM tbl_anggota";
        $result = $this->db->query($sql);
        return $result->row()->nama;
    }
    public function getAllAnggota()
    {
        $query = $this->db->get('tbl_anggota')->result_array();
        return $query;
    }
    public function addData()
    {
        $data = [
            "kd_anggota" => $this->input->post('kd_anggota'),
            "nama" => $this->input->post('nama'),
            "prodi" => $this->input->post('prodi'),
            "alamat" => $this->input->post('alamat')
        ];
        $this->db->insert('tbl_anggota', $data);
    }
    public function getDatabyId($id)
    {
        $query = $this->db->get_where('tbl_anggota', ['kd_anggota' => $id])->row_array();
        return $query;
    }
    public function updateData($id)
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "jk"=> $this->input->post('jk'),
            "prodi" => $this->input->post('prodi'),
            "alamat" => $this->input->post('alamat')

        ];
        $this->db->where('kd_anggota', $this->input->post('kd_anggota'));
        $this->db->update('tbl_anggota', $data);
    }
    public function deleteData($id)
    {
        $this->db->where('kd_anggota', $id);
        $this->db->delete('tbl_anggota');
    }
    public function searchData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kd_anggota', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('jk', $keyword);
        $this->db->or_like('prodi', $keyword);
        $this->db->or_like('alamat', $keyword);

        $query = $this->db->get('tbl_anggota')->result_array();
        return $query;
    }
}

?>