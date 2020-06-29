<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Addmodel extends CI_Model{

		public function add_data()
		{

			if($this->input->post('save'))
			{
			$data = array(
					'name' =>$this->input->post('u_name'),
					'email'=>$this->input->post('u_email'),
					'password'=>crypt($this->input->post('u_pass'))
					//'gender'=>$this->input->post('u_name'),
			);

			$sql = $this->db->insert('insert_data', $data);

			if($sql == TRUE){

				 $this->session->set_flashdata('status', "success");
			}
			else{
			    $this->session->set_flashdata('status', "error");
			}
		}
	}

	public function show_entry(){
		$query = $this->db->get('insert_data');
		return $query->result();
	}
	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('insert_data');
	}
	
	// public function update($id)
	// {	
	// 	$data=array(
	// 		'name' =>$this->input->post('u_name'),
	// 		'email'=>$this->input->post('u_email')
	// 	);

	// 	$sql = 	$this->db->where('id',$id)
	// }
}
?>