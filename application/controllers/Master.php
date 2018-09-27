<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('auth'));
	    }

	    $this->load->library('template');
	    $this->load->model('m_master', 'mst');
	}

	//data siswa
	function siswa()
	{
		
		$level = $this->session->userdata('level');
		$nik = $this->session->userdata('nik');

		if ($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='guru') {
			$content = $this->mst->getSiswa();
		} else {
			$content = $this->db->query("SELECT * FROM siswa JOIN guru USING(nip) JOIN kelas USING(id_kelas) WHERE nis='$nik'")->result_array();
		}
		
		$data = array(
			'content' =>$content,
			'active_menu_sw' => 'active',
			'title' => 'Siswa | SIAbsen' 
		);
		$this->template->show('read/v_siswa',$data);
	}

	function input_siswa()
	{
		$data = array(
			'active_menu_sw' => 'active',
			'guru' => $this->mst->getGuru(),
			'kelas' => $this->mst->getKelas(),
			'title' => 'Siswa | SIAbsen' 
		);
		$this->template->show('create/input_siswa',$data);
	}

	//data kelas
	function kelas()
	{
		$data = array(
			'content' => $this->mst->getKelas(),
			'active_menu_kls' => 'active',
			'title' => 'Kelas | SIAbsen' 
		);
		$this->template->show('master/v_kelas',$data);
	}

	//data guru
	function guru()
	{
		$data = array(
			'content' => $this->mst->getGuru(),
			'active_menu_gr' => 'active',
			'title' => 'Guru | SIAbsen' 
		);
		$this->template->show('master/v_guru',$data);
	}

	function proses_insert_siswa()
	{
		$data = $this->input->post(null, true);
	    $res = $this->mst->insert_siswa($data);
	    $error_db = $this->db->error('message');
	    if($res>=1){
	        $this->session->set_userdata('proses','berhasil');
	        redirect('m/sw');
	    }
	    else{
	        $this->session->set_userdata('gagal_proses','gagal');
	        redirect('m/sw');
	    }
	}

	function proses_insert_guru()
	{
		$data = $this->input->post(null, true);
	    $res = $this->mst->insert_guru($data);
	    $error_db = $this->db->error('message');
	    if($res>=1){
	        $this->session->set_userdata('proses','berhasil');
	        redirect('m/gr');
	    }
	    else{
	        $this->session->set_userdata('gagal_proses','gagal');
	        redirect('m/gr');
	    }
	}

	function proses_insert_kelas()
	{
		$data = $this->input->post(null, true);
	    $res = $this->mst->insert_kelas($data);
	    $error_db = $this->db->error('message');
	    if($res>=1){
	        $this->session->set_userdata('proses','berhasil');
	        redirect('m/kls');
	    }
	    else{
	        $this->session->set_userdata('gagal_proses','gagal');
	        redirect('m/kls');
	    }
	}

	function proses_edit_siswa(){
		$nis= $this->input->post('nis');
		$data = $this->input->post(null, true);
		unset($data['nis']);
		$res = $this->mst->proses_edit_siswa($nis,$data);
		$error_db = $this->db->error('message');
		if($res>=1){
			$this->session->set_userdata('edit','berhasil');
			redirect('m/sw');
		}
		else{
			$this->session->set_userdata('gagal_edit','gagal');
			redirect('m/sw');
		}
	}

	function proses_edit_kelas(){
		$id_kelas= $this->input->post('id_kelas');
		$data = $this->input->post(null, true);
		unset($data['id_kelas']);
		$res = $this->mst->proses_edit_kelas($id_kelas,$data);
		$error_db = $this->db->error('message');
		if($res>=1){
			$this->session->set_userdata('edit','berhasil');
			redirect('m/kls');
		}
		else{
			$this->session->set_userdata('gagal_edit','gagal');
			redirect('m/kls');
		}
	}

	function proses_edit_guru(){
		$nip= $this->input->post('nip');
		$data = $this->input->post(null, true);
		unset($data['nip']);
		$res = $this->mst->proses_edit_guru($nip,$data);
		$error_db = $this->db->error('message');
		if($res>=1){
			$this->session->set_userdata('edit','berhasil');
			redirect('m/gr');
		}
		else{
			$this->session->set_userdata('gagal_edit','gagal');
			redirect('m/gr');
		}
	}

	function detail_guru(){
		$nip = $this->input->get('id');
		$data = array(
			"content" => $this->mst->get_guru($nip)
		);
		$this->load->view('master/detail_guru',$data);
	}

	function detail_siswa(){
		$nis = $this->input->get('id');
		$data = array(
			"content" => $this->mst->get_siswa($nis)
		);
		$this->load->view('detail/detail_siswa',$data);
	}

	function edit_guru()
	{
		$nip = $this->input->get('id');
		$data = array(
			"content" => $this->mst->get_guru($nip)
		);
		$this->load->view('master/edit_guru',$data);
	}

	function edit_siswa($nis)
	{
		$nis = $this->uri->segment(3);
		$where = array( 'nis' => $nis );
		$data = array(
			'active_menu_sw' => 'active',
			"content" => $this->mst->get_siswa_where($where),
			'guru' => $this->mst->getGuru(),
			'kelas' => $this->mst->getKelas(),
			'title' => 'Siswa | SIAbsen' 
		);
		$this->template->show('update/edit_siswa',$data);
	}

	function delete_siswa($nis){
		$nis = $this->uri->segment(3);
		$nis = array( 'nis' => $nis );
		$res = $this->mst->proses_delete_siswa($nis);
		if($res>=1){
			$this->session->set_userdata('delete','berhasil');
			redirect('m/sw');
		}
		else{
			$this->session->set_userdata('gagal_delete','gagal');
			redirect('m/sw');
		}
	}

	function delete_kelas($id_kelas){
		$id_kelas = $this->uri->segment(3);
		$id_kelas = array( 'id_kelas' => $id_kelas );
		$res = $this->mst->proses_delete_kelas($id_kelas);
		if($res>=1){
			$this->session->set_userdata('delete','berhasil');
			redirect('m/kls');
		}
		else{
			$this->session->set_userdata('gagal_delete','gagal');
			redirect('m/kls');
		}
	}

	function delete_guru($nip){
		$nip = $this->uri->segment(3);
		$nip = array( 'nip' => $nip );
		$res = $this->mst->proses_delete_guru($nip);
		if($res>=1){
			$this->session->set_userdata('delete','berhasil');
			redirect('m/gr');
		}
		else{
			$this->session->set_userdata('gagal_delete','gagal');
			redirect('m/gr');
		}
	}

}

/* End of file Master.php */
/* Location: ./application/controllers/Master.php */