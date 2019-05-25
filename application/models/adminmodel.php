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
		$timestart  = date("H:i", strtotime($inputs['timestart']));
		$timeend  = date("H:i", strtotime($inputs['timeend']));

		$data = array(
			'user_name' => $inputs['name'],
			'user_email' => $inputs['email'],
			'user_password' => $inputs['password'],
			'user_role' => $inputs['role'],
			'user_picture' => $image_url,
			'time_start' => $timestart,
			'time_end' => $timeend,
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


	// class procedure start
	function viewClass() {
		return $this->db->where("class_status !=", 'deleted')->get('class')->result();
	}
	function addClass($class) {
		$query = $this->db->insert('class', $class); 
		return true;
	}
	function delClass($deleteid) {
		return $this->db->set('class_status', 'deleted')
				->where('class_id',$deleteid)
				->update('class');
	}
	function getTrash() {
		return $this->db->where('class_status','deleted')->get('class')->result();
	}
	function removeFromTrash($trashid) {
		return $this->db->set('class_status', 'restored')
				->where('class_id',$trashid)
				->update('class');	
	}
	function editclass($id) {
		return $this->db->where('class_id',$id)->get('class')->result();
	}
	function updateClass($inp) {
		$name = $inp['class_name'];
		$id = $inp['class_id'];
		return $this->db->set('class_name', $name)
				->where('class_id',$id)
				->update('class');
	}
	// class procedure end

}
?>