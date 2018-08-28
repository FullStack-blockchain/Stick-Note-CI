<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

/**
 * SendMail $from to $to 
 * @return success: email sent, other: send email error
 */
function send_mail($obj, $from, $to, $subject, $content)
{
	//SMTP & mail configuration
	$obj->load->library('email');
	$config = array(
	    'protocol'  => 'smtp',
	    'smtp_host' => 'ssl://smtp.googlemail.com',
	    'smtp_port' => 465,
	    'smtp_user' => 'caban19901227@gmail.com',
	    'smtp_pass' => 'jamescaban2017',
	    'mailtype'  => 'html',
	    'charset'   => 'utf-8'
	);
	$obj->email->initialize($config);
	$obj->email->set_newline("\r\n");

	$obj->email->to($to);
	$obj->email->from($from,'MyWebsite');
	$obj->email->subject($subject);
	$obj->email->message($content);

	//Send email
	if($obj->email->send())
    {
		echo 'success';
    }
    else
    {
     	show_error($obj->email->print_debugger());
 	}
}

?>