<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
    public function kd_pengajuan_auto()
    {
        $this->db->select('RIGHT(pengajuan.kd_pengajuan,4) as kd_pengajuan', FALSE);
        $this->db->order_by('kd_pengajuan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pengajuan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kd = intval($data->kd_pengajuan) + 1;
        } else {
            $kd = 1;
        }
        $batas = str_pad($kd, 4, "0", STR_PAD_LEFT);
        $kdpengajuan = "AJU-" . $batas;
        return $kdpengajuan;
    }

    public function read_pengajuan()
    {
        return $this->db->get('pengajuan')->result_array();
    }
    public function read_supplier()
    {
        return $this->db->get('supplier')->result_array();
    }
}
