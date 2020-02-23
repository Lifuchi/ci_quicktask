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
		$query2 = "SELECT kr.KR_ID, kr.`kr_NAME` AS 'KEY RESULT' , o.`OBJECTIVE` , kr.`KR_TYPE` AS 'TYPE' , kr.KR_PROGRESS AS 'TASK PROGRESS (#)' ,
		kr.KR_STATUS AS 'TASK PROGRESS (%)' ,kr.kr_TARGET AS TARGET ,
		CASE kr.`kr_STATUS` WHEN '0' THEN 'To Do' WHEN '100' THEN 'Done' ELSE 'On Doing' END AS `STATUS` , kr.KR_END AS DEADLINE ,kr.`kr_UPDATE` AS 'LAST UPDATE'
		FROM qt_team te LEFT JOIN qt_objective o ON te.T_ID = o.`T_ID`
		JOIN qt_keyresult kr ON o.`OBJECTIVE_ID` = kr.`OBJECTIVE_ID` WHERE te.T_ID = ?;";

 		// $query2 = "SELECT t.TASK_ID, t.`TA_NAME` AS TASK , o.`OBJECTIVE` , t.`TA_PROJECTTASK` AS 'PROJECT TASK' , t.TA_STATUS as 'TASK PROGRESS (%)' ,t.TA_TARGET AS TARGET , CASE t.`TA_STATUS` WHEN '0' THEN 'To Do' WHEN '100' THEN 'Done' ELSE 'On Doing' END AS `STATUS` , t.`TA_UPDATE` AS 'LAST UPDATE' FROM qt_team te LEFT JOIN qt_objective o ON te.T_ID = o.`T_ID` JOIN qt_task t ON o.`OBJECTIVE_ID` = t.`OBJECTIVE_ID` WHERE te.T_ID = ?";
		$data = $this->db->query($query2, $id);
		return $data;
	}

  public function getListObjective($id)
  {
      $query = "SELECT o.`OBJECTIVE_ID` , o.`OBJECTIVE`
      FROM qt_team te
      JOIN qt_objective o ON te.`T_ID` = o.`T_ID`
      WHERE te.T_ID = ?";
      $data = $this->db->query($query, $id);
  		return $data;
  }

	public function getObjectiveStatus($id)
	{
		$query = "SELECT o.`OBJECTIVE_ID` , o.`OBJECTIVE`
		FROM qt_team te
		JOIN QT_OBJECTIVE o ON te.`T_ID` = o.`T_ID`
		WHERE te.T_ID = ?";
		// $query = "SELECT te.T_NAME ,te.T_USER, te.T_SINGKATAN,o.`OBJECTIVE` , SUM(t.`TA_STATUS`) AS persendone , COALESCE(COUNT(t.`TA_STATUS`))*100 AS persenalls ,COALESCE(COUNT(IF(t.`TA_STATUS`= 100 ,1 , NULL))) AS done  ,COALESCE(COUNT(t.`TA_STATUS`)) AS alls FROM qt_team te LEFT JOIN qt_objective o ON te.T_ID = o.`T_ID` LEFT JOIN qt_task t ON o.`OBJECTIVE_ID` = t.`OBJECTIVE_ID` WHERE te.T_ID > 0 GROUP BY (o.`OBJECTIVE_ID`)";
		// $data = $this->db->query($query);
		$data = $this->db->query($query, $id);
		return $data;
	}

	public function getProgressObjective($id){
		$query = "SELECT te.T_NAME ,te.T_USER, te.T_SINGKATAN,o.`OBJECTIVE` , SUM(t.`KR_STATUS`) AS persendone , COALESCE(COUNT(t.`KR_STATUS`))*100 AS persenalls ,COALESCE(COUNT(IF(t.`KR_STATUS`= 100 ,1 , NULL))) AS done  ,COALESCE(COUNT(t.`KR_STATUS`)) AS alls FROM qt_team te LEFT JOIN qt_objective o ON te.T_ID = o.`T_ID` LEFT JOIN qt_keyresult t ON o.`OBJECTIVE_ID` = t.`OBJECTIVE_ID` WHERE te.T_ID = ? GROUP BY (o.`OBJECTIVE_ID`)";
		$data = $this->db->query($query,$id);
		return $data;
	}


  // public function getTasks($id,$obj){
  //   $query = "SELECT te.T_ID, te.T_NAME ,te.T_USER, te.T_SINGKATAN ,o.OBJECTIVE_ID,o.`OBJECTIVE`, t.`TA_NAME`
  //   FROM qt_team te
  //   LEFT JOIN qt_objective o ON te.T_ID = o.`T_ID`
  //   LEFT JOIN qt_task t ON o.`OBJECTIVE_ID` = t.`OBJECTIVE_ID`
  //   WHERE te.T_ID = ? AND o.`OBJECTIVE_ID`= ? ";
  //   $data = $this->db->query($query, array($id , $obj));
  //   return $data;
  // }

  public function getTeamName($id){
    $query = "SELECT te.T_ID, te.T_NAME ,te.T_USER, te.T_SINGKATAN
    FROM qt_team te
    WHERE te.T_ID = ? ";
    $data = $this->db->query($query, $id);
    return $data;

  }

	public function getKrName($id){
		$query = "SELECT	KR_NAME , KR_ID
FROM QT_KEYRESULT kr
WHERE kr.`OBJECTIVE_ID` = ? AND kr.`KR_TYPE` = 'Qualitative' ";
		$data = $this->db->query($query, $id);
		return $data;

	}

	public function setSubKr($datax , $table , $tambah ,$id){

		$query = "SELECT	SUM(sk.SKR_BOBOT) AS 'status' FROM QT_SUBKR sk WHERE KR_ID = ?";
		$data = $this->db->query($query, $id);
		$data = $data->row()->status;

		$tambah = $tambah + $data;

		if($tambah > 100){
			return 0;
		}else{
			$this->db->insert($table, $datax);
		}
		// $data = $this->db->query($query, $id);
		// return $data;

	}

	public function getSbt($id)
	{
			$query = "SELECT *
			FROM QT_SUBKR s
			WHERE KR_ID = ?";

		$data = $this->db->query($query, $id);
		return $data;

	}

}
