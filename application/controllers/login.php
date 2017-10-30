<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_login');
	}
	public function index() {
		if (isset($_SESSION['loggedIn'])) {
			redirect('/dashboard');
		} else {
			$this->load->view('login');
		}
	}
	public function login() {
		if('login'){
			$nip = $_POST['nip'];
			$password = $_POST['password'];
			$data = $this->m_login->getDatauser($nip, $password);
			$cek = count($data);
			if ($cek > 0) {
				$_SESSION['id'] = $data[0]['id_karyawan'];
				$_SESSION['nip'] = $data[0]['nip'];
				$_SESSION['jabatan'] = $data[0]['jabatan'];
				$_SESSION['level'] = $data[0]['id_level'];
				$_SESSION['loggedIn'] = true;
				redirect('/dashboard');
			} else {
				echo 'Data User Tidak Ditemukan, Silahkan Kembali';
			}
		}
	}
	public function logout() {
		$_SESSION['id'] = null;
		$_SESSION['nip'] = null;
		$_SESSION['jabatan'] = null;
		$_SESSION['level'] = null;
		unset($_SESSION['loggedIn']);
		$this->index();
	}
}
