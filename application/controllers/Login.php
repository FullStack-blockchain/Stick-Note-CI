<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        if(is_client_logged_in())
        {
        	redirect(site_url());
        	return;
        }
        $this->load->model('auth_model');
    }
    
	public function index()
	{
		$this->signin();
	}

	public function signin()
	{
		/*---------------HEADER BEGIN----------------*/
		/*-------------------------------------------*/
		$this->load->view('clients/login/include/header');
		/*-------------------------------------------*/
		/*---------------HEADER END------------------*/

		/*---------------BODY BEGIN------------------*/
		/*-------------------------------------------*/

		$obj['email'] = $this->input->post('txt_email');
		$obj['pwd'] = $this->input->post('txt_pwd');
		$obj['remember'] = $this->input->post('chk_remember');



		$this->load->view('clients/login/signin');
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
		/*---------------HEADER BEGIN----------------*/
		/*-------------------------------------------*/
		$this->load->view('clients/login/include/header');
		/*-------------------------------------------*/
		/*---------------HEADER END------------------*/

		/*---------------BODY BEGIN------------------*/
		/*-------------------------------------------*/
		$this->load->view('clients/login/signup');
		/*-------------------------------------------*/
		/*---------------BODY END--------------------*/
		
		/*---------------FOOTER BEGIN----------------*/
		/*-------------------------------------------*/
		$this->load->view('clients/login/include/footer');
		/*-------------------------------------------*/
		/*---------------FOOTER END------------------*/
	}
}

?>