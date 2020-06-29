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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

	<script>
		function updateQty(obj, rowid){

			// $.get("<?= base_url('cart/updateQtyItem/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
			// 	if(resp == "ok"){
			// 		location.reload();
			// 	}
			// 	else{
			// 		alert("Cart update failed. Please try again");
			// 	}
			// });
    		$.ajax({
	            type: "POST", //rest Type
	             data:{rowid:rowid, qty:obj.value},//mispelled
	            url: "<?= base_url('Cart/updateQtyItem') ?>",
	            dataType: 'json',
	            success: function (msg) {
	                location.reload(); 
	            }
	 		});
		}
	</script>

	<div class="container my-2 py-2">
		<h2><?= $title; ?></h2>
		<?php if($this->cart->total_items() > 0 ) { 
			foreach($cart_items as $key) : ?>
				<div class="row my-5 shadow">
					<div class="col-md-2">
						<?php $img_url = !empty($key['image'])?base_url('assets/images/'.$key['image']):base_url('assets/images/dummy.jpg'); ?>
						<img src="<?= $img_url; ?>" alt="" height="100" width="150">
					</div>
					<div class="col-md-3">
						<h4 class="text-secondary"><?= $key['name']; ?></h4>
						<h5 class="text-success"><?= $key['price']. ' Rupaye'; ?></h5>
					</div>
					<div class="col-md-2">
						<span>Select Qantity: </span>
						<input type="number" name="qty" class="form-control" value="<?= $key['qty'] ?>" onchange="updateQty(this, '<?= $key['rowid']; ?>')">
					</div>
					<div class="col-md-2">
						<span>Sub Total: </span>
						<h5 class="text-success"><?= $key['subtotal']. ' Rupaye'; ?></h5>
					</div>
					<div class="col-md-3">
						<a href="<?= base_url('Cart/removeItem/'.$key['rowid']); ?>" class="btn btn-danger" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i></a>
					</div>
				</div>
			<?php endforeach; } else{ ?>
				<h3>No Items in your cart</h3>
			<?php } ?>
			<div class="row">
			<div class="col-md-6">
				<a href="<?= base_url('Products/'); ?>" class="btn btn-warning">Continue Shopping</a>
			</div>
			<div class="col-md-6">
				<?php if($this->cart->total_items() > 0 ){ 
					//echo $this->cart->total_items() ; ?>
					<h5 class="d-inline">Grand Total: <?= $this->cart->total(); ?> Rupaye</h5>
					<a href="<?= base_url('Checkout/'); ?>" class="btn btn-success float-right">Checkout</a>
				<?php } ?>
			</div>
		</div>
		</div>

	</body>

	</html>