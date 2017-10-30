<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kuesioner extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function getDatatable()
    {
        $data = $this->db->query('SELECT * FROM kuesioner k JOIN kriteria c ON k.id_kriteria = c.id_kriteria JOIN jabatan j ON c.id_jabatan = j.id_jabatan')->result_array();
        return $data;
    }
    public function getJabatan()
    {
        $data = $this->db->query('SELECT * FROM jabatan WHERE id_jabatan > 1')->result_array();
        return $data;
    }
    public function addKuesioner($pertanyaan, $kategori)
    {
        $kriteria = $this->db->query('SELECT * FROM kriteria WHERE kriteria = "'.$kategori.'"')->result_array();
        $data = array(
            'id_kuesioner' => null,
            'kuesioner' => $pertanyaan,
            'id_kriteria' => $kriteria[0]['id_kriteria']
        );
        $this->db->insert('kuesioner', $data);
    }
    public function editKuesioner($id, $pertanyaan, $kategori)
    {
        $kriteria = $this->db->query('SELECT * FROM kriteria WHERE kriteria = "'.$kategori.'"')->result_array();
        $this->db->set('kuesioner', $pertanyaan);
        $this->db->set('id_kriteria', $kriteria[0]['id_kriteria']);
        $this->db->where('id_kuesioner', $id);
        $this->db->update('kuesioner');
    }
    public function getDataedit($id)
    {
        $query = $this->db->query('SELECT * FROM kuesioner k JOIN kriteria c ON k.id_kriteria = c.id_kriteria WHERE k.id_kuesioner = '.$id)->result_array();
        $kategori = explode(" ", $query[0]['kriteria']);
        $x = count($kategori);
        if ($x == 3){
            $tipe = $kategori[0];
            $jabatan = $kategori[1].' '.$kategori[2];
        } else {
            $tipe = $kategori[0].' '.$kategori[1];
            $jabatan = $kategori[2].' '.$kategori[3];
        }
        $data = array(
            'id' => $id,
            'kriteria' => $tipe,
            'jabatan' => ucwords($jabatan),
            'kuesioner' => $query[0]['kuesioner'],
            'keterangan' => $query[0]['keterangan']
        );
        return $data;
    }
}
