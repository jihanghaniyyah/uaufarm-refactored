<?php

class Kategori_model extends CI_model
{
    public function getAllData()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function getDataById($id_kategori)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array();
    }

    public function getData($limit, $start) {
        return $this->db->get('kategori', $limit, $start)->result_array();
    }

    public function countAllkategori()
    {
        return $this->db->get('kategori')->num_rows();
    }

   
}