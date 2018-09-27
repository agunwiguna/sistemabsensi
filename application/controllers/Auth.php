<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth','at');
		$this->load->model('m_master', 'mst');
	}


	public function index()
	{
		$data = array(
			'action' => site_url('auth/lg'),
			'username' => set_value('username'),
			'guru' => $this->mst->getGuru(),
			'kelas' => $this->mst->getKelas(),
			'password' => set_value('password')
		);
		$this->load->view('auth/login', $data);
	}

	public function login() {
		
		$this->form_validation->set_rules('username', ' ', 'trim|required');
		$this->form_validation->set_rules('password', ' ', 'trim|required');

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$login = $this->at->login($this->input->post('username'), md5($this->input->post('password')));

			if ($login == 1) {
				$row = $this->at->data_login($this->input->post('username'), md5($this->input->post('password')));
				$data = array(
					'logged' => TRUE,
					'id_akun' => $row->id_akun,
					'nik' => $row->nik,
					'username' => $row->username,
					'nama' => $row->nama,
					'alamat' => $row->alamat,
					'lat' => $row->lat,
					'lng' => $row->lng,
					'level' => $row->level,
					'login'=> 'berhasil',
					'foto' => $row->foto,
				);
				$this->session->set_userdata($data);
				redirect(site_url('db'));
			} else {
				$this->session->set_flashdata('status',"username dan password tidak ditemukan");
				$this->index();
			}
		}
	}

	function logout() {
      	//destroy session
		$this->session->sess_destroy();

      	//redirect ke halaman login
		redirect(site_url('auth'));
	}

	function update_akun()
	{
		if (!empty($_FILES['foto']['name'])) {
			$config = array(
				'upload_path'		=> 'assets/img/',
				'allowed_types'		=> 'gif|jpg|png',
				'max_size'			=> 100000
			);

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto')) {
				exit($this->upload->display_errors());
			}else{

				$data = array(
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'lat' => $this->input->post('lat'),
					'lng' => $this->input->post('lng'),
					'foto' => $this->upload->data('file_name')
				);

				$id_akun = $this->session->userdata('id_akun');
				$query = $this->at->proses_edit_akun($id_akun,$data);
				if ($query) {
					$this->session->set_userdata($data);
			        redirect('setting','refresh');
				} else {
					redirect('setting','refresh');
				}
			}

		}else{

			$data = array(
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'lat' => $this->input->post('lat'),
				'lng' => $this->input->post('lng')
			);

			$id_akun = $this->session->userdata('id_akun');
			$query = $this->at->proses_edit_akun($id_akun,$data);
			if ($query) {
				$this->session->set_userdata($data);
		        redirect('setting','refresh');
			} else {
				redirect('setting','refresh');
			}
		}
		
	}

	function update_password()
	{
		$data['password'] = md5($this->input->post('konfirmasi_password'));

		$id_akun = $this->session->userdata('id_akun');
		$query = $this->at->proses_edit_akun($id_akun,$data);
		if ($query) {
			$this->session->set_userdata('proses','berhasil');
	        redirect('auth/out','refresh');
		}else{
			$this->session->set_userdata('gagal_delete','gagal');
			redirect('auth/out','refresh');
		}
	}

	public function register_siswa()
	{
		$nis= $this->input->post('nis');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('jk');
		$kontak = $this->input->post('kontak');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$agama = $this->input->post('agama');
		$parent = $this->input->post('parent');
		$kontakp = $this->input->post('kontakp');
		$nip = $this->input->post('nip');
		$id_rfid = $this->input->post('id_rfid');
		$id_kelas = $this->input->post('id_kelas');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$lat = '-6.890710';
		$lng = '107.558304';
		$level = 'siswa';

		$data = array(
			'nis' => $nis,
			'nama' => $nama,
			'jk' => $jk,
			'kontak' => $kontak,
			'email' => $email,
			'alamat' => $alamat,
			'agama' => $agama,
			'parent' => $parent,
			'kontakp' => $kontakp,
			'nip' => $nip,
			'id_rfid' => $id_rfid,
			'id_kelas' => $id_kelas,
			'lat' => $lat,
			'lng' => $lng
		);

		$data2 = array(
			'nik' => $nis,
			'nama' => $nama,
			'alamat' => $alamat,
			'email' => $email,
			'username' => $username,
			'password' => $password,
			'level' => $level,
			'foto' => 'student.jpg'
		);

		$query = $this->mst->insert_siswa($data);
		$query2= $this->mst->insert_akun($data2);

		if ($query && $query2) {
			$this->session->set_flashdata('regis',"Registrasi Berhasil Silahkan Cek E-Mail untuk Verifikasi");
			$this->index();
		} else {
			$this->session->set_flashdata('regis',"Registrasi Gagal");
			$this->index();
		}
		
	}

	function registrasi_guru()
	{
		$nip = $this->input->post('nip');
		$nama_guru = $this->input->post('nama_guru');
		$kontak = $this->input->post('kontak');
		$jk = $this->input->post('jk');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$level ='guru';

		$data = array(
			'nip' => $nip,
			'nama_guru' => $nama_guru,
			'kontak' => $kontak,
			'jk' => $jk,
			'email' => $email,
			'alamat' => $alamat, 
		);


		$data2 = array(
			'nik' => $nip,
			'nama' => $nama_guru,
			'alamat' => $alamat,
			'email' => $email,
			'username' => $username,
			'password' => $password,
			'level' => $level,
			'foto' => 'teacher.jpg'
		);

		$query = $this->mst->insert_guru($data);
		$query2= $this->mst->insert_akun($data2);

		if ($query && $query2) {
			$this->session->set_flashdata('regis',"Registrasi Berhasil");
			$this->index();
		} else {
			$this->session->set_flashdata('regis',"Registrasi Gagal");
			$this->index();
		}
	}

	function forgotPassword()
	{
		$email = $this->input->post('email');
		$findemail = $this->at->cekEmail($email);

		if ($findemail) {

			$this->load->library('email');

			$subject = 'Reset Password Sistem Absensi';
			$message = '<p>Klik Link berikut untuk Reset Password</p>'.site_url("auth/as76yhjUio876Kl9876ghfrE");

	    	// Get full html:
			$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
			<title>' . html_escape($subject) . '</title>
			<style type="text/css">
			body {
				font-family: Arial, Verdana, Helvetica, sans-serif;
				font-size: 16px;
			}
			</style>
			</head>
			<body>
			' . $message . '
			</body>
			</html>';
	    // Also, for getting full html you may use the following internal method:
	    //$body = $this->email->full_html($subject, $message);

			$result = $this->email
			->from('wgnagun@gmail.com')
	      ->reply_to('wgnagun@gmail.com')    // Optional, an account where a human being reads.
	      ->to($email)
	      ->subject($subject)
	      ->message($body)
	      ->send();
	      if ($result) {
	      	$this->session->set_flashdata('regis',"Cek Email untuk Reset Password");
			$this->index();
	      } else {
	      	$this->session->set_flashdata('status',"Password Gagal terkirim ke E-Mail");
			$this->index();
	      }
	      
		} else {
			$this->session->set_flashdata('status',"E-Mail tidak ditemukan");
			$this->index();
		}
		
	}

	function resetPassword()
	{
		$this->load->view('auth/reset');
	}

	function updatePassword()
	{
		$email = $this->input->post('email');
		$data['password'] = md5($this->input->post('password'));

		$query = $this->at->proses_edit_password($email,$data);
		if ($query) {
			$this->session->set_flashdata('regis',"Reset Password Berhasil");
	        redirect('auth','refresh');
		}else{
			$this->session->set_flashdata('status',"Reset Password Gagal");
			redirect('auth','refresh');
		}
	}

	function cekUsername()
	{
		$nis = $this->input->post('nis');
		if (!empty($nis)) {
		
			$query = $this->db->query("SELECT * FROM siswa WHERE nis='$nis'");
			$num = $query->num_rows();
			if ($num > 0) {
				echo '<span class="text-danger">NIS sudah digunakan</span>';
			} else {
				echo '<span class="text-success">NIS tersedia</span>';
			}
			
		}	
	}

	function ceknis()
	{
		$nis = $this->input->post('nis');
		if (!empty($nis)) {
		
			$query = $this->db->query("SELECT * FROM siswa WHERE nis='$nis'");
			$num = $query->num_rows();
			if ($num > 0) {
				echo '<span class="text-danger">NIS sudah digunakan</span>';
			} else {
				echo '<span class="text-success">NIS tersedia</span>';
			}
			
		}	
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */