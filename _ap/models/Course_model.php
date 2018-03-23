<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_courses($limit = 10)
    {
        if ($limit < 1) {
            $limit = 0;
        }

        $this->db->select('*');
        $this->db->from('t_course');
        $this->db->join('t_category', 't_category.id_category = t_course.id_category');
        $this->db->order_by('creation_date DESC');

        $query = $this->db->get();
        return $query->result('array');
    }
}