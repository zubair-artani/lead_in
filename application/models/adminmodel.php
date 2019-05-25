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

	// department procedure start
	function addDepartment($param1) {
		$query = $this->db->insert('department', $param1); 
		return true;
	}
	function viewDepartment() {
		return $this->db->where("department_status !=", 'deleted')->get('department')->result();
	}
	function delDepartment($deleteid) {
		return $this->db->set('department_status', 'deleted')
				->where('department_id',$deleteid)
				->update('department');
	}
	function viewTrash() {
		return $this->db->where('department_status','deleted')->get('department')->result();
	}
	function removeDepartmentFromTrash($trashid) {
		return $this->db->set('department_status', 'restored')
				->where('department_id',$trashid)
				->update('department');	
	}
	function editDepartment($id) {
		return $this->db->where('department_id',$id)->get('department')->result();
	}
	function updateDepartment($inp) {
		$name = $inp['department_name'];
		$id = $inp['department_id'];
		return $this->db->set('department_name', $name)
				->where('department_id',$id)
				->update('department');
	}
	// department procedure end

	// faculty procedure start
	function addFaculty($inputs, $image_url){
		$data = array(
			'faculty_name' => $inputs['faculty_name'],
			'faculty_signature' => $image_url,
		);
		$insert_query = $this->db->insert('faculty', $data);
		return true;
	}
	function viewFaculty() {
		return $this->db->where("faculty_status !=", 'deleted')->get('faculty')->result();
	}
	function delFaculty($deleteid) {
		return $this->db->set('faculty_status', 'deleted')
				->where('faculty_id',$deleteid)
				->update('faculty');
	}
	function viewFacultyTrash() {
		return $this->db->where('faculty_status','deleted')->get('faculty')->result();
	}
	function removeFacultyFromTrash($trashid) {
		return $this->db->set('faculty_status', 'restored')
				->where('faculty_id',$trashid)
				->update('faculty');	
	}
	function editFaculty($id) {
		return $this->db->where('faculty_id',$id)->get('faculty')->result();
	}
	function updateFaculty($inp) {
		$name = $inp['faculty_name'];
		$id = $inp['faculty_id'];
		// echo $id;
		return $this->db->set('faculty_name', $name)
				->where('faculty_id',$id)
				->update('faculty');
	}
}


?>