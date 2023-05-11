<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('Kategori_model');
        
        is_logout();
        $this->user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    }

    // Menampilkan semua data
    public function index()
    {
        $data['title'] = 'List Of Data';
        // Library Pagination
        $this->load->library('pagination');

        // Konfigurasi untuk pagination
        $config['base_url'] = 'http://localhost/choirunfarm/kategori/index';
        $config['total_rows'] = $this->Kategori_model->countAllKategori();
        $config['per_page'] = 10;
        $config['num_links'] = 10;

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
        $data['kategori'] = $this->Kategori_model->getData($config['per_page'], $data['start']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('backend/kategori/index', $data);
        $this->load->view('templates/footer');
    }

 

    public function create()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama_kategori', 'required');
        

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('backend/kategori/create');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
            ];
            $this->db->insert('kategori', $data);
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('kategori');
        }
    }

    
    public function read($id_kategori)
    {
        $data['kategori'] = $this->Kategori_model->getDataById($id_kategori);
        $data['title'] = 'Detail Data';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('backend/kategori/read', $data);
        $this->load->view('templates/footer');
    }

  
   
    public function update($id_kategori)
    {

        $data['kategori'] = $this->Kategori_model->getDataById($id_kategori);
        $this->form_validation->set_rules('nama_kategori', 'Nama_kategori', 'required');
     

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Update Data';
            $product = $this->db->get_where('kategori', array('id_kategori' => $id_kategori))->row();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('backend/kategori/update', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
            ];
            $this->db->where('id_kategori', $id_kategori);
            $this->db->update('kategori', $data);
            $this->session->set_flashdata('message', 'Diubah');
            redirect('kategori');
        }
    }


    public function delete($id_kategori)
    {
        $this->db->delete('kategori', ['id_kategori' => $id_kategori]);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('kategori');
    }

    

   
}
