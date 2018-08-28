<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Task_has_files_model extends CRM_Model
{
	protected $table_name = "task_has_files";
    public function __construct()
    {
        parent::__construct($this->table_name);
    }
}
?>