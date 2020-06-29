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
		<h2><?= $title;?></h2>
		<a href="<?= base_url('cart'); ?>" title="View Cart" class="d-block text-right my-2 py-2"><span class="fa fa-shopping-cart p-2"></span>items in Cart = <?= $this->cart->total_items(); ?></a>
		<div class="row">
			<?php 
			if(!empty($my_products)){
			foreach($my_products as $key): ?>
				<div class="col-md-4">
					<div class="card" style="width: 100%;">
					  	<img class="card-img-top" src="<?= base_url('assets/images/'.$key['image']); ?>" alt="Card image cap" height="300">
						<div class="card-body">
						    <h5 class="card-title"><?= $key['name']; ?></h5>
						    <p class="card-text"><?= $key['description']; ?></p>
						    <h5 class="text-center"><?= $key['price']; ?> Rupaye dya</h5>
						    <a href="<?= base_url('Products/addtocart/'.$key['id']); ?>" class="btn btn-success text-center">Add To Cart</a>
						</div>
					</div>
				</div>
			<?php endforeach; }else{ ?>
				<div class="col-md-12">
					<h3>No Products Avilable to show!!</h3>
				</div>
			<?php } ?>
		</div>
	</div>

</body>
</html>