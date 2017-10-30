<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_penilaian');
    }
    public function tabelPenilaian()
    {
        if (isset($_SESSION['loggedIn'])) {
             if ($_SESSION['level'] == 2) {
                $data = $this->m_penilaian->getDatatable();
                $this->load->view('manager/tabel_penilaian', array('data' => $data));
            } else {
                echo 'Anda Tidak Memiliki Hak Untuk Mengakses Halaman Ini, Silahkan Kembali';
            }
        } else {
            redirect('/login');
        }
    }
    public function hasilPenilaian()
    {
        if (isset($_SESSION['loggedIn'])) {
            if ($_SESSION['level'] == 2) {
                $now = $this->m_penilaian->getPeriodeinput();
                $periode = $now['bulan'].'/'.$now['tahun'];
                $data = $this->m_penilaian->getDatahasil($periode);
                $this->load->view('manager/hasilPenilaian', array('data' => $data, 'periode' => $now));
            } elseif ($_SESSION['level'] == 3){
                $id = $_SESSION['id'];
                $periode = $this->m_penilaian->getPeriodeinput();
                $data = $this->m_penilaian->getHasilkaryawan($id);
                $this->load->view('karyawan/hasilPenilaian', array('data' => $data, 'periode' => $periode));
            } else {
                echo 'Anda Tidak Memiliki Hak Untuk Mengakses Halaman Ini, Silahkan Kembali';
            }
        } else {
            redirect('/login');
        }
    }
    public function transkripPenilaian()
    {
        if (isset($_SESSION['loggedIn'])) {
            if ($_SESSION['level'] == 2) {
                $data = $this->m_penilaian->getTranskriptable();
                $this->load->view('manager/transkripNilai', array('data' => $data));
            } elseif ($_SESSION['level'] == 3) {
                $id = $_SESSION['id'];
                $data = $this->m_penilaian->getDetailtranskrip($id);
                $profil = $this->m_penilaian->getDetailkaryawan($id);
                $this->load->view('karyawan/detailTranskrip_kar', array('data' => $data, 'profil' => $profil));
            } else {
                echo 'Anda Tidak Memiliki Hak Untuk Mengakses Halaman Ini, Silahkan Kembali';
            }
        } else {
            redirect('/login');
        }
    }
    public function detailTranskrip($id)
    {
        if (isset($_SESSION['loggedIn'])) {
            if ($_SESSION['level'] == 2) {
                $data = $this->m_penilaian->getDetailtranskrip($id);
                $profil = $this->m_penilaian->getDetailkaryawan($id);
                $this->load->view('manager/detailTranskrip', array('data' => $data, 'profil' => $profil));
            } else {
                echo 'Anda Tidak Memiliki Hak Untuk Mengakses Halaman Ini, Silahkan Kembali';
            }
        } else {
            redirect('/login');
        }
    }
    public function viewEditpenilaian($id)
    {
        $now = $this->m_penilaian->getPeriodeinput();
        $periode = $now['bulan'].'/'.$now['tahun'];
        $detail = $this->m_penilaian->getDataedit($id, $periode);
        $this->load->view('manager/form_editPenilaian', array('data' => $detail, 'periode' => $now));
    }
    public function laporanPenilaian()
    {
        if (isset($_SESSION['loggedIn'])) {
            if ($_SESSION['level'] == 2) {
                $this->load->view('manager/laporan_penilaian');
            } else {
                echo 'Anda Tidak Memiliki Hak Untuk Mengakses Halaman Ini, Silahkan Kembali';
            }
        } else {
            redirect('/login');
        }
    }
    public function viewFormpenilaian($id, $nilai = array())
    {
        $data = $this->m_penilaian->getDetailkaryawan($id);
        $periode = $this->m_penilaian->getPeriodeinput();
        $this->load->view('manager/form_penilaian', array('data' => $data, 'periode' => $periode, 'nilai' => $nilai));
    }
    public function addPenilaian($id)
    {
        $mutu = $_POST['mutu'];
        $inisiatif = $_POST['inisiatif'];
        $kehadiran = $_POST['kehadiran'];
        $sikap = $_POST['sikap'];
        $pengetahuan = $_POST['pengetahuan'];
        $prestasi = $_POST['prestasi'];
        $komentar = $_POST['prestasi'];
        $cek = $this->m_penilaian->cekPenilaian($id);
        if ($cek == 0){
            $this->m_penilaian->addPenilaian($id, $mutu, $inisiatif, $kehadiran, $sikap, $pengetahuan, $prestasi, $komentar);
            $this->tabelPenilaian();
        } else {
            echo '<div class="alert alert-danger"><strong>Maaf!</strong>Nilai Karyawan Untuk Bulan ini Telah Di inputkan Sebelumnya</div>';
            $this->tabelPenilaian();
        }
    }
    public function editPenilaian($id)
    {
        $mutu = $_POST['mutu'];
        $inisiatif = $_POST['inisiatif'];
        $kehadiran = $_POST['kehadiran'];
        $sikap = $_POST['sikap'];
        $pengetahuan = $_POST['pengetahuan'];
        $prestasi = $_POST['prestasi'];
        $komentar = $_POST['komentar'];
        $this->m_penilaian->editPenilaian($id, $mutu, $inisiatif, $kehadiran, $sikap, $pengetahuan, $prestasi, $komentar);
        redirect('/penilaian/hasilPenilaian');
    }
    public function hitungPrestasi()
    {
        $mutu = $_POST['mutu'];
        $mx = $this->m_penilaian->nilai1($mutu);
        $inisiatif = $_POST['inisiatif'];
        $ix = $this->m_penilaian->nilai1($inisiatif);
        $kehadiran = $_POST['kehadiran'];
        $kx = $this->m_penilaian->nilai1($kehadiran);
        $sikap = $_POST['sikap'];
        $sx = $this->m_penilaian->nilai1($sikap);
        $pengetahuan = $_POST['pengetahuan'];
        $px = $this->m_penilaian->nilai1($pengetahuan);
        $rule = $this->m_penilaian->buatRule($mx, $ix, $kx, $sx, $px);
        $alpa = $this->m_penilaian->hitungAlpha($rule);
        $z = $this->m_penilaian->hitungNilaiz($alpa);
        $az = $this->m_penilaian->hitungaz($z);
        $prestasi = $this->m_penilaian->getPrestasi($az);
        echo json_encode($prestasi);
    }
    public function kuisioner($id_karyawan, $id_jabatan)
    {
        $data = $this->m_penilaian->elemenKuesioner($id_karyawan,$id_jabatan);
        $this->load->view('manager/kuesioner', array('mydata' => $data));
    }
    public function isiKuesioner($karyawan, $jabatan)
    {
        $nilai = array();
        $data = $this->m_penilaian->elemenKuesioner($karyawan, $jabatan);
        $elemen = $this->m_penilaian->elemenKriteria($karyawan, $jabatan);
        foreach ($data as $row => $value){
            $nilai[$value['id_kriteria']][$value['id_kuesioner']] = $_POST['id-'.$value['id_kuesioner']];
        }
        foreach ($elemen as $x => $y){
            $total[] = (array_sum($nilai[$y['id_kriteria']])/count($nilai[$y['id_kriteria']]))*100/7;
        }
        $this->viewFormpenilaian($karyawan, $total);
    }
    public function deleteNilai($id)
    {
        $this->m_penilaian->deleteNilai($id);
        redirect('/penilaian/hasilPenilaian');
    }
}
