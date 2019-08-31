<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('adminmodel');
		$this->load->model('monthlyModel');
	}
	public function index()
	{
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			$currentMonthCapital = $this->monthlyModel->viewCurrentMonthCapital();
			$currentMonthAdmissions = $this->monthlyModel->viewCurrentMonthAdmissions();
			// $currentMonthInquiries = $this->monthlyModel->viewCurrentMonthInquiries();
			$currentMonthTarget = $this->monthlyModel->viewCurrentMonthTarget();
			if(empty($currentMonthTarget)){
				$currentMonthTarget = 0;
			}
			// print_r($currentMonthTarget);
			$getDepartment = $this->adminmodel->viewDepartment();
				$classarr = array();
				$sourcearr = array();
				$departmentarr = array();
				$inquiryStatusarr = array();
				$totalDepartmentFromAdmission = array();
				// for($i = 0; $i < sizeof($currentMonthInquiries); $i++){
				// 	array_push($classarr, $currentMonthInquiries[$i]->class);
				// 	array_push($departmentarr, $currentMonthInquiries[$i]->department);
				// 	array_push($sourcearr, $currentMonthInquiries[$i]->source);
				// 	array_push($inquiryStatusarr, $currentMonthInquiries[$i]->inquiry_status);
				// }
					if($this->input->post()){
						$inp = $this->input->post();
						$to = $inp['todate'];
						$from = $inp['from_date'];
						$param = 'inquiry';
					$data = $this->adminmodel->searchDate($to,$from,$param);
					$getData = $this->adminmodel->viewInquiryForm();
					} else {
			$currentMonthInquiries = $this->monthlyModel->viewCurrentMonthInquiries();
						
						for($i = 0; $i < sizeof($currentMonthInquiries); $i++){
							array_push($classarr, $currentMonthInquiries[$i]->class);
							array_push($departmentarr, $currentMonthInquiries[$i]->department);
							array_push($sourcearr, $currentMonthInquiries[$i]->source);
							array_push($inquiryStatusarr, $currentMonthInquiries[$i]->inquiry_status);
						}
					}
				for($i = 0; $i < sizeof($getDepartment); $i++){
					array_push($totalDepartmentFromAdmission, $getDepartment[$i]->department_id);
				}

				$getClassArrData = $this->adminmodel->viewArrays($classarr, 'class');
				$getDepartmentArrData = $this->adminmodel->viewArrays($departmentarr, 'department');
				$getSourceArrData = $this->adminmodel->viewArrays($sourcearr, 'source');
				$getInqStatusArrData = $this->adminmodel->viewArrays($inquiryStatusarr, 'inqStatus');

				$getDepartmentAdmissionArrData = $this->adminmodel->viewArrays($totalDepartmentFromAdmission, 'departmentAdmission');
				
				
				if($this->input->post()){
					$parameters = [
					'currentCapital' => $currentMonthCapital, 
					'currentAdmissions' => $currentMonthAdmissions,
					'currentTarget' => $currentMonthTarget,
					'search_data' => $data,
					// 'currentInquiries' => $currentMonthInquiries,
					'class' => $getClassArrData,
					'department' => $getDepartmentArrData,
					'source' => $getSourceArrData,
					'inqstatus' => $getInqStatusArrData,
					'allDepartments' => $getDepartment,
					'departmentAdmission' => $getDepartmentAdmissionArrData,
				];	
				} else {
					$parameters = [
					'currentCapital' => $currentMonthCapital, 
					'currentAdmissions' => $currentMonthAdmissions,
					'currentTarget' => $currentMonthTarget,
					'search_data' => '0',
					
					'currentInquiries' => $currentMonthInquiries,
					'class' => $getClassArrData,
					'department' => $getDepartmentArrData,
					'source' => $getSourceArrData,
					'inqstatus' => $getInqStatusArrData,
					'allDepartments' => $getDepartment,
					'departmentAdmission' => $getDepartmentAdmissionArrData,
				];
				}

				$this->load->view('Dashboard/index', $parameters);
		}
	}

	public function signup(){
		$inputs = $this->input->post();
		if($query = $this->adminmodel->login($inputs)){
			$name = $query[0]->user_name;
			$pic = $query[0]->user_picture;
			$position = $query[0]->position;
			$role = $query[0]->user_role;
			$id = $query[0]->user_id;
			$email = $query[0]->user_email;
			$count = $this->adminmodel->msgcount($role,$id);
			$viewmsg = $this->adminmodel->viewMsg($id,$role);

			$newdata = array( 
			   'name'  => $name, 
			   'pic'     => $pic, 
			   'position'     => $position, 
			   'role'     => $role, 
			   'id'     => $id,
			   'email' => $email,
			   'lastmsg' => $viewmsg,
			   'count' =>$count,
			);  
			$this->session->set_userdata($newdata);

			if( date('d') == 31 || (date('m') == 1 && date('d') > 28)){
			    $date = strtotime('last day of next month');
			} else {
			    $date = strtotime('+1 months');
			}

			$nextmonth = date('Y-m-d', $date);

			$admission = $this->db->where('trash_status !=' ,'deleted')->get('admission')->result();
			for($i = 0; $i < sizeof($admission); $i++){
				$due =  $admission[$i]->a_student_duedate;
				 $date_now = date("Y-m-d"); // this format is string comparable
				if ($date_now >= $due) {
					$upaddmission = $this->db->set(['a_student_duedate'=> $nextmonth, 'a_payment'=>'paid but remaining'])->where('a_student_id', $admission[$i]->a_student_id)->update('admission');
				    	$id = $admission[$i]->a_student_id;
				    	$monthlyfee = $admission[$i]->a_student_monthly_fees;
				    	$fee_form_record = $this->db->query("SELECT * FROM fee_form WHERE admission_id = $id LIMIT 1")->result_array();
				    	$name = $fee_form_record[0]['student_name'];
				    	$date = date("Y-m-d");
						date_default_timezone_set('Asia/Karachi');
						$time =  date("h:i:s");
				    	$insertparams = array(
				    		'student_name' => $name,
				    		'admission_id' => $id,
				    		'total_fee' => 0,
				    		'pending_fee' => $monthlyfee,
				    		'date' => $date,
				    		'time' => $time,
				    		'remarks' => '',
				    		'other_fee' => 0,
				    		'certification_fee' => 0,
				    		'late_fee' => 0,
				    		'notes_fee' => 0,
				    	);
				    	$this->db->insert('fee_form', $insertparams);
				} else{
				    // echo 'Less than';
				}
			}
			redirect('Welcome/index');
			// print_r($query);
		}
	} 

	public function logout(){
		if($this->adminmodel->logout()){
			redirect('Welcome/index');
		}
	}

	public function editor($param1){
		if($this->input->post()){
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('userfile'))
                {
                	echo "Sorry";
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    $image_url =  base_url('uploads/' . $this->upload->data('file_name'));
                    $inputs = $this->input->post();
                	if($this->adminmodel->addEditor($inputs, $image_url)){
                		redirect('Welcome/editor/view');
                	} else {
                		echo "ok";
                	}
                }
                    // 12-hour time to 24-hour time 
		} else {
			if(!$this->session->userdata('name')){
				$this->load->view('Dashboard/signup');
			} else {
				if($param1 == 'add'){
					$this->load->view('Dashboard/add-editor', ['page_status'=> 'add']);
				} else if($param1 == 'view') {
					$query = $this->adminmodel->viewEditor();
					$this->load->view('Dashboard/add-editor', ['page_status'=> 'view', 'data' => $query]);
				} else if ($param1 == 'delete'){
					$id = $this->input->get('userid');
					$query = $this->adminmodel->deleteEditor($id);
					if($query){
						echo "ok";
					}
				}
			}
		}
	}
	public function alltask($param1){
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view'){
					$id = $this->session->userdata('id');
					$role = $this->session->userdata('role');
					$getmsg = $this->adminmodel->viewMsg($id,$role);
					$getUsers = $this->adminmodel->viewAllUsers($id);
					// print_r($getUsers);
					$this->load->view('dashboard/alltask', ['page_status' => 'view','data'=>$getmsg,'user'=>$getUsers]);
			} else if ($param1 == 'add'){
				$id = $this->session->userdata('id');
				$getUsers = $this->adminmodel->viewUsers($id);
				$this->load->view('dashboard/alltask', ['page_status' => 'add','getUsers'=>$getUsers]);
			} else if($param1 == 'send') {
				if($input = $this->input->post()) {
					if($this->adminmodel->sendMsg($input)) {
						redirect('Welcome/alltask/view');
					} else {
						echo "not";
					}
				}
			} else {
				
				$user_id = $param1;
				if($this->adminmodel->updateMsg($user_id)){
				$id = $this->session->userdata('id');
				$role = $this->session->userdata('role');
				$getmsg = $this->adminmodel->viewMsg($id,$role);
				$getUsers = $this->adminmodel->viewUsers($id);
					$this->load->view('dashboard/alltask',['page_status'=>'view','data'=>$getmsg,'user'=>$getUsers]);
				}

			}
		}
	}
	public function classes($param1) {
		if(!$this->session->userdata('name')) {
			$this->load->view('Dashboard/signup');
		} else {
		
			if($param1 == 'view'){
				$query = $this->adminmodel->viewClass();
				$this->load->view('dashboard/classes', ['page_status' => 'view', 'page_data' => $query]);

			} else if ($param1 == 'add'){
				if($input = $this->input->post()) {
					if($this->adminmodel->addClass($input)) {
						redirect('Welcome/classes/view');
					} else {
						echo "not";
					}
				}
			} else if($param1 == 'delete') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delClass($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'remove') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->removeClass($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'viewTrash'){
				$page_data = $this->adminmodel->getTrash();
				$this->load->view('dashboard/classes', ['page_status' => 'viewTrash','page_data'=>$page_data]);
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('userid');
				$query = $this->adminmodel->removeFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'update') {
				$input = $this->input->post();
				$query = $this->adminmodel->updateClass($input);
				if($query) {
					redirect('Welcome/classes/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				$query = $this->adminmodel->editclass($id);
				$this->load->view('dashboard/classes', ['page_status' => 'edit','id'=>$id, 'query' =>$query]);
			}
		}
	}
	public function department($param1) {
		if(!$this->session->userdata('name')) {
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view'){
				$query = $this->adminmodel->viewDepartment();
				$this->load->view('dashboard/department', ['page_status' => 'view', 'page_data' => $query]);

			} else if ($param1 == 'add'){
				if($input = $this->input->post()) {
					if($this->adminmodel->addDepartment($input)) {
						redirect('Welcome/department/view');
					} else {
						echo "not";
					}
				}
			} else if($param1 == 'delete') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delDepartment($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			 } else if($param1 == 'remove') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->removeDepartment($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			 } else if($param1 == 'viewTrash'){
				$page_data = $this->adminmodel->viewTrash();
				$this->load->view('dashboard/department', ['page_status' => 'viewTrash','page_data'=>$page_data]);
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('userid');
				$query = $this->adminmodel->removeDepartmentFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'update') {
				$input = $this->input->post();
				$query = $this->adminmodel->updateDepartment($input);
				if($query) {
					redirect('Welcome/department/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				$query = $this->adminmodel->editDepartment($id);
				$this->load->view('dashboard/department', ['page_status' => 'edit','id'=>$id, 'query' =>$query]);
			} 
		}
	}
	

	public function faculty($param1) {
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view'){
				$query = $this->adminmodel->viewFaculty();
				$this->load->view('dashboard/faculty', ['page_status' => 'view','page_data'=>$query]);
			} else if ($param1 == 'add'){
				if($input = $this->input->post()) {
					
					$config['upload_path']          = './uploads/faculty_signature/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $this->load->library('upload', $config);
	                if (!$this->upload->do_upload('userfile'))
	                {
	                	echo "Sorry";
	                }
	                else
	                {
	                    $data = array('upload_data' => $this->upload->data());
	                    $image_url =  base_url('uploads/faculty_signature/' . $this->upload->data('file_name'));
	                    $inputs = $this->input->post();
	                	if($this->adminmodel->addFaculty($inputs, $image_url)){
	                		redirect('Welcome/faculty/view');
	                	} else {
	                		echo "ok";
	                	}
	                }
				}
			} else if($param1 == 'delete') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delFaculty($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'permanentdel') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delParmanentFaculty($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'viewTrash'){
				$page_data = $this->adminmodel->viewFacultyTrash();
				$this->load->view('dashboard/faculty', ['page_status' => 'viewTrash','page_data'=>$page_data]);
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('userid');
				$query = $this->adminmodel->removeFacultyFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'update') {
				$config['upload_path']          = './uploads/faculty_signature/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $this->load->library('upload', $config);
				$input = $this->input->post();
				if(!$this->upload->do_upload('userfile')) {
					$name = $input['faculty_name'];
					$id = $input['faculty_id'];
					$pic = '';
					$query = $this->adminmodel->updateFaculty($name,$pic,$id);
				} else {
					$name = $input['faculty_name'];
					$pic = $input['userfile'];
					$id = $input['faculty_id'];
					$data = array('upload_data' => $this->upload->data());
	                    $image_url =  base_url('uploads/faculty_signature/' . $this->upload->data('file_name'));
					$query = $this->adminmodel->updateFaculty($name,$image_url,$id);
				}
				if($query) {
					redirect('Welcome/faculty/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				$query = $this->adminmodel->editFaculty($id);
				$this->load->view('dashboard/faculty', ['page_status' => 'edit','id'=>$id, 'query' =>$query]);
			} 
		}
	}

	public function batchdays($param1) {
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view'){
				$query = $this->adminmodel->viewBatchDays();
				$this->load->view('dashboard/batchdays', ['page_status' => 'view','page_data'=>$query]);
		 	} else if ($param1 == 'add'){
				if($input = $this->input->post()) {
	                    $inputs = $this->input->post();
	                	if($this->adminmodel->addBatchDays($inputs)){
	                		redirect('Welcome/batchdays/view');
	                	} else {
	                		echo "ok";
	                	}
	                }
			} else if($param1 == 'delete') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delBatchDays($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'viewTrash'){
				$page_data = $this->adminmodel->viewBatchDaysTrash();
				$this->load->view('dashboard/batchdays', ['page_status' => 'viewTrash','page_data'=>$page_data]);
			} else if($param1 == 'permanentdel'){
				$deleteid = $this->input->get('userid');
				// print_r($deletedid);
				$query = $this->adminmodel->permenenbatchdaysdel($deleteid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('userid');
				$query = $this->adminmodel->removeBatchDaysFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'update') {
				$input = $this->input->post();
				$query = $this->adminmodel->updateBatchDays($input);
				if($query) {
					redirect('Welcome/batchdays/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				$query = $this->adminmodel->editBatchDays($id);
				$this->load->view('dashboard/batchdays', ['page_status' => 'edit','id'=>$id, 'query' =>$query]);
			} 
		}
	}

	public function batchCode($param1){
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view'){
				$getData = $this->adminmodel->viewBatchCode();
				if(is_null($getData)){
					$getData = Array();
				}
				$classarr = array();
				$departmentarr = array();
				$daysarr = array();
				$teacherarr = array();
				for($i = 0; $i < sizeof($getData); $i++){
					array_push($classarr, $getData[$i]->class);
					array_push($departmentarr, $getData[$i]->department);
					array_push($daysarr, $getData[$i]->batch_days);
					array_push($teacherarr, $getData[$i]->teacher);
				}
				$getClassArrData = $this->adminmodel->viewArrays($classarr, 'class');
				$getDepartmentArrData = $this->adminmodel->viewArrays($departmentarr, 'department');
				$getDaysArrData = $this->adminmodel->viewArrays($daysarr, 'days');
				$getTeacherArrData = $this->adminmodel->viewArrays($teacherarr, 'teacher');
				// print_r($getDepartmentArrData);
				$this->load->view('Dashboard/batch-code', ['page_status' => 'view', 'data' => $getData, 'class' => $getClassArrData, 'department' => $getDepartmentArrData, 'days' => $getDaysArrData, 'teacher' => $getTeacherArrData]);

			} else if($param1 == 'delete'){
				$deleteid = $this->input->get('batchid');
				$query = $this->adminmodel->delBatch($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'add'){
				$getClass = $this->adminmodel->viewClass();
				$getDepartment = $this->adminmodel->viewDepartment();
				$getFaculty = $this->adminmodel->viewFaculty();
				$getDays = $this->adminmodel->viewBatchDays();
				$getData = '';
				$this->load->view('Dashboard/batch-code', ['page_status' => 'add', 'data' => $getData, 'class' => $getClass, 'department' => $getDepartment, 'faculty' => $getFaculty, 'days' => $getDays]);
			} else if($param1 == 'insert'){
				$inputs = $this->input->post();
				$query = $this->adminmodel->insertBatch($inputs);
				if($query){
					redirect('Welcome/batchCode/view');
				}
			} else if($param1 == 'viewTrash') {
				$getData = $this->adminmodel->viewBatchCodeTrash();
				if(is_null($getData)){
					$getData = Array();
				}
				$classarr = array();
				$departmentarr = array();
				$daysarr = array();
				$teacherarr = array();
				for($i = 0; $i < sizeof($getData); $i++){
					array_push($classarr, $getData[$i]->class);
					array_push($departmentarr, $getData[$i]->department);
					array_push($daysarr, $getData[$i]->batch_days);
					array_push($teacherarr, $getData[$i]->teacher);
				}
				$getClassArrData = $this->adminmodel->viewArrays($classarr, 'class');
				$getDepartmentArrData = $this->adminmodel->viewArrays($departmentarr, 'department');
				$getDaysArrData = $this->adminmodel->viewArrays($daysarr, 'days');
				$getTeacherArrData = $this->adminmodel->viewArrays($teacherarr, 'teacher');
				// echo "<pre>";
				// print_r($data);
				$this->load->view('Dashboard/batch-code', ['page_status' =>'viewTrash','page_data'=>$getData, 'class' => $getClassArrData, 'department' => $getDepartmentArrData, 'days' => $getDaysArrData, 'teacher' => $getTeacherArrData]);
			} else if($param1 == 'remove'){
				$deleteid = $this->input->get('batchid');
				// print_r($deleteid);
				$query = $this->adminmodel->removeBatchCode($deleteid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('batchid');
				$query = $this->adminmodel->removeBatchFromTrash($trashid);
				if($query) {
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'update') {
				$input = $this->input->post();
				$query = $this->adminmodel->updateBatchCode($input);
				if($query) {
					redirect('Welcome/batchcode/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				// echo $id;
				$query = $this->adminmodel->editBatchCode($id);
				// print_r($query);
				$getClass = $this->adminmodel->viewClass();
				$getDepartment = $this->adminmodel->viewDepartment();
				$getFaculty = $this->adminmodel->viewFaculty();
				$getDays = $this->adminmodel->viewBatchDays();
				$this->load->view('dashboard/batch-code', ['page_status' => 'edit','id'=>$id, 'query' =>$query,'class'=>$getClass,'department'=>$getDepartment,'faculty'=>$getFaculty,'batchdays'=>$getDays]);
			}
		}	
	}
	public function viewStudent($param1) {
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			$batch_code = $param1;
			// print_r($batch_code);
			// $query = $this->adminmodel->viewAdmission(0);
			$batch_data = $this->adminmodel->getStudentByBatchCode($batch_code);
			if(empty($batch_data)){
				$batch_data = 0;
			}

			$data = $this->adminmodel->getstuadmission($batch_data);
			if(empty($data)){
				$data = 0;
			}
			$this->load->view('dashboard/admission',['page_status'=>'view_student','data'=>$batch_data,'stdata'=>$data,'search_data'=>'0']);
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
		}
	}
	public function source($param1) {
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view'){
				$query = $this->adminmodel->viewsource();
				$this->load->view('dashboard/source', ['page_status' => 'view','page_data'=>$query]);
		 	} else if ($param1 == 'add'){
				if($input = $this->input->post()) {
	                    $inputs = $this->input->post();
	                	if($this->adminmodel->addsource($inputs)){
	                		redirect('Welcome/source/view');
	                	} else {
	                		echo "ok";
	                	}
	                }
			} else if($param1 == 'delete') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delsource($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'viewTrash'){
				$page_data = $this->adminmodel->getsourcetrash();
				$this->load->view('dashboard/source', ['page_status' => 'viewTrash','page_data'=>$page_data]);
			} else if($param1 == 'remove'){
				$deleteid = $this->input->get('userid');
				// print_r($deletedid);
				$query = $this->adminmodel->removesource($deleteid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('userid');
				$query = $this->adminmodel->removesourceFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'update') {
				$input = $this->input->post();
				$query = $this->adminmodel->updatesource($input);
				if($query) {
					redirect('Welcome/source/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				$query = $this->adminmodel->editsource($id);
				$this->load->view('dashboard/source', ['page_status' => 'edit','id'=>$id, 'query' =>$query]);
			} 
		}
	}
	// end source procedure

	// start inquiy_status procedure
	public function inquiry_status($param1) {
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view'){
				$query = $this->adminmodel->viewinquirystatus();
				$this->load->view('dashboard/inquiry_status', ['page_status' => 'view','page_data'=>$query]);
		 	} else if ($param1 == 'add'){
				if($input = $this->input->post()) {
	                    $inputs = $this->input->post();
	                	if($this->adminmodel->addinquirystatus($inputs)){
	                		redirect('Welcome/inquiry_status/view');
	                	} else {
	                		echo "ok";
	                	}
	                }
			} else if($param1 == 'delete') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delinquirystatus($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'viewTrash'){
				$page_data = $this->adminmodel->getinquirystatustrash();
				$this->load->view('dashboard/inquiry_status', ['page_status' => 'viewTrash','page_data'=>$page_data]);
			} else if($param1 == 'remove'){
				$deleteid = $this->input->get('userid');
				// print_r($deletedid);
				$query = $this->adminmodel->removeinquirystatus($deleteid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('userid');
				$query = $this->adminmodel->removeinquirystatusFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'update') {
				$input = $this->input->post();
				$query = $this->adminmodel->updateinquirystatus($input);
				if($query) {
					redirect('Welcome/inquiry_status/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				$query = $this->adminmodel->editinquirystatus($id);
				$this->load->view('dashboard/inquiry_status', ['page_status' => 'edit','id'=>$id, 'query' =>$query]);
			} 
		}
	}
	public function religion($param1) {
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view'){
				$query = $this->adminmodel->viewreligion(0);
				$this->load->view('dashboard/religion', ['page_status' => 'view','page_data'=>$query]);
		 	} else if ($param1 == 'add'){
				if($input = $this->input->post()) {
	                    $inputs = $this->input->post();
	                	if($this->adminmodel->addreligion($inputs)){
	                		redirect('Welcome/religion/view');
	                	} else {
	                		echo "ok";
	                	}
	                }
			} else if($param1 == 'delete') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delreligion($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'viewTrash'){
				$page_data = $this->adminmodel->getreligiontrash();
				$this->load->view('dashboard/religion', ['page_status' => 'viewTrash','page_data'=>$page_data]);
			} else if($param1 == 'remove'){
				$deleteid = $this->input->get('userid');
				// print_r($deletedid);
				$query = $this->adminmodel->removereligion($deleteid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('userid');
				$query = $this->adminmodel->removereligionFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'update') {
				$input = $this->input->post();
				$query = $this->adminmodel->updatereligion($input);
				if($query) {
					redirect('Welcome/religion/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				$query = $this->adminmodel->editreligion($id);
				$this->load->view('dashboard/religion', ['page_status' => 'edit','id'=>$id, 'query' =>$query]);
			} 
		}
	}
	// end religion procedure
	// start education procedure
	public function education($param1) {
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view'){
				$query = $this->adminmodel->vieweducation(0);
				$this->load->view('dashboard/education', ['page_status' => 'view','page_data'=>$query]);
		 	} else if ($param1 == 'add'){
				if($input = $this->input->post()) {
	                    $inputs = $this->input->post();
	                	if($this->adminmodel->addeducation($inputs)){
	                		redirect('Welcome/education/view');
	                	} else {
	                		echo "ok";
	                	}
	                }
			} else if($param1 == 'delete') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->deleducation($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'viewTrash'){
				$page_data = $this->adminmodel->geteducationtrash();
				$this->load->view('dashboard/education', ['page_status' => 'viewTrash','page_data'=>$page_data]);
			} else if($param1 == 'remove'){
				$deleteid = $this->input->get('userid');
				// print_r($deletedid);
				$query = $this->adminmodel->removeeducation($deleteid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('userid');
				$query = $this->adminmodel->removeeducationFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'update') {
				$input = $this->input->post();
				$query = $this->adminmodel->updateeducation($input);
				if($query) {
					redirect('Welcome/education/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				$query = $this->adminmodel->editeducation($id);
				$this->load->view('dashboard/education', ['page_status' => 'edit','id'=>$id, 'query' =>$query]);
			} 
		}
	}
	// end education procedure

	// start inquiry_form procedure
	public function inquiry_form($param1){
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view'){
				$getData = $this->adminmodel->viewInquiryForm();
				$classarr = array();
				$departmentarr = array();
				$inquirystatusarr = array();
				$sourcestatusarr = array();
				// $teacherarr = array();
				for($i = 0; $i < sizeof($getData); $i++){
					array_push($classarr, $getData[$i]->class);
					array_push($departmentarr, $getData[$i]->department);
					array_push($inquirystatusarr, $getData[$i]->inquiry_status);
					array_push($sourcestatusarr, $getData[$i]->source);
				}
				$getClassArrData = $this->adminmodel->viewArrays($classarr, 'class');
				$getDepartmentArrData = $this->adminmodel->viewArrays($departmentarr, 'department');
				$getInquiryArrData = $this->adminmodel->viewArrays($inquirystatusarr, 'inqStatus');
				$getSourceArrData = $this->adminmodel->viewArrays($sourcestatusarr, 'source');

				$this->load->view('Dashboard/inquiry_form', ['page_status' => 'view', 'data' => $getData,'search_data'=>'0', 'class' => $getClassArrData, 'department' => $getDepartmentArrData,'inquiry_status'=>$getInquiryArrData,'source'=>$getSourceArrData]);
			} 
			else if($param1 == 'delete'){
				$deleteid = $this->input->get('id');
				$query = $this->adminmodel->delInquiryForm($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'remove') {
				$deleteid = $this->input->get('id');
				$query = $this->adminmodel->deleteInquiry($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'viewTrash'){
				$getData = $this->adminmodel->viewinquirytrash();
				$classarr = array();
				$departmentarr = array();
				$inquirystatusarr = array();
				// $teacherarr = array();
				for($i = 0; $i < sizeof($getData); $i++){
					array_push($classarr, $getData[$i]->class);
					array_push($departmentarr, $getData[$i]->department);
					array_push($inquirystatusarr, $getData[$i]->inquiry_status);
				}
				$getClassArrData = $this->adminmodel->viewArrays($classarr, 'class');
				$getDepartmentArrData = $this->adminmodel->viewArrays($departmentarr, 'department');
				$getInquiryArrData = $this->adminmodel->viewArrays($inquirystatusarr, 'inqStatus');
				$this->load->view('dashboard/inquiry_form', ['page_status' => 'viewTrash','page_data'=>$getData, 'class' => $getClassArrData, 'department' => $getDepartmentArrData,'inquiry_status'=>$getInquiryArrData]);
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('id');
				$query = $this->adminmodel->removeInquiryFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			}
			 else if($param1 == 'add'){
				$getClass = $this->adminmodel->viewClass();
				$getDepartment = $this->adminmodel->viewDepartment();
				$getFaculty = $this->adminmodel->viewFaculty();
				$getInquiryStatus = $this->adminmodel->viewinquirystatus();
				$getsource = $this->adminmodel->viewsource();
				$getData = '';
				$this->load->view('Dashboard/inquiry_form', ['page_status' => 'add', 'data' => $getData, 'class' => $getClass, 'department' => $getDepartment, 'faculty' => $getFaculty,'inquiry_status' => $getInquiryStatus,'source'=>$getsource]);
			} else if($param1 == 'insert') {
				if($input = $this->input->post()) {
					if($this->adminmodel->addInquiryForm($input)) {
						redirect('Welcome/inquiry_form/view');
					} else {
						echo "not";
					}
				}
			} else if($param1 == 'update') {
				$input = $this->input->post();
				$query = $this->adminmodel->updateInquiryForm($input);
				if($query) {
					redirect('Welcome/inquiry_form/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				$query = $this->adminmodel->editInquiry($id);
				$getClass = $this->adminmodel->viewClass();
				$getDepartment = $this->adminmodel->viewDepartment();
				$getFaculty = $this->adminmodel->viewFaculty();
				$getInquiryStatus = $this->adminmodel->viewinquirystatus();
				$getsource = $this->adminmodel->viewsource();
				$view_inquiry_remarks = $this->adminmodel->viewinquirycol($id);
				$this->load->view('dashboard/inquiry_form', ['page_status' => 'edit','id'=>$id, 'query' =>$query,'class'=>$getClass,'department'=>$getDepartment,'faculty'=>$getFaculty,'inquiry_status'=>$getInquiryStatus,'source'=>$getsource,'inquiry_remarks'=>$view_inquiry_remarks]);
			} 
		}
	}

	public function registration($param1){
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view'){
				$getData = $this->adminmodel->viewRegistration(0);
					$educationarr = array();
					for($i = 0; $i < sizeof($getData); $i++){
						array_push($educationarr, $getData[$i]->r_student_currentedu);
					}
					$getCurrentEducationArrData = $this->adminmodel->viewArrays($educationarr, 'education');

			$this->load->view('Dashboard/registration', ['page_status' => 'view', 'data' => $getData, 'currentedu' => $getCurrentEducationArrData,'search_data'=>'0']);

			} else if($param1 == 'add'){
			 	if($this->input->post()){
			 		if($this->adminmodel->addRegistration($this->input->post())){
			 			redirect('Welcome/registration/view');
			 		}
			 	} else {
			 		$getreligion = $this->adminmodel->viewreligion(0);
					$geteducation = $this->adminmodel->vieweducation(0);
					$getData = '';
					$this->load->view('Dashboard/registration', ['page_status' => 'add', 'data' => $getData, 'religion' => $getreligion, 'education' =>$geteducation,'last_edu'=>$geteducation]);
			 	}
			} else if($param1 == 'delete') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delregistration($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 =='viewTrash') {
				$getTrashData = $this->adminmodel->viewTrashRegistration();
				if(!empty($getTrashData)){
					$currentedu = $this->adminmodel->vieweducation($getTrashData[0]->r_student_currentedu);
				} else {
					$getTrashData = 0;
					$currentedu = 0;
				}

				$this->load->view('Dashboard/registration',['page_status'=>'viewTrash','data'=>$getTrashData, 'currentedu' => $currentedu]);
			} else if($param1 == 'remove') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delParmanentRegistration($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('userid');
				$query = $this->adminmodel->removeRegistrationFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'update'){
				$config['upload_path']          = './uploads/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $this->load->library('upload', $config);
				$input = $this->input->post();
				if(!$this->upload->do_upload('upload_image')) {
					$arr =  [
						'r_student_name' => $input['r_student_name'],
						'r_student_fathername' => $input['r_student_fathername'],
						'r_student_mobileno' => $input['r_student_mobileno'],
						'r_student_fatherno' => $input['r_student_fatherno'],
						'r_student_emergencyno' => $input['r_student_emergencyno'],
						'r_student_whatsappno' => $input['r_student_whatsappno'],
						'r_student_dob' => $input['r_student_dob'],
						'r_student_gender' => $input['r_student_gender'],
						'r_student_maritalstat' => $input['r_student_maritalstat'],
						'r_student_cnic' => $input['r_student_cnic'],
						'r_student_nationality' => $input['r_student_nationality'],
						'r_student_religion' => $input['r_student_religion'],
						'r_student_lastedu' => $input['r_student_lastedu'],
						'r_student_currentedu' => $input['r_student_currentedu'],
						'r_student_address' => $input['r_student_address'],
						'r_student_currentdate' => $input['r_student_currentdate'],
						'r_student_currentdate' => $input['r_student_currentdate'],
					];
					
					$id = $input['r_student_id'];
					$pic = '';
					$query = $this->adminmodel->updateRegistration($arr,$pic,$id);
				} else {
					$arr =  [
						'r_student_name' => $input['r_student_name'],
						'r_student_fathername' => $input['r_student_fathername'],
						'r_student_mobileno' => $input['r_student_mobileno'],
						'r_student_fatherno' => $input['r_student_fatherno'],
						'r_student_emergencyno' => $input['idr_student_emergencyno'],
						'r_student_whatsappno' => $input['r_student_whatsappno'],
						'r_student_dob' => $input['r_student_dob'],
						'r_student_gender' => $input['r_student_gender'],
						'r_student_maritalstat' => $input['r_student_maritalstat'],
						'r_student_cnic' => $input['r_student_cnic'],
						'r_student_nationality' => $input['r_student_nationality'],
						'r_student_religion' => $input['r_student_religion'],
						'r_student_lastedu' => $input['r_student_lastedu'],
						'r_student_currentedu' => $input['r_student_currentedu'],
						'r_student_address' => $input['r_student_address'],
						'r_student_currentdate' => $input['r_student_currentdate'],
						'r_student_currentdate' => $input['r_student_currentdate'],
					];
					
					$id = $input['r_student_id'];
					$pic = $input['upload_image'];
					$data = array('upload_data' => $this->upload->data());
	                    $image_url =  base_url('uploads/' . $this->upload->data('file_name'));
					$query = $this->adminmodel->updateRegistration($arr,$image_url,$id);
				}
				if($query) {
					redirect('Welcome/registration/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				$query = $this->adminmodel->editRegistration($id);
				$lastedu = $this->adminmodel->vieweducation($query[0]->r_student_lastedu);
				$currentedu = $this->adminmodel->vieweducation($query[0]->r_student_currentedu);
				$religion = $this->adminmodel->viewreligion($query[0]->r_student_currentedu);
				$this->load->view('dashboard/registration', ['page_status' => 'edit','id'=>$id, 'query' =>$query, 'currentedu' => $currentedu, 'lastedu' => $lastedu, 'religion' => $religion]);
			}
		}
	}

	function viewRegistrationProfile($id){
		$profiledetails = $this->adminmodel->viewRegistration($id);
		$lastedu = $this->adminmodel->vieweducation($profiledetails[0]->r_student_lastedu);
		$currentedu = $this->adminmodel->vieweducation($profiledetails[0]->r_student_currentedu);
		$religion = $this->adminmodel->viewreligion($profiledetails[0]->r_student_currentedu);

	$this->load->view('Dashboard/profile', ['profiledetails' => $profiledetails, 'profile_status'=>'registration', 'currentedu' => $currentedu, 'lastedu' => $lastedu, 'religion' => $religion]);
	}
	function viewAdmissionProfile($id){
		$profile = $this->adminmodel->viewAdmission($id);
		$rid = $profile[0]->a_student_registration_id;
		$profiledetails = $this->adminmodel->getstuadmissiondel($rid);
		// print_r($profiledetails);
		$lastedu = $this->adminmodel->vieweducation($profiledetails[0]->r_student_lastedu);
		$currentedu = $this->adminmodel->vieweducation($profiledetails[0]->r_student_currentedu);
		$religion = $this->adminmodel->viewreligion($profiledetails[0]->r_student_currentedu);

	$this->load->view('Dashboard/profile', ['profiledetails' => $profiledetails,'studata'=>$profile,'profile_status'=>'admission', 'currentedu' => $currentedu, 'lastedu' => $lastedu, 'religion' => $religion]);
	}


	//admission
	public function admission($param1){
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view'){
				$query = $this->adminmodel->viewAdmission(0);
				$data = $this->adminmodel->getstuadmission($query);
				$this->load->view('dashboard/admission', ['page_status' => 'view','page_data'=>$query,'stu_data'=>$data,'search_data'=>'0']);

			} else if($param1 == 'add'){
			 	if($this->input->post()){
			 		// print_r($this->input->post());
			 		$userid = $this->session->userdata('id');
			 		$check = $this->adminmodel->addAdmission($this->input->post(),$userid);
			 		redirect('Welcome/admission/view');
			 	} else {
					$getRegistrationData = $this->adminmodel->viewRegistration(0);
					$faculty = $this->adminmodel->viewFaculty();
					$department = $this->adminmodel->viewDepartment();
					$class = $this->adminmodel->viewClass();
					$batch_code = $this->adminmodel->viewBatchCode();
				$classarr = array();
				$departmentarr = array();
				$daysarr = array();
				$teacherarr = array();
				for($i = 0; $i < sizeof($batch_code); $i++){
					array_push($classarr, $batch_code[$i]->class);
					array_push($departmentarr, $batch_code[$i]->department);
					array_push($daysarr, $batch_code[$i]->batch_days);
					array_push($teacherarr, $batch_code[$i]->teacher);
				}
				$getClassArrData = $this->adminmodel->viewArrays($classarr, 'class');
				$getDepartmentArrData = $this->adminmodel->viewArrays($departmentarr, 'department');
				$getDaysArrData = $this->adminmodel->viewArrays($daysarr, 'days');
				$getTeacherArrData = $this->adminmodel->viewArrays($teacherarr, 'teacher');
				$this->load->view('Dashboard/admission', ['page_status' => 'add', 'registrationData' => $getRegistrationData, 'faculty' => $faculty,'department' => $department, 'class' => $class,'batch_code'=>$batch_code, 'getClassArrData'=>$getClassArrData, 'getDepartmentArrData'=>$getDepartmentArrData, 'getDaysArrData'=>$getDaysArrData,'getTeacherArrData'=>$getTeacherArrData]);
			 	}
			} else if($param1 == 'delete') {
				$deleteid = $this->input->get('id');
				$query = $this->adminmodel->deladmission($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 =='viewTrash') {
				$page_data = $this->adminmodel->viewAdmisssionTrash();
				if(!empty($page_data)){
					$rid = $page_data[0]->a_student_registration_id;
					$profiledetails = $this->adminmodel->getstuadmissiondel($rid);
				} else {
					$page_data = 0;
					$profiledetails = 0;
				}
				$this->load->view('dashboard/admission', ['page_status' => 'viewTrash','page_data'=>$page_data,'data'=>$profiledetails]);
			} else if($param1 == 'remove') {
				$deleteid = $this->input->get('id');
				$query = $this->adminmodel->RemoveAdmission($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('id');
				$query = $this->adminmodel->removeAdmissionFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}	
			} else if($param1 == 'update'){
				$input = $this->input->post();
				$query = $this->adminmodel->updateAdmission($input);
				if($query) {
					redirect('Welcome/admission/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				$query = $this->adminmodel->editAdmission($id);
				$faculty = $this->adminmodel->viewFaculty();
				$department = $this->adminmodel->viewDepartment();
				$class = $this->adminmodel->viewClass();
				$this->load->view('dashboard/admission', ['page_status' => 'edit','id'=>$id, 'query' =>$query, 'faculty' => $faculty,'department' => $department, 'class' => $class]);
			}
		}
	}

	// zubair
	// monthly target
	public function monthlyTarget($param1) {
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view'){
				$query = $this->adminmodel->viewmonthlytarget();
				$this->load->view('dashboard/monthlytarget', ['page_status' => 'view','page_data'=>$query]);
			} else if ($param1 == 'add'){
				$getData = '';
				$this->load->view('Dashboard/monthlytarget', ['page_status' => 'add']);
			} else if($param1 == 'insert') {
				$inputs = $this->input->post();
				$query = $this->adminmodel->insertMonthTarget($inputs);
				if($query){
					redirect('Welcome/monthlytarget/view');
				}
			} else if($param1 == 'delete') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delmonthlytarget($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'permanentdel') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delParmanentmonthlytarget($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'viewTrash'){
				$page_data = $this->adminmodel->viewmonthlytargetTrash();
				$this->load->view('dashboard/monthlytarget', ['page_status' => 'viewTrash','page_data'=>$page_data]);
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('userid');
				$query = $this->adminmodel->removemonthlytargetFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'update') {
				$input = $this->input->post();
				$query = $this->adminmodel->updatemonthlytarget($input);
				if($query) {
					redirect('Welcome/monthlytarget/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				$query = $this->adminmodel->editmonthlytarget($id);
				$this->load->view('dashboard/monthlytarget', ['page_status' => 'edit','id'=>$id, 'query' =>$query]);
			} 
		}
	}

	function salary($param1) {
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view'){
				$query = $this->adminmodel->viewsalary();
				$this->load->view('dashboard/salary', ['page_status' => 'view','page_data'=>$query]);
			} else if ($param1 == 'add'){
				$getFaculty = $this->adminmodel->viewFaculty();
				$this->load->view('Dashboard/salary', ['page_status' => 'add','faculty'=>$getFaculty]);
			} else if($param1 == 'insert') {
				$inputs = $this->input->post();
				$query = $this->adminmodel->insertSalary($inputs);
				if($query){
					redirect('Welcome/salary/view');
				}
			} else if($param1 == 'delete') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delsalary($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'permanentdel') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delParmanentsalary($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'viewTrash'){
				$page_data = $this->adminmodel->viewsalaryTrash();
				$this->load->view('dashboard/salary', ['page_status' => 'viewTrash','page_data'=>$page_data]);
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('userid');
				$query = $this->adminmodel->removesalaryFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'update') {
				$input = $this->input->post();
				$query = $this->adminmodel->updatesalary($input);
				if($query) {
					redirect('Welcome/salary/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				$query = $this->adminmodel->editsalary($id);
				$getFaculty = $this->adminmodel->viewFaculty();
				$this->load->view('dashboard/salary', ['page_status' => 'edit','id'=>$id, 'query' =>$query,'get_faculty'=>$getFaculty]);
			} 
		}
	}


	public function expense($param1) {
		if(!$this->session->userdata('name')) {
			$this->load->view('Dashboard/signup');
		} else {
		
			if($param1 == 'view'){
				$query = $this->adminmodel->viewexpense();
				$this->load->view('dashboard/expense', ['page_status' => 'view', 'page_data' => $query]);

			} else if ($param1 == 'add'){
				if($input = $this->input->post()) {
					if($this->adminmodel->addexpense($input)) {
						redirect('Welcome/expense/view');
					} else {
						echo "not";
					}
				}
			} else if($param1 == 'delete') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delexpense($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'remove') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->removeexpense($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} else if($param1 == 'viewTrash'){
				$page_data = $this->adminmodel->getexpenseTrash();
				$this->load->view('dashboard/expense', ['page_status' => 'viewTrash','page_data'=>$page_data]);
			} else if($param1 == 'restore') {
				$trashid = $this->input->get('userid');
				$query = $this->adminmodel->removeExpenseFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} else if($param1 == 'update') {
				$input = $this->input->post();
				$query = $this->adminmodel->updateexpense($input);
				if($query) {
					redirect('Welcome/expense/view');
				} else {
					echo "not";
				}
			} else {
				$id = $param1;
				$query = $this->adminmodel->editexpense($id);
				$this->load->view('dashboard/expense', ['page_status' => 'edit','id'=>$id, 'query' =>$query]);
			}
		}
	}

	// Monthly expense function start
	public function Mexpense($param1) {
		if(!$this->session->userdata('name')) {
			$this->load->view('Dashboard/signup');
		} else {
			if($this->session->userdata('role') == 'admin'){
				if($param1 == 'view'){
					$getexpense = $this->adminmodel->viewexpense();  // expense type
					$query = $this->adminmodel->viewmexpense(); // all expenses

					$expensetypeArr = array();
					for($i = 0; $i < sizeof($query); $i++){
						array_push($expensetypeArr, $query[$i]->expense_type);
					}
					$expensetypeArrData = $this->adminmodel->viewArrays($expensetypeArr, 'exp_type');

					$this->load->view('dashboard/monthlyexpense', ['page_status' => 'view', 'page_data' => $query,'expense'=>$getexpense, 'exp_type' => $expensetypeArrData,'search_data'=>'0']);

				} else if ($param1 == 'add'){
					if($input = $this->input->post()) {
						if($this->adminmodel->addmexpense($input)) {
							redirect('Welcome/mexpense/view');
						} else {
							echo "not";
						}
					}
				} else if($param1 == 'delete') {
					$deleteid = $this->input->get('userid');
					$query = $this->adminmodel->delmexpense($deleteid);
					if($query){
						echo "ok";
					} else {
						echo "not";
					}
				} else if($param1 == 'remove') {
					$deleteid = $this->input->get('userid');
					$query = $this->adminmodel->removeMonthlyexpense($deleteid);
					if($query){
						echo "ok";
					} else {
						echo "not";
					}
				} else if($param1 == 'viewTrash'){
					$page_data = $this->adminmodel->getmexpenseTrash();
					$this->load->view('dashboard/monthlyexpense', ['page_status' => 'viewTrash','page_data'=>$page_data]);
				} else if($param1 == 'restore') {
					$trashid = $this->input->get('userid');
					$query = $this->adminmodel->removeMonthlyExpenseFromTrash($trashid);
						if($query) {
							echo "ok";
						} else {
							echo "not";
						}
				} else if($param1 == 'update') {
					$input = $this->input->post();
					$query = $this->adminmodel->updateMexpense($input);
					if($query) {
						redirect('Welcome/mexpense/view');
					} else {
						echo "not";
					}
				} else {
					$id = $param1;
					$query = $this->adminmodel->editmexpense($id);
					$getexpense = $this->adminmodel->viewexpense();
					$this->load->view('dashboard/monthlyexpense', ['page_status' => 'edit','id'=>$id, 'query' =>$query, 'expense_type' => $getexpense]);
				}
			} else {
				echo "You Don't Have Access to view this file.";
			}
		}
	}
	// Capital function procedure Started
	public function capital($param1) {
	if(!$this->session->userdata('name')) {
			$this->load->view('Dashboard/signup');
		} else {
		
			if($param1 == 'view'){
				$query = $this->adminmodel->viewcapital();
				$this->load->view('dashboard/capital', ['page_status' => 'view', 'page_data' => $query]);

			} else if ($param1 == 'add'){
				$this->load->view('Dashboard/capital',['page_status'=> 'add']);
			} else if($param1 == 'insert') {
				if($input = $this->input->post()) {
					if($this->adminmodel->addcapital($input)) {
						redirect('Welcome/capital/view');
					} else {
						echo "not";
					}
				}
			}
			else if($param1 == 'delete') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->delcapital($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			} 
			else if($param1 == 'remove') {
				$deleteid = $this->input->get('userid');
				$query = $this->adminmodel->removeCapital($deleteid);
				if($query){
					echo "ok";
				} else {
					echo "not";
				}
			}
			 else if($param1 == 'viewTrash'){
				$page_data = $this->adminmodel->getCapitalTrash();
				$this->load->view('dashboard/capital', ['page_status' => 'viewTrash','page_data'=>$page_data]);
			} 
			else if($param1 == 'restore') {
				$trashid = $this->input->get('userid');
				$query = $this->adminmodel->restoreCapitalFromTrash($trashid);
					if($query) {
						echo "ok";
					} else {
						echo "not";
					}
			} 
			else if($param1 == 'update') {
				$input = $this->input->post();
				$query = $this->adminmodel->updatecapital($input);
				if($query) {
					redirect('Welcome/capital/view');
				} else {
					echo "not";
				}
			} 
			else {
				$id = $param1;
				$query = $this->adminmodel->editCapital($id);
				$this->load->view('dashboard/capital', ['page_status' => 'edit','id'=>$id, 'query' =>$query]);
			}
		}	
	}


	// fee_slip procedure start
	public function fee_slip($param1) {
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view') {
			 		// $data = $this->adminmodel->getfeedata($id);
			 		// echo $data;	
			 	} 
			else if($param1 == 'delete'){
			}
			 else if($param1 == 'add'){
				$admissiondetail = $this->adminmodel->viewStudentForFees(0);
				$registrationdetail = $this->adminmodel->getdetail($admissiondetail);
				$this->load->view('Dashboard/fee_slip', ['page_status' => 'add','feedetail'=> $registrationdetail]);
			} else if($param1 == 'batch') {
					$code = $_GET['bid'];
					// echo $code;
					$admissiondetail = $this->adminmodel->viewStudentForFees(0);
					$registrationdetail = $this->adminmodel->getdetail($admissiondetail);
					$data = $this->adminmodel->fetchdetail($code);
					foreach($registrationdetail as $key => $value){
                       if($registrationdetail[$key][0]->r_student_id == $data[0]->a_student_registration_id){
                       		$check = $registrationdetail[$key][0]->r_student_name;
                      	} 
                    } 
					$mega = $data[0]->a_student_adm_fees.','.$data[0]->a_student_monthly_fees.','.$check . ','.$data[0]->a_student_id;
					print_r($mega);
			}else if($param1 == 'insert'){
				if($this->input->post()){
					$inp = $this->input->post();
					if($this->adminmodel->insert_fee($inp)) {
						redirect('Welcome/fee_slip/add');
					}
				}
			}
			else  {
					$id = $_GET['sid'];
					// $detail = $this->adminmodel->viewStudentForFees($id);
					$batch_code = $this->adminmodel->fetchbatchcode($id);
					print_r($batch_code);
				}

		}
	}

	// search By Date procedure start
	function searchByDate($param) {
		if($param=='inquiry') {
			if($this->input->post()){
				$inp = $this->input->post();
				$to = $inp['todate'];
				$from = $inp['from_date'];
			}
			$data = $this->adminmodel->searchDate($to,$from,$param);
			$classarr = array();
				$departmentarr = array();
				$inquirystatusarr = array();
				$sourcestatusarr = array();
				// $teacherarr = array();
				for($i = 0; $i < sizeof($data); $i++){
					array_push($classarr, $data[$i]->class);
					array_push($departmentarr, $data[$i]->department);
					array_push($inquirystatusarr, $data[$i]->inquiry_status);
					array_push($sourcestatusarr, $data[$i]->source);
				}
				$getClassArrData = $this->adminmodel->viewArrays($classarr, 'class');
				$getDepartmentArrData = $this->adminmodel->viewArrays($departmentarr, 'department');
				$getInquiryArrData = $this->adminmodel->viewArrays($inquirystatusarr, 'inqStatus');
				$getSourceArrData = $this->adminmodel->viewArrays($sourcestatusarr, 'source');
			$getData = $this->adminmodel->viewInquiryForm();
			$this->load->view('Dashboard/inquiry_form', ['page_status' => 'view', 'data' => $getData,'search_data' =>$data, 'class' => $getClassArrData, 'department' => $getDepartmentArrData,'inquiry_status'=>$getInquiryArrData,'source'=>$getSourceArrData]);
		}else if($param=='fee') {
			if($this->input->post()){
				$inp = $this->input->post();
				$to = $inp['todate'];
				$from = $inp['from_date'];
			}
			$data = $this->adminmodel->searchDate($to,$from,$param);
			$getData = $this->adminmodel->getremainingfee();
			$this->load->view('Dashboard/fee_remaining', ['page_status' => 'view', 'data' => $getData,'search_data' =>$data]);
		}  else if($param == 'registration'){
			if($this->input->post()){
				$inp = $this->input->post();
				$to = $inp['todate'];
				$from = $inp['from_date'];
			}
			$data = $this->adminmodel->searchDate($to,$from,$param);
			$getData = $this->adminmodel->viewRegistration(0);
				$educationarr = array();
				for($i = 0; $i < sizeof($getData); $i++){
					array_push($educationarr, $getData[$i]->r_student_currentedu);
				}
				$getCurrentEducationArrData = $this->adminmodel->viewArrays($educationarr, 'education');
				$this->load->view('Dashboard/registration', ['page_status' => 'view', 'data' => $getData,
				'currentedu' => $getCurrentEducationArrData,'search_data'=>$data]);
		} else if($param == 'admission') {
			if($this->input->post()){
				$inp = $this->input->post();
				$to = $inp['todate'];
				$from = $inp['from_date'];
			}
			$data = $this->adminmodel->searchDate($to,$from,$param);
			$query = $this->adminmodel->viewAdmission(0);
			$stdata = $this->adminmodel->getstuadmission($data);
				$this->load->view('dashboard/admission', ['page_status' => 'view','page_data'=>$query,'stu_data'=>$stdata,'search_data'=>$data]);
		} else if($param == 'expense') {
			if($this->input->post()){
				$inp = $this->input->post();
				$to = $inp['todate'];
				$from = $inp['from_date'];
			}
			$data = $this->adminmodel->searchDate($to,$from,$param);
			$getexpense = $this->adminmodel->viewexpense();  // expense type
				$query = $this->adminmodel->viewmexpense(); // all expenses
				$expensetypeArr = array();
				for($i = 0; $i < sizeof($data); $i++){
					array_push($expensetypeArr, $data[$i]->expense_type);
				}
				$expensetypeArrData = $this->adminmodel->viewArrays($expensetypeArr, 'exp_type');
				$this->load->view('dashboard/monthlyexpense', ['page_status' => 'view', 'page_data' => $query,'expense'=>$getexpense, 'exp_type' => $expensetypeArrData,'search_data'=>$data]);
		}
	}
	function backupdatabase(){
		if($this->load->view('dashboard/database-backup')){
			redirect('Welcome/index');
		}
	}
	function fees_remaining($param1) {
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view') {
				$data = $this->adminmodel->getremainingfee();
				if(!empty($data[0])){
					for($i = 0; $i < sizeof($data[0]); $i++){
						$admID[] = $data[0][$i]->a_student_registration_id;
					}
					for($i=0;$i < sizeof($admID);$i++){
						$registrationdata[] = $this->db->query("SELECT * FROM registration WHERE r_student_id = $admID[$i] AND r_status != 'deleted'")->result();
					}
				}

				if(empty($registrationdata)){
					$registrationdata = 0;
				}

				// echo "<pre>";
				// print_r($registrationdata);
				// $this->adminmodel->
				// print_r($data);
				// echo "</pre>";

				$this->load->view('dashboard/fee_remaining',['page_status'=>'view','data'=>$data,'registrationData'=>$registrationdata,'search_data'=>'0']);
			} else if($param1 == 'update'){
				// print_r($this->input->post());
				if($this->input->post()){
					$inp = $this->input->post();
					$updation = $this->adminmodel->updateFee($inp);
					if($updation){
						redirect('Welcome/fees_remaining/view');
					}
				}
			} else {
				$id = $param1;
				$data = $this->adminmodel->getSingleRemaining($id);
				$this->load->view('dashboard/fee_remaining',['page_status'=>'edit','data'=>$data]);
			}
		}
	}

	function fees_collected($param1) {
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			if($param1 == 'view') {
				$fee_form = $this->adminmodel->getcollectedfee();
				if(empty($fee_form)){
					$fee_form = 0;
				}
				$this->load->view('dashboard/fee_collected', ['page_status' => 'view_total_collection', 'fee_form_all_data' => $fee_form]);
			} 
		}
	}

	function printfee($param1){
		$selectfeedata = $this->adminmodel->selectfeedata($param1);
		if(!empty($selectfeedata)){
			foreach($selectfeedata as $key => $val){
				$feeSlipAdm[] = $this->db->where('a_student_id', $selectfeedata[$key]->admission_id)->get('admission')->result();
			}
			if(!empty($feeSlipAdm)){
				foreach($feeSlipAdm as $key => $val){
					$AdmClassName[] = $this->db->where('class_id', $feeSlipAdm[$key][0]->a_student_class)->get('class')->result();
				}
			}
		} else {
			$selectfeedata = 0;
			$feeSlipAdm = 0;
			$AdmClassName = 0;
		}

		$this->load->view('Dashboard/printfee', ['feedata'=>$selectfeedata, 'class'=>$AdmClassName]);
	}
}
