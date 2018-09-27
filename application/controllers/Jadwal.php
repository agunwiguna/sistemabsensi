<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

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
			'content' => $this->x->getJadwal(),
			'active_menu_jdwl' => 'active',
			'title' => 'Jadwal | SIAbsen',
			'guru' => $this->mst->getGuru(),
			'kelas' => $this->mst->getKelas() 
		);
		$this->template->show('read/v_jadwal',$data);
	}

	// Add a new item
	public function add()
	{
		$data = $this->input->post(null, true);
	    $res = $this->x->insert_jadwal($data);
	    if($res>=1){
	        $this->session->set_userdata('proses','berhasil');
	        redirect('j');
	    }
	    else{
	        $this->session->set_userdata('gagal_proses','gagal');
	        redirect('j');
	    }
	}

	public function edit()
	{
		$id_jadwal = $this->input->get('id');
		$data = array(
			"content" => $this->x->get_jadwal($id_jadwal),
			'guru' => $this->mst->getGuru(),
			'kelas' => $this->mst->getKelas()
		);
		$this->load->view('update/edit_jadwal',$data);
	}

	//Update one item
	public function update()
	{
		$id_jadwal= $this->input->post('id_jadwal');
		$data = $this->input->post(null, true);
		unset($data['id_jadwal']);
		$res = $this->x->proses_edit_jadwal($id_jadwal,$data);
		if($res>=1){
			$this->session->set_userdata('edit','berhasil');
			redirect('j');
		}
		else{
			$this->session->set_userdata('gagal_edit','gagal');
			redirect('j');
		}
	}

	//Delete one item
	public function delete($id_jadwal)
	{
		$id_jadwal = $this->uri->segment(3);
		$id_jadwal = array( 'id_jadwal' => $id_jadwal );
		$res = $this->x->proses_delete_jadwal($id_jadwal);
		if($res>=1){
			$this->session->set_userdata('delete','berhasil');
			redirect('j');
		}
		else{
			$this->session->set_userdata('gagal_delete','gagal');
			redirect('j');
		}
	}

	public function detail()
	{
		$id_jadwal = $this->input->get('id');
		$data = array(
			'content' => $this->x->get_jadwal($id_jadwal),
			'guru' => $this->mst->getGuru(),
			'kelas' => $this->mst->getKelas()
		);
		$this->load->view('detail/detail_jadwal',$data);
	}
}

/* End of file Jadwal.php */
/* Location: ./application/controllers/Jadwal.php */
