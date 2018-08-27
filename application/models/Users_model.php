<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CRM_Model
{
	protected $table_name = "users";
    public function __construct()
    {
        parent::__construct($this->table_name);
    }
}
?>