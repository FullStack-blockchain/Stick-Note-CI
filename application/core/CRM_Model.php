<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CRM_Model extends CI_Model
{
	protected $table_name;
    public function __construct($table_name)
    {
        parent::__construct();
        $this->table_name = $table_name;
    }

    /**
     * Get Data From Table
     *
     * @access public
     * @param    $where           get data conditions
     * @return 
        $sel_fields = "tasks.id, tasks.title, tasks.description, task_has_users.user_id, task_has_users.role";
        $arrjoin = array(array("join_table"=>"task_has_users", "cond"=>"task_has_users.task_id = tasks.id"));
        $user_id = $this->session->userdata('client_user_id');
        $arrwhere = array("tasks.column_id"=>$menuitem['id'], "task_has_users.user_id"=>$user_id);
        $result = $this->boards_model->get_data($arrwhere, "tasks.position desc", $arrjoin, $sel_fields);
     */
    public function get_data($where = null, $order_by = null, $arrjoin = null, $selectfileds = null)
    {
        if($selectfileds != null)
            $this->db->select($selectfileds);
    	if($where != null)
    		$this->db->where($where);
        if($arrjoin != null){
            foreach ($arrjoin as $itemjoin) {
                $this->db->join($itemjoin['join_table'], $itemjoin['cond']);
            }
        }
    	if($order_by != null)
    		$this->db->order_by($order_by);
    	$result = $this->db->get($this->table_name)->result_array();
    	return $result;
    }

    /**
     * Get row stdclass Data From Table
     *
     * @access public
     * @param    $where           get data conditions
     * @return 
     */
    public function get_row($where = null, $order_by = null, $arrjoin = null, $selectfileds = null)
    {
        if($selectfileds != null)
            $this->db->select($selectfileds);
        if($where != null)
            $this->db->where($where);
        if($arrjoin != null){
            foreach ($arrjoin as $itemjoin) {
                $this->db->join($itemjoin['join_table'], $itemjoin['cond']);
            }
        }
        if($order_by != null)
            $this->db->order_by($order_by);
    	$row = $this->db->get($this->table_name)->row();
    	return $row;
    }

    /**
     * Update Table
     *
     * @access public
     * @param  array   $values           Form values
     *		   int     $id 				 Table id		   
     * @return 
     */
    public function update(array $where, array $values)
    {
    	$this->db->where($where);
    	$this->db->update($this->table_name ,$values);
    }

    /**
     * Delete Table
     *
     * @access public
     * @param  array   $values           Form values
     *         int     $id               Table id          
     * @return 
     */
    public function delete(array $where)
    {
        $this->db->where($where);
        $this->db->delete($this->table_name);
    }
    
    /**
     * Insert Table
     *
     * @access public
     * @param  array   $values           Form values
     *		   int     $id 				 Table id		   
     * @return 
     */
    public function insert(array $values)
    {
    	$this->db->insert($this->table_name, $values);
    	$insert_id = $this->db->insert_id();
    	return $insert_id;
    }
}
?>