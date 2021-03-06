<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_MainController {

	public function logged_in_check(){
	if ($this->session->userdata("logged_in")) {
		// redirect("admin");
			if($this->session->userdata("T_ROLE") == "Admin"){
					// redirect("admin");
					redirect("Dashboard");
				}else {
			// $nip = $this->encryption->encrypt($this->session->userdata("NIP"));
					// $nip = base64_encode($nip);
					// redirect("pegawai/".$nip);
					// redirect("client");
					redirect("Dashboard");


				}
	}
}

	public function index(){
	$this->logged_in_check();
	$this->load->library('form_validation');
	$this->form_validation->set_rules("username", "Username", "trim|required");
	$this->form_validation->set_rules("password", "Password", "trim|required");

		if ($this->form_validation->run() == true){
		$this->load->model('Auth_model', 'auth');
		// check the username & password of user
		$status = $this->auth->validate();
		
		if ($status == ERR_INVALID_USERNAME) {
			$this->session->set_flashdata("error", "Username is invalid");
		}
		elseif ($status == ERR_INVALID_PASSWORD) {
			$this->session->set_flashdata("error", "Password is invalid");
		}
		else{
			// success
			// store the user data to session
			$this->session->set_userdata($this->auth->get_data());
			$this->session->set_userdata("logged_in", true);
			// redirect to dashboard
					if($this->session->userdata("T_ROLE") == "Admin"){
						// redirect("admin");
						redirect("Dashboard");

					}else {
						// $nip = $this->encryption->encrypt($this->session->userdata("NIP"));
						// $nip = base64_encode($nip);
							// redirect("pegawai/".$nip);
							// redirect("client");
							redirect("Dashboard");


					}
		}
	}

	$this->load->model('Auth_model');
	$data['content'] = $this->Auth_model->getList();
	$this->load->view("pages-signin", $data);

}

	public function logout(){
	$this->session->unset_userdata("logged_in");
	$this->session->sess_destroy();
	redirect("auth");
}

// 	public function try(){
// 		$this->load->model('Auth_model');
// 		$data['content'] = $this->Auth_model->getList();
// 		// echo $data;
// 		$this->load->view("pages-signin", $data);
// }
}
