<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends AuthController {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }

    public function view($index)
    {
        // TODO: Check
        $this->data['pagetitle'] = 'Course blabla';
        $this->data['pagebody'] = 'course/view';

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