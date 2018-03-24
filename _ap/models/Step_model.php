<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Step_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_step($n_step, $id_course = NULL)
    {
        $this->db->select('step_title, content');
        $this->db->from('t_step');
        $this->db->where('t_step.n_step', $n_step);

        if ($id_course != NULL) {
            $this->db->where('t_step.id_course', $id_course);
        }

        $query = $this->db->get();
        return $query->result('array')[0];
    }

    public function get_steps($id_course)
    {
        $this->db->select('n_step, step_title, content');
        $this->db->from('t_step');
        $this->db->where('t_step.id_course', $id_course);
        $this->db->order_by('n_step');

        $query = $this->db->get();
        return $query->result('array');
    }
}