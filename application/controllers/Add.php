<?php
	defined('BASEPATH') OR exit('no direct script access allowed');

	class Add extends CI_Controller{

		public function __construct()
		{
	    parent::__construct();
	    //$this->load->database();  
	    $this->load->model('Addmodel');
	    //$this->load->library('session');
	    //$this->load->library('form_validation');
		} 
	
		public function add_me(){
			
			$this->form_validation->set_rules("u_name", "Person Name", 'required|alpha');
			$this->form_validation->set_rules("u_email","User E-mail", 'required');
			$this->form_validation->set_rules("u_pass","Password",'required');

			if($this->form_validation->run()){
				//FORM Validation is true
				$data['add_entry']=$this->Addmodel->add_data();

				redirect(base_url());
			}
			else{
				//FORM Validation is false
				$data['show_entries']=$this->Addmodel->show_entry();
				$this->load->view('add_me',$data);
			}
		}

		public function delete_data(){
			$id = $this->uri->segment(3);
			$data = $this->Addmodel->delete($id);
			$data['show_entries']=$this->Addmodel->show_entry();
			$this->load->view('add_me',$data);
		} 	

		public function update_data()
		{
			$id = $this->uri->segment(3);
			$data['show_entries']=$this->Addmodel->show_entry();
			$this->load->view('update',$data);

			if ($this->input->post('update')) 
			{
				$this ->Addmodel->update($id);
			}
		}
	}
?>