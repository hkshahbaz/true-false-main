<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {


	// Functions Related to Insert and fetch questions
	function insertRow($data =array()){
		$insert = $this->db->insert('questions',$data);
		if($insert){
			return true;
		}
		else{
			return false;
		}
	}
	function getRows($id = null){

		if($id){
			$query = $this->db->get_where('questions',array('id' => $id));
			return $query->row_array();
		}
		else
		{
			$query = $this->db->get('questions');
			return $query->result_array();
		}
	}
	public function deleteRow($id)
	{
		
		return $this->db
					->delete('questions',['id' => $id['id']]);
					 //rows affected
	}
	public function find_question($id)
	{
		$q=	$this->db
					->select(['id','image','question','answer'])
					->from('questions')
					->where('id',$id)
					->get();
		return $q->row(); //return object
	}
	public function updateRow($id,$question)
	{
		return $this->db
				->where('id',$id)
				->update('questions',$question); //return number of row affected either 0 or 1 (true or false)
	}
	// Functions relaeted to blanks
	// function insertBlank($data =array()){

	// 	$id = $data['blankid'] ;
	// 	$name = $data['blankname'];
	// 	$check = $this->db->get_where('blankwords',array('blankid' => $id, 'blankname' => $name))->row();
	// 	// rowCount($check );
	// 	if($check){
	// 		return false;
	// 	}
	// 	else
	// 	{
	// 		$sql = $this->db->insert('blankwords', $data);
	// 		if($sql){
	// 			return true;
	// 		}
	// 		else{
	// 			return false;
	// 		}
	// 	}
		
	// }
	// function getblanks(){
	// 	$query = $this->db->get('blankwords');
	// 	return	$query->result_array();
	// }
	// function checkblanks($data =array()){
	// 	$id = $data['blankid'] ;
	// 	$name = $data['blankname'];
	// 	$check = $this->db->get_where('blankwords',array('blankid' => $id, 'blankname' => $name))->row();
	// 	// rowCount($check );
	// 	if($check){
	// 		return true;
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }
	
}