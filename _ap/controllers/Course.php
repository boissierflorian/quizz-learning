<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends AuthController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('course_model', 'step_model'));
        $this->load->library('parsedown');
    }

    public function index()
    {

    }

    public function view($index, $step_number = 1)
    {
        // TODO: Check
        //$this->output->enable_profiler(TRUE);
        $course = $this->course_model->get_course($index);
        $steps = $this->step_model->get_steps($course[0]['id_course']);

        if (empty($course) || empty($steps))
        {
            redirect('home');
        }

        if ($step_number < 1 || $step_number > count($steps))
        {
            $step_number = 1;
        }

        $course = $course[0];
        $step = $this->step_model->get_step($step_number, $index);

        $this->data['pagetitle'] = $course['title'];
        $this->data['pagebody'] = 'course/view';
        $this->data['course'] = $course;
        $this->data['steps'] = $steps;
        $this->data['steps_count'] = count($steps);
        $this->data['step_title'] = $step['step_title'];
        $this->data['step_content'] = $this->parsedown->text($step['content']);
        $this->data['current_step'] = $step_number;

        $this->render();
    }

    public function create()
    {
        // Create a course
    }

    public function edit()
    {
        // Edit a course
    }
}