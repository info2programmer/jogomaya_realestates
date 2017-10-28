<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		// if(!$this->session->userdata('adminlogin')){
		// 	redirect('admin','refresh');
		// }
	}

	public function index()
	{
		$this->load->view('Admin/login_view');
	}

	//This Section For Check Credential
	public function login(){
		$this->form_validation->set_rules('txtUsername', 'User Name', 'trim|required');
		$this->form_validation->set_rules('txtPassword', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_log', validation_errors());
			redirect('admin','refresh');
		} else {
			//Remove Cross Site Scripting
			$username=$this->security->xss_clean($this->input->post('txtUsername'));
			$password=$this->security->xss_clean($this->input->post('txtPassword'));
			$oldpassword=$password;
			$password="bivaadmin".$password."adminbiva";

			//echo $password;
			//Check Credential Here
			$result=$this->admin_model->checkcredential($username,$password);
			//echo $result;
			if($result){
				$data=array(
					'adminid' => $result,
					'adminemail' => $username,
					'adminlogin' => true
				);
				$this->session->set_userdata($data);
				redirect('admin/welcome');
			}
			else{
				$flashData=array(
					'error_log' => 'Enter Valid UserName And Password',
					'error_email' => $username,
					'error_password' => $oldpassword
				);
				$this->session->set_flashdata($flashData);
				redirect('admin');
			}

			//$this->admin_model->checkcredential($username,$password);

		}
	}

	//This Function For Logout
	public function logout(){
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}
		$this->session->sess_destroy();
		redirect('admin','refresh');
	}

	//This function Load Dashboard View
	public function welcome(){
		if($this->session->userdata('adminlogin')){
			$data=array(
				'main_view' => 'admin/dashboard_view'
			);
			$this->load->view('layout/admin_layout',$data);
		}
		else{
			redirect('admin','refresh');
		}
	}



	/*
		Banner Section Start
	*/

	public function manage_banner()
	{
		if($this->session->userdata('adminlogin')){
			if($this->input->post('btnSubmit') == 'UpdateBackground'){

				//This is Upload Path
				$uploadPath = './assets/media-demo/banner/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('fileImage')){
					$fileData = $this->upload->data();
					$this->admin_model->insertbanner($fileData['file_name']);
					$this->session->set_flashdata('success_log', 'Banner upload successfully');
					$url='admin/manage_banner';
					redirect($url,'refresh');
				}
				else{
					$this->session->set_flashdata('error_log', $this->upload->display_errors());
					$url='admin/manage_banner';
					redirect($url,'refresh');
				}
			}
			else{
				$data=array(
					'main_view' => 'admin/banner_view',
					'bannerlist' => $this->admin_model->viewallbanner()
				);
				$this->load->view('layout/admin_layout',$data);
			}
		}
		else{
			redirect('admin','refresh');
		}
	}


	public function deletebanner($id,$image){
		$id=$this->security->xss_clean($id);
		$image=$this->security->xss_clean($image);
		//delete image here
		$this->admin_model->deletebanner($id,$image);
		$this->session->set_flashdata('success_log', 'Banner Deleted Successfully');
		redirect('admin/manage_banner','refresh');
	}

	/*
		Banner Section End
	*/

	/*
		About Section Strat
	*/

	public function manage_about(){

		if($this->input->post('btnSubmit') == 'Update Background'){

			//input value
			$uploadPath = './assets/media-demo/banner/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('fileImage')){
				$fileData = $this->upload->data();
				$this->admin_model->insertbanner($fileData['file_name']);
				$this->session->set_flashdata('success_log', 'Banner upload successfully');
				$url='admin/manage_banner';
				redirect($url,'refresh');
			}
			else{
				$this->session->set_flashdata('error_log', $this->upload->display_errors());
				$url='admin/manage_banner';
				redirect($url,'refresh');
			}

		}

		$data=array(
			'main_view' => 'admin/about_us_view'
		);
		$this->load->view('layout/admin_layout',$data);
	}


}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
?>
