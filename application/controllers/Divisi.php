<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends MY_MainController {
	protected $access = "Admin, Client";

  public function __construct(){
		 parent::__construct();
		 // Load model
		 $this->load->model('Divisi_model');
	}

  public function index($id)
  {
    $get['contentname'] = $this->Divisi_model->getTeamName($id);
    $get['content'] = $this->Divisi_model->getObjective($id);
    $get['contentobjective'] = $this->Divisi_model->getListObjective($id);
		$get['objective'] = $this->Divisi_model->getProgressObjective($id);
    $get['contentask'] = $this->Divisi_model;
    // $this->load->view('welcome_message');
    $this->load->view('page-divisi0' , $get);
  }

  public function addSubTaskView($id)
  {
    // $this->load->view('welcome_message');
		$get['contentobjective'] = $this->Divisi_model->getListObjective($id);
		$get['contensubtask'] = $this->Divisi_model;

		// $get['contentkeyfeature'] = $this->Divisi_model->getListObjective($id);

    $this->load->view('page-okr-add', $get);
  }

	public function addSubTask($count)
	{

		$kr = $this->input->post('kr');
		$st = $this->input->post('subtask');
		$bobot = $this->input->post('persentage');
		$s = 0;
		$datax = array(
			'KR_ID' => $kr,
			'SKR_NAME' => $st,
			'SKR_BOBOT' => $bobot,
			'SKR_STATUS' => $s
		);

		for ($i=1; $i <= $count; $i++) {
			$kr = $this->input->post('kr');
			$st = $this->input->post('subtask'.$i);
			$bobot = $this->input->post('persentage'.$i);
			$s = 0;

		$datax = array(
			'KR_ID' => $kr,
			'SKR_NAME' => $st,
			'SKR_BOBOT' => $bobot,
			'SKR_STATUS' => $s
		);
	}

	$this->Divisi_model->setSubKr($datax,'QT_SUBKR');
		// $redi = "divisi/2";
		$redi = "dashboard";

		redirect($redi);

	}

  // public function added()
  // {
  //   $o = $this->input->post('objective');
  //   // $team = $this->session->userdata('T_ID');
	// 	$team = $this->input->post('idteam');
  //   $start = $this->input->post('start');
  //   $end = $this->input->post('end');
	//
  //   // $namav = $this->input->post('Key Feature');
  //   // $namav = $this->input->post('Activity');
	// 	$data = array(
	// 		'OBJECTIVE' => $o,
  //     'T_ID' => $team
	// 		// 'Key Feature' => $kf,
	// 		// 'Activity' => $a
	// 		);
	// 	$this->Okr_model->insert($data, 'qt_objective');
	// 	// redirect('dashboard');
  //   redirect('okr/add');
	//
  // }

}
