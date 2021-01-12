<?php
defined('BASEPATH') or exit('No direct script access allowed');

class device extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('device_m');
        $this->load->model('kategori_m');
    }
    public function index()
    {
        $data['device'] = $this->device_m->get_all();
        $this->template->load('shared/index', 'device/index', $data);
    }
    public function create()
    {
        $device  = $this->device_m;
        $validation = $this->form_validation;
        $validation->set_rules($device->rules());
        if ($validation->run() == FALSE) {
            $data['kategori'] = $this->kategori_m->get_all();
            $this->template->load('shared/index', 'device/create', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $device->Add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data device berhasil disimpan!');
                redirect('device', 'refresh');
            }
        }
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('alat');
        $device  = $this->device_m;
        $validation = $this->form_validation;
        $validation->set_rules($device->rules());

        if ($validation->run() == FALSE) {
            $data['device'] = $this->device_m->get_by_id($id);
            $data['kategori'] = $this->kategori_m->get_all();

            if (!$data['device']) {
                $this->session->set_flashdata('error', 'Data device tidak ditemukan!');
                redirect('device', 'refresh');
            }
            $this->template->load('shared/index', 'device/edit', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $device->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data device berhasil diupdate!');
                redirect('device', 'refresh');
            } else {
                $this->session->set_flashdata('warning', 'Data device tidak ada yang diupdate!');
                redirect('device', 'refresh');
            }
        }
    }
    public function delete($id)
    {
        $this->device_m->Delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data device berhasil dihapus!');
            redirect('device', 'refresh');
        }
    }
}

/* End of file Aset.php */
