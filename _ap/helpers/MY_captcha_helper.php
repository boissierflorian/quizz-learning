<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * create_captcha wrapper
 */
function generate_captcha()
{
    $config = get_instance()->config;

    $captcha_data = array(
        'img_path' => $config->item('captcha_folder'),
        'img_url' => base_url($config->item('captcha_url')),
        'img_width' => $config->item('captcha_img_width'),
        'img_height' => $config->item('captcha_img_height'),
        'expiration' => $config->item('captcha_expiration'),
        'word_length' => $config->item('captcha_length')
    );

    $captcha = create_captcha($captcha_data);
    return $captcha;
}