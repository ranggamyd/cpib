<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat_template_model extends CI_Model
{
    public function kd_sertifikat_auto()
    {
        $this->db->select('RIGHT(sertifikat_template.kd_sertifikat,3) as kd_sertifikat', FALSE);
        $this->db->order_by('kd_sertifikat', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('sertifikat_template');
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
        return $this->db->get('sertifikat_template')->result_array();
    }

    public function sertifikat($kd_sertifikat)
    {
        return $this->db->get_where('sertifikat_template', ['kd_sertifikat' => $kd_sertifikat])->row();
    }

    public function tambah()
    {
        $config['upload_path']    = './assets/sertifikat/template';
        $config['allowed_types']  = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_template')) {
            $sertifikat = [
                'kd_sertifikat' => $this->input->post('kd_sertifikat'),
                'nama_sertifikat' => $this->input->post('nama_sertifikat'),
                'file_template' => $this->upload->data('file_name'),
            ];

            if ($this->db->insert('sertifikat_template', $sertifikat)) return TRUE;
        } else {
            return FALSE;
        }
    }
}
