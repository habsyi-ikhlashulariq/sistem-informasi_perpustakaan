<?php 


class Pegawai extends CI_Controller
{
    public function __construct()
    {
     parent::__construct();
     if (!$this->session->userdata('username') ) {
        redirect('Login');
    }else {
        $this->load->model('UserModel');  
        $this->load->library('form_validation'); 
    }
    }
    public function index()
    {
        $data['judul'] = 'Daftar Data Pegawai';
        if ($this->session->userdata('level') == "Petugas Perpustakaan") {
            $data['pegawai'] = $this->db->get_where('tbl_user', ['level' => $this->session->userdata('level')])->result_array();
        }else if ($this->session->userdata('level') == "Kepala Perpustakaan") {
            $data['pegawai'] = $this->UserModel->getAllPegawai();
        } 
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => $this->session->userdata('kd_pegawai')])->row_array();
        if ( $this->input->post('keyword')) {
            $data['pegawai'] = $this->UserModel->searchData();
        }

        $this->load->view('templates/header',$data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['judul'] = 'Tambah Data Pegawai';
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();
        
        $this->form_validation->set_rules('kd_pegawai', 'Kode Pegawai', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbl_user.username]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telephone', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('level', 'Level', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pegawai/tambah', $data);
            $this->load->view('templates/footer');
        }else{
            $this->UserModel->addPegawai();
            $this->session->set_flashdata('flash', 'Ditambah');
            redirect('Pegawai');
        }
    }
    public function update($id)
    {
        $data['judul'] = 'Tambah Data Pegawai';
        $data['pegawai'] = $this->UserModel->getPegawaibyId($id);
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();
        $data['jk'] = ['Laki-Laki', 'Perempuan'];
        
        $this->form_validation->set_rules('kd_pegawai', 'Kode Pegawai', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telephone', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('level', 'Level', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pegawai/update', $data);
            $this->load->view('templates/footer');
        }else{
            $this->UserModel->updatePegawai();
            $this->session->set_flashdata('flash', 'Diupdate');
            redirect('Pegawai');
        }
    }
    public function delete($id)
    {
        $this->UserModel->deletePegawai($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Pegawai');
    }

}

?>