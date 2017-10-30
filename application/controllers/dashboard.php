<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	public function index() {
		if (isset($_SESSION['loggedIn'])) {
			if ($_SESSION['level'] == 1) {
				$this->load->view('admin/dashboard');
			} else if ($_SESSION['level'] == 2) {
				$this->load->view('manager/dashboard');
			} else if ($_SESSION['level'] == 3) {
				$this->load->view('karyawan/dashboard');
			} else {
				echo 'Anda Tidak Memiliki Hak Untuk Mengakses Halaman Ini, <a href="'.base_url("index.php/login/logout").'">Klik Disini</a> Untuk Kembali';
			}
		} else {
			redirect('/login');
		}
	}
}
