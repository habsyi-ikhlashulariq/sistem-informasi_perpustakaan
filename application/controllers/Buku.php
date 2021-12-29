<?php 
class Buku extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('username') ) {
            redirect('Login');
        }else {
            $this->load->model('BukuModel');
            $this->load->library('form_validation');
        }
    }
    public function index()
    {
        $data['judul'] = 'Daftar Buku';
        $data['buku'] = $this->BukuModel->getAllBuku();
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        if ( $this->input->post('keyword')) {
            $data['buku'] = $this->BukuModel->searchData();
        }

        $this->load->view('templates/header', $data);
		$this->load->view('buku/index', $data);
		$this->load->view('templates/footer');
    }
    public function tambah()
    {
        $this->form_validation->set_rules('kd_buku', 'Kode Buku', 'required');
        $this->form_validation->set_rules('kd_kategori_buku', 'Kode Katgori Buku', 'required');
        $this->form_validation->set_rules('judul', 'Judul Buku', 'required');
        $this->form_validation->set_rules('penulis', 'Pengarang Buku', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit Buku', 'required');
        $this->form_validation->set_rules('thn_terbit', 'Tahun Terbit Buku', 'required');
        $this->form_validation->set_rules('jml_buku', 'Jumlah Buku', 'required');
        
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();
        

        $data['kd'] = $this->BukuModel->kd_buku();
        $data['kategori'] = $this->BukuModel->getAllKategori();
        
        if ($this->form_validation->run() == FALSE ) {
            $data['judul'] = 'Tambah Buku';
            $this->load->view('templates/header', $data);
            $this->load->view('buku/tambah', $data);
            $this->load->view('templates/footer');
        }else {
            $this->BukuModel->AddBuku();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Buku');
        }
    }
    public function hapus($id)
    {
        $this->BukuModel->deleteData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Buku');
    }
    public function update($id)
    {
        $this->form_validation->set_rules('kd_buku', 'Kode Buku', 'required');
        $this->form_validation->set_rules('kd_kategori_buku', 'Kode Katgori Buku', 'required');
        $this->form_validation->set_rules('judul', 'Judul Buku', 'required');
        $this->form_validation->set_rules('penulis', 'Pengarang Buku', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit Buku', 'required');
        $this->form_validation->set_rules('thn_terbit', 'Tahun Terbit Buku', 'required');
        $this->form_validation->set_rules('jml_buku', 'Jumlah Buku', 'required');
        
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        $data['buku'] = $this->BukuModel->getBukubyId($id);
        $data['kategori'] = $this->BukuModel->getAllKategori();

        if ($this->form_validation->run() == FALSE ) {
            $data['judul'] = 'Update Buku';
            $this->load->view('templates/header', $data);
            $this->load->view('buku/update', $data);
            $this->load->view('templates/footer');
        }else {
            $this->BukuModel->updateDataBuku();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('Buku');
        }
    }

    public function laporanBuku()
    {
        $data['judul'] = 'Laporan Data Buku';
        $data['buku'] = $this->BukuModel->getAllBuku();
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        $this->load->view('templates/header', $data);
		$this->load->view('buku/laporan', $data);
		$this->load->view('templates/footer');
    }

    
}



?>