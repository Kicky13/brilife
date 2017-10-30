<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_karyawan');
    }

    public function index() {
        if (isset($_SESSION['loggedIn'])) {
            if ($_SESSION['level'] == 1) {
                $data = $this->m_karyawan->getAdmindatatable();
                $this->load->view('admin/karyawan', array('data' => $data));
            } else if ($_SESSION['level'] == 2) {
                $this->load->view('manager/karyawan');
            } else if ($_SESSION['level'] == 3) {
                $this->load->view('karyawan/karyawan');
            } else {
                echo 'Anda Tidak Memiliki Hak Untuk Mengakses Halaman Ini, Silahkan Kembali';
            }
        } else {
            redirect('/login');
        }
    }
    public function biodata()
    {
        if (isset($_SESSION['loggedIn'])) {
            if ($_SESSION['level'] == 3) {
                $id = $_SESSION['id'];
                $data = $this->m_karyawan->getDetailkaryawan($id);
                $this->load->view('karyawan/biodata', array('data' => $data));
            } else {
                echo 'Anda Tidak Memiliki Hak Untuk Mengakses Halaman Ini, Silahkan Kembali';
            }
        } else {
            redirect('/login');
        }
    }
    public function formAddkaryawan()
    {
        $jabatan = $this->m_karyawan->getDropjabatan();
        $this->load->view('admin/tambah_karyawan', array('jabatan' => $jabatan));
    }
    public function formEditkaryawan($id)
    {
        $jabatan = $this->m_karyawan->getDropjabatan();
        $detail = $this->m_karyawan->getDetailkaryawan($id);
        $this->load->view('admin/edit_karyawan', array('detail' => $detail, 'jabatan' => $jabatan));
    }
    public function detailKaryawan($id)
    {
        $data = $this->m_karyawan->getDetailkaryawan($id);
        $this->load->view('admin/detail_karyawan', array('data' => $data));
    }
    public function addKaryawan()
    {
        if ('submit') {
            $nip = $_POST['nip'];
            $password = $_POST['password'];
            $nama = $_POST['nama'];
            $kelamin = $_POST['kelamin'];
            $ttl = $_POST['ttl'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $jabatan = $_POST['jabatan'];
            $masuk = $_POST['masuk'];
            $this->m_karyawan->addKaryawan($nip, $password, $nama, $ttl, $tempat_lahir, $kelamin, $jabatan, $masuk);
            $this->index();
        }
    }
    public function editKaryawan($id)
    {
        if ('update'){
            $nip = $_POST['nip'];
            $password = $_POST['password'];
            $nama = $_POST['nama'];
            $kelamin = $_POST['kelamin'];
            $ttl = $_POST['ttl'];
            $tempat = $_POST['tempat_lahir'];
            $jabatan = $_POST['jabatan'];
            $masuk = $_POST['masuk'];
            $this->m_karyawan->editKaryawan($id, $nip, $password, $nama, $ttl, $tempat, $kelamin, $jabatan, $masuk);
            $this->index();
        }
    }
}