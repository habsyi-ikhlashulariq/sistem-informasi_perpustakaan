<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Import extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('username') ) {
            redirect('Login');
        }else {
            $this->load->model('ImportModel');
            $this->load->library('form_validation');
        }
    }

    public function kategori()
    {
        $data['judul'] = 'Import Kategori Buku';
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        $this->load->view('templates/header', $data);
		$this->load->view('kategori/import', $data);
		$this->load->view('templates/footer');
    }
    public function kategori_import()
	{
		$kategori_import=$_FILES['kategori_import']['name'];
		$extension=pathinfo($kategori_import,PATHINFO_EXTENSION);
		if($extension=='csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if($extension=='xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet=$reader->load($_FILES['kategori_import']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
		$sheetcount=count($sheetdata);

		if($sheetcount>1)
		{
			$data=array();
			for ($i=1; $i < $sheetcount; $i++) { 
				$kd_kategori_buku=$sheetdata[$i][1];
				$nama=$sheetdata[$i][2];
				$data[]=array(
					'kd_kategori_buku'=>$kd_kategori_buku,
					'nama'=>$nama,
				);
			}
			$inserdata=$this->ImportModel->insert_kategori($data);

			if($inserdata)
			{
				$this->session->set_flashdata('flash','Di import');
				redirect('kategori');
			} else {
				$this->session->set_flashdata('flash','Di import');
				redirect('kategori');
			}
		}
	}

	public function buku()
    {
        $data['judul'] = 'Import Buku';
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        $this->load->view('templates/header', $data);
		$this->load->view('buku/import', $data);
		$this->load->view('templates/footer');
    }

	public function buku_import()
	{
		$kategori_import=$_FILES['buku_import']['name'];
		$extension=pathinfo($buku_import,PATHINFO_EXTENSION);
		if($extension=='csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if($extension=='xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet=$reader->load($_FILES['buku_import']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
		$sheetcount=count($sheetdata);

		if($sheetcount>1)
		{
			$data=array();
			for ($i=1; $i < $sheetcount; $i++) { 
				$kd_buku=$sheetdata[$i][2];
				$judul=$sheetdata[$i][0];
				$kd_kategori=$sheetdata[$i][3];
				$penulis=$sheetdata[$i][5];
				$penerbit=$sheetdata[$i][4];
				$thn_terbit=$sheetdata[$i][6];
				$jumlah=$sheetdata[$i][1];
				$data[]=array(
					'kd_buku'=>$kd_buku,
					'judul'=>$judul,
					'kd_kategori_buku'=>$kd_kategori,
					'penulis'=>$penulis,
					'penerbit'=>$penerbit,
					'thn_terbit'=>$thn_terbit,
					'jumlah'=>$jumlah,
				);
			}
			$inserdata=$this->ImportModel->insert_buku($data);

			if($inserdata)
			{
				$this->session->set_flashdata('flash','Di import');
				redirect('buku');
			} else {
				$this->session->set_flashdata('flash','Di import');
				redirect('buku');
			}
		}
	}
	public function anggota()
    {
        $data['judul'] = 'Import Anggota';
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        $this->load->view('templates/header', $data);
		$this->load->view('anggota/import', $data);
		$this->load->view('templates/footer');
    }
	public function anggota_import()
	{
		$kategori_import=$_FILES['anggota_import']['name'];
		$extension=pathinfo($anggota_import,PATHINFO_EXTENSION);
		if($extension=='csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if($extension=='xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet=$reader->load($_FILES['anggota_import']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
		$sheetcount=count($sheetdata);

		if($sheetcount>1)
		{
			$data=array();
			for ($i=1; $i < $sheetcount; $i++) { 
				$kd_anggota=$sheetdata[$i][1];
				$nama=$sheetdata[$i][2];
				$jk=$sheetdata[$i][3];
				$prodi=$sheetdata[$i][4];
				$alamat=$sheetdata[$i][5];
				$data[]=array(
					'kd_anggota'=>$kd_anggota,
					'nama'=>$nama,
					'jk'=>$jk,
					'prodi'=>$prodi,
					'alamat'=>$alamat,
				);
			}
			$inserdata=$this->ImportModel->insert_anggota($data);

			if($inserdata)
			{
				$this->session->set_flashdata('flash','Di import');
				redirect('buku');
			} else {
				$this->session->set_flashdata('flash','Di import');
				redirect('buku');
			}
		}
	}

	public function pegawai()
    {
        $data['judul'] = 'Import Pegawai';
        $data['user'] = $this->db->get_where('tbl_user', ['kd_pegawai' => 
        $this->session->userdata('kd_pegawai')])->row_array();

        $this->load->view('templates/header', $data);
		$this->load->view('pegawai/import', $data);
		$this->load->view('templates/footer');
    }

	public function pegawai_import()
	{
		$kategori_import=$_FILES['pegawai_import']['name'];
		$extension=pathinfo($pegawai_import,PATHINFO_EXTENSION);
		if($extension=='csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if($extension=='xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet=$reader->load($_FILES['pegawai_import']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
		$sheetcount=count($sheetdata);

		if($sheetcount>1)
		{
			$data=array();
			for ($i=1; $i < $sheetcount; $i++) { 
				$kd_pegawai=$sheetdata[$i][1];
				$nama=$sheetdata[$i][2];
				$jk=$sheetdata[$i][3];
				$telp=$sheetdata[$i][4];
				$username=$sheetdata[$i][5];
				$password=$sheetdata[$i][6];
				$alamat=$sheetdata[$i][7];
				$data[]=array(
					'kd_pegawai'=>$kd_pegawai,
					'nama'=>$nama,
					'username'=>$username,
					'password'=> $password,
					'jk'=>$jk,
					'telp'=>$telp,
					'alamat'=>$alamat,
					'avatar'=>'default.png',
					'level'=>'Petugas Perpustakaan',
				);
			}
			$inserdata=$this->ImportModel->insert_pegawai($data);

			if($inserdata)
			{
				$this->session->set_flashdata('flash','Di import');
				redirect('pegawai');
			} else {
				$this->session->set_flashdata('flash','Di import');
				redirect('pegawai');
			}
		}
	}

	public function kategori_format()
	{
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="template_import_kategori.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'no');
		$sheet->setCellValue('B1', 'kd_kategori');
		$sheet->setCellValue('C1', 'nama');

		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}
	public function buku_format()
	{
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="template_import_buku.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'no');
		$sheet->setCellValue('B1', 'judul');
		$sheet->setCellValue('C1', 'jumlah');
		$sheet->setCellValue('D1', 'kd_buku');
		$sheet->setCellValue('E1', 'kd_kategori_buku');
		$sheet->setCellValue('F1', 'penerbit');
		$sheet->setCellValue('G1', 'penulis');
		$sheet->setCellValue('H1', 'thn_terbit');

		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

	public function anggota_format()
	{
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="template_import_anggota.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'no');
		$sheet->setCellValue('B1', 'kd_anggota');
		$sheet->setCellValue('C1', 'nama');
		$sheet->setCellValue('D1', 'jk');
		$sheet->setCellValue('E1', 'prodi');
		$sheet->setCellValue('F1', 'alamat');

		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

	public function pegawai_format()
	{
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="template_import_anggota.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'no');
		$sheet->setCellValue('B1', 'alamat');
		$sheet->setCellValue('C1', 'jk');
		$sheet->setCellValue('D1', 'kd_pegawai');
		$sheet->setCellValue('E1', 'nama');
		$sheet->setCellValue('F1', 'password');
		$sheet->setCellValue('G1', 'telp');
		$sheet->setCellValue('H1', 'username');

		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}
}