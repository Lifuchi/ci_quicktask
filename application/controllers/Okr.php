<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Okr extends MY_MainController {
	protected $access = "Admin";

  public function __construct(){
		 parent::__construct();
		 // Load model
		 $this->load->model('Okr_model');
	}

  // public function index()
  // {
  //   // $this->load->view('welcome_message');
  //   $this->load->view('page-okr');
  // }

  // public function add()
  // {
  //   // $this->load->view('welcome_message');
  //   $this->load->view('page-okr-add');
  // }

  public function added()
  {
    $o = $this->input->post('objective');
		$desc = $this->input->post('desc');
    $team = $this->session->userdata('T_ID');

    // $start = $this->input->post('start');
    // $end = $this->input->post('end');
    // $namav = $this->input->post('Key Feature');
    // $namav = $this->input->post('Activity');
		$data = array(
			'OBJECTIVE' => $o,
			'DESCRIPTION' => $desc,
      'T_ID' => $team
			);
		$this->Okr_model->insert($data, 'qt_objective');
		// redirect('dashboard');
		$redi = "divisi/".$team;
    redirect($redi);

  }

	public function taskadded()
	{
		$o = $this->input->post('obj');
		$t = $this->input->post('tasks');
		$qt = $this->input->post('qtask');
		$target = $this->input->post('target');
		$start = $this->input->post('start');
		$end = $this->input->post('end');

		$team = $this->session->userdata('T_ID');
		$s = 0;

		// $start = $this->input->post('start');
		// $end = $this->input->post('end');
		// $namav = $this->input->post('Key Feature');
		// $namav = $this->input->post('Activity');
		// $d=mktime(11, 14, 54, 8, 12, 2014);
		$akhir = date("Y-m-d h:i:sa");
		$data = array(
			'OBJECTIVE_ID' => $o,
			'KR_NAME' => $t,
			'KR_TYPE' => $qt,
			'KR_TARGET' => $target,
			'KR_STATUS' => $s,
			'KR_PROGRESS' => $s,
			'KR_UPDATE' => $akhir,
			'KR_START' => $start,
			'KR_END' => $end
			);
		$this->Okr_model->insertTask($data, 'qt_keyresult');
		// redirect('dashboard');
		$redi = "divisi/".$team;
		redirect($redi);

	}

	public function taskupdated()
	{
		$t = $this->input->post('task');
		$status= $this->input->post('stats');
		$team = $this->session->userdata('T_ID');
		// $target = $this->Okr_model->findTarget('qt_task' , $t);
		$akhir = date("Y-m-d h:i:sa");
		$data = array(
			'KR_STATUS' => $status,
			'KR_UPDATE' => $akhir
			);
		$this->Okr_model->updateTask($data, 'qt_keyresult' , $t);
		// redirect('dashboard');
		$redi = "divisi/".$team;
		redirect($redi);

	}

	public function taskupdated2()
	{
		$t = $this->input->post('task');
		$status= $this->input->post('stats');
		$team = $this->session->userdata('T_ID');
		$target = $this->Okr_model->findTarget('qt_keyresult' , $t)->result_array();
		foreach($target as $row){
					$result['KR_TARGET'] = $row['KR_TARGET'];
		}
		// echo $result['TA_TARGET'];
		// echo $status;
		$hitung = $status/$result['KR_TARGET']*100;
		// echo $hitung;
		$akhir = date("Y-m-d h:i:sa");
		$data = array(
			'KR_PROGRESS' => $status,
			'KR_STATUS' => $hitung,
			'KR_UPDATE' => $akhir
			);
		$this->Okr_model->updateTask($data, 'qt_keyresult' , $t);
		// redirect('dashboard');
		$redi = "divisi/".$team;
		redirect($redi);
	}

}
