<?php 
class Kategori extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('username') ) {
            redirect('Login');
        }else {
            $this->load->model('KategoriModel');
            $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $data['judul'] = 'Daftar Kategori Buku';
        $data['kategori'] = $this->KategoriModel->getAllKategori();
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        if ( $this->input->post('keyword')) {
            $data['kategori'] = $this->KategoriModel->searchData();
        }

        $this->load->view('templates/header', $data);
		$this->load->view('kategori/index', $data);
		$this->load->view('templates/footer');
    }
    public function tambah()
    {
        $this->form_validation->set_rules('kd_kategori_buku', 'Kode Kategori Buku', 'required');
        $this->form_validation->set_rules('nama', 'Kategori Buku', 'required');
        
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        $data['kd'] = $this->KategoriModel->kd_kategori();
        
        if ($this->form_validation->run() == FALSE ) {
            $data['judul'] = 'Tambah Kategori Buku';
            $this->load->view('templates/header', $data);
            $this->load->view('kategori/tambah', $data);
            $this->load->view('templates/footer');
        }else {
            $this->KategoriModel->AddKategori();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('kategori');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('kd_kategori_buku', 'Kode Kategori Buku', 'required');
        $this->form_validation->set_rules('nama', 'Kategori Buku', 'required');
        
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        $data['kategori'] = $this->KategoriModel->getKategoribyId($id);

        if ($this->form_validation->run() == FALSE ) {
            $data['judul'] = 'Update Kategori';
            $this->load->view('templates/header', $data);
            $this->load->view('kategori/update', $data);
            $this->load->view('templates/footer');
        }else {
            $this->KategoriModel->updateDataKategori();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('kategori');
        }
    }

    public function hapus($id)
    {
        $this->KategoriModel->deleteData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kategori');
    }
}