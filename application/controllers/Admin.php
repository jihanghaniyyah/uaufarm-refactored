<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'model');
        is_logout();
        $this->user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function pengguna()
    {
        // siapkan data
        $data = [
            'judul' => 'Kelola Pengguna',
            'user' => $this->user,
            'pengguna' => $this->model->getPengguna()
        ];

        // load view
        $this->templating->load('admin/pengguna', $data);
    }

    public function tambah_pengguna()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor_hp', 'required');
        $this->form_validation->set_rules('koordinat', 'Koordinat', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('new_password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[new_password]');

        // Jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'Tambah Pengguna',
                'user' => $this->user
            ];

            $this->templating->load('admin/tambah-pengguna', $data);
            // jika lolos validasi
        } else {
            // tambah data ke database
            $this->model->addPengguna();
        }
    }

    public function hapus_pengguna()
    {
        $id = $this->input->post('id');
        // Hapus data dari tabel user, dimana id user sesuai dengan yang dikirimkan
        // Hapus semua pengaduan dari data user yang dihapus
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('msg', 'dihapus.');
        redirect('data-pengguna');
    }
}
