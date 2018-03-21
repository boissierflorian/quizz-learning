<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Base_Controller {
    public function index()
    {
        $this->data['pagetitle'] = "Page de connexion";
        $this->data['pagebody'] = "login/index";
        $this->render();
    }
}
