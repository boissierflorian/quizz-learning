<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Base_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'captcha'));
        $this->load->model('captcha_model');
        $this->load->library(array('form_validation', 'user_agent'));
    }

    public function signup()
    {
        if ($this->ion_auth->logged_in())
        {
            redirect('home');
        }

        if ($this->form_validation->run() == FALSE)
        {
            $this->data['pagetitle'] = "Inscription";
            $this->data['pagebody'] = "register/index";

            $login_captcha = generate_captcha();
            $login_captcha['ip_address'] = $this->input->ip_address();
            $this->captcha_model->insert($login_captcha);

            $this->data['captcha_image'] = $login_captcha['image'];
        }
        else
        {
            // Robot check
            if ($this->agent->is_robot())
            {
                redirect('home');
            }

            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
            $email = $this->input->post('email', TRUE);

            if ($this->ion_auth->register($username, $password, $email))
            {
                $this->data['pagetitle'] = "Confirmation de l'inscription";
                $this->data['pagebody'] = "register/success";
            }
            else
            {
                $this->form_validation->set_message('test', 'Erreur lors de l\'inscription');
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