<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminMitra extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('Mitra_model');
        
        is_logout();
        $this->user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    }

    // Menampilkan semua data
    public function index()
    {
        $data['title'] = 'List Of Data';
        $this->load->library('pagination');

        // Konfigurasi untuk pagination
        $config['base_url'] = 'http://localhost/choirunfarm/adminmitra/index';
        $config['total_rows'] = $this->Mitra_model->countAllmitra();
        $config['per_page'] = 20;
        $config['num_links'] = 20;

        // styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

       
        $this->pagination->initialize($config);


        $data['start'] = $this->uri->segment(3);
        $data['mitra'] = $this->Mitra_model->getAllData($config['per_page'], $data['start']);
    

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('backend/mitra/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nama_toko', 'Nama_toko', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor_hp', 'required');
        $this->form_validation->set_rules('id_kategori', 'Id_kategori', 'required');
        $this->form_validation->set_rules('koordinat', 'Koordinat', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('backend/mitra/create');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nama_toko' => htmlspecialchars($this->input->post('nama_toko', true)),
                'nomor_hp' => htmlspecialchars($this->input->post('nomor_hp', true)),
                'id_kategori' => htmlspecialchars($this->input->post('id_kategori', true)),
                'koordinat' => htmlspecialchars($this->input->post('koordinat', true)),
                
            ];
            $this->db->insert('mitra', $data);
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('adminmitra');
        }
    }

    
    public function read($id_mitra)
    {
        $data['mitra'] = $this->Mitra_model->getDataById($id_mitra);
        $data['title'] = 'Detail Data';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('backend/mitra/read', $data);
        $this->load->view('templates/footer');
    }

    public function update($id_mitra)
    {

        $data['mitra'] = $this->Mitra_model->getDataById($id_mitra);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nama_toko', 'Nama_toko', 'required');
        $this->form_validation->set_rules('nomor_hp', 'nomor_hp', 'required');
        $this->form_validation->set_rules('id_kategori', 'Id_kategori', 'required');
        $this->form_validation->set_rules('koordinat', 'Koordinat', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Update Data';
            $product = $this->db->get_where('mitra', array('id_mitra' => $id_mitra))->row();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('backend/mitra/update', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nama_toko' => htmlspecialchars($this->input->post('nama_toko', true)),
                'nomor_hp' => htmlspecialchars($this->input->post('nomor_hp', true)),
                'id_kategori' => htmlspecialchars($this->input->post('id_kategori', true)),
                'koordinat' => htmlspecialchars($this->input->post('koordinat', true)),
            ];
            $this->db->where('id_mitra', $id_mitra);
            $this->db->update('mitra', $data);
            $this->session->set_flashdata('message', 'Diubah');
            redirect('adminmitra');
        }
    }

    public function delete($id_mitra)
    {
        $this->db->delete('mitra', ['id_mitra' => $id_mitra]);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('adminmitra');
    }

    public function export(){
        // Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excel

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=mitra.xls");
        
   
        $data['mitra'] = $this->Mitra_model->getAllData();
        $this->load->view('backend/mitra/export', $data);
        
      }
}
