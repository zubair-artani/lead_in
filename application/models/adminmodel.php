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

	function removeClass($deleteid) {
		return $this->db->where('class_id', $deleteid)
						->delete('class');
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
	function removeDepartment($deleteid) {
		return $this->db->where('department_id', $deleteid)
						->delete('department');
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
	function delParmanentFaculty($deleteid) {
		return $this->db->where('faculty_id', $deleteid)
						->delete('faculty');
	}
	function updateFaculty($inp) {
		$name = $inp['faculty_name'];
		$id = $inp['faculty_id'];
		// echo $id;
		return $this->db->set('faculty_name', $name)
				->where('faculty_id',$id)
				->update('faculty');
	}
	//faculty procedure end

	//batch code procedure start
	function viewBatchCode(){
		$query = $this->db->where("batch_status_2 !=", 'deleted')->get('batch_code')->result();
		if($query == true){
			return $query;
		}
	}

	function delBatch($deleteid){
		return $this->db->set('batch_status_2', 'deleted')
				->where('batch_id',$deleteid)
				->update('batch_code');		
	}
	function insertBatch($inputs){
		// date convert
		$startDate = date("Y-m-d", strtotime($inputs['startdate']));
		$endDate = date("Y-m-d", strtotime($inputs['enddate']));
		// time convert
		$timestart  = date("H:i", strtotime($inputs['timestart']));
		$timeend  = date("H:i", strtotime($inputs['timeend']));

		$arr = [
			'batch_code' => $inputs['batchCode'],
			'batch_days' => $inputs['days'],
			'class' => $inputs['class'],
			'department' => $inputs['department'],
			'teacher' => $inputs['faculty'],
			'start_date' => $startDate,
			'end_date' => $endDate,
			'start_time' => $timestart,
			'end_time' => $timeend,
		];
		$insert_query = $this->db->insert('batch_code', $arr);
		return true;		
	}
	function viewBatchCodeTrash() {
		return $query = $this->db->where('batch_status_2','deleted')->get('batch_code')->result();
		// return $this->db->get('batch_code')->result();
	}
	function removeBatchCode($deleteid) {
		return $this->db->where('batch_id', $deleteid)
						->delete('batch_code');	
	}

	// batch code procedure end

	// batch days procedure start
	function addBatchDays($param1) {
		$query = $this->db->insert('batchdays', $param1); 
		return true;
	}
	function viewBatchDays() {
		return $this->db->where("batchdays_status !=", 'deleted')->get('batchdays')->result();
	}
	function delBatchDays($deleteid) {
		return $this->db->set('batchdays_status', 'deleted')
				->where('batchdays_id',$deleteid)
				->update('batchdays');
	}
	function viewBatchDaysTrash() {
		return $this->db->where('batchdays_status','deleted')->get('batchdays')->result();
	}
	function removeBatchDaysFromTrash($trashid) {
		return $this->db->set('batchdays_status', 'restored')
				->where('batchdays_id',$trashid)
				->update('batchdays');	
	}
	function permenenbatchdaysdel($deleteid) {
		return $this->db->where('batchdays_id', $deleteid)
						->delete('batchdays');
	}
	function editBatchDays($id) {
		return $this->db->where('batchdays_id',$id)->get('batchdays')->result();
	}
	function updateBatchDays($inp) {
		$name = $inp['batch_days'];
		$id = $inp['batchdays_id'];
		return $this->db->set('batch_days', $name)
				->where('batchdays_id',$id)
				->update('batchdays');
	}
	//batch days procedure end

	// source procedure start
	function viewsource() {
		return $this->db->where("source_status !=", 'deleted')->get('marketing_source')->result();
	}
	function addsource($source) {
		$query = $this->db->insert('marketing_source', $source); 
		return true;
	}
	function delsource($deleteid) {
		return $this->db->set('source_status', 'deleted')
				->where('source_id',$deleteid)
				->update('marketing_source');
	}
	function getsourceTrash() {
		return $this->db->where('source_status','deleted')->get('marketing_source')->result();
	}
	function removeSourceFromTrash($trashid) {
		return $this->db->set('source_status', 'restored')
				->where('source_id',$trashid)
				->update('marketing_source');	
	}

	function removesource($deleteid) {
		return $this->db->where('source_id', $deleteid)
						->delete('marketing_source');
	}
	function editsource($id) {
		return $this->db->where('source_id',$id)->get('marketing_source')->result();
	}
	function updatesource($inp) {
		$name = $inp['source_name'];
		$id = $inp['source_id'];
		return $this->db->set('source_name', $name)
				->where('source_id',$id)
				->update('marketing_source');
	}
	// source procedure end

	// inquiry_Status procedure start
	function viewinquirystatus() {
		return $this->db->where("inquiry_status !=", 'deleted')->get('inquiry_status')->result();
	}
	function addinquirystatus($source) {
		$query = $this->db->insert('inquiry_status', $source); 
		return true;
	}
	function delinquirystatus($deleteid) {
		return $this->db->set('inquiry_status', 'deleted')
				->where('inquiry_id',$deleteid)
				->update('inquiry_status');
	}
	function getinquirystatustrash() {
		return $this->db->where('inquiry_status','deleted')->get('inquiry_status')->result();
	}
	function removeinquirystatusFromTrash($trashid) {
		return $this->db->set('inquiry_status', 'restored')
				->where('inquiry_id',$trashid)
				->update('inquiry_status');	
	}

	function removeinquirystatus($deleteid) {
		return $this->db->where('inquiry_id', $deleteid)
						->delete('inquiry_status');
	}
	function editinquirystatus($id) {
		return $this->db->where('inquiry_id',$id)->get('inquiry_status')->result();
	}
	function updateinquirystatus($inp) {
		$id = $inp['inquiry_id'];
		$color = $inp['inquiry_color'];
		$name = $inp['inquiry_name'];
		return $this->db->set(['inquiry_color'=> $color, 'inquiry_name'=>$name])
				->where('inquiry_id',$id)
				->update('inquiry_status');
	}
	// class procedure end
}


?>