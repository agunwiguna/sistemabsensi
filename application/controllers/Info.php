<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_x','x');
		$this->load->library('template');

	}

	// List all your items
	public function index()
	{
		$data = array(
			'active_menu_inf' => 'active' ,
			'title' => 'Info | SIAbsen',
			'content' => $this->x->getInfo() 
		);
		$this->template->show('read/v_info',$data);
	}

	// Add a new item
	public function add()
	{
		$data = $this->input->post(null,true);
		$query = $this->x->insert_info($data);
		if($query>=1){
	        $this->session->set_userdata('proses','berhasil');
	        gcm('Info Baru'.$this->input->post('title'),'Informasi');
	        redirect('i');
	    }
	    else{
	        $this->session->set_userdata('gagal_proses','gagal');
	        redirect('i');
	    }
		
	}

	public function edit()
	{
		$id = $this->input->get('id');
		$data = array(
			'info' => $this->x->detailJadwal($id) 
		);
		$this->load->view('update/edit_info', $data);
	}

	//Update one item
	public function update()
	{
		$id = $this->input->post('id');
		$data = $this->input->post(null, true);
		unset($data['id']);
		$res = $this->x->proses_edit_info($id,$data);
		if($res>=1){
			$this->session->set_userdata('edit','berhasil');
			redirect('i');
		}
		else{
			$this->session->set_userdata('gagal_edit','gagal');
			redirect('i');
		}
	}

	//Delete one item
	public function delete($id)
	{
		$id = $this->uri->segment(3);
		$id = array( 'id' => $id );
		$res = $this->x->proses_delete_info($id);
		if($res>=1){
			$this->session->set_userdata('delete','berhasil');
			redirect('i');
		}
		else{
			$this->session->set_userdata('gagal_delete','gagal');
			redirect('i');
		}
	}

	public function detail()
	{
		$id = $this->input->get('id');
		$data = array(
			'info' => $this->x->detailJadwal($id) 
		);
		$this->load->view('detail/detail_info', $data);
	}
}

/* End of file Info.php */
/* Location: ./application/controllers/Info.php */
