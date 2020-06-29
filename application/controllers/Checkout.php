<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function index(){
		if($this->cart->total_items() <= 0){
			redirect('Products/');
		}else{
			$data['title'] = 'Final Step to Place your order !';
			$data['cart_items'] = $this->cart->contents();
			$this->load->view('view_checkout', $data);
		}
	}

	public function place_order_form(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('cust_name','Name','required');
			$this->form_validation->set_rules('cust_email','Email','required|valid_email');
			$this->form_validation->set_rules('cust_mob','Mobile No.','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('cust_add','address','required');

			if($this->form_validation->run() == false){
				$data['title'] = 'Final Step to Place your order !';
				$data['cart_items'] = $this->cart->contents();
				$this->load->view('view_checkout', $data);
			}
			else{
				$custdata = array(
					'name' 		=> strip_tags($this->input->post('cust_name')),
					'email' 	=> strip_tags($this->input->post('cust_email')),
					'phone' 	=> strip_tags($this->input->post('cust_mob')),
					'address'	=> strip_tags($this->input->post('cust_add')),
				);

				$insertCust = $this->Products_model->insertCustomer($custdata);

				//from above $insert we will get id of last inserted row, using same id we'll update our orders and 

				$ordData = array(
					'customer_id' => $insertCust, //last id used here, received from above 
					'grand_total' => $this->cart->total()
				);

				$insertOrd => $this->Products_model->insertOrder($ordData);

				//Watch video from 9th minute
				//link - https://www.youtube.com/watch?v=vJZz_2tq01g&list=TLPQMjgwNjIwMjDQQWNgOIjbbw&index=5
			}
		}
	}
}
?>