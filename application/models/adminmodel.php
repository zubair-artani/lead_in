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

	public function viewArrays($param1, $param2){
		if($param2 == 'class'){
			$array1 = Array();
			for($i = 0; $i < sizeof($param1); $i++){
				array_push($array1, $this->db->query("SELECT class_name FROM class WHERE class_id = $param1[$i] AND class_status != 'deleted'")->result());
			}
			return $array1;	
		} else if($param2 == 'department'){
			$array1 = Array();
			for($i = 0; $i < sizeof($param1); $i++){
				$query = $this->db->query("SELECT department_name FROM department WHERE department_id = $param1[$i] AND department_status != 'deleted'")->result();
				array_push($array1, $query);
			}
			return $array1;	
		} else if($param2 == 'days'){
			$array1 = Array();
			for($i = 0; $i < sizeof($param1); $i++){
				$query = $this->db->query("SELECT batch_days FROM batchdays WHERE batchdays_id = $param1[$i] AND batchdays_status != 'deleted'")->result();
				array_push($array1, $query);
			}
			return $array1;
		} else if ($param2 == 'teacher'){
			$array1 = Array();
			for($i = 0; $i < sizeof($param1); $i++){
				$query = $this->db->query("SELECT faculty_name FROM faculty WHERE faculty_id = $param1[$i] AND faculty_status != 'deleted'")->result();
				array_push($array1, $query);
			}
			return $array1;
		} else if($param2 == 'education'){
			$array1 = Array();
			for($i = 0; $i < sizeof($param1); $i++){
				$query = $this->db->query("SELECT education_name FROM education WHERE education_id = $param1[$i] AND education_status != 'deleted'")->result();
				array_push($array1, $query);
			}
			return $array1;
		} else if($param2 == 'source'){
			$array1 = Array();
			for($i = 0; $i < sizeof($param1); $i++){
				$query = $this->db->query("SELECT source_name FROM marketing_source WHERE source_id = $param1[$i] AND source_status != 'deleted'")->result();
				array_push($array1, $query);
			}
			return $array1;
		} else if($param2 == 'inqStatus'){
			$array1 = Array();
			for($i = 0; $i < sizeof($param1); $i++){
				$query = $this->db->query("SELECT * FROM inquiry_status WHERE inquiry_id = $param1[$i] AND inquiry_status != 'deleted'")->result();
				array_push($array1, $query);
			}
			return $array1;
		} else if($param2 == 'departmentAdmission'){
			$array1 = Array();
			for($i = 0; $i < sizeof($param1); $i++){
				$query = $this->db->query("SELECT count(*) as totalAdmissions FROM admission WHERE a_student_department = $param1[$i] AND trash_status != 'deleted'")->result();
				array_push($array1, $query);
			}
			return $array1;
		} else if($param2 == 'exp_type'){
			$array1 = Array();
			for($i = 0; $i < sizeof($param1); $i++){
				$query = $this->db->query("SELECT * FROM expense WHERE expense_id = $param1[$i] AND expense_status != 'deleted'")->result();
				array_push($array1, $query);
			}
			return $array1;
		}
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
	function updateFaculty($name,$pic,$id) {
		$faculty_name = $name;
		$faculty_picture = $pic;
		$faculty_id = $id;
		if($pic =='') {
		return $this->db->set('faculty_name', $faculty_name)
				->where('faculty_id',$faculty_id)
				->update('faculty');	
		} else {
			return $this->db->set(['faculty_name'=> $faculty_name,'faculty_signature'=>$pic])
				->where('faculty_id',$faculty_id)
				->update('faculty');
		}
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
	function removeBatchFromTrash($trashid) {
		return $this->db->set('batch_status_2', 'restored')
				->where('batch_id',$trashid)
				->update('batch_code');	
	}
	function editBatchCode($param1) {
		return $this->db->where('batch_id',$param1)->get('batch_code')->result();

	}
	function updateBatchCode($inp) {
		$startDate = date("Y-m-d", strtotime($inp['startdate']));
		$endDate = date("Y-m-d", strtotime($inp['enddate']));
		// time convert
		$timestart  = date("H:i", strtotime($inp['time_start']));
		$timeend  = date("H:i", strtotime($inp['time_end']));

		$arr = [
			'batch_code' => $inp['batchCode'],
			'batch_days' => $inp['days'],
			'class' => $inp['class'],
			'department' => $inp['department'],
			'teacher' => $inp['faculty'],
			'start_time' => $timestart,
			'end_time' => $timeend,
			'start_date' => $startDate,
			'end_date' => $endDate,
		];
		$id = $inp['batch_id'];
		return $this->db->set($arr)
				->where('batch_id',$id)
				->update('batch_code');
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

	// religion procedure start
	function viewreligion($param1) {
		if($param1 > 0){
			return $this->db->where(["religion_status !=" => 'deleted', 'religion_id' => $param1])->get('religion')->result();
		} else {
			return $this->db->where("religion_status !=", 'deleted')->get('religion')->result();
		}
	}
	function addreligion($religion) {
		$query = $this->db->insert('religion', $religion); 
		return true;
	}
	function delreligion($deleteid) {
		return $this->db->set('religion_status', 'deleted')
				->where('religion_id',$deleteid)
				->update('religion');
	}
	function getreligionTrash() {
		return $this->db->where('religion_status','deleted')->get('religion')->result();
	}
	function removereligionFromTrash($trashid) {
		return $this->db->set('religion_status', 'restored')
				->where('religion_id',$trashid)
				->update('religion');	
	}

	function removereligion($deleteid) {
		return $this->db->where('religion_id', $deleteid)
						->delete('religion');
	}
	function editreligion($id) {
		return $this->db->where('religion_id',$id)->get('religion')->result();
	}
	function updatereligion($inp) {
		$name = $inp['religion_name'];
		$id = $inp['religion_id'];
		return $this->db->set('religion_name', $name)
				->where('religion_id',$id)
				->update('religion');
	}
	// religion procedure end

	// education procedure start
	function vieweducation($param1) {
		if($param1 > 0){
			return $this->db->where(["education_status !=" => 'deleted', 'education_id' => $param1])->get('education')->result();
		} else {
			return $this->db->where("education_status !=", 'deleted')->get('education')->result();
		}
	}
	function addeducation($education) {
		$query = $this->db->insert('education', $education); 
		return true;
	}
	function deleducation($deleteid) {
		return $this->db->set('education_status', 'deleted')
				->where('education_id',$deleteid)
				->update('education');
	}
	function geteducationTrash() {
		return $this->db->where('education_status','deleted')->get('education')->result();
	}
	function removeeducationFromTrash($trashid) {
		return $this->db->set('education_status', 'restored')
				->where('education_id',$trashid)
				->update('education');	
	}

	function removeeducation($deleteid) {
		return $this->db->where('education_id', $deleteid)
						->delete('education');
	}
	function editeducation($id) {
		return $this->db->where('education_id',$id)->get('education')->result();
	}
	function updateeducation($inp) {
		$name = $inp['education_name'];
		$id = $inp['education_id'];
		return $this->db->set('education_name', $name)
				->where('education_id',$id)
				->update('education');
	}
	// education procedure end

	// reigstration start 
	function addRegistration($inputs){
		$dob = date("Y-m-d", strtotime($inputs['r_student_dob']));
		$currentdate = date("Y-m-d", strtotime($inputs['r_student_currentdate']));
		echo "<pre>";
			print_r($inputs);
		echo "</pre>";
		$allinputs = [
			'r_student_name' => $inputs['r_student_name'],
			'r_student_fathername' => $inputs['r_student_fathername'],
			'r_student_mobileno' => $inputs['r_student_mobileno'],
			'r_student_fatherno' => $inputs['r_student_fatherno'],
			'r_student_emergencyno' => $inputs['r_student_emergencyno'],
			'r_student_whatsappno' => $inputs['r_student_whatsappno'],
			'r_student_dob' => $dob,
			'r_student_gender' => $inputs['r_student_gender'],
			'r_student_image' => $inputs['r_student_image'],
			'r_student_maritalstat' => $inputs['r_student_maritalstat'],
			'r_student_cnic' => $inputs['r_student_cnic'],
			'r_student_nationality' => $inputs['r_student_nationality'],
			'r_student_religion' => $inputs['r_student_religion'],
			'r_student_lastedu' => $inputs['r_student_lastedu'],
			'r_student_currentedu' => $inputs['r_student_currentedu'],
			'r_student_address' => $inputs['r_student_address'],
			'r_student_currentdate' => $currentdate,
		];
		if($this->db->insert('registration', $allinputs)){
			return true;
		}
	}
	function updateRegistration($inputs,$pic,$id) {
		$dob = date("Y-m-d", strtotime($inputs['r_student_dob']));
		$currentdate = date("Y-m-d", strtotime($inputs['r_student_currentdate']));
		$allinputs = [
			'r_student_name' => $inputs['r_student_name'],
			'r_student_fathername' => $inputs['r_student_fathername'],
			'r_student_mobileno' => $inputs['r_student_mobileno'],
			'r_student_fatherno' => $inputs['r_student_fatherno'],
			'r_student_emergencyno' => $inputs['r_student_emergencyno'],
			'r_student_whatsappno' => $inputs['r_student_whatsappno'],
			'r_student_dob' => $dob,
			'r_student_gender' => $inputs['r_student_gender'],
			'r_student_maritalstat' => $inputs['r_student_maritalstat'],
			'r_student_cnic' => $inputs['r_student_cnic'],
			'r_student_nationality' => $inputs['r_student_nationality'],
			'r_student_religion' => $inputs['r_student_religion'],
			'r_student_lastedu' => $inputs['r_student_lastedu'],
			'r_student_currentedu' => $inputs['r_student_currentedu'],
			'r_student_address' => $inputs['r_student_address'],
			'r_student_currentdate' => $currentdate,
		];
		// $data = $arr;
		$picture = $pic;
		$id = $id;
		if($pic =='') {
		return $this->db->set($allinputs)
				->where('r_student_id',$id)
				->update('registration');	
		} else {
			$allinput = [
			'r_student_name' => $inputs['r_student_name'],
			'r_student_fathername' => $inputs['r_student_fathername'],
			'r_student_mobileno' => $inputs['r_student_mobileno'],
			'r_student_fatherno' => $inputs['r_student_fatherno'],
			'r_student_emergencyno' => $inputs['r_student_emergencyno'],
			'r_student_whatsappno' => $inputs['r_student_whatsappno'],
			'r_student_dob' => $dob,
			'r_student_gender' => $inputs['r_student_gender'],
			'r_student_image' => $pic,
			'r_student_maritalstat' => $inputs['r_student_maritalstat'],
			'r_student_cnic' => $inputs['r_student_cnic'],
			'r_student_nationality' => $inputs['r_student_nationality'],
			'r_student_religion' => $inputs['r_student_religion'],
			'r_student_lastedu' => $inputs['r_student_lastedu'],
			'r_student_currentedu' => $inputs['r_student_currentedu'],
			'r_student_address' => $inputs['r_student_address'],
			'r_student_currentdate' => $currentdate,
		];
			return $this->db->set($allinput)
				->where('r_student_id',$id)
				->update('registration');
		}
		// echo $id;
		// return $this->db->set('faculty_name', $name)
		// 		->where('faculty_id',$id)
		// 		->update('faculty');
	}
	function delregistration($id) {
		return $this->db->set('r_status', 'deleted')
				->where('r_student_id',$id)
				->update('registration');
	}

	function viewRegistration($id){
		if($id > 0){
			return $this->db->where('r_student_id', $id)->get('registration')->result();
		} else {
			return $this->db->where("r_status !=", 'deleted')->get('registration')->result();
		}
	}
	function viewTrashRegistration(){
			return $this->db->where("r_status", 'deleted')->get('registration')->result();
	}
	function delParmanentRegistration($id) {
		return $this->db->where('r_student_id', $id)
						->delete('registration');
	}
	function removeRegistrationFromTrash($id) {
		return $this->db->set('r_status', 'restored')
				->where('r_student_id',$id)
				->update('registration');	
	}
	function editRegistration($id){
		return $this->db->where('r_student_id',$id)->get('registration')->result();

	}

	function addAdmission($inputs,$userid){
		$inputs['a_student_currentdate'] = date("Y-m-d", strtotime($inputs['a_student_currentdate']));
		$inputs['a_student_duedate'] = date("Y-m-d", strtotime($inputs['a_student_duedate']));
		$inputs['user_id'] = $userid;
		if($add = $this->db->insert('admission', $inputs)){
			return true;
		}
	}
	function viewAdmission($id){
		if($id > 0){
			return $this->db->where('a_student_id', $id)->get('admission')->result();
		} else {
			return $this->db->where("trash_status !=", 'deleted')->order_by('a_student_id','desc')->get('admission')->result();
		}
		// print_r($query);
	}
	function getstuadmission($query){
			for($i=0;$i < sizeof($query); $i++){
			$data[] =  $this->db->where("r_student_id",$query[$i]->a_student_registration_id )->get('registration')->result();
			}
			return $data;
		// 	echo "<pre>";
		// print_r($data);
		// 	echo "</pre>";

	}
	function getstuadmissiondel($id){
		return $this->db->where("r_student_id",$id )->get('registration')->result();
	}
	function viewAdmisssionTrash() {
			return $this->db->where("trash_status", 'deleted')->get('admission')->result();
	}
	function deladmission($id) {
		return $this->db->set('trash_status', 'deleted')
				->where('a_student_id',$id)
				->update('admission');
	}
	function RemoveAdmission($id) {
		return $this->db->where('a_student_id', $id)
						->delete('admission');
	}
	function removeAdmissionFromTrash($id) {
		return $this->db->set('trash_status', 'restored')
				->where('a_student_id',$id)
				->update('admission');
	}
	function editAdmission($id) {
		return $this->db->where('a_student_id',$id)->get('admission')->result();
	}
	function updateAdmission($inp){
		$startDate = date("Y-m-d", strtotime($inp['a_student_currentdate']));
		$due = date("Y-m-d", strtotime($inp['a_student_duedate']));
		$data = array(
			'a_student_currentdate' => $startDate,
			'a_student_faculty' =>$inp['a_student_faculty'],
			'a_student_department' =>$inp['a_student_department'],
			'a_student_class' =>$inp['a_student_class'],
			'a_student_adm_fees' =>$inp['a_student_adm_fees'],
			'a_student_monthly_fees' =>$inp['a_student_monthly_fees'],
			'a_student_feestatus' =>$inp['a_student_feestatus'],
			'a_student_duedate' =>$due

		);
		$id = $inp['a_student_id'];
		// echo $id;
		return $this->db->set($data)
				->where('a_student_id',$id)
				->update('admission');
	}

	// zubair
	// monthly target
	function addmonthlytarget($inputs, $image_url){
		$data = array(
			'm_target_date' => $inputs['m_target_date'],
			'm_target_status' =>$inputs['m_target_status'],
			'm_taget_remarks' =>$inputs['m_taget_remarks']
		);
		$insert_query = $this->db->insert('monthlytarget', $data);
		return true;
	}
	function viewmonthlytargetTrash() {
		return $this->db->where("m_status", 'deleted')->get('monthlytarget')->result();
	}
	function delmonthlytarget($deleteid) {
		return $this->db->set('m_status', 'deleted')
				->where('m_target_id',$deleteid)
				->update('monthlytarget');
	}
	function viewmonthlytarget() {
		return $this->db->where('m_status !=','deleted')->get('monthlytarget')->result();
	}
	function removemonthlytargetFromTrash($trashid) {
		return $this->db->set('m_status', 'restored')
				->where('m_target_id',$trashid)
				->update('monthlytarget');	
	}
	function editmonthlytarget($id) {
		return $this->db->where('m_target_id',$id)->get('monthlytarget')->result();
	}
	function delParmanentmonthlytarget($deleteid) {
		return $this->db->where('m_target_id', $deleteid)
						->delete('monthlytarget');
	}
	function updatemonthlytarget($inp) {
		$startDate = date("Y-m-d", strtotime($inp['m_target_date']));

		$arr = [
			'm_target' => $inp['m_target'],
			'm_status_complete' => $inp['m_status_complete'],
			'm_remarks' => $inp['m_remarks'],
			'm_target_date' => $startDate,
		];
		$id = $inp['m_target_id'];
		// echo $id;
		return $this->db->set($arr)
				->where('m_target_id',$id)
				->update('monthlytarget');
	}
	function insertMonthTarget($inputs){
		// date convert
		$startDate = date("Y-m-d", strtotime($inputs['m_target_date']));

		$arr = [
			'm_target' => $inputs['m_target'],
			'm_status_complete' => $inputs['m_status_complete'],
			'm_remarks' => $inputs['m_remarks'],
			'm_target_date' => $startDate,
		];
		$insert_query = $this->db->insert('monthlytarget', $arr);
		return true;		
	}
	//monthlytarget procedure end
	// salary procedure start
	
	function viewsalaryTrash() {
		return $this->db->where("salary_status", 'deleted')->get('salary')->result();
	}
	function delsalary($deleteid) {
		return $this->db->set('salary_status', 'deleted')
				->where('salary_id',$deleteid)
				->update('salary');
	}
	function viewsalary() {
		return $this->db->where('salary_status !=','deleted')->get('salary')->result();
	}
	function removesalaryFromTrash($trashid) {
		return $this->db->set('salary_status', 'restored')
				->where('salary_id',$trashid)
				->update('salary');	
	}
	function delParmanentsalary($deleteid) {
		return $this->db->where('salary_id', $deleteid)
						->delete('salary');
	}
	function updatesalary($inp) {
		$startDate = date("Y-m-d", strtotime($inp['salary_date']));
		$data = array(
			'salary_date' => $startDate,
			'salary_faculty' =>$inp['salary_faculty'],
			'salary_amount' =>$inp['salary_amount'],
			'per_lecture' =>$inp['per_lecture'],
			'salary_total' =>$inp['salary_total']

		);
		$id = $inp['salary_id'];
		// echo $id;
		return $this->db->set($data)
				->where('salary_id',$id)
				->update('salary');
	}
	function insertSalary($inputs){
		// date convert
		$startDate = date("Y-m-d", strtotime($inputs['salary_date']));
		$faculty_member = $inputs['salary_faculty'];
		$update = $this->db->where('faculty_id', $faculty_member)->update('faculty', ['faculty_salary_status'=>'Paid']);
		$data = array(
			'salary_date' => $startDate,
			'salary_faculty' =>$inputs['salary_faculty'],
			'per_lecture' =>$inputs['per_lecture'],
			'salary_amount' =>$inputs['salary_amount'],
			'salary_total' =>$inputs['salary_total']

		);
		$insert_query = $this->db->insert('salary', $data);
		return true;		
	}
	function editsalary($id) {
		return $this->db->where('salary_id',$id)->get('salary')->result();

	}
	//salary procedure end
	//salary procedure end
	// expense procedure start
	function viewexpense() {
		return $this->db->where("expense_status !=", 'deleted')->get('expense')->result();
	}
	function addexpense($expense) {
		$query = $this->db->insert('expense', $expense); 
		return true;
	}
	function delexpense($deleteid) {
		return $this->db->set('expense_status', 'deleted')
				->where('expense_id',$deleteid)
				->update('expense');
	}
	function getexpenseTrash() {
		return $this->db->where('expense_status','deleted')->get('expense')->result();
	}
	function removeexpenseFromTrash($trashid) {
		return $this->db->set('expense_status', 'restored')
				->where('expense_id',$trashid)
				->update('expense');	
	}

	function removeexpense($deleteid) {
		return $this->db->where('expense_id', $deleteid)
						->delete('expense');
	}
	function editexpense($id) {
		return $this->db->where('expense_id',$id)->get('expense')->result();
	}
	function updateexpense($inp) {
		$name = $inp['expense_name'];
		$id = $inp['expense_id'];
		return $this->db->set('expense_name', $name)
				->where('expense_id',$id)
				->update('expense');
	}
	// expense procedure end

	// monthly expense procedure start
	function viewmexpense() {
		return $this->db->where("expense_status !=", 'deleted')->get('monthly_expense')->result();
	}
	function addmexpense($inputs) {
		$startDate = date("Y-m-d", strtotime($inputs['expense_date']));

		$arr = [
			'expense_date' => $startDate,
			'expense_amount' => $inputs['expense_amount'],
			'expense_type' => $inputs['expense_type']
		];
		$insert_query = $this->db->insert('monthly_expense', $arr);
		return true;		
	}
	function delmexpense($deleteid) {
		return $this->db->set('expense_status', 'deleted')
				->where('m_expense_id',$deleteid)
				->update('monthly_expense');
	}
	function getmexpenseTrash() {
		return $this->db->where('expense_status','deleted')->get('monthly_expense')->result();
	}
	function removeMonthlyExpenseFromTrash($trashid) {
		return $this->db->set('expense_status', 'restored')
				->where('m_expense_id',$trashid)
				->update('monthly_expense');	
	}
	function removeMonthlyexpense($trashid) {
		return $this->db->where('m_expense_id', $trashid)
						->delete('monthly_expense');
	}
	function editmexpense($param1){
		return $this->db->where('m_expense_id',$param1)->get('monthly_expense')->result();
	}
	function updateMexpense($inp) {
		$startDate = date("Y-m-d", strtotime($inp['expense_date']));
		$arr = [
				'expense_date' => $startDate,
				'expense_amount' => $inp['expense_amount'],
				'expense_type' => $inp['expense_type']
			];
		$id = $inp['m_expense_id'];
		return $this->db->set($arr)
				->where('m_expense_id',$id)
				->update('monthly_expense');
	}
	// end procedure


	// inquiry_form procedure start
	function addInquiryForm($inp) {
		$startDate = date("Y-m-d", strtotime($inp['date']));

		$arr = [
			'date' => $startDate,
			'student_name' => $inp['student_name'],
			'father_name' => $inp['father_name'],
			'mobile_no' => $inp['mobile_no'],
			'admission_fee' => $inp['admission_fee'],
			'monthly_fee' => $inp['monthly_fee'],
			'source' => $inp['source'],
			'class' => $inp['class'],
			'inquiry_status' => $inp['inquiry_status'],
			'department' => $inp['department'],
			'remarks' => $inp['remarks']
		];
		$insert_query = $this->db->insert('inquiry_form', $arr);
		return true;
	}
	function viewInquiryForm() {
		return $this->db->where("status !=", 'deleted')->get('inquiry_form')->result();
	}	
	function delInquiryForm($del) {
		return $this->db->set('status', 'deleted')
				->where('inquiry_id',$del)
				->update('inquiry_form');
	}
	function viewinquirytrash() {
		return $this->db->where("status", 'deleted')->get('inquiry_form')->result();
	} 
	function removeInquiryFromTrash($id) {
		return $this->db->set('status', 'restored')
				->where('inquiry_id',$id)
				->update('inquiry_form');
	}
	function deleteInquiry($del) {
	return $this->db->where('inquiry_id', $del)
						->delete('inquiry_form');	
	}
	function editInquiry($id) {
		return $this->db->where('inquiry_id',$id)->limit(1)->get('inquiry_form')->result();

	}
	function updateInquiryForm($inp) {
		$Date = date("Y-m-d");
		$time =  date("H:i");
		// echo $startDate;
		$id = $inp['inquiry_id'];
		$arr = [
				'inquiry_id' => $id,
				'date' => $Date,
				'time' => $time,
				'remarks' => $inp['remarks']
			];
		$arr2 =[
			'remarks' => $inp['remarks']
		];
		$this->db->set($arr2)->where('inquiry_id',$id)->update('inquiry_form');
		return $this->db->insert('inquiry_col',$arr);
	}

	// end Inquiry Form procedure
	// start inquirt col procedure 
	function viewinquirycol($id){
		return $this->db->where('inquiry_id',$id)->order_by('col_id','desc')->get('inquiry_col')->result();

	}
	// end inquirt col procedure 
	// capital procedure start
	function viewcapital() {
		return $this->db->where("status !=", 'deleted')->get('capital')->result();
	}
	function addcapital($inputs) {
		$startDate = date("Y-m-d", strtotime($inputs['date']));

		$arr = [
			'date' => $startDate,
			'capital_amount' => $inputs['capital_amount'],
			'remarks' => $inputs['remarks']
		];
		$insert_query = $this->db->insert('capital', $arr);
		return true;
	}
	function delcapital($deleteid) {
		return $this->db->set('status', 'deleted')
				->where('capital_id',$deleteid)
				->update('capital');
	}
	function getCapitalTrash() {
		return $this->db->where("status", 'deleted')->get('capital')->result();		
	}
	function restoreCapitalFromTrash($id) {
		return $this->db->set('status', 'restored')
				->where('capital_id',$id)
				->update('capital');
	}
	function removeCapital($id) {
		return $this->db->where('capital_id', $deleteid)
						->delete('capital');
	}
	function editCapital($id) {
		return $this->db->where('capital_id',$id)->get('capital')->result();

	}
	function updatecapital($inp) {
		$startDate = date("Y-m-d", strtotime($inp['date']));
		$arr = [
				'date' => $startDate,
				'capital_amount' => $inp['capital_amount'],
				'remarks' => $inp['remarks']
			];
		$id = $inp['capital_id'];
		return $this->db->set($arr)
				->where('capital_id',$id)
				->update('capital');
	}
	// capital procedure end
	// fee slip procedure start
	function viewStudentForFees(){
		return $this->db->get('student')->result();
	}
	// function getfeedata($id) {
	// 	return $this->db->where('student_id',$id)->get('student')->result();
	// }

	// user sms procedure start
	function viewUsers($id) {
		return $this->db->where('user_id !=',$id)->get('users')->result();
	}
	function sendMsg($inp){
		$arr = [
			'user_id'=>$inp['faculty'],
			'msg'=>$inp['msg'],
			'date' =>date("Y-m-d"),
			'time'=>date("H:i")
		];
		return $this->db->insert('sms',$arr);
	}
	function viewMsg($id,$role){
		if($role == 'admin'){
			
			return $this->db->order_by('time','desc')->get('sms')->result();
		} else {
			return $this->db->where('user_id',$id)->order_by('time','desc')->get('sms')->result();
		}
	}
	function updateMsg($id) {
	
		return $this->db->set('status','complete')->where('sms_id',$id)->update('sms');
	}
	function viewAllUsers($id){
		$user = $this->db->order_by('time','desc')->get('sms')->result();
		for($i=0;$i < sizeof($user); $i++){
			$usrid = $user[$i]->user_id;
			$data[] = $this->db->select('t1.user_name')
				     ->from('users as t1')
				     ->where('t1.user_id', $usrid)
				     ->join('sms as t2', 't1.user_id = t2.user_id','LEFT')
				     ->get()->result();
		}
		return $data;
	}
	// search by Date procedure start
	function searchDate($to,$from,$param1) {
		if($param1 == 'inquiry') {
			$endDate = date("Y-m-d", strtotime($to));
			$startDate = date("Y-m-d", strtotime($from));
			return $this->db->query("SELECT * FROM inquiry_form WHERE `date` BETWEEN '$startDate' AND '$endDate'")->result();
		} else if($param1 == 'registration') {
			$endDate = date("Y-m-d", strtotime($to));
			$startDate = date("Y-m-d", strtotime($from));
			return $this->db->query("SELECT * FROM registration WHERE `r_student_currentdate` BETWEEN '$startDate' AND '$endDate'")->result();
		} else if($param1 == 'admission'){
			$endDate = date("Y-m-d", strtotime($to));
			$startDate = date("Y-m-d", strtotime($from));
			return $this->db->query("SELECT * FROM admission WHERE `a_student_currentdate` BETWEEN '$startDate' AND '$endDate'")->result();
		} else if($param1 == 'expense') {
			$endDate = date("Y-m-d", strtotime($to));
			$startDate = date("Y-m-d", strtotime($from));
			return $this->db->query("SELECT * FROM monthly_expense WHERE `expense_date` BETWEEN '$startDate' AND '$endDate'")->result();
		}
	}
	function msgcount($role,$id){
		if($this->session->userdata('role') == 'admin'){
			$query = $this->db->query('SELECT * FROM `sms` WHERE status = "pending"');
			return $query->num_rows();
		} else {
			$id = $this->session->userdata('id');
			$query = $this->db->query("SELECT * FROM `sms` WHERE user_id = '$id' AND status ='pending'");
			return $query->num_rows(); 
		}
	}
}

?>