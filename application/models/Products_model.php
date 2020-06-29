<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model{

	public function get_all_prod($id = ''){
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('status','1');
		if($id){
			$this->db->where('id', $id);
			$sql = $this->db->get();
			$result = $sql->row_array();
		}
		else{
			$this->db->order_by('name', 'asc');
			$sql = $this->db->get();
			$result = $sql->result_array();
		}

		return !empty($result)?$result:false;
	}

	public function insertCustomer($custdata){
		// if(!array_key_exists("created_at", $custdata)){
		// 	$custdata['created_at'] = date("Y-m-d H:i:s");
		// }
		// if(!array_key_exists("modified_at", $custdata)){
		// 	$custdata['modified_at'] = date("Y-m-d H:i:s");
		// }

		$insert = $this->db->insert('customers',$custdata);
		return $insert?$this->db->insert_id():false;
	}

	public function insertOrder($ordData){
		$insert = $this->db->insert('orders',$ordData);
		return $insert?$this->db->insert_id():false;
	}
}
?>