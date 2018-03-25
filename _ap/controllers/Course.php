<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends AuthController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('course_model', 'step_model', 'quizz_model'));
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

        $quizzes = $this->quizz_model->get_quizzes($index);

        $this->data['pagetitle'] = $course['title'];
        $this->data['pagebody'] = 'course/view';
        $this->data['course'] = $course;
        $this->data['steps'] = $steps;
        $this->data['steps_count'] = count($steps);
        $this->data['step_title'] = $step['step_title'];
        $this->data['step_content'] = $this->parsedown->text($step['content']);
        $this->data['current_step'] = $step_number;
        $this->data['last_step'] = ($step_number == count($steps));
        $this->data['quizzes_available'] = count($quizzes) > 0;

        $this->render();
    }

    public function quizzes($course_id)
    {
        $course = $this->course_model->get_course($course_id)[0];
        $quizzes = $this->quizz_model->get_quizzes($course_id);

        $this->data['pagetitle'] = 'Quizzes';
        $this->data['pagebody'] = 'course/quizzes';
        $this->data['course'] = $course;
        $this->data['quizzes'] = $quizzes;
        $this->render();
    }
}