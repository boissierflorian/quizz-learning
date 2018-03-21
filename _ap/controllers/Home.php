<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Base_Controller {
    public function index() {
        $this->data['pagetitle'] = "Page d'accueil";
        $this->data['pagebody'] = "home/index";

        $this->render();
    }
}