<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boards extends Client_Controller {

	public function __construct()
    {
        parent::__construct();
    }
    
	public function index($types = "notes")
	{
		$lst_types = array("notes"=>"Notes", "tasks"=>"Tasks", "links"=>"Links", "diary"=>"Diary", "bcard"=>"Business Card");

		$this->load->view('clients/layouts/header');
		$this->load->view('clients/layouts/left_panel');
		$view_data['menuitem'] = $lst_types[$types];
		$this->load->view('clients/layouts/right_panel_header', $view_data);
		
		$this->load->view('clients/boards/index');

		$this->load->view('clients/layouts/footer');
	}
}

?>