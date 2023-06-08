<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserHome extends CI_Controller {

	public function index()
	{
        $data['title'] = 'Home';

        $this->load->view('templates2/header', $data);
        $this->load->view('templates2/topbar', $data);
		$this->load->view('frontend/home/index');
        $this->load->view('templates2/footer');
	}

}
