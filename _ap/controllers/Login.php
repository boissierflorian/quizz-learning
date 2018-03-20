<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->is_logged_in())
        {

        }
        else
        {

        }

        $this->data['pagebody'] = 'login/index';
        $this->render();
    }
}