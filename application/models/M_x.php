<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_x extends CI_Model {

	public function getJadwal()
	{
		$this->db->select('*');
		$this->db->from('jadwal a');
		$this->db->join('guru b','b.nip=a.nip');
		$this->db->join('kelas c', 'c.id_kelas=a.id_kelas');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAndroidJadwal()
	{
		$this->db->select('*');
		$this->db->from('jadwal a');
		$this->db->join('guru b','b.nip=a.nip');
		$this->db->join('kelas c', 'c.id_kelas=a.id_kelas');
		$query = $this->db->get();
		return $query->result();
	}

	function insert_jadwal($data){
		$res = $this->db->insert("jadwal",$data);
		return $res;
	}

	function get_jadwal($id_jadwal)
	{
		$data = $this->db->query("SELECT * FROM jadwal a JOIN kelas b USING(id_kelas) JOIN guru c USING(nip) WHERE id_jadwal='$id_jadwal'");
		return $data->result_array();
	}

	function proses_edit_jadwal($id_jadwal,$data){
		$this->db->where(array('id_jadwal' => $id_jadwal));
		$res = $this->db->update('jadwal',$data);
		return $res;
	}

	function proses_delete_jadwal($where){
		$this->db->where($where);
		$res = $this->db->delete("jadwal");
		return $res;
	}

	public function getAbsensi()
	{
		$this->db->select('*');
		$this->db->from('absensi a');
		$this->db->join('siswa b','b.id_rfid=a.id_rfid');
		$this->db->join('kelas c','c.id_kelas=b.id_kelas');
		$this->db->order_by('id_absen','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function proses_delete_absensi($where){
		$this->db->where($where);
		$res = $this->db->delete("absensi");
		return $res;
	}

	function getInfo()
	{
		$this->db->select('*');
		$this->db->from('info');
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function getAndroidInfo()
	{
		$this->db->select('*');
		$this->db->from('info');
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result();
	}

	function insert_info($data){
		$res = $this->db->insert("info",$data);
		return $res;
	}

	public function detailJadwal($id)
	{
		$hit = $this->db->query("SELECT * FROM info WHERE id='$id'");
		return $hit->result_array();
	}

	function proses_edit_info($id,$data){
		$this->db->where(array('id' => $id));
		$res = $this->db->update('info',$data);
		return $res;
	}

	function proses_delete_info($where){
		$this->db->where($where);
		$res = $this->db->delete("info");
		return $res;
	}


	public function getAlat()
	{
		$this->db->select('*');
		$this->db->from('alat a');
		$this->db->join('guru b','b.nip=a.nip');
		$query = $this->db->get();
		return $query->result_array();
	}

	function insert_alat($data){
		$res = $this->db->insert("alat",$data);
		return $res;
	}

	public function detailAlat($id)
	{
		$hit = $this->db->query("SELECT * FROM alat WHERE id='$id'");
		return $hit->result_array();
	}

	function proses_edit_alat($id,$data){
		$this->db->where(array('id' => $id));
		$res = $this->db->update('alat',$data);
		return $res;
	}

	function proses_delete_alat($where){
		$this->db->where($where);
		$res = $this->db->delete("alat");
		return $res;
	}

	function getKonsul()
	{
		$this->db->select('*');
		$this->db->from('konsultasi');
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function detailKonsul($id)
	{
		$hit = $this->db->query("SELECT * FROM konsultasi WHERE id='$id'");
		return $hit->result_array();
	}

	function proses_delete_konsul($where){
		$this->db->where($where);
		$res = $this->db->delete("konsultasi");
		return $res;
	}


	function tampil_data_absen($tanggal,$nama_kelas)
	{
		$query = $this->db->query("SELECT * FROM absensi JOIN siswa USING(id_rfid) JOIN kelas USING(id_kelas) WHERE tanggal='$tanggal' AND nama_kelas='$nama_kelas' ORDER BY id_absen DESC");
		return $query->result_array();
	}

}

/* End of file M_x.php */
/* Location: ./application/models/M_x.php */