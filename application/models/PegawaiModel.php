<?php 

class PegawaiModel extends CI_Model
{
    public function countPegawaiPe()
    {
        $sql = "SELECT count(nama) as nama FROM tbl_pegawai WHERE level = 'Petugas Perpustakaan'";
        $result = $this->db->query($sql);
        return $result->row()->nama;
    }
    public function countPegawai()
    {
        $sql = "SELECT count(nama) as nama FROM tbl_pegawai";
        $result = $this->db->query($sql);
        return $result->row()->nama;
    }
    public function getAllPegawai()
    {
        $query = $this->db->get('tbl_pegawai')->result_array();
        return $query;
    }
    public function addPegawai()
    {
        $data = [
            "kd_pegawai" => $this->input->post('kd_pegawai'),
            "nama" => $this->input->post('nama'),
            "username" => $this->input->post('username'),
            "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            "jk" => $this->input->post('jk'),
            "telp" => $this->input->post('telp'),
            "alamat" => $this->input->post('alamat'),
            "avatar" => $this->input->post('avatar'),
            "level" => $this->input->post('level'),
        ];

        $this->db->insert('tbl_pegawai', $data);
    }
    public function getPegawaibyId($id)
    {
        $data = ['kd_pegawai' => $id];
        $query = $this->db->get_where('tbl_pegawai',$data)->row_array();
        return $query;
    }
    public function updatePegawai($id)
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password'),
            "jk" => $this->input->post('jk'),
            "telp" => $this->input->post('telp'),
            "alamat" => $this->input->post('alamat'),
            "level" => $this->input->post('level'),
        ];
        $this->db->where('kd_pegawai', $this->input->post('kd_pegawai'));
        $this->db->update('tbl_pegawai', $data);
    }

    public function deletePegawai($id)
    {
        $this->db->where('kd_pegawai', $id);
        $this->db->delete('tbl_pegawai');
    }
    public function searchData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kd_pegawai', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('username', $keyword);
        $this->db->or_like('jk', $keyword);
        $this->db->or_like('alamat', $keyword);

        $query = $this->db->get('tbl_pegawai')->result_array();
        return $query;
    }
}



?>