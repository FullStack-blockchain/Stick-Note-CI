<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boards extends Client_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('boards_model');
        $this->load->model('columns_model');
        $this->load->model('task_has_users_model');
        $this->load->model('users_model');
        $this->load->model('task_has_files_model');
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
		
		$search_txt = $this->input->post('txt_search');
		$view_data['search_txt'] = $search_txt;
		/*---------------LAYOUT BEGIN----------------*/
		/*-------------------------------------------*/
		$this->load->view('clients/layouts/header');
		$this->load->view('clients/layouts/left_panel', $view_data);
		$this->load->view('clients/layouts/right_panel_header', $view_data);
		/*-------------------------------------------*/
		/*---------------LAYOUT END----------------*/

		$sel_fields = "tasks.id, tasks.title, tasks.description, tasks.date_creation, tasks.color_id, tasks.column_id, tasks.position, task_has_users.task_id, task_has_users.user_id, task_has_users.role";
		$arrjoin = array(array("join_table"=>"task_has_users", "cond"=>"task_has_users.task_id = tasks.id"));
		$user_id = $this->session->userdata('client_user_id');

		$arrwhere = " tasks.column_id = ".$menuitem['id']." AND task_has_users.user_id = ".$user_id;
		if($search_txt != "")
			$arrwhere .= " AND ( tasks.title LIKE '%". $search_txt ."%' OR tasks.description LIKE '%".$search_txt."%' )";

		$view_data['results'] = $this->boards_model->get_data($arrwhere, "tasks.position desc", $arrjoin, $sel_fields);

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
		$obj['color_id'] = $this->input->post('notes_color');

		if($obj['title'] != '' && $obj['description'] != '')
		{
			if($notes_id != '')
			{//modify
				$this->boards_model->update(array("id"=>$notes_id), $obj);
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
		$where = array('id'=> $notes_id);
		$res = $this->boards_model->get_data($where);
		if(count($res) == 0)
			echo json_encode(null);
		else
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
    		$this->boards_model->update(array("id"=>$item->id), array("position" => $item->position));
    	}

		echo json_encode($data);
	}

	/**
     * Get Collaborators By Task Id If no task then create new task
     *
     * @access public	
     */
	public function get_collaborators()
	{
		$notes_id = $this->input->post('notes_id');
		$obj['column_id'] = $this->input->post('board_id');
		$new_email = $this->input->post('new_email');
		$delete_id = $this->input->post('delete_id');

		if($notes_id == "")
			$notes_id = $this->boards_model->insert($obj);

		if($delete_id != "")
		{
			$this->task_has_users_model->delete(array("id"=>$delete_id));
		}

		//add new Collaborator
		$is_useradded = false;
		if($new_email != ""){
			$user = $this->users_model->get_row(array("email"=>$new_email));
			if($user)
			{
				$values = array("task_id"=>$notes_id, "user_id"=>$user->id);
				$this->task_has_users_model->insert($values);
				$is_useradded = true;

				$arrjoin = array(array("join_table"=>"task_has_users", "cond"=>"task_has_users.user_id = users.id"), array("join_table"=>"tasks", "cond"=>"tasks.id = task_has_users.task_id"));
				$sel_fields = "users.email, users.name, tasks.title, tasks.description ";
				$owner = $this->users_model->get_row(array("task_has_users.task_id"=>$notes_id, "task_has_users.role"=>"owner"), null, $arrjoin, $sel_fields);
				
				send_mail($this, $owner->email, $new_email, $owner->title, $owner->description);
			}
		}

		$arrjoin = array(array("join_table"=>"users", "cond"=>"users.id = task_has_users.user_id"));
		$data = $this->task_has_users_model->get_data(array("task_id"=>$notes_id), null, $arrjoin, "task_has_users.id, task_has_users.task_id, task_has_users.user_id, task_has_users.role, users.username, users.email");

		echo json_encode(array("lst_colla"=>$data, "is_added"=>$is_useradded));
	}

	/**
     * Export Data to CSV
     *
     * @access public	
     */
	public function export_to_csv()
	{
		$board_id = $this->input->post('csv_board_id');

		$sel_fields = "tasks.title, tasks.description, tasks.date_creation, tasks.color_id";
		$arrjoin = array(array("join_table"=>"task_has_users", "cond"=>"task_has_users.task_id = tasks.id"));
		$user_id = $this->session->userdata('client_user_id');
		$arrwhere = array("tasks.column_id"=>$board_id, "task_has_users.user_id"=>$user_id);
		$results = $this->boards_model->get_data($arrwhere, "tasks.position desc", $arrjoin, $sel_fields);

		//echo json_encode($results); return;
		$arr_title = array("tasks.title"=>"Title", "tasks.description"=>"Contents", "tasks.date_creation"=>"Create Date", "tasks.color_id"=>"Color");
		exports_data_csv($results, $arr_title, "record");
		exit;
	}

	/**
     * Attached File Upload
     *
     * @access public	
     */
	public function attach_file_upload()
	{
		//upload file
        $upload_path = ATTACH_FILE_UPLOAD_PATH;

        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '102400'; //100 MB

  		$obj['name'] = $_FILES["txt_file_attach_upload"]["name"];  

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('txt_file_attach_upload'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        }
        else
        {
            $data = $this->upload->data();
            $obj['path'] = $data['file_name'];
            $obj['task_id'] = $this->input->post('notes_id');
            $obj['date'] = strtotime("now");
            $user_id = $this->session->userdata('client_user_id');
            $obj['user_id'] = $user_id;
            $obj['size'] = filesize($upload_path."/".$obj['path']);

            $this->task_has_files_model->insert($obj);

            echo json_encode($obj['task_id']);
        }		
	}
	/**
     * Show Attached File List
     *
     * @access public	
     */
	public function show_attached_file_list()
	{
		$notes_id = $this->input->post('notes_id');
		$delete_id = $this->input->post('delete_id');

		if($delete_id != "")
			$this->task_has_files_model->delete(array("id"=>$delete_id));

		$results = $this->task_has_files_model->get_data(array("task_id"=>$notes_id), 'date asc');

		echo json_encode($results);
	}
}

?>