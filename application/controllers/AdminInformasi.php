<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminInformasi extends CI_Controller {

        public function index()
        {
                $this->load->model('Mitra_model');
                $this->load->model('Kategori_model');

                $data['mitra'] = $this->Mitra_model->getAllData();
                $data['kategori'] = $this->Kategori_model->getAllData();

                $this->loadTemplate('backend/informasi/index', $data);
        }

        private function loadTemplate($view, $data)
        {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view($view, $data);
                $this->load->view('templates/footer');
        }
}
