<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penanganan_model extends CI_Model
{
    public function kd_penanganan_auto()
    {
        $this->db->select('RIGHT(penanganan.kd_penanganan,3) as kd_penanganan', FALSE);
        $this->db->order_by('kd_penanganan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('penanganan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kd = intval($data->kd_penanganan) + 1;
        } else {
            $kd = 1;
        }
        $batas = str_pad($kd, 3, "0", STR_PAD_LEFT);
        $kdpenanganan = "PNG-" . $batas;
        return $kdpenanganan;
    }

    public function semuaPenanganan()
    {
        return $this->db->get('penanganan')->result_array();
    }

    public function tambah()
    {
        $data = [
            'kd_penanganan' => $this->input->post('kd_penanganan'),
            'nama_penanganan' => $this->input->post('nama_penanganan'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        if ($this->db->insert('penanganan', $data)) return TRUE;
    }

    public function ubah()
    {
        $data = [
            'nama_penanganan' => $this->input->post('nama_penanganan'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        if ($this->db->update('penanganan', $data, ['kd_penanganan' => $this->input->post('kd_penanganan')])) return TRUE;
    }

    public function hapus($kd_penanganan)
    {
        if ($this->db->delete('penanganan', ['kd_penanganan' => $kd_penanganan])) return TRUE;
    }
}
