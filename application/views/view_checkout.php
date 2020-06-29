<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title;?></title>

	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>" >
	<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery.js'); ?>"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="container">
		<h3><?= $title; ?></h3>
		<div class="row">
			<div class="col-md-8">
				<h4 class="text-center text-secondary">Order Preview</h4>
				<table class="table table-responsive table-striped">
					<thead>
						<th>#</th>
						<th>Product Name</th>
						<th>Image</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Subtotal</th>
					</thead>
					<tbody>
						<?php $i=1; foreach($cart_items as $key): ?>
							<tr>
								<td><?= $i; ?></td>
								<td><?= $key['name']; ?></td>
								<td><img src="<?= base_url('assets/images/'.$key['image']); ?>" alt="" height="50" width="75"></td>
								<td><?= $key['price']; ?></td>
								<td><?= $key['qty']; ?></td>
								<td><?= $key['subtotal']; ?></td>
							</tr>
						<?php $i++; endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="5"></td>
							<td>Grand Total : <?= $this->cart->total(); ?></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="col-md-4">
				<h4 class="text-center text-secondary">Shipping Details</h4>
				<?= form_open('Checkout/place_order_form'); 
					echo form_label('Full Name');
					$data_n = array(
						'type' 			=> 'text',
						'name'			=> 'cust_name',
						'class'			=> 'form-control',
						'placeholder' 	=> 'Enter your Full Name Here!',
						'value'			=>  set_value('cust_name')
					);
					echo form_input($data_n);
					echo form_error('cust_name', '<p class="text-danger">', '</p>');
					echo form_label('Email ID');
					$data_e = array(
						'name'			=> 'cust_email',
						'class'			=> 'form-control',
						'placeholder' 	=> 'Enter your valid Email ID Here!',
						'value'			=>  set_value('cust_email')
					);
					echo form_input($data_e);
					echo form_error('cust_email', '<p class="text-danger">', '</p>');
					echo form_label('Mobile number');
					$data_m = array(
						'type' 			=> 'text',
						'name'			=> 'cust_mob',
						'class'			=> 'form-control',
						'placeholder' 	=> 'Enter your 10 digit mobile Number Here!',
						'value'			=>  set_value('cust_mob')
					);
					echo form_input($data_m);
					echo form_error('cust_mob', '<p class="text-danger">', '</p>');
					echo form_label('Address');
					$data_a = array(
						'rows'			=> '3',
						'name'			=> 'cust_add',
						'class'			=> 'form-control',
						'placeholder' 	=> 'Enter your Address with pincode Here!',
						'value'			=>  set_value('cust_add')
					);
					echo form_textarea($data_a);
					echo form_error('cust_add', '<p class="text-danger">', '</p>');
					$data_sub = array(
						'class'			=> 'btn btn-success my-3 btn-block'
					);
					echo form_submit('submit','Place Your Order',$data_sub);
					echo form_close(); ?>
			</div>
		</div>
	</div>

</body>
</html>