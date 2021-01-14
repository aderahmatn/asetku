<?php
defined('BASEPATH') or exit('No direct script access allowed');

class detail_m extends CI_Model
{
    private $_table = "detail_aset";
    public $id_detail;
    public $id_aset;
    public $id_permintaan;
    public $tanggal;
    public $pic_admin;
    public function rules()
    {
        return [
            [

                'field' => 'fid_aset',
                'label' => 'Aset',
                'rules' => 'required'

            ],
        ];
    }
    public function add($id)
    {
        $post = $this->input->post();
        $this->id_detail = uniqid('dt-');
        $this->id_aset = $post['fid_aset'];
        $this->id_permintaan = $id;
        $this->tanggal = date('Y-m-d');
        $this->pic_admin = $this->session->userdata('nama_lengkap');
        $this->db->insert($this->_table, $this);
    }
}

/* End of file detail_m.php */
