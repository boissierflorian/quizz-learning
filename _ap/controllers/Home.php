<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Base_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('course_model');
    }

    public function index() {
        $this->data['pagetitle'] = "Page d'accueil";
        $this->data['pagebody'] = "home/index";

        $courses = $this->course_model->get_courses(10);



        $this->render();
    }
}