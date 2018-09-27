<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			
		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('auth'));
	    }

	    $this->load->model('m_x','x');
	    $this->load->model('m_master', 'mst');
	    $this->load->library('template');

	}

	// List all your items
	public function index()
	{
		$data = array(
			'content' => $this->x->getAlat(),
			'active_menu_alt' => 'active',
			'title' => 'Alat | SIAbsen',
			'guru' => $this->mst->getGuru()
		);
		$this->template->show('read/v_alat',$data);
	}

	// Add a new item
	public function add()
	{
		$data = $this->input->post(null, true);
	    $res = $this->x->insert_alat($data);
	    if($res>=1){
	        $this->session->set_userdata('proses','berhasil');
	        redirect('alat');
	    }
	    else{
	        $this->session->set_userdata('gagal_proses','gagal');
	        redirect('alat');
	    }
	}

	public function edit()
	{
		$id = $this->input->get('id');
		$data = array(
			"content" => $this->x->detailAlat($id),
			'guru' => $this->mst->getGuru()
		);
		$this->load->view('update/edit_alat',$data);
	}

	//Update one item
	public function update()
	{
		$id= $this->input->post('id');
		$data = $this->input->post(null, true);
		unset($data['id']);
		$res = $this->x->proses_edit_alat($id,$data);
		if($res>=1){
			$this->session->set_userdata('edit','berhasil');
			redirect('alat');
		}
		else{
			$this->session->set_userdata('gagal_edit','gagal');
			redirect('alat');
		}
	}

	//Delete one item
	public function delete($id)
	{
		$id = $this->uri->segment(3);
		$id = array( 'id' => $id );
		$res = $this->x->proses_delete_alat($id);
		if($res>=1){
			$this->session->set_userdata('delete','berhasil');
			redirect('alat');
		}
		else{
			$this->session->set_userdata('gagal_delete','gagal');
			redirect('alat');
		}
	}
}

/* End of file Utama.php */
/* Location: ./application/controllers/Utama.php */
