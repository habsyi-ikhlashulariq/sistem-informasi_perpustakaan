<?php 

class PinjamanModel extends CI_Model{
    public function countPeminjaman()
    {
        $sql = "SELECT count(kd_peminjaman) as kode FROM tbl_peminjaman";
        $result = $this->db->query($sql);
        return $result->row()->kode;
    }
    public function getPinjamanAll()
    {
        $this->db->select('tbl_peminjaman.*, tbl_anggota.nama, tbl_buku.judul');
        $this->db->join('tbl_anggota', 'tbl_anggota.kd_anggota = tbl_peminjaman.kd_anggota');
        $this->db->join('tbl_buku', 'tbl_buku.kd_buku = tbl_peminjaman.kd_buku');
        
        $query = $this->db->get('tbl_peminjaman')->result_array();
        return $query;
    }
    public function getBukuAll()
    {
        $query = $this->db->get('tbl_buku')->result_array();
        return $query;
    }
    public function kd_peminjaman()
    {
        $sql = "SELECT MAX(MID(kd_peminjaman,9,4)) AS kd_peminjaman FROM tbl_peminjaman WHERE 
        MID(kd_peminjaman, 3, 6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->kd_peminjaman) + 1;
        $no = sprintf("%' .04d", $n);
        }else{
            $no="0001";
        }
        $kd = "PM".date('ymd').$no;
        return $kd;
    }
    public function getBukubyId($id)
    {
        $data = ['kd_buku' => $id];
        $query = $this->db->get_where('tbl_buku', $data)->row_array();
        return $query;
    }
    public function getAnggotaAll()
    {
        $query = $this->db->get('tbl_anggota')->result_array();
        return $query;
    }
    public function addData()
    {
        $data = [
            "kd_peminjaman" => $this->input->post('kd_peminjaman'),
            "tgl_pinjam" => $this->input->post('tgl_pinjam'),
            "tgl_deadline" => $this->input->post('tgl_deadline'),
            "kd_petugas" => $this->input->post('kd_petugas'),
            "kd_anggota" => $this->input->post('kd_anggota'),
            "kd_buku" => $this->input->post('kd_buku'),
        ];

        $this->db->insert('tbl_peminjaman', $data);
    }
    public function perpanjangBuku($id)
    {
  
		$t =3;
		$next = mktime(0,0,0, date("m"), date("d")+$t, date("y"));
        $tglKembali = date("Y-m-d", $next);

        $this->db->set('tgl_deadline', $tglKembali);
        $this->db->where('kd_peminjaman', $id);
        $this->db->update('tbl_peminjaman');
    }
    public function pengembalianBuku($id)
    {
        $data=[
            "kd_pengembalian" => '',
            "kd_peminjaman" => $id,
            "kd_petugas_pengembalian" => $this->session->userdata('kd_pegawai'),
            "tgl_kembali" => date("Y-m-d"),
            
        ];        

        $this->db->insert('tbl_pengembalian', $data);

    }
    public function searchDataPeminjaman()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kd_peminjaman', $keyword);
        $this->db->or_like('kd_anggota', $keyword);
        $this->db->or_like('kd_buku', $keyword);

        $query = $this->db->get('tbl_peminjaman')->result_array();
        return $query;
    }
    public function searchDataBuku()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kd_buku', $keyword);
        $this->db->or_like('judul', $keyword);

        $query = $this->db->get('tbl_buku')->result_array();
        return $query;
    }
    public function getPengembalianAll()
    {
        $query = $this->db->get('tbl_pengembalian')->result_array();
        return $query;
    }

}

?>