<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Returns true if the specified url is external.
 *
 * @param $url the url to test
 * @return bool if the specified url is external
 */
function is_external_url($url)
{
    return preg_match('/^https?/', $url);
}


/**
 * Constructs an url.
 *
 * @param $folder the folder
 * @param $file the file
 * @param $extension the file extension
 * @return string the url
 */
function folder_url($folder, $file, $extension)
{
    if ( ! preg_match('/\/$/', $folder))
    {
        $folder .= '/';
    }

    if ( ! preg_match('/^\./', $extension))
    {
        $extension = '.' . $extension;
    }

    return base_url() . $folder . $file . $extension;
}