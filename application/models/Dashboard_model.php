<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	private $table = "qt_objective";
  private $table2 = "qt_key_result";
  private $table3 = "qt_task";

	private $_data = array();

  public function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }


	public function allActivity(){
    $query = "SELECT COUNT(*) as ht FROM qt_objective o, qt_key_result k, qt_task t WHERE o.`T_ID` = 1 AND o.`OBJECTIVE_ID` = k.`OBJECTIVE_ID` AND t.`KR_ID` = k.`KR_ID`";
    $data = $this->db->query($query);
    $row = $data->row();
    // echo $row->name;
    return $row->ht;

    // $row = $data->row_array();
    // echo $row['ht'];

	}

  public function doneActivity(){
    $query = "SELECT COUNT(*) as ht FROM qt_objective o, qt_key_result k, qt_task t WHERE o.`T_ID` = 1 AND o.`OBJECTIVE_ID` = k.`OBJECTIVE_ID` AND t.`KR_ID` = k.`KR_ID` AND t.`TA_STATUS` = 1";
    $data = $this->db->query($query);
    $row = $data->row();
    // echo $row->name;
    return $row->ht;
    // $row = $data->row_array();
    // echo $row['ht'];
  }

}
