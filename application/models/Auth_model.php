<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {
	// private $table = "Pegawai";
	private $table = "qt_team";
	private $_data = array();

	public function validate(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// $this->db->where("t_name", $username);
		$this->db->where("t_id", $username);

		$query = $this->db->get($this->table);

		if ($query->num_rows())
		{
			// found row by username
			$row = $query->row_array();
      // <script>alert(.sha1($password).)</script>
			// now check for the password
      // $password =

			// if ($row['PASSWORD'] == sha1($password))
			// {
			// 	// we not need password to store in session
			// 	unset($row['PASSWORD']);
			// 	$this->_data = $row;
			// 	return ERR_NONE;
			// }

			if ($row['T_PASSWORD'] == $password)
			{
				// we not need password to store in session
				unset($row['T_PASSWORD']);
				$this->_data = $row;
				return ERR_NONE;
			}

			// password not match
			return ERR_INVALID_PASSWORD;
		}
		else {
			// not found
			return ERR_INVALID_USERNAME;
		}
	}

	public function get_data(){
		return $this->_data;
	}

	public function getList(){
		$query = "SELECT T_ID, T_NAME, T_USER FROM qt_team";
		$data = $this->db->query($query);
		return $data;
	}

}
