<?php

class Mitra_model extends CI_model
{
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('mitra');
        $this->db->join('kategori', 'kategori.id_kategori = mitra.id_kategori', 'left');
        return $this->db->get()->result_array();
    }

    public function getDataById($id_mitra)
    {
        return $this->db->get_where('mitra', ['id_mitra' => $id_mitra])->row_array();
    }

    public function getData($limit, $start) {
        return $this->db->get('mitra', $limit, $start)->result_array();
    }

    public function countAllmitra()
    {
        return $this->db->get('mitra')->num_rows();
    }

   
}