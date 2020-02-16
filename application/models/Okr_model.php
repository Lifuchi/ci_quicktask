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
    // $this->db->insert($table, $data[2]);
    // $this->db->insert($table, $data[3]);
	}
	public function insertTask($data,$table){

		$this->db->insert($table, $data);
		// $this->db->insert($table, $data[2]);
		// $this->db->insert($table, $data[3]);
	}

}
