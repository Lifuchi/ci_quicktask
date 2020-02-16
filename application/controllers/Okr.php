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
			'TA_NAME' => $t,
			'TA_PROJECTTASK' => $qt,
			'TA_TARGET' => $target,
			'TA_STATUS' => $s,
			'TA_UPDATE' => $akhir
			);
		$this->Okr_model->insertTask($data, 'qt_task');
		// redirect('dashboard');
		$redi = "divisi/".$team;
		redirect($redi);

	}

	public function taskupdated()
	{
		$t = $this->input->post('task');
		$status= $this->input->post('stats');
		$team = $this->session->userdata('T_ID');

		$akhir = date("Y-m-d h:i:sa");
		$data = array(
			'TA_STATUS' => $status,
			'TA_UPDATE' => $akhir
			);
		$this->Okr_model->updateTask($data, 'qt_task' , $t);
		// redirect('dashboard');
		$redi = "divisi/".$team;
		redirect($redi);

	}


}
