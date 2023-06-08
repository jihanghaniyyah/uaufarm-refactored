<?php
class Admin_model extends CI_Model
{
    public function getPengguna()
    {
        // menggunankan where !=1 -> untuk menampilkan user instansi saja (tidak termasuk admin)
        return $this->db->get_where('user', 'user.role_id !=1')->result_array();
    }

    public function addPengguna()
    {
        // tangkap data dan encrypt password
        $password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'nomor_hp' => htmlspecialchars($this->input->post('nomor_hp', true)),
            'koordinat' => htmlspecialchars($this->input->post('koordinat', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => $password,
            'role_id' => 2
        ];

        $this->db->insert('user', $data);
        $this->session->set_flashdata('msg', 'ditambahkan.');
        redirect('data-pengguna');
    }
}