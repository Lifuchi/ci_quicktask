<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Okr_model extends CI_Model {

	private $table = "qt_objective";
  private $table2 = "qt_key_result";
  private $table3 = "qt_task";

	private $_data = array();

  public function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }

	public function insert($data,$table){
    $this->db->insert($table, $data);
	}
	public function insertTask($data,$table){

		$this->db->insert($table, $data);

	}

	public function updateTask($data,$table, $id){
		$this->db->where('TASK_ID', $id);
	  $this->db->update($table, $data);
	}

	public function findTarget($table, $id){
		// $data = $this->db->get_where($table, array('TASK_ID' => $id));
		// return $data;
		$query = "SELECT ta.TA_TARGET FROM QT_TASK ta WHERE ta.`TASK_ID` = ?";
		$data = $this->db->query($query, $id);
		return $data;
	}

}
