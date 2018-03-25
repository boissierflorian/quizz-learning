<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quizz_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_quizzes($id_course = NULL)
    {
        if ($id_course == NULL)
        {
            $query = $this->db->get('t_quizz');
        }
        else
        {
            $this->db->select('*');
            $this->db->from('t_quizz');

            if (is_numeric($id_course) && $id_course > 0)
            {
                $this->db->where('id_course', $id_course);
                $query = $this->db->get();
            }
            else
            {
                return array();
            }
        }

        return $query->result('array');
    }

    public function get_questions($id_quizz)
    {
        $query = $this->db->where('id_quizz', $id_quizz)->get('t_question');
        return $query->result('array');
    }
}