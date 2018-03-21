<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
|--------------------------------------------------------------------------
| Navigation bar links
|--------------------------------------------------------------------------
|
| Static Navigation links..
|
*/
$config['navbar_links'] = array(
array('name' => 'Courses', 'link' => '/courses'),
array('name' => 'Quizz', 'link' => '/quizz')
);

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
