<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Columns_model extends CI_Model
{
	protected $table_name = "columns";
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

    
}
?>