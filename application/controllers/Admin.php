<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/index');
	}
	public function store_question(){
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		// setting  validation rules using config file
		if($this->form_validation->run('add_question_rules') && $this->upload->do_upload('image')){

			$post = $this->input->post();
			unset($post['submit']); // function used to unset submit value from	
			$data = $this->upload->data();
			$img_path = base_url("upload/". $data['raw_name']. $data['file_ext'] );
			// echo "<pre>",print_r($img_path);exit;
			$post['image'] = $img_path;
			$this->load->model('user');
			$this->flashAndRedirect($this->user->insertRow($post),
								"Question Added Successfully",
								"Question Failed to Add.Please Try Again.");
			}
			else
			{
				// echo validation_errors();
				$upload_error = $this->upload->display_errors();
				$this->load->view('admin/index',compact('upload_error'));	
			}
		}
		public function select($id =Null){
			$this->load->model('user');
			$questions = $this->user->getRows($id);
			if(!empty($questions)){
				$data = $questions;
	
				$this->load->view('admin/display',['data'=>$data]);
			}
			else{
				echo "There are no questions in the database";
			}
		}
		public function delete_question()
		{
			$id = $this->input->post(['id']);
			$this->load->model('user');
			$this->flashMessage($this->user->deleteRow($id ),
								"Article Deleted Successfully",
								"Article Failed To Delete.Please Try Again.");
		}
		public function edit_question($id)
		{
			$this->load->model('user');
			$question = $this->user->find_question($id);

			$this->load->view('admin/edit_question',['question' => $question]);
			//passing data to view using second parameter with key.
		}
		public function update_question(){
			$id = $this->input->post('id');
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
			// setting  validation rules using config file
			if($this->form_validation->run('add_question_rules') && $this->upload->do_upload('image')){
	
				$post = $this->input->post();
				unset($post['submit']); // function used to unset submit value from	
				$data = $this->upload->data();
				$img_path = base_url("upload/". $data['raw_name']. $data['file_ext'] );
				// echo "<pre>",print_r($img_path);exit;
				$post['image'] = $img_path;
				$this->load->model('user');
				$this->flashMessageUpdate($this->user->updateRow($id,$post),
									"Question Updated Successfully",
									"Question Failed to Update.Please Try Again.");
				}
				else
				{
					// echo validation_errors();
					$upload_error = $this->upload->display_errors();
					$this->load->view('admin/index',compact('upload_error'));	
				}
			}
	private function flashMessageUpdate($Successful, $successMessage,$failMessage)
		{
			if($Successful)
			{
				$this->session->set_flashdata('feedback',$successMessage);
				$this->session->set_flashdata('feedback_class','alert-success');
				return redirect('admin/select');
			}
			else
			{
				$this->session->set_flashdata('feedback',$failMessage);
				$this->session->set_flashdata('feedback_class','alert-danger');
				return redirect('admin/select');
			}
		}
	private function flashMessage($Successful, $successMessage,$failMessage)
		{
			if($Successful)
			{
				$this->session->set_flashdata('feedback',$successMessage);
				$this->session->set_flashdata('feedback_class','alert-success');
				return redirect('admin/select');
			}
			else
			{
				$this->session->set_flashdata('feedback',$failMessage);
				$this->session->set_flashdata('feedback_class','alert-danger');
				return redirect('admin/select');
			}
		}
	private function flashAndRedirect($Successful, $successMessage,$failMessage)
		{
			if($Successful)
			{
				$this->session->set_flashdata('feedback',$successMessage);
				$this->session->set_flashdata('feedback_class','alert-success');
				return redirect('admin/index');
			}
			else
			{
				$this->session->set_flashdata('feedback',$failMessage);
				$this->session->set_flashdata('feedback_class','alert-danger');
				return redirect('admin/index');
			}
		}
}
