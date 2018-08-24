<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

/**
 * Is client logged in
 * @return boolean
 */
function is_client_logged_in()
{
    $CI = & get_instance();
    if ($CI->session->has_userdata('client_logged_in')) {
        return true;
    }

    return false;
}

/**
 * Translate a string
 *
 * @return string
 */
function t()
{
    return func_get_args();
}
?>