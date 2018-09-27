<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	function login($username,$password) {
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query =  $this->db->get('akun');
		return $query->num_rows();
	}

  //untuk mengambil data hasil login
	function data_login($username,$password) {
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('akun')->row();
	}


    function proses_edit_akun($id_akun,$data){
		$this->db->where('id_akun',$id_akun);
		$res = $this->db->update('akun',$data);
		return $res;
	}

	function cekEmail($email)
	{
		$this->db->select('email');
		$this->db->from('akun');
		$this->db->where('email',$email);
		$query = $this->db->get();
		return $query->row_array();
	}

	function proses_edit_password($email,$data){
		$this->db->where('email',$email);
		$res = $this->db->update('akun',$data);
		return $res;
	}

	function getUsername($username)
	{
		$this->db->select('*'); 
		$this->db->from('akun');
		$this->db->where('username', $username);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */