<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Quizz extends AuthController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('quizz_model');
    }

    public function index()
    {
        $this->data['pagetitle'] = 'index';
        $this->data['pagebody'] = 'quizz/index';

        $this->render();
    }

    public function view($quizz_id)
    {
        $this->data['pagetitle'] = 'test';
        $this->data['pagebody'] = 'quizz/view';

        $this->render();
    }
}