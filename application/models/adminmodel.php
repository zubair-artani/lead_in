<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminmodel extends CI_Model {
	function login($inp){
		$email = $inp['email'];
		$password = $inp['password'];
		$query = $this->db->where(['user_email'=>$email, 'user_password'=>$password])->get('users')->result();
		if($query){
			return $query;
		} else {
			echo "not";
		}
	}

	function addEditor($inputs, $image_url){
		$data = array(
			'user_name' => $inputs['name'],
			'user_email' => $inputs['email'],
			'user_password' => $inputs['password'],
			'user_role' => $inputs['role'],
			'user_picture' => $image_url,
			'position' => $inputs['position'],
		);
		$insert_query = $this->db->insert('users', $data);
		return true;
	}
	function viewEditor(){
		return $this->db->get('users')->result();
	}
	function deleteEditor($id){
		$this->db->delete('users', array('user_id' => $id));
		return true;
	}
}
?>