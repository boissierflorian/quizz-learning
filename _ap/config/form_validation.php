<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'register/signup' => array(
        array(
            'field' => 'username',
            'label' => 'Pseudo',
            'rules' => 'required|min_length[5]|max_length[12]|is_unique[users.username]|trim',
            'errors' => array(
                'required' => 'Vous devez spécifier un pseudo !',
                'min_length' => "Votre pseudo doit être composé d'au moins 5 caractères !",
                'max_length' => "Votre pseudo ne peut éxècéder 12 caractères !",
                "is_unique" => 'Ce pseudo est déjà utilisé !'
            )
        ),

        array(
            'field' => 'password',
            'label' => 'Mot de passe',
            'rules' => 'required|min_length[6]|max_length[15]|trim',
            'errors' => array(
                'required' => 'Vous devez spécifier un mot de passe !',
                'min_length' => 'Votre mot de passe doit être composé d\'au moins 6 caractères !',
                'max_length' => 'Votre mot de passe ne peut éxécéder 15 caractères !'
            )
        ),

        array(
            'field' => 'password_conf',
            'label' => 'Confirmation du mot de passe',
            'rules' => 'required|matches[password]',
            'errors' => array(
                'required' => 'Vous devez spécifier la confirmation du mot de passe !',
                'matches' => 'Les mots de passes ne correspondent pas !'
            )
        ),

        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email',
            'errors' => array(
                'required' => 'Vous devez spécifier une adresse mail !',
                'valid_email' => 'Votre adresse mail n\'est pas valide !'
            )
        ),

        array(
            'field' => 'email_conf',
            'label' => 'Confirmation de l\'email',
            'rules' => 'required|matches[email]',
            'errors' => array(
                'required' => 'Vous devez spécifier la confirmation de l\'adresse mail !',
                'matches' => 'Les adresses mails ne correspondent pas !'
            )
        ),

        array(
            'field' => 'captcha',
            'label' => 'Captcha',
            'rules' => 'callback_captcha_check'
        )
    ),

    'login/login' => array(
        array(
            'field' => 'username',
            'label' => 'Pseudo/Email',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Vous devez saisir votre pseudo !'
            )
        ),

        array(
            'field' => 'password',
            'label' => 'Mot de passe',
            'rules' => 'required',
            'errors' => array(
                'required' => 'Vous devez saisir un mot de passe !'
            )
        ),

        array(
            'field' => 'captcha',
            'label' => 'Captcha',
            'rules' => 'callback_captcha_check|required|trim',
        )
    ),
);