<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserMaps extends CI_Controller {

	public function index()
	{
        $this->load->model('Mitra_model');
        $this->load->model('Admin_model');

        $data['mitra'] = $this->Mitra_model->getAllData();
        $data['user'] = $this->Admin_model->getPengguna();

        $this->load->view('templates2/header', $data);
        $this->load->view('templates2/topbar', $data);
		$this->load->view('frontend/maps/index', $data);
        $this->load->view('templates2/footer');
	}

}
