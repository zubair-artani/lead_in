<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('adminmodel');
	}
	public function index()
	{
		if(!$this->session->userdata('name')){
			$this->load->view('Dashboard/signup');
		} else {
			$this->load->view('Dashboard/index');
		}
	}

	public function signup(){
		$inputs = $this->input->post();
		if($query = $this->adminmodel->login($inputs)){
			$name = $query[0]->user_name;
			$pic = $query[0]->user_picture;
			$position = $query[0]->position;
			$role = $query[0]->user_role;

			$newdata = array( 
			   'name'  => $name, 
			   'pic'     => $pic, 
			   'position'     => $position, 
			   'role'     => $role, 
			);  
			$this->session->set_userdata($newdata);
			// print_r($this->session->userdata());
			redirect('Welcome/index');
			// print_r($query);
		}
	} 

	public function logout(){
		$this->session->unset_userdata('name');
		redirect('Welcome/index');
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
				$this->load->view('dashboard/alltask', ['page_status' => 'view']);
			} else if ($param1 == 'add'){
				$this->load->view('dashboard/alltask', ['page_status' => 'add']);
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
				$input = $this->input->post();
				$query = $this->adminmodel->updateFaculty($input);
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
				for($i = 0; $i < sizeof($getData); $i++){
					array_push($classarr, $getData[$i]->class);
				}
				print_r($classarr);
				
				$this->load->view('Dashboard/batch-code', ['page_status' => 'view', 'data' => $getData, 'class' => $classarr]);
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
				$getData = '';
				$this->load->view('Dashboard/batch-code', ['page_status' => 'add', 'data' => $getData, 'class' => $getClass, 'department' => $getDepartment, 'faculty' => $getFaculty]);
			} else if($param1 == 'insert'){
				$inputs = $this->input->post();
				$query = $this->adminmodel->insertBatch($inputs);
				if($query){
					redirect('Welcome/batchCode/view');
				}
			} else if($param1 == 'viewTrash') {
				$data = $this->adminmodel->viewBatchCodeTrash();
				// echo "<pre>";
				// print_r($data);
				$this->load->view('Dashboard/batch-code', ['page_status' =>'viewTrash','page_data'=>$data]);
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
			} 
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
				$query = $this->adminmodel->viewreligion();
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
				$query = $this->adminmodel->vieweducation();
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
				$getData = $this->adminmodel->viewBatchCode();
				if(is_null($getData)){
					$getData = Array();
				}
				$classarr = array();
				for($i = 0; $i < sizeof($getData); $i++){
					array_push($classarr, $getData[$i]->class);
				}
				print_r($classarr);
				
				$this->load->view('Dashboard/batch-code', ['page_status' => 'view', 'data' => $getData, 'class' => $classarr]);
			} 
			// else if($param1 == 'delete'){
				// $deleteid = $this->input->get('batchid');
				// $query = $this->adminmodel->delBatch($deleteid);
				// if($query){
					// echo "ok";
				// } else {
					// echo "not";
				// }
			// }
			 else if($param1 == 'add'){
				$getClass = $this->adminmodel->viewClass();
				$getDepartment = $this->adminmodel->viewDepartment();
				$getFaculty = $this->adminmodel->viewFaculty();
				$getInquiryStatus = $this->adminmodel->viewinquirystatus();
				$getsource = $this->adminmodel->viewsource();
				$getData = '';
				$this->load->view('Dashboard/inquiry_form', ['page_status' => 'add', 'data' => $getData, 'class' => $getClass, 'department' => $getDepartment, 'faculty' => $getFaculty,'inquiry_status' => $getInquiryStatus,'source'=>$getsource]);
			}
	}}
}
