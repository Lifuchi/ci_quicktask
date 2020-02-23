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

	public function getProgressBar(){
		$query = "SELECT te.T_ID, te.T_NAME ,te.T_USER, te.T_SINGKATAN, SUM(t.`KR_STATUS`) AS done  ,COALESCE(COUNT(t.`KR_STATUS`))*100 AS alls
			FROM qt_team te
			LEFT JOIN qt_objective o ON te.T_ID = o.`T_ID`
			LEFT JOIN qt_keyresult t ON o.`OBJECTIVE_ID` = t.`OBJECTIVE_ID`
			WHERE te.T_ID > 1
			GROUP BY (te.`T_ID`)";
		$data = $this->db->query($query);
		return $data;
	}

	public function getNetworkOverall(){
		$query = "SELECT SUM(t.`KR_STATUS`) AS done   ,COALESCE(COUNT(t.`KR_STATUS`))*100 AS alls
		FROM qt_team te
		LEFT JOIN qt_objective o ON te.T_ID = o.`T_ID`
		LEFT JOIN qt_keyresult t ON o.`OBJECTIVE_ID` = t.`OBJECTIVE_ID`
		WHERE te.T_ID > 1";
			$data = $this->db->query($query);
		return $data;
	}

	public function getObjective($id)
	{
// 		$query = "SELECT te.T_NAME ,te.T_USER, te.T_SINGKATAN,o.`OBJECTIVE` , SUM(t.`TA_STATUS`) AS persendone , COALESCE(COUNT(t.`TA_STATUS`))*100 AS persenalls ,COALESCE(COUNT(IF(t.`TA_STATUS`= 100 ,1 , NULL))) AS done  ,COALESCE(COUNT(t.`TA_STATUS`)) AS alls
// FROM qt_team te
// LEFT JOIN qt_objective o ON te.T_ID = o.`T_ID`
// LEFT JOIN qt_task t ON o.`OBJECTIVE_ID` = t.`OBJECTIVE_ID`
// WHERE te.T_ID > 0
// GROUP BY (o.`OBJECTIVE_ID`)";
// $query = "SELECT o.`OBJECTIVE_ID` , o.`OBJECTIVE`
// FROM qt_team te
// JOIN QT_OBJECTIVE o ON te.`T_ID` = o.`T_ID`
// where te.T_ID = ? ";
	$query = "SELECT te.T_NAME ,te.T_USER, te.T_SINGKATAN,o.`OBJECTIVE` , SUM(t.`KR_STATUS`) AS persendone , COALESCE(COUNT(t.`KR_STATUS`))*100 AS persenalls ,COALESCE(COUNT(IF(t.`KR_STATUS`= 100 ,1 , NULL))) AS done  ,COALESCE(COUNT(t.`KR_STATUS`)) AS alls FROM qt_team te LEFT JOIN qt_objective o ON te.T_ID = o.`T_ID` LEFT JOIN qt_keyresult t ON o.`OBJECTIVE_ID` = t.`OBJECTIVE_ID` WHERE te.T_ID = ? GROUP BY (o.`OBJECTIVE_ID`)";
	$data = $this->db->query($query, $id);
	return $data;

	}

	public function getTeam(){
		$query = "SELECT te.T_ID, te.T_NAME ,te.T_USER, te.T_SINGKATAN FROM qt_team te where te.T_ID > 1 ";
		$data = $this->db->query($query);
		return $data;

	}


	// public function allActivity(){
	// 	$query = "SELECT te.T_ID , COALESCE(COUNT(IF(t.`TA_STATUS`= 1 ,1 , NULL))) AS done  ,COALESCE(COUNT(t.`TA_STATUS`)) AS alls
	// 					FROM qt_team te
	// 					LEFT JOIN qt_objective o ON te.T_ID = o.`T_ID`
	// 					LEFT JOIN qt_key_result k ON o.`OBJECTIVE_ID` = k.`OBJECTIVE_ID`
	// 					LEFT JOIN qt_task t ON t.`KR_ID` = k.`KR_ID`
	// 					GROUP BY (te.`T_ID`)";
	// 	$x = $this->session->userdata("T_ID");
  //   $query = "SELECT COUNT(*) as ht FROM qt_objective o, qt_key_result k, qt_task t WHERE o.`T_ID` = ? AND o.`OBJECTIVE_ID` = k.`OBJECTIVE_ID` AND t.`KR_ID` = k.`KR_ID`";
  //   $data = $this->db->query($query , $x);
  //   $row = $data->row();
  //   // echo $row->name;
  //   return $row->ht;
	//
  //   // $row = $data->row_array();
  //   // echo $row['ht'];
	//
	// }

  // public function doneActivity(){
	// 	$x = $this->session->userdata("T_ID");
  //   $query = "SELECT COUNT(*) as ht FROM qt_objective o, qt_key_result k, qt_task t WHERE o.`T_ID` = ? AND o.`OBJECTIVE_ID` = k.`OBJECTIVE_ID` AND t.`KR_ID` = k.`KR_ID` AND t.`TA_STATUS` = 1";
  //   $data = $this->db->query($query , $x);
  //   $row = $data->row();
  //   // echo $row->name;
  //   return $row->ht;
  //   // $row = $data->row_array();
  //   // echo $row['ht'];
  // }

}
