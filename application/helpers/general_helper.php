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

/**
 * Translate a string
 *
 * @return string
 */
function replace_enter($str)
{
	$str = nl2br($str);
    return $str;
}

/**
 * Export Array Data to CSV
 *
 * @return 
 */
function exports_data_csv($arrdata, $arr_title = null, $file_name = "test")
{
    header("Content-type: application/csv");
    header("Content-Disposition: attachment; filename=\"csv_".$file_name.".csv\"");
    header("Pragma: no-cache");
    header("Expires: 0");

    $handle = fopen('php://output', 'w');

    if($arr_title != null) fputcsv($handle, $arr_title);
    foreach ($arrdata as $data) {
        $data['date_creation'] = date('m/d/Y', $data['date_creation']);
        fputcsv($handle, $data);
    }
    fclose($handle);
    exit;
}

?>