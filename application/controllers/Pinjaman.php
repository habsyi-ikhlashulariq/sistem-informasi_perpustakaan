<?php 

class Pinjaman extends CI_Controller{
    public function __construct()
    {
     parent::__construct();
     if (!$this->session->userdata('username') ) {
        redirect('Login');
    }else {
        $this->load->model('PinjamanModel');
        $this->load->library('form_validation');   
    }
    }
    public function index()
    {
        $data['judul'] = 'Daftar Data Pinjam Buku';
        $data['pinjaman'] = $this->PinjamanModel->getPinjamanAll();


        $data['user'] = $this->db->get_where('tbl_pegawai', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        if ( $this->input->post('keyword')) {
            $data['pinjaman'] = $this->PinjamanModel->searchDataPeminjaman();
        }

        $this->load->view('templates/header',$data);
        $this->load->view('pinjaman/index', $data);
        $this->load->view('templates/footer');
    }
     
    public function tambah($id)
    {
        $data['judul'] = 'Tambah Data Peminjaman';
        $data['kd'] = $this->PinjamanModel->kd_peminjaman();
        $data['buku'] = $this->PinjamanModel->getBukubyId($id);

        $data['user'] = $this->db->get_where('tbl_pegawai', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();
        
        $notif = $this->db->get_where('tbl_anggota', ['kd_anggota' => 
        $this->input->post('kd_anggota')])->num_rows();

        $this->form_validation->set_rules('kd_anggota', 'Kode Anggota', 'required');

        if ($data['buku']['jumlah'] <= 0) {

            $this->session->set_flashdata('flash', 'Sedang Dalam Peminjaman');
            redirect('Pinjaman/daftar_buku');

        }else if($data['buku']['jumlah'] > 0){
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('pinjaman/tambah', $data);
                $this->load->view('templates/footer');
            }else{
    
                if ($notif == 1) {
                    $this->PinjamanModel->addData();
                    $this->session->set_flashdata('flash', 'Ditambah');
                    redirect('Pinjaman');
                }else {
                    $this->session->set_flashdata('CekRow', 'Tidak');
                    $this->load->view('templates/header', $data);
                    $this->load->view('pinjaman/tambah', $data);
                    $this->load->view('templates/footer');         
                }
            }

        }
         

    }
    public function daftar_buku()
    {
        $data['judul'] = 'Pilih Buku';
        $data['buku'] = $this->PinjamanModel->getBukuAll();
        $data['user'] = $this->db->get_where('tbl_pegawai', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        if ( $this->input->post('keyword')) {
            $data['buku'] = $this->PinjamanModel->searchDataBuku();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('pinjaman/daftar_buku', $data);
        $this->load->view('templates/footer');
    }
    public function perpanjang($id)
    {
        $this->PinjamanModel->perpanjangBuku($id);
        $this->session->set_flashdata('flash', 'Di Perpanjang');
        redirect('Pinjaman');
    }
    public function pengembalian($id)
    {
        $this->PinjamanModel->pengembalianBuku($id);
        $this->session->set_flashdata('flash', 'Di Kembalikan');
        redirect('Pinjaman');
    }
    public function laporanPeminjaman()
    {

        $data['judul'] = 'Laporan Data Pinjam Buku';
        $data['pinjaman'] = $this->PinjamanModel->getPengembalianAll();

        $data['user'] = $this->db->get_where('tbl_pegawai', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('pinjaman/laporan', $data);
        $this->load->view('templates/footer');
    }
}

?>