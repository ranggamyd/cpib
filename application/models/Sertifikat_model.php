<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat_model extends CI_Model
{
    public function semuaSertifikat()
    {
        return $this->db->get('sertifikat')->result_array();
    }

    public function sertifikat($kd_sertifikat)
    {
        return $this->db->get_where('sertifikat', ['kd_sertifikat' => $kd_sertifikat])->row();
    }

    public function generate()
    {
        $sertifikat = [
            'kd_supplier' => $this->input->post('kd_supplier'),
            'kd_penilaian' => $this->input->post('kd_penilaian'),
            'no_surat' => $this->input->post('no_surat'),
            'tgl' => $this->input->post('tgl'),
            'berlaku_sampai' => $this->input->post('berlaku_sampai'),
            'kepala_upt' => $this->input->post('kepala_upt'),
            'file_sertifikat' => $this->input->post('file_sertifikat'),
        ];

        if ($this->db->insert('sertifikat', $sertifikat)) return TRUE;
    }
}
