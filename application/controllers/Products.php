<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Display All Products Available!';
		$data['my_products'] = $this->Products_model->get_all_prod();
		//echo "<pre>";
		//print_r($data['my_products']);
		//exit;
		$this->load->view('view_products', $data);
	}

	public function addtocart($id){
		$product_pass = $this->Products_model->get_all_prod($id);

		$data = array(
			'id' 	=> $product_pass['id'],
			'qty' 	=> 1,
			'price' => $product_pass['price'],
			'name' 	=> $product_pass['name'],
			'image' => $product_pass['image']
		);
		$this->cart->insert($data);
		redirect('cart/');
	}
}
