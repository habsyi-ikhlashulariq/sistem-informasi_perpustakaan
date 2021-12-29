<?php 

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username') ) {
            redirect('Login');
        }else {
           
            $this->load->model('AnggotaModel');
            $this->load->library('form_validation');
        }
    }

    public function index()
    {
        $data['judul'] = 'Daftar Anggota';
        $data['anggota'] = $this->AnggotaModel->getAllAnggota();
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        if ( $this->input->post('keyword')) {
            $data['anggota'] = $this->AnggotaModel->searchData();
        }

        $this->load->view('templates/header',$data);
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $this->form_validation->set_rules('kd_anggota','Kode Anggota', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama Anggota', 'required');
        $this->form_validation->set_rules('jk', 'Nama Anggota', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi Anggota', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Anggota', 'required');

        if ($this->form_validation->run() == FALSE) {
            
            $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => $this->session->userdata('kd_pegawai')])->row_array();
            $data['judul'] = 'Tambah Data Anggota';
            $this->load->view('templates/header', $data);
            $this->load->view('anggota/tambah', $data);
            $this->load->view('templates/footer');
        }else{
            $this->AnggotaModel->addData();
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('Anggota');
        }
    }
    public function update($id)
    {
        $this->form_validation->set_rules('kd_anggota','Kode Anggota', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama Anggota', 'required');
        $this->form_validation->set_rules('jk', 'Nama Anggota', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi Anggota', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Anggota', 'required');

        $data['judul'] = 'Update Data Anggota';
        $data['anggota'] = $this->AnggotaModel->getDatabyId($id);

        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();
        
        $data['jk'] =['Laki-Laki', 'Perempuan'];
        $data['prodi'] =['Sistem Informasi', 'Teknik Informatika'];

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header',$data);
            $this->load->view('anggota/update', $data);
            $this->load->view('templates/footer');
        }else{
            $this->AnggotaModel->updateData();
            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('Anggota');
        }
    }
    public function delete($id)
    {
        $this->AnggotaModel->deleteData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Anggota');
    }
    
    public function laporanAnggota()
    {
        $data['judul'] = 'Laporan Data Anggota';
        $data['anggota'] = $this->AnggotaModel->getAllAnggota();
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('anggota/laporan', $data);
        $this->load->view('templates/footer');
    }

}
?>