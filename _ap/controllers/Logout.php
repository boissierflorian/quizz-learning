<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends Base_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->ion_auth->logged_in())
        {
            $this->ion_auth->logout();
            redirect('home');
        }

        show_error('Vous n\'êtes pas connecté !');
    }
}
