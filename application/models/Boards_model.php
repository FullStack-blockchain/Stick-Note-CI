<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Boards_model extends CRM_Model
{
	protected $table_name = "tasks";
    public function __construct()
    {
        parent::__construct($this->table_name);
    }

    /**
     * Insert notes
     *
     * @access public
     * @param  array   $values           Form values
     * @return 
     */
    public function insert(array $values)
    {
    	$values['date_creation'] = strtotime("now");
		$sql = "INSERT INTO ".$this->table_name . " set ";
		$i = 0; $key_values = '';
    	foreach ($values as $key => $value) {
    		if($i == 0){
    			$sql .= $key . " = '" . $value . "'";
    		}
    		else
    		{
    			$sql .= ", " . $key . " = '" . $value . "'";
    		}
    		$i++;
    	}
    	$sql .= ", position = (select ifnull(max(T.position), 0)+1 from tasks as T)";

    	$this->db->query($sql);
        $insert_id = $this->db->insert_id();
        $user_id = $this->session->userdata('client_user_id');
        $task_user['task_id'] = $insert_id;
        $task_user['user_id'] = $user_id;
        $task_user['role'] = 'owner';

        $this->db->insert('task_has_users', $task_user);

        return $insert_id;
    }
}
?>