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
                    // $error = array('error' => $this->upload->display_errors());
                    // $this->load->view('upload_form', $error);
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    $image_url =  base_url('uploads/' . $this->upload->data('file_name'));
                    $inputs = $this->input->post();
                	if($this->adminmodel->addEditor($inputs, $image_url)){
                		redirect('Welcome/index');
                	} else {
                		echo "ok";
                	}
                    // $this->load->view('upload_success');
                }
		} else {
			if(!$this->session->userdata('name')){
				$this->load->view('Dashboard/signup');
			} else {
				if($param1 == 'add'){
					$this->load->view('Dashboard/add-editor', ['page_status'=> 'add']);
				} else if($param1 == 'view') {
					$query = $this->adminmodel->viewEditor();
					$this->load->view('Dashboard/add-editor', ['page_status'=> 'view', 'data' => $query]);
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
}
