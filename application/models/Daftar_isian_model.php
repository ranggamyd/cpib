<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_isian_model extends CI_Model
{
    public function kd_kategori_daftar_isian_auto()
    {
        $this->db->select('RIGHT(kategori_daftar_isian.kd_daftar_isian,3) as kd_daftar_isian', FALSE);
        $this->db->order_by('kd_daftar_isian', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('kategori_daftar_isian');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kd = intval($data->kd_daftar_isian) + 1;
        } else {
            $kd = 1;
        }
        $batas = str_pad($kd, 3, "0", STR_PAD_LEFT);
        $kddaftar_isian = "CKS-" . $batas;
        return $kddaftar_isian;
    }

    public function semuaKategori()
    {
        return $this->db->get('kategori_daftar_isian')->result_array();
    }

    public function tambah_kategori()
    {
        $data = [
            'kd_daftar_isian' => $this->input->post('kd_daftar_isian'),
            'nama_isian' => $this->input->post('nama_isian'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        if ($this->db->insert('kategori_daftar_isian', $data)) return TRUE;
    }

    public function ubah_kategori()
    {
        $kd_daftar_isian = $this->input->post('kd_daftar_isian');

        $data = [
            'kd_daftar_isian' => $kd_daftar_isian,
            'nama_isian' => $this->input->post('nama_isian'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        if ($this->db->update('kategori_daftar_isian', $data, ['kd_daftar_isian' => $kd_daftar_isian])) return TRUE;
    }

    public function hapus_kategori($kd_daftar_isian)
    {
        if (!$this->db->delete('kategori_daftar_isian', ['kd_daftar_isian' => $kd_daftar_isian])) return FALSE;
        if ($this->db->delete('daftar_isian', ['kd_daftar_isian' => $kd_daftar_isian])) return TRUE;
    }

    public function tambah_isian()
    {
        $data = [
            'kd_daftar_isian' => $this->input->post('kd_daftar_isian'),
            'nama_subisian' => $this->input->post('nama_subisian'),
            'is_minor' => $this->input->post('is_minor') ? 1 : 0,
            'is_mayor' => $this->input->post('is_mayor') ? 1 : 0,
            'is_serius' => $this->input->post('is_serius') ? 1 : 0,
            'is_kritis' => $this->input->post('is_kritis') ? 1 : 0,
            'acuan' => $this->input->post('acuan'),
        ];

        if ($this->db->insert('daftar_isian', $data)) return TRUE;
    }

    public function ubah_isian()
    {
        $id = $this->input->post('id');

        $data = [
            'kd_daftar_isian' => $this->input->post('kd_daftar_isian'),
            'nama_subisian' => $this->input->post('nama_subisian'),
            'is_minor' => $this->input->post('is_minor') ? 1 : 0,
            'is_mayor' => $this->input->post('is_mayor') ? 1 : 0,
            'is_serius' => $this->input->post('is_serius') ? 1 : 0,
            'is_kritis' => $this->input->post('is_kritis') ? 1 : 0,
            'acuan' => $this->input->post('acuan'),
        ];

        if ($this->db->update('daftar_isian', $data, ['id' => $id])) return TRUE;
    }

    public function hapus_isian($id)
    {
        if ($this->db->delete('daftar_isian', ['id' => $id])) return TRUE;
    }
}
