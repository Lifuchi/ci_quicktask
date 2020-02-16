<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Divisi_model extends CI_Model {

	private $table = "qt_objective";
  private $table2 = "qt_key_result";
  private $table3 = "qt_task";

	private $_data = array();

  public function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }


	public function getObjective($id){
    // $query = "SELECT te.T_ID, te.T_NAME ,te.T_USER, te.T_SINGKATAN ,o.OBJECTIVE_ID,o.`OBJECTIVE`, t.`TA_NAME`
    // FROM qt_team te
    // LEFT JOIN qt_objective o ON te.T_ID = o.`T_ID`
    // LEFT JOIN qt_task t ON o.`OBJECTIVE_ID` = t.`OBJECTIVE_ID`
    // WHERE te.T_ID = ?";
    // $query2 ="SELECT te.T_ID, te.T_NAME ,te.T_USER, te.T_SINGKATAN ,o.`OBJECTIVE`, o.`OBJECTIVE_ID`
    // FROM qt_team te
    // LEFT JOIN qt_objective o ON te.T_ID = o.`T_ID`
    // WHERE te.T_ID = ?";

 $query2 = "SELECT  t.`TA_NAME` AS TASK , o.`OBJECTIVE` , t.`TA_PROJECTTASK` AS 'PROJECT TASK' , t.TA_STATUS ,t.TA_TARGET AS TARGET , CASE t.`TA_STATUS` WHEN '0' THEN 'To Do' WHEN '100' THEN 'Done' ELSE 'On Doing' END AS `STATUS` , t.`TA_UPDATE` AS 'LAST UPDATE' FROM qt_team te LEFT JOIN qt_objective o ON te.T_ID = o.`T_ID` JOIN qt_task t ON o.`OBJECTIVE_ID` = t.`OBJECTIVE_ID` WHERE te.T_ID = ?";
		$data = $this->db->query($query2, $id);
		return $data;
	}

  public function getListObjective($id)
  {
      $query = "SELECT o.`OBJECTIVE_ID` , o.`OBJECTIVE`
      FROM qt_team te
      JOIN QT_OBJECTIVE o ON te.`T_ID` = o.`T_ID`
      WHERE te.T_ID = ?";
      $data = $this->db->query($query, $id);
  		return $data;
  }

  public function getTasks($id,$obj){
    $query = "SELECT te.T_ID, te.T_NAME ,te.T_USER, te.T_SINGKATAN ,o.OBJECTIVE_ID,o.`OBJECTIVE`, t.`TA_NAME`
    FROM qt_team te
    LEFT JOIN qt_objective o ON te.T_ID = o.`T_ID`
    LEFT JOIN qt_task t ON o.`OBJECTIVE_ID` = t.`OBJECTIVE_ID`
    WHERE te.T_ID = ? AND o.`OBJECTIVE_ID`= ? ";
    $data = $this->db->query($query, array($id , $obj));
    return $data;
  }

  public function getTeamName($id){
    $query = "SELECT te.T_ID, te.T_NAME ,te.T_USER, te.T_SINGKATAN
    FROM qt_team te
    WHERE te.T_ID = ? ";
    $data = $this->db->query($query, $id);
    return $data;

  }

}
