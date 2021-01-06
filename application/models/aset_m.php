<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset_m extends CI_Model
{
    private $_table = "aset";

    public $id_aset;
    public $kode_aset;
    public $nama_aset;
    public $tanggal_pembelian;
    public $supplier;
    public $deskripsi;
    public $status_aset;
    public $deleted;

    public function rules()
    {
        return [
            [
                'field' => 'fnama_aset',
                'label' => 'Nama Aset',
                'rules' => 'required'
            ],
            [
                'field' => 'ftgl_pembelian',
                'label' => 'Tanggal Pembelian',
                'rules' => 'required'
            ],
            [
                'field' => 'fsupplier',
                'label' => 'Supplier',
                'rules' => 'required'
            ],
            [
                'field' => 'fstatus',
                'label' => 'Status',
                'rules' => 'required'
            ],
            [
                'field' => 'fdeskripsi',
                'label' => 'Deskripsi Aset',
                'rules' => 'required'
            ],
        ];
    }
    public function get_all()
    {
        return $this->db->get_where($this->_table, ["deleted" => 0])->result();
    }
    public function get_by_id($id)
    {
        return $this->db->get_where($this->_table, ["id_aset" => $id])->row();
    }
    public function add()
    {
        $post = $this->input->post();
        $this->id_aset = uniqid('ast-');
        $this->kode_aset = $post['fkode_aset'];
        $this->nama_aset = $post['fnama_aset'];
        $this->tanggal_pembelian = $post['ftgl_pembelian'];
        $this->supplier = $post['fsupplier'];
        $this->status_aset = $post['fstatus'];
        $this->deskripsi = $post['fdeskripsi'];
        $this->deleted = 0;
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->set('deleted', 1);
        $this->db->where('id_aset', $id);
        $this->db->update($this->_table);
    }
    public function update($post)
    {
        $post = $this->input->post();
        $this->id_aset = $post['fid_aset'];
        $this->kode_aset = $post['fkode_aset'];
        $this->nama_aset = $post['fnama_aset'];
        $this->tanggal_pembelian = $post['ftgl_pembelian'];
        $this->supplier = $post['fsupplier'];
        $this->status_aset = $post['fstatus'];
        $this->deskripsi = $post['fdeskripsi'];
        $this->deleted = 0;
        $this->db->update($this->_table, $this, array('id_aset' => $post['fid_aset']));
    }
}

/* End of file Aset_m.php */
