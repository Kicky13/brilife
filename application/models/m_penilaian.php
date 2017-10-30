<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penilaian extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function getDatatable()
    {
        $data = $this->db->query('SELECT * FROM karyawan k join jabatan j ON k.id_jabatan = j.id_jabatan WHERE id_level = 3')->result_array();
        return $data;
    }
    public function getDatahasil($periode)
    {
        $data = $this->db->query('SELECT * FROM penilaian p JOIN karyawan k ON p.id_karyawan = k.id_karyawan JOIN jabatan j ON k.id_jabatan = j.id_jabatan JOIN prestasi pr ON p.id_prestasi = pr.id_prestasi WHERE periode = "'.$periode.'"')->result_array();
        return $data;
    }
    public function getTranskriptable()
    {
        $data = $this->db->query('SELECT *, TIMESTAMPDIFF(MONTH, tanggal_masuk, now()) AS lama_kerja FROM karyawan k JOIN jabatan j ON k.id_jabatan = j.id_jabatan WHERE id_level = 3')->result_array();
        return $data;
    }
    public function getDetailtranskrip($id)
    {
        $data = $this->db->query('SELECT * FROM penilaian p JOIN prestasi pr ON p.id_prestasi = pr.id_prestasi JOIN karyawan k ON p.id_karyawan = k.id_karyawan WHERE p.id_karyawan = '.$id)->result_array();
        return $data;
    }
    public function getHasilkaryawan($id)
    {
        $n = $this->getPeriodeinput();
        $periode = $n['bulan'].'/'.$n['tahun'];
        $data = $this->db->query('SELECT * FROM penilaian p JOIN karyawan k ON p.id_karyawan = k.id_karyawan JOIN prestasi pr ON p.id_prestasi = pr.id_prestasi JOIN jabatan j ON j.id_jabatan = k.id_jabatan WHERE p.id_karyawan = '.$id.' AND periode = "'.$periode.'"')->result_array();
        $x = count($data);
        if ($x < 1){
            $query = $this->db->query('SELECT * FROM karyawan k JOIN jabatan j ON k.id_jabatan = j.id_jabatan WHERE id_karyawan = '.$id)->result_array();
            $data = array(
                'nama' => $query[0]['nama'],
                'jabatan' => $query[0]['jabatan'],
                'mutu_kerja' => 'Kosong',
                'inisiatif' => 'Kosong',
                'kehadiran' => 'Kosong',
                'sikap' => 'Kosong',
                'pengetahuan_kerja' => 'Kosong',
                'prestasi' => 'Belum Dikalkulasi',
                'komentar' => ''
                );
            return $data;
        } else {
            return $data[0];
        }
    }
    public function getDetailkaryawan($id)
    {
        $data = $this->db->query('SELECT *, TIMESTAMPDIFF(MONTH, tanggal_masuk, now()) AS lama_kerja FROM karyawan k JOIN jabatan j ON j.id_jabatan = k.id_jabatan JOIN gender g ON g.id_gender = k.id_gender WHERE id_karyawan = '.$id)->result_array();
        return $data[0];
    }
    public function getPeriodeinput()
    {
        $data = $this->db->query('SELECT MONTH(now()) AS bulan, YEAR(now()) AS tahun FROM karyawan')->result_array();
        switch ($data[0]['bulan']){
            case 1:
            $data[0]['nama'] = 'Januari';
            break;
            case 2:
            $data[0]['nama'] = 'Februari';
            break;
            case 3:
            $data[0]['nama'] = 'Maret';
            break;
            case 4:
            $data[0]['nama'] = 'April';
            break;
            case 5:
            $data[0]['nama'] = 'Mei';
            break;
            case 6:
            $data[0]['nama'] = 'Juni';
            break;
            case 7:
            $data[0]['nama'] = 'July';
            break;
            case 8:
            $data[0]['nama'] = 'Agustus';
            break;
            case 9:
            $data[0]['nama'] = 'September';
            break;
            case 10:
            $data[0]['nama'] = 'Oktober';
            break;
            case 11:
            $data[0]['nama'] = 'November';
            break;
            case 12:
            $data[0]['nama'] = 'Desember';
            break;
        }
        return $data[0];
    }
    public function getDataedit($id, $periode)
    {
        $data = $this->db->query('SELECT *, TIMESTAMPDIFF(MONTH, tanggal_masuk, now()) AS lama_kerja FROM penilaian p JOIN karyawan k ON p.id_karyawan = k.id_karyawan JOIN jabatan j ON j.id_jabatan = k.id_jabatan JOIN gender g ON g.id_gender = k.id_gender WHERE p.id_karyawan = '.$id.' AND periode = "'.$periode.'"')->result_array();
        return $data[0];
    }
    public function cekPenilaian($id)
    {
        $now = $this->getPeriodeinput();
        $periode = $now['bulan'].'/'.$now['tahun'];
        $data = $this->db->query('SELECT * FROM penilaian WHERE id_karyawan = '.$id.' AND periode = "'.$periode.'"')->num_rows();
        return $data;
    }
    public function addPenilaian($id, $mutu, $inisiatif, $kehadiran, $sikap, $pengetahuan, $prestasi, $komentar)
    {
        $periode = $this->getPeriodeinput();
        switch ($prestasi){
            case 'Baik':
            $index = 1;
            break;
            case 'Cukup Baik':
            $index = 2;
            break;
            default:
            $index = 3;
            break;
        }
        $data = array(
            'id_penilaian' => null,
            'id_karyawan' => $id,
            'periode' => $periode['bulan'].'/'.$periode['tahun'],
            'mutu_kerja' => $mutu,
            'inisiatif' => $inisiatif,
            'kehadiran' => $kehadiran,
            'sikap' => $sikap,
            'pengetahuan_kerja' => $pengetahuan,
            'id_prestasi' => $index,
            'komentar' => $komentar
            );
        $this->db->insert('penilaian', $data);
    }
    public function editPenilaian($id, $mutu, $inisiatif, $kehadiran, $sikap, $pengetahuan, $prestasi, $komentar)
    {
        switch ($prestasi){
            case 'Baik':
            $index = 1;
            break;
            case 'Cukup Baik':
            $index = 2;
            break;
            default:
            $index = 3;
            break;
        }
        $this->db->set('mutu_kerja', $mutu);
        $this->db->set('inisiatif', $inisiatif);
        $this->db->set('kehadiran', $kehadiran);
        $this->db->set('sikap', $sikap);
        $this->db->set('pengetahuan_kerja', $pengetahuan);
        $this->db->set('id_prestasi', $index);
        $this->db->set('komentar', $komentar);
        $this->db->where('id_penilaian', $id);
        $this->db->update('penilaian');
    }
    public function a($az = array())
    {
        foreach ($az as $value){
            $n[] = $value['a'];
        }
        return $n;
    }
    public function az($az = array())
    {
        foreach ($az as $value){
            $n[] = $value['az'];
        }
        return $n;
    }
    public function getPrestasi($n = array())
    {
        $a = $this->a($n);
        $az = $this->az($n);
        $totA = array_sum($a);
        $totaz = array_sum($az);
        $x = $totaz/$totA;
        if ($x >= 0 && $x < 7){
            $predikat = 'Cukup';
        } elseif ($x >= 7 && $x < 8){
            $predikat = 'Cukup Baik';
        } else {
            $predikat = 'Baik';
        }
        $nilai = array('prestasi' => $predikat, 'nilai' => $x);
        return $nilai;
    }
    public function hitungaz($z = array())
    {
        foreach ($z as $value){
            $az = $value['a']*$value['z'];
            $data[] = array('a' => $value['a'], 'z' => $value['z'], 'az' => $az, 'index' => $value['index']);
        }
        return $data;
    }
    public function hitungNilaiz($a = array())
    {
        foreach ($a as $value){
            switch ($value['index']){
                case 'cukup':
                $z = (7-$value['a'])*1;
                break;
                case 'cukup baik':
                $z = (8-$value['a'])/1;
                break;
                default:
                $z = ($value['a']*1)+7;
                break;
            }
            $nilaiz[] = array('a' => $value['a'], 'z' => $z, 'index' => $value['index']);
        }
        return $nilaiz;
    }
    public function predikatIndex($a = array())
    {
        $nilai = array_count_values($a);
        if (isset($nilai[0]) && isset($nilai[1]) && isset($nilai[2])){
            if ($nilai[2] >= 2){
                $index = 'baik';
            } else {
                if ($nilai[1] >= $nilai[0]){
                    $index = 'cukup baik';
                } else {
                    $index = 'cukup';
                }
            }
        } elseif (isset($nilai[0]) && isset($nilai[1])){
            if ($nilai[0] <= $nilai[1]){
                $index = 'cukup baik';
            } else {
                $index = 'cukup';
            }
        } elseif (isset($nilai[0]) && isset($nilai[2])){
            if ($nilai[0] <= $nilai[2]){
                $index = 'baik';
            } else {
                $index = 'cukup';
            }
        } elseif (isset($nilai[1]) && isset($nilai[2])){
            if ($nilai[1] <= $nilai[2]){
                $index = 'baik';
            } else {
                $index = 'cukup baik';
            }
        } elseif (isset($nilai[0])){
            $index = 'cukup';
        } elseif (isset($nilai[1])){
            $index = 'cukup baik';
        } else {
            $index = 'baik';
        }
        return $index;
    }
    public function hitungAlpha($rule = array())
    {
        foreach ($rule as $value){
            $min = min($value[0], $value[1], $value[2], $value[3], $value[4]);
            $alpha[] = array('a' => $min, 'index' => $value['index'], 'kode' => $value['kode']);
        }
        return $alpha;
    }
    public function buatRule($mx = array(), $ix = array(), $kx = array(), $sx = array(), $px = array())
    {
        for ($i = 0; $i < count($mx); $i++){
            for ($j = 0; $j < count($ix); $j++){
                for ($k = 0; $k < count($kx); $k++){
                    for ($l = 0; $l < count($sx); $l++){
                        for ($m = 0; $m < count($px); $m++){
                            $index = array($i, $j, $k, $l, $m);
                            $predikat = $this->predikatIndex($index);
                            $n = ($i+1).'/'.($j+1).'/'.($k+1).'/'.($l+1).'/'.($m+1);
                            $rule[] = array($mx[$i], $ix[$j], $kx[$k], $sx[$l], $px[$m], 'index' => $predikat,'kode' => $n);
                        }
                    }
                }
            }
        }
        return $rule;
    }
    public function nilai1($nilai)
    {
        $n = array();
        if ($nilai >= 0 AND $nilai <= 60){
            $n[0] = 1;
            $n[1] = 0;
            $n[2] = 0;
        } elseif ($nilai > 60 AND $nilai < 70){
            $n[0] = (70 - $nilai) / 10;
            $n[1] = ($nilai - 60) / 10;
            $n[2] = 0;
        } elseif ($nilai == 70){
            $n[0] = 0;
            $n[1] = 1;
            $n[2] = 0;
        } elseif ($nilai > 70 AND $nilai < 80){
            $n[0] = 0;
            $n[1] = (80 - $nilai) / 10;
            $n[2] = ($nilai - 70) / 10;
        } else {
            $n[0] = 0;
            $n[1] = 0;
            $n[2] = 1;
        }
        return $n;
    }
    public function elemenKuesioner($id_karyawan, $id_jabatan){
        $this->db->select('*');
        $this->db->from('kuesioner');
        $this->db->join('kriteria', 'kriteria.id_kriteria = kuesioner.id_kriteria');
        $this->db->join('jabatan', 'jabatan.id_jabatan = kriteria.id_jabatan');
        $this->db->join('karyawan', 'karyawan.id_jabatan = jabatan.id_jabatan');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        $this->db->where('jabatan.id_jabatan', $id_jabatan);
        $data = $this->db->get(); 
        return $data->result_array();
    }
    public function elemenKriteria($karyawan, $jabatan)
    {
      $data = $this->db->query('SELECT * FROM kuesioner k JOIN kriteria c ON c.id_kriteria = k.id_kriteria JOIN jabatan j ON j.id_jabatan = c.id_jabatan JOIN karyawan kr ON kr.id_jabatan = j.id_jabatan WHERE kr.id_karyawan = '.$karyawan.' AND j.id_jabatan = '.$jabatan.' GROUP BY k.id_kriteria')->result_array();
      return $data;
    }
}