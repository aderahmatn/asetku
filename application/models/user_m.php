<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_m extends CI_Model
{

    private $_table = "user";

    public $id_user;
    public $nama_lengkap;
    public $id_departemen;
    public $role;
    public $username;
    public $password;
    public $nik;
    public function rules()
    {
        return [
            [
                'field' => 'fnama_user',
                'label' => 'Nama Lengkap',
                'rules' => 'required'
            ],
            [
                'field' => 'fdepartemen',
                'label' => 'Departemen',
                'rules' => 'required'
            ],
            [
                'field' => 'frole',
                'label' => 'Role',
                'rules' => 'required'
            ],
            [
                'field' => 'fusername',
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username]'
            ],
            [
                'field' => 'fpassword',
                'label' => 'Password',
                'rules' => 'required'
            ],
            [
                'field' => 'fnik',
                'label' => 'NIK',
                'rules' => 'required|numeric'
            ],
        ];
    }
    public function rules_update()
    {
        return [
            [
                'field' => 'fnama_user',
                'label' => 'Nama Lengkap',
                'rules' => 'required'
            ],
            [
                'field' => 'fdepartemen',
                'label' => 'Departemen',
                'rules' => 'required'
            ],
            [
                'field' => 'frole',
                'label' => 'Role',
                'rules' => 'required'
            ],
            [
                'field' => 'fusername',
                'label' => 'Username',
                'rules' => 'required'
            ],
            [
                'field' => 'fpassword',
                'label' => 'Password',
                'rules' => 'required'
            ],
            [
                'field' => 'fnik',
                'label' => 'NIK',
                'rules' => 'required|numeric'
            ],
        ];
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->join('departemen', 'user.id_departemen = departemen.id_departemen', 'left');
        $this->db->from($this->_table);
        $this->db->where('user.deleted', 0);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_id($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }
    public function add()
    {
        $post = $this->input->post();
        $this->id_user = uniqid('user-');
        $this->nama_lengkap = $post['fnama_user'];
        $this->id_departemen = $post['fdepartemen'];
        $this->role = $post['frole'];
        $this->username = $post['fusername'];
        $this->nik = $post['fnik'];
        $this->password = md5($post['fpassword']);
        $this->deleted = 0;
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->set('deleted', 1);
        $this->db->where('id_user', $id);
        $this->db->update($this->_table);
    }
    public function update($post)
    {
        $post = $this->input->post();
        $this->id_user = $post['fid_user'];
        $this->nama_lengkap = $post['fnama_user'];
        $this->id_departemen = $post['fdepartemen'];
        $this->role = $post['frole'];
        $this->username = $post['fusername'];
        $this->nik = $post['fnik'];
        $this->password = $post['fpassword'];
        $this->deleted = 0;
        $this->db->update($this->_table, $this, array('id_user' => $post['fid_user']));
    }
}

/* End of file user_m.php */
