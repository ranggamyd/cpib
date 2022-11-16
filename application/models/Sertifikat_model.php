<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat_model extends CI_Model
{
    public function kd_sertifikat_auto()
    {
        $this->db->select('RIGHT(sertifikat.kd_sertifikat,3) as kd_sertifikat', FALSE);
        $this->db->order_by('kd_sertifikat', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('sertifikat');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kd = intval($data->kd_sertifikat) + 1;
        } else {
            $kd = 1;
        }
        $batas = str_pad($kd, 3, "0", STR_PAD_LEFT);
        $kdsertifikat = "CPIB-" . $batas;
        return $kdsertifikat;
    }

    public function semuaSertifikat()
    {
        return $this->db->get('sertifikat')->result_array();
    }
}
