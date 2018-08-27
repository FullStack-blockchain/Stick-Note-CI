<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Task_has_users_model extends CRM_Model
{
	protected $table_name = "task_has_users";
    public function __construct()
    {
        parent::__construct($this->table_name);
    }
}
?>