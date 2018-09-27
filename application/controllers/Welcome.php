<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//Do your magic here

	    $this->load->model('m_x','x');
	    $this->load->library('template');
	    $this->load->model('m_master', 'mst');
	}

	public function index()
	{
		$data = array(
			'active_menu_db' => 'active',
			'title' => 'Dashboard | SIAbsen',
			'sw' => $this->db->get('siswa')->result_array(),
			'siswa' => $this->db->get('siswa')->num_rows(),
			'info' => $this->db->get('info')->num_rows(),
			'konsultasi' => $this->db->get('konsultasi')->num_rows(),
			'guru' => $this->db->get('guru')->num_rows() 
		);
		$this->template->show('layout/content',$data);
	}

	public function absensi()
	{
		$level = $this->session->userdata('level');
		$nik = $this->session->userdata('nik');

		if ($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='guru') {
			$content = $this->x->getAbsensi();
		} else {
			$content = $this->db->query("SELECT * FROM absensi JOIN siswa USING(id_rfid) WHERE nis='$nik'")->result_array();
		}

		$data = array(
			'active_menu_ab' => 'active',
			'title' => 'Absensi | SIAbsen',
			'content' => $content
		);
		$this->template->show('read/v_absensi',$data);
	}

	public function report()
	{
		$data = array(
			'active_menu_lap' => 'active',
			'title' => 'Laporan | SIAbsen',
			'kelas' => $this->mst->getKelas(),
			'jadwal' => $this->db->get('jadwal')->result_array(),
			'content' => $this->x->getAbsensi()
		);
		$this->template->show('read/v_laporan',$data);
	}

	public function delete_absensi($id_absen)
	{
		$id_absen = $this->uri->segment(3);
		$id_absen = array( 'id_absen' => $id_absen );
		$res = $this->x->proses_delete_absensi($id_absen);
		if($res>=1){
			$this->session->set_userdata('delete','berhasil');
			redirect('absensi/list');
		}
		else{
			$this->session->set_userdata('gagal_delete','gagal');
			redirect('absensi/list');
		}
	}

	public function setting()
	{
		$data = array(
			'active_menu_ab' => 'active',
			'title' => 'Setting | SIAbsen'
		);
		$this->template->show('read/v_setting',$data);
	}

	public function konsultasi()
	{
		$data = array(
			'active_menu_k' => 'active',
			'content' => $this->x->getKonsul(),
			'title' => 'Konsultasi | SIAbsen'
		);
		$this->template->show('read/v_konsul',$data);
	}


	public function detail_konsultasi()
	{
		$id = $this->input->get('id');
		$data = array(
			'content' => $this->x->detailKonsul($id),
		);
		$this->load->view('detail/detail_konsul',$data);
	}

	public function delete_konsul($id)
	{
		$id = $this->uri->segment(3);
		$id = array( 'id' => $id );
		$res = $this->x->proses_delete_konsul($id);
		if($res>=1){
			$this->session->set_userdata('delete','berhasil');
			redirect('konsultasi');
		}
		else{
			$this->session->set_userdata('gagal_delete','gagal');
			redirect('konsultasi');
		}
	}

	function InsertAbsensi()
	{
		$data = array(
			'id_rfid' =>$this->input->get('id_rfid'),
			'tanggal' => date('Y-m-d'),
			'waktu' => date('H:i:s'),
			'status' => 'Hadir'
		);

		$query= $this->db->insert("absensi",$data);

		if ($query === TRUE) {
			echo "Data Berhasil Tesimpan";
		} else {
			echo "Data Gagal Tersimpan";
		}
	}

	function tampil_absen()
	{
		$tanggal = $this->input->post('tanggal');
		$nama_kelas = $this->input->post('nama_kelas');
		$data = array(
			'matpel' => $this->input->post('matpel'),
			'nama_kelas' => $this->input->post('nama_kelas'),
			'tanggal' => $this->input->post('tanggal'),
			'siswa' =>$this->x->tampil_data_absen($tanggal,$nama_kelas) 
		);
		$this->load->view('read/v_result',$data);
	}

	function insert_absensi()
	{
		$data = array(
			'tanggal' => date('Y-m-d'),
			'waktu' => date('H:i:s'),
			'id_rfid' => $this->input->post('id_rfid'),
			'status' => $this->input->post('status') 
		);
		$query = $this->db->insert('absensi',$data);

		if ($query) {
			$this->session->set_userdata('proses','berhasil');
			redirect('absensi/list','refresh');
		} else {
			$this->session->set_userdata('gagal_proses','berhasil');
			redirect('absensi/list','refresh');
		}
		
	}
}
