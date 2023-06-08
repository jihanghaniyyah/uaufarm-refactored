<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminAuth extends CI_Controller
{
    public function index()
    {
        is_login();

        $this->validateForm();
    }

    private function validateForm()
    {
        $validationRules = [
            ['field' => 'username', 'label' => 'Username', 'rules' => 'required|trim'],
            ['field' => 'pass', 'label' => 'Password', 'rules' => 'required|trim'],
        ];

        foreach ($validationRules as $rule) {
            $this->form_validation->set_rules($rule['field'], $rule['label'], $rule['rules']);
        }

        if ($this->form_validation->run() == false) {
            $data['judul'] =  'Halaman Login';
            $this->load->view('auth/index', $data);
        } else {
            // jika lolos validasi, proses..
            $this->_login();
        }
    }

    public function _login()
    {
        $username = htmlspecialchars($this->input->post('username',true));
        $password = $this->input->post('pass',true);

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            $this->checkPasswordAndLogin($password,$user);
        } else {
            $this->handleInvalidUsername();
        }
    }

    private function checkPasswordAndLogin($password,$user)
    {
        if (password_verify($password, $user['password'])) {
            $this->setUserDataAndRedirect($user);
        } else {
            $this->handleInvalidPassword();
        }
    }

    private function setUserDataAndRedirect($user)
    {
        $data = [
            'username' => $user['username'],
            'role_id' => $user['role_id']
        ];

        $this->session->set_userdata($data);

        $this->session->set_flashdata('message',  $data['username']);

        $redirectUrl = ($user['role_id'] >= 1) ? 'admininformasi' : 'admininformasi';
        redirect($redirectUrl);
    }

    private function handleInvalidPassword()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username / Password salah!</div>');
        redirect('adminauth');
    }

    private function handleInvalidUsername()
    {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun tidak terdaftar!</div>');
        redirect('adminauth');
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
