<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Base_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'captcha'));
        $this->load->library(array('form_validation', 'user_agent'));
        $this->load->model('captcha_model');
    }

    private function create_and_save_captcha()
    {
        $login_captcha = generate_captcha();
        $login_captcha['ip_address'] = $this->input->ip_address();
        $this->captcha_model->insert($login_captcha);
        $this->data['captcha_image'] = $login_captcha['image'];
    }

    public function login()
    {
        if ($this->ion_auth->logged_in())
        {
            redirect('home');
        }

        if ($this->form_validation->run() == FALSE)
        {
            $this->data['pagetitle'] = "Connexion";
            $this->data['pagebody'] = "login/login";

            $this->create_and_save_captcha();
        }
        else
        {
            if ($this->agent->is_robot())
            {
                redirect(base_url());
            }

            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
            $remember_me = (bool) $this->input->post('rememberme', TRUE);

            if ($this->ion_auth->login($username, $password, $remember_me))
            {
                redirect('home');
            }
            else
            {
                $this->data['pagetitle'] = "Erreur de connexion !";
                $this->data['pagebody'] = "login/login";
                $this->create_and_save_captcha();

                $errors = $this->form_validation->error_array();
                $errors['username'] = "Problème !";
            }
        }

        $this->render();
    }

    public function captcha_check($captcha_answer)
    {
        if (empty(trim($captcha_answer)))
        {
            $this->form_validation->set_message('captcha_check', 'Vous devez saisir le captcha !');
            return FALSE;
        }

        $visitor_ip = $this->input->ip_address();

        if ( ! $this->captcha_model->verify($captcha_answer, $visitor_ip))
        {
            $this->form_validation->set_message('captcha_check', 'Le captcha saisi est incorrect !');
            return FALSE;
        }

        return TRUE;

    }
}
