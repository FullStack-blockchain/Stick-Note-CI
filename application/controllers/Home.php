<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Client_Controller {

	public function __construct()
    {
        parent::__construct();
    }
    
	public function index()
	{
		redirect(site_url('clients/boards'));
	}
}

?>