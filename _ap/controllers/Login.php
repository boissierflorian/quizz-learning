<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Base_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'captcha'));
    }

    public function index()
    {
        if ($this->ion_auth->logged_in())
        {
            redirect('home');
        }

        $this->data['pagetitle'] = "Connexion";
        $this->data['pagebody'] = "login/index";

        $login_captcha = generate_captcha();
        $this->data['captcha_image'] = $login_captcha['image'];

        $this->render();
    }
}
