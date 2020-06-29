<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Data in form</title>

	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>" >
	<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery.js'); ?>"></script>
</head>
<body>
	
	<div class="container-fluid">
		<h2 class="text-secondary">Welcome, to Codeigniter</h2>
		<div class="row justify-content-md-center">
			<div class="col-md-6">
				<h4 class="text-muted">ADD Data</h4>
				<?php
					foreach ($show_entries as $key ) {
					
				?>
				<form action="<?= site_url('add/update_data'); ?>" method="post">
					<div class="form-group">
						<label for="user_name">ID</label>
						<input type="text" id="user_name" name="id" class="form-control" value="<?= $key->id; ?>">
					</div>
					<div class="form-group">
						<label for="user_name">User Name</label>
						<input type="text" id="user_name" name="u_name" class="form-control" value="<?= $key->name; ?>">
						<span class="text-danger"><?= form_error('u_name'); ?></span>
					</div>
					<div class="form-group">
						<label for="user_email">User Mail-id</label>
						<input type="email" id="user_email" name="u_email" class="form-control" value="<?= $key->email; ?>">
						<span class="text-danger"><?= form_error('u_email'); ?></span>
					</div>
					<div class="form-group">
						<label for="user_password">User Password</label>
						<input type="password" id="user_password" name="u_pass" class="form-control" value="<?= $key->password; ?>">
						<span class="text-danger"><?= form_error('u_pass'); ?></span>
					</div>
					<div class="form-group">
						<input type="submit" name="update" value="Update Data" class="btn btn-primary" />
					</div>

				<?php } ?>
				</form>
	
</body>
</html>