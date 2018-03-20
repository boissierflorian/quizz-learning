<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ( ! $this->is_logged_in())
        {
            redirect(base_url());
            return;
        }

        $this->data['pagetitle'] = "Dashboard";
        $this->data['pagebody'] = "dashboard/index";

        $this->render();
    }
}