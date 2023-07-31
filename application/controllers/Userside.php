<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserSide extends CI_Controller {

	public function index($id =Null){
		$this->load->model('user');
		$questions = $this->user->getRows($id);
		if(!empty($questions)){
            $data = $questions;
			$this->load->view('user/display',['data'=>$data]);
        }
        else{
			echo "There are no questions in the database";
			exit;
        }
	}
    // public function select($id =Null){
	// 	$this->load->model('user');

	// 	$questions = $this->user->getRows($id);
	// 	$words = $this->user->getblanks();
    //     if(!empty($questions)){
    //         $data['res1'] = $questions;
    //         $data['res2'] = $words;

	// 		$this->load->view('user/display',['data'=>$data]);
    //     }
    //     else{
    //         echo "There are no questions in the database";
    //     }
    // }
    // public function fetchBlanks(){
    //     $this->load->model('user');
	// 		$word = array();
	// 		$data = array();
	// 		$word['blankid']=$this->input->get('blankid');
	// 		$word['blankname']=$this->input->get('blankname');
			
	// 		$res=$this->user->checkblanks($word);
	// 		if($res)
	// 		{
    //             $data['status']=true;
	// 		}
	// 		else
	// 		{
	// 			$data['status']=false;
	// 		}
	// 		echo json_encode($data);
    // }
     
}