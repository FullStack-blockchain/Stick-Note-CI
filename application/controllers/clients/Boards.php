<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boards extends Client_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('boards_model');
        $this->load->model('columns_model');
    }
    
    /**
     * Display notes
     *
     * @access public
     * @param     $types           Boards type		   
     * @return 		
     */
	public function index($types = "1")
	{
		$lst_menus = $this->columns_model->get_data();
		$menuitem = array();
		foreach ($lst_menus as $type) {
			if($type['id'] === $types)
			{
				$menuitem['id'] = $type['id'];
				$menuitem['name'] = $type['title'];
			}
		}

		$view_data['lstmenus'] = $lst_menus;
		$view_data['menuitem'] = $menuitem;
		/*---------------LAYOUT BEGIN----------------*/
		/*-------------------------------------------*/
		$this->load->view('clients/layouts/header');
		$this->load->view('clients/layouts/left_panel', $view_data);
		$this->load->view('clients/layouts/right_panel_header', $view_data);
		/*-------------------------------------------*/
		/*---------------LAYOUT END----------------*/

		$view_data['results'] = $this->boards_model->get_data(array("column_id"=>$menuitem['id']), "position desc");
		
		$this->load->view('clients/boards/index', $view_data);
		$this->load->view('clients/layouts/footer');
	}

	/**
     * Update or Insert notes
     *
     * @access public	
     */
	public function notes()
	{
		$notes_id = $this->input->post('notes_id');
		$obj['title'] = $this->input->post('notes_title');
		$obj['description'] = $this->input->post('notes_contents');
		$obj['column_id'] = $this->input->post('board_id');

		if($obj['title'] != '' && $obj['description'] != '')
		{
			if($notes_id != '')
			{//modify
				$this->boards_model->update($notes_id, $obj);
			}
			else
			{//insert
				$this->boards_model->insert($obj);
			}
		}

		redirect(site_url('clients/boards/index/'.$obj['column_id']));
	}
	/**
     * Get notes by Id
     *
     * @access public	
     */
	public function getnotesbyid()
	{
		$notes_id = $this->input->post('notes_id');
		$where['id'] = $notes_id;
		$res = $this->boards_model->get_data($where);
		echo json_encode($res[0]);
	}

	/**
     * Change notes position
     *
     * @access public	
     */
	public function changenotespos()
	{
		$data = $this->input->post('data');
    	$data = json_decode($data);

    	foreach ($data as $item) {
    		$this->boards_model->update($item->id, array("position" => $item->position));
    	}

		echo json_encode($data);
	}
}

?>