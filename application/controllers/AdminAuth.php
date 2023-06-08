<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminAuth extends CI_Controller
{
    public function index()
    {
        // jalankan site_helper > is_login untuk mengecek apakah user sudah login
        is_login();

        // validasi username dan password
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('pass', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] =  'Halaman Login';
            $this->load->view('auth/index', $data);
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $username = htmlspecialchars($this->input->post('username', true));
        $password = $this->input->post('pass', true);

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        // jika ada username yang di input oleh user
        if ($user) {
            // cek password, jika password yang diinput user sama dengan yang ada di database
            if (password_verify($password, $user['password'])) {
                // siapkan user data
                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['role_id']
                ];

                $this->session->set_userdata($data);

                // redirect (bisa juga redirect menurut role)
                $this->session->set_flashdata('message',  $data['username']);
                if ($user['role_id'] >= 1) {
                    redirect('admininformasi');
                } else {
                    redirect('admininformasi');
                }
            } else {
                // Jika password salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username / Password salah!</div>');
                redirect('adminauth');
            }
        } else {
            // jika username tidak terdaftar pada database
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun tidak terdaftar!</div>');
            redirect('adminauth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil keluar!</div>');
        redirect('adminauth');
    }

    public function notfound()
    {
        $data['judul'] = 'Page Not Found';
        $this->load->view('adminauth/error_404', $data);
    }
}
