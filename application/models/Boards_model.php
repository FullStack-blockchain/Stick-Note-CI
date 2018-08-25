<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Boards_model extends CI_Model
{
	protected $table_name = "tasks";
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get notes data
     *
     * @access public
     * @param    $where           get data conditions
     * @return 
     */
    public function get_data($where = null, $order_by = null)
    {
    	if($where != null)
    		$this->db->where($where);
    	if($order_by != null)
    		$this->db->order_by($order_by);
    	$result = $this->db->get($this->table_name)->result_array();
    	return $result;
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
    }
    /**
     * Update notes
     *
     * @access public
     * @param  array   $values           Form values
     *		   int     $id 				 Notes id		   
     * @return 
     */
    public function update($id, array $values)
    {
    	$this->db->where('id', $id);
    	$this->db->update($this->table_name ,$values);
    }
}
/* insert sql query 
		$sql = "INSERT INTO ".$this->table_name . " ( ";
		$i = 0; $key_values = '';
    	foreach ($values as $key => $value) {
    		if($i == 0){
    			$sql .= $key;
    			$key_values .= "'" . $value . "'";
    		}
    		else
    		{
    			$sql .= ", " . $key;
    			$key_values .= ", '" . $value . "'";
    		}
    		$i++;
    	}
    	$sql .= " ) VALUES ( " . $key_values . " ) ";
*/
?>