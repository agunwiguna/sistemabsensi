<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Android extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		

		$this->load->model('m_x','x');

	}

	public function jadwal()
	{
		$data = $this->x->getAndroidJadwal();

		echo json_encode($data);
	}

	public function info()
	{
		$data = $this->x->getAndroidInfo();

		echo json_encode($data);
	}

	public function add_konseling()
	{
		$data = array(
			'nama' =>$this->input->post('nama') ,
			'kontak' =>$this->input->post('kontak') ,
			'pesan' =>$this->input->post('pesan'),
			'created_at' =>date("Y-m-d H:i:s")
		);

        $nama=$this->input->post('nama');
        $kontak=$this->input->post('kontak');
        $pesan=$this->input->post('pesan');

		$response=array();

		if (empty($nama)){
		    $response['success']=null;
		    $response['messages']="Data Tidak Boleh Kosong";
		}else{
		    $query = $this->db->insert('aduan',$data);
		    if($query){
		      $response['success']=true;
		      $response['messages']="Data Berhasil Terkirim";
		    }else{
			    $response['success']=false;
			    $response['messages']="Data Gagal Terkirim";
		    }
		}

		echo json_encode($response);
	}

}

/* End of file Android.php */
/* Location: ./application/controllers/Android.php */