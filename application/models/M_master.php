<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {

	//siswa
	public function getSiswa()
	{
		$this->db->select('a.nis,a.nama,a.kontak,a.jk,c.nama_kelas');
		$this->db->from('siswa a');
		$this->db->join('guru b','b.nip=a.nip');
		$this->db->join('kelas c', 'c.id_kelas=a.id_kelas');
		$query = $this->db->get();
		return $query->result_array();
	}

	//kelas
	public function getKelas()
	{
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->order_by("nama_kelas", "desc");
		$data = $this->db->get();
		return $data->result_array();
	}

	//guru
	public function getGuru()
	{
		$data = $this->db->get('guru');
		return $data->result_array();
	}

	//insert siswa
	function insert_siswa($data){
		$res = $this->db->insert("siswa",$data);
		return $res;
	}

	function insert_guru($data){
		$res = $this->db->insert("guru",$data);
		return $res;
	}

	function insert_kelas($data){
		$res = $this->db->insert("kelas",$data);
		return $res;
	}

	function insert_akun($data){
		$res = $this->db->insert("akun",$data);
		return $res;
	}

	//get siswa
	function get_siswa_where($where){
		$data = $this->db->get_where("siswa",$where);
		return $data->result_array();
	}

	function proses_edit_siswa($nis,$data){
		$this->db->where(array('nis' => $nis));
		$res = $this->db->update('siswa',$data);
		return $res;
	}

	function proses_edit_kelas($id_kelas,$data){
		$this->db->where(array('id_kelas' => $id_kelas));
		$res = $this->db->update('kelas',$data);
		return $res;
	}

	function proses_edit_guru($nip,$data){
		$this->db->where(array('nip' => $nip));
		$res = $this->db->update('guru',$data);
		return $res;
	}

	function get_guru($nip)
	{
		$data = $this->db->query("SELECT * FROM guru WHERE nip='$nip'");
		return $data->result_array();
	}

	function get_siswa($nis)
	{
		$data = $this->db->query("SELECT a.nis,a.nama,b.nama_kelas,a.jk,a.alamat,a.email,a.parent,a.kontakp,a.agama,a.id_rfid,c.nama_guru,a.kontak
		FROM siswa a JOIN kelas b USING(id_kelas) JOIN guru c USING(nip) WHERE nis='$nis'");
		return $data->result_array();
	}

	//delete siswa
	function proses_delete_siswa($where){
		$this->db->where($where);
		$res = $this->db->delete("siswa");
		return $res;
	}

	function proses_delete_kelas($where){
		$this->db->where($where);
		$res = $this->db->delete("kelas");
		return $res;
	}

	function proses_delete_guru($where){
		$this->db->where($where);
		$res = $this->db->delete("guru");
		return $res;
	}
	

}

/* End of file M_master.php */
/* Location: ./application/models/M_master.php */