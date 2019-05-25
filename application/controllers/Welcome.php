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
}
