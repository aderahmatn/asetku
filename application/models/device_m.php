<?php
defined('BASEPATH') or exit('No direct script access allowed');

class device_m extends CI_Model
{
    private $_table = "device";

    public $id_device;
    public $kode_device;
    public $nama_device;
    public $tanggal_pembelian;
    public $supplier;
    public $deskripsi;
    public $deleted;
    public $id_kategori;

    public function rules()
    {
        return [
            [
                'field' => 'fnama_device',
                'label' => 'Nama device',
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
                'field' => 'fdeskripsi',
                'label' => 'Deskripsi device',
                'rules' => 'required'
            ],
            [
                'field' => 'fkategori',
                'label' => 'Kategori device',
                'rules' => 'required'
            ],
        ];
    }
    public function get_all()
    {
        $this->db->select('*');
        $this->db->join('kategori', 'kategori.id_kategori = device.id_kategori');
        $this->db->from($this->_table);
        $this->db->where('device.deleted', 0);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_id($id)
    {
        return $this->db->get_where($this->_table, ["id_device" => $id])->row();
    }
    public function add()
    {
        $post = $this->input->post();
        $this->id_device = uniqid('ast-');
        $this->kode_device = $post['fkode_device'];
        $this->nama_device = $post['fnama_device'];
        $this->tanggal_pembelian = $post['ftgl_pembelian'];
        $this->supplier = $post['fsupplier'];
        $this->deskripsi = $post['fdeskripsi'];
        $this->id_kategori = $post['fkategori'];
        $this->deleted = 0;
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->set('deleted', 1);
        $this->db->where('id_device', $id);
        $this->db->update($this->_table);
    }
    public function update($post)
    {
        $post = $this->input->post();
        $this->id_device = $post['fid_device'];
        $this->kode_device = $post['fkode_device'];
        $this->nama_device = $post['fnama_device'];
        $this->tanggal_pembelian = $post['ftgl_pembelian'];
        $this->supplier = $post['fsupplier'];
        $this->deskripsi = $post['fdeskripsi'];
        $this->id_kategori = $post['fkategori'];
        $this->deleted = 0;
        $this->db->update($this->_table, $this, array('id_device' => $post['fid_device']));
    }
}

/* End of file device_m.php */
