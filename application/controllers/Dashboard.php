<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_MainController {
	protected $access = "Admin, Client";


	  public function __construct(){
			 parent::__construct();
			 // Load model
			 $this->load->model('Dashboard_model');
		}

	public function index()
	{
		// $this->load->view('welcome_message');
		// $allact = $this->Dashboard_model->allActivity();
		// echo '<script>alert("'.$all.'")</script>';
		// $doneact = $this->Dashboard_model->doneActivity();
		// $doneact = $this->Dashboard_model->doneActivity();
		$data['content'] =  $this->Dashboard_model->getProgressBar();
		$data['network'] =  $this->Dashboard_model->getNetworkOverall();
		$data['objective'] =  $this->Dashboard_model->getObjective();

		// $data['all'] = $allact;
		// $data['done'] = $doneact;
    $this->load->view('dashboard',$data);

	}

	public function allActivity()
	{
		// $this->load->view('welcome_message');
    // $this->load->view('dashboard');
		// $all = $this->Dashboard_model->allActivity()->result_array();
		// foreach($all as $row){
		// 	$result['ht'] = $row['ht'];
		// }
		// echo json_encode($result['ht']);
		$all = $this->Dashboard_model->allActivity();

		echo $all;


	}

	public function doneActivity()
	{
		$done = $this->Dashboard_model->doneActivity();

		// $this->load->view('welcome_message');
		// $this->load->view('dashboard');
		// foreach($done as $row){
		// 	$result['ht'] = $row['ht'];
		// }
		echo $done;


	}

}
