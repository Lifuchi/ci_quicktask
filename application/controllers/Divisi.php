<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends MY_MainController {
	protected $access = "Admin";

  public function __construct(){
		 parent::__construct();
		 // Load model
		 $this->load->model('Divisi_model');
	}

  public function index($id)
  {
    $get['contentname'] = $this->Divisi_model->getTeamName($id);
    $get['content'] = $this->Divisi_model->getObjective($id);
    $get['contentask'] = $this->Divisi_model;

    // $this->load->view('welcome_message');
    $this->load->view('page-divisi0' , $get);
  }

  public function add()
  {
    // $this->load->view('welcome_message');
    // $this->load->view('page-okr-add');
  }

  public function added()
  {
    $o = $this->input->post('objective');
    $team = $this->session->userdata('T_ID');

    $start = $this->input->post('start');
    $end = $this->input->post('end');

    // $namav = $this->input->post('Key Feature');
    // $namav = $this->input->post('Activity');
		$data = array(
			'OBJECTIVE' => $o,
      'T_ID' => $team
			// 'Key Feature' => $kf,
			// 'Activity' => $a
			);
		$this->Okr_model->insert($data, 'qt_objective');
		// redirect('dashboard');
    redirect('okr/add');

  }

}
