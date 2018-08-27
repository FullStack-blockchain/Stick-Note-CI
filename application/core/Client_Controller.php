<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Client_Controller extends CRM_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!is_client_logged_in())
        {
        	redirect(site_url('/login'));
        	return;
        }
    }
}
