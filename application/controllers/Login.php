<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }
    
	public function index()
	{
		$this->signin();
	}

	public function signin()
	{
		if(is_client_logged_in())
        {
        	redirect(site_url());
        	return;
        }
		/*---------------HEADER BEGIN----------------*/
		/*-------------------------------------------*/
		$this->load->view('clients/login/include/header');
		/*-------------------------------------------*/
		/*---------------HEADER END------------------*/

		/*---------------BODY BEGIN------------------*/
		/*-------------------------------------------*/
		$data = array();
		if($this->input->method(TRUE) == "POST"){
			$obj['email'] = $this->input->post('txt_email');
			$obj['password'] = $this->input->post('txt_pwd');
			$obj['remember_me'] = $this->input->post('chk_remember');

			$data['values'] = $obj;
			if($obj['email'] == "" || $obj['password'] == "")
			{
				$data['errors']['login'] = t('Input email and password!');
			}
			else
			{
				list($valid, $errors) = $this->auth_model->auth_login($obj);
				if($valid)
				{
					redirect(site_url());
	        		return;
				}
				$data['errors'] = $errors;
			}
		}

		$this->load->view('clients/login/signin', $data);
		/*-------------------------------------------*/
		/*---------------BODY END--------------------*/
		
		/*---------------FOOTER BEGIN----------------*/
		/*-------------------------------------------*/
		$this->load->view('clients/login/include/footer');
		/*-------------------------------------------*/
		/*---------------FOOTER END------------------*/
	}


	public function signup()
	{
		if(is_client_logged_in())
        {
        	redirect(site_url());
        	return;
        }
		/*---------------HEADER BEGIN----------------*/
		/*-------------------------------------------*/
		$this->load->view('clients/login/include/header');
		/*-------------------------------------------*/
		/*---------------HEADER END------------------*/

		/*---------------BODY BEGIN------------------*/
		/*-------------------------------------------*/
		$data = array();
		if($this->input->method(TRUE) == "POST"){
			$obj['email'] = $this->input->post('txt_email');
			$obj['password'] = $this->input->post('txt_pwd');
			$confirm_password = $this->input->post('txt_pwd_confirm');
			$obj['username'] = $this->input->post('txt_username');

			$data['values'] = $obj;
			if($obj['email'] == "" || $obj['password'] == "" || $obj['username'] == "")
			{
				$data['errors']['login'] = t('You have to input all fileds!');
			}
			else if ($obj['password'] != $confirm_password)
			{
				$data['errors']['login'] = t('Password not matched!');
			}
			else
			{
				list($valid, $errors) = $this->auth_model->auth_regist($obj);
				if($valid)
				{
					redirect(site_url());
	        		return;
				}
				$data['errors'] = $errors;
			}
		}
		$this->load->view('clients/login/signup', $data);
		/*-------------------------------------------*/
		/*---------------BODY END--------------------*/
		
		/*---------------FOOTER BEGIN----------------*/
		/*-------------------------------------------*/
		$this->load->view('clients/login/include/footer');
		/*-------------------------------------------*/
		/*---------------FOOTER END------------------*/
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url());
		return;
	}
}

?>