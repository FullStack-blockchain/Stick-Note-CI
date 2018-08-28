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
        $this->load->model('boards_model');
        $this->load->model('columns_model');
        $this->load->model('task_has_users_model');
        $this->load->model('users_model');
        $this->load->model('task_has_files_model');

        $this->send_email();

    }

    protected function send_email()
    {
    	$arrjoin = array(array("join_table"=>"task_has_users", "cond"=>"task_has_users.user_id = users.id"), array("join_table"=>"tasks", "cond"=>"tasks.id = task_has_users.task_id"));
		$sel_fields = "users.email, users.name, tasks.title, tasks.description, task_has_users.task_id, task_has_users.id taskuser_id ";
		$results = $this->users_model->get_data(array("task_has_users.role"=>"friend", "task_has_users.is_send"=>0), null, $arrjoin, $sel_fields);

		foreach ($results as $rows) {
			$owner = $this->users_model->get_row(array("task_has_users.task_id"=>$rows['task_id'], "task_has_users.role"=>"owner"), null, $arrjoin, $sel_fields);

			send_mail($this, $owner->email, $rows['email'], $rows['title'], $rows['description']);
			$this->task_has_users_model->update(array("id"=>$rows['taskuser_id']), array("is_send"=>1) );
		}
    }    
}
