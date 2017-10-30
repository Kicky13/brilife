<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function getAdmindatatable()
    {
        $data = $this->db->query('SELECT * FROM karyawan WHERE id_level = 3')->result_array();
        return $data;
    }
    public function getDropjabatan()
    {
        $data = $this->db->query('SELECT * FROM jabatan')->result_array();
        return $data;
    }
    public function addKaryawan($nip, $password, $nama, $ttl, $tempat_lahir, $kelamin, $jabatan, $masuk)
    {
        $data = array(
            'id_karyawan' => null,
            'nip' => $nip,
            'password' => $password,
            'nama' => $nama,
            'ttl' => $ttl,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_masuk' => $masuk,
            'id_jabatan' => $jabatan,
            'id_level' => 3,
            'id_gender' => $kelamin
        );
        $this->db->insert('karyawan', $data);
        redirect('/karyawan');
    }
    public function editKaryawan($id, $nip, $password, $nama, $ttl, $tempat, $kelamin, $jabatan, $masuk)
    {
        $this->db->set('nip', $nip);
        $this->db->set('password', $password);
        $this->db->set('nama', $nama);
        $this->db->set('ttl', $ttl);
        $this->db->set('tempat_lahir', $tempat);
        $this->db->set('id_gender', $kelamin);
        $this->db->set('id_jabatan', $jabatan);
        $this->db->set('tanggal_masuk', $masuk);
        $this->db->where('id_karyawan', $id);
        $this->db->update('karyawan');
        redirect('/karyawan');
    }
    public function getDetailkaryawan($id)
    {
        $data = $this->db->query('SELECT *, TIMESTAMPDIFF(MONTH, tanggal_masuk, now()) AS lama_kerja FROM karyawan k JOIN gender g ON k.id_gender = g.id_gender JOIN jabatan j ON k.id_jabatan = j.id_jabatan WHERE id_karyawan = '.$id)->result_array();
        return $data[0];
    }
}