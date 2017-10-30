<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuesioner extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kuesioner');
        $this->load->library('session');
    }
    public function index()
    {
        $data = $this->m_kuesioner->getDatatable();
        $this->load->view('admin/kuesioner', array('data' => $data));
    }
    public function formAddkuesioner()
    {
        $jabatan = $this->m_kuesioner->getJabatan();
        $this->load->view('admin/tambah_kuesioner', array('jabatan' => $jabatan));
    }
    public function addKuesioner()
    {
        $jabatan = strtolower($_POST['jabatan']);
        $tipe = $_POST['kategori'];
        $pertanyaan = $_POST['pertanyaan'];
        $keterangan = $_POST['keterangan'];
        $kategori = $tipe.' '.$jabatan;
        $this->m_kuesioner->addKuesioner($pertanyaan, $keterangan, $kategori);
        redirect('/kuesioner');
    }
    public function formEditkuesioner($id)
    {
        $data = $this->m_kuesioner->getDataedit($id);
        $jabatan = $this->m_kuesioner->getJabatan();
        $this->load->view('admin/edit_kuesioner', array('data' => $data, 'jabatan' => $jabatan));
    }
    public function editKuesioner($id)
    {
        $jabatan = strtolower($_POST['jabatan']);
        $tipe = $_POST['kategori'];
        $pertanyaan = $_POST['pertanyaan'];
        $keterangan = $_POST['keterangan'];
        $kategori = $tipe.' '.$jabatan;
        $this->m_kuesioner->editKuesioner($id, $pertanyaan, $keterangan, $kategori);
        redirect('/kuesioner');
    }
}
