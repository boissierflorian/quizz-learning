<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Stylesheets Paths
|--------------------------------------------------------------------------
|
| CSS files paths.
|
*/
$config['stylesheets'] = array(
array('link' => 'w3'),
array('link' => 'w3-colors-camo'),
array('link' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'),
array('link' => 'common')
);


/*
|--------------------------------------------------------------------------
| Javascript Paths
|--------------------------------------------------------------------------
|
| JS files paths.
|
*/
$config['scripts'] = array(
array('link' => 'common'),
);

/*
|--------------------------------------------------------------------------
| Navigation bar links
|--------------------------------------------------------------------------
|
| Static Navigation links..
|
*/
$config['navbar_links'] = array(
    array('name' => 'Courses', 'link' => '/home'),
    array('name' => 'Quizz', 'link' => '/quizz')
);


/*
|--------------------------------------------------------------------------
| Actions
|--------------------------------------------------------------------------
|
| Login/Logout controllers paths.
|
*/
$config['login_action'] = '/login';
$config['logout_action'] = '/logout';
$config['register_action'] = '/register';


/*
|--------------------------------------------------------------------------
| Captcha configuration
|--------------------------------------------------------------------------
|
| Captcha generation configuration.
|
*/
$config['captcha_folder'] = './public/captchas/';
$config['captcha_url'] = 'public/captchas/';
$config['captcha_img_width'] = 200;
$config['captcha_img_height'] = 30;
$config['captcha_expiration'] = 7200;
$config['captcha_length'] = 8;

/*
|--------------------------------------------------------------------------
| Courses configuration
|--------------------------------------------------------------------------
|
| Courses related stuff
|
*/
$config['courses_per_row'] = 3;