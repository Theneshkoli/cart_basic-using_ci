<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Your Shopping Cart !';
		$data['cart_items'] = $this->cart->contents();
		// echo "<pre>";
		// print_r($data);
		$this->load->view('view_cart', $data);
	}

	public function updateQtyItem(){
		$update = 0;
		$rowid 	= $this->input->post('rowid');
		$qty 	= $this->input->post('qty');

		if(!empty($rowid) && !empty($qty)){
			$data = array(
				'rowid' => $rowid,
				'qty'   => $qty
			);
			$update = $this->cart->update($data);
			//print_r($update);
			//exit();
		}
		//echo $update?'ok':'oerr';
		echo json_encode($update);
	}

	public function removeItem($rowid){
		$remove = $this->cart->remove($rowid);
		redirect('Cart');
	}
}
?>