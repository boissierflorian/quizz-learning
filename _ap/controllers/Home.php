<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Base_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('course_model');
        $this->load->helper('date');
    }

    public function index() {
        //$this->output->enable_profiler(TRUE);
        $courses = $this->course_model->get_courses(10);

        foreach ($courses as &$course)
        {
            $difficulty = $course['difficulty'];
            $course['difficulty_blocks'] = array();
            $difficulty_color = 'green';

            if ($difficulty < 3)
            {
                $difficulty_color = 'green';
            }
            else if ($difficulty < 4)
            {
                $difficulty_color = 'yellow';
            }
            else if ($difficulty < 5)
            {
                $difficulty_color = 'orange';
            }
            else
            {
                $difficulty_color = 'red';
            }

            for ($i = 0; $i < 5; $i++)
            {
                if ($i < $difficulty)
                {
                    array_push($course['difficulty_blocks'], $difficulty_color);
                }
                else
                {
                    array_push($course['difficulty_blocks'], 'light-grey');
                }
            }

            $course['creation_date'] = strftime('%d %B %G', strtotime($course['creation_date']));
        }

        $this->data['pagetitle'] = "Courses";
        $this->data['pagebody'] = "home/index";
        $this->data['courses'] = $courses;
        $this->data['courses_per_row'] = $this->config->item('courses_per_row');
        $this->render();
    }
}