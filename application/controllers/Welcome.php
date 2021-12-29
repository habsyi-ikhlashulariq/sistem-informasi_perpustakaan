<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('BukuModel');
		$this->load->model('AnggotaModel');
		$this->load->model('UserModel');
		$this->load->model('PinjamanModel');
		
	}
	public function index()
	{
		if (!$this->session->userdata('username') ) {
			redirect('login');
		}else {
			$data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
			$this->session->userdata('kd_pegawai')])->row_array();
			
			
			$data['countBuku'] = $this->BukuModel->countBuku();
			$data['countAnggota'] = $this->AnggotaModel->countAnggota();
			$data['countPegawaiPe'] = $this->UserModel->countPegawaiPe();
			$data['countPegawai'] = $this->UserModel->countPegawai();
			$data['countPeminjaman'] = $this->PinjamanModel->countPeminjaman();

			
			$this->load->view('templates/header', $data);
			$this->load->view('welcome_message', $data);
			$this->load->view('templates/footer');
		}
	}

}
