<?php 

class ProfilModel extends CI_Model
{

    public function addPhoto()
    {
        $foto = $_FILES['foto'];
        $config['upload_path'] = '.assets/img';
        $config['allowed_types'] = 'jpg|png|gif';
        
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            echo "Upload Gagal";
        }else{
            $foto = $this->upload->data('file_name');
        }

        $data=[
            'avatar' => $foto,
        ];
        $this->db->where('kd_pegawai', $this->input->post('kd_pegawai'));
        $this->db->update('tbl_pegawai', $data);
    }
}


?>