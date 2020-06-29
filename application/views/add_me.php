<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Data in form</title>

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
				<form action="<?= site_url('add/add_me'); ?>" method="post">
				<?php
					$flash=$this->session->flashdata('status');
				    if(isset($flash))
				    {
						?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="close">
								<span aria-hidden="true">&times;</span>
								</button>
							
							<?php
						
						      if($flash=='success')
						      {
						      	?><strong>Data Inserted Successfully !!!</strong><?php
						      }
						      elseif($flash=='error')
						      {
						      	?><strong>Data not inserted Successfully !!!</strong><?php
						      }

						      ?>

						  </div>
						<?php  } ?>
					<div class="form-group">
						<label for="user_name">User Name</label>
						<input type="text" id="user_name" name="u_name" class="form-control" value="<?= set_value('u_name'); ?>">
						<span class="text-danger"><?= form_error('u_name'); ?></span>
					</div>
					<div class="form-group">
						<label for="user_email">User Mail-id</label>
						<input type="email" id="user_email" name="u_email" class="form-control" value="<?= set_value('u_email'); ?>">
						<span class="text-danger"><?= form_error('u_email'); ?></span>
					</div>
					<div class="form-group">
						<label for="user_password">User Password</label>
						<input type="password" id="user_password" name="u_pass" class="form-control" value="<?= set_value('u_pass'); ?>">
						<span class="text-danger"><?= form_error('u_pass'); ?></span>
					</div>
					<!-- <div class="form-group">
						<label for="user_password">Re-type Your Password</label>
						<input type="password" id="user_password" name="u_pass" class="form-control">
					</div> -->
					<!-- <div class="form-group">
						<div class="checkbox">
							<label for="select">
							<input type="checkbox" value="select" selected="selected" id="select">Select your option</label>
						</div>
						<div class="checkbox">
							<label for="male">
							<input type="checkbox" value="male" id="male">Option 2</label>
						</div>
						<div class="checkbox">
							<label for="female">
							<input type="checkbox" value="female" id="female">Option 3</label>
						</div>
					</div> -->
					<div class="form-group">
						<input type="submit" name="save" value="Save Data" class="btn btn-primary" />
					</div>
				</form>

				<table class="table table-bordered">
					<thead>
						<th>Sr No.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
					</thead>
					<tbody>
							<?php
								$i=1;
								foreach ($show_entries as $key ) {

									?><tr>
									<td><?= $i;?></td>
									<td><?= $key->name;?></td>
									<td><?= $key->email;?></td>
									<!-- <td><a href="#" class="delete" id="<?= $key->id; ?>">Delete</a></td> -->
									<td>
										<a href='<?= base_url() ."index.php/Add/delete_data/".$key->id; ?>'>Delete</a>
										<a href="<?= base_url() ."index.php/Add/update_data/".$key->id; ?>">Update</a>
									</td>
									</tr>
									<?php

									$i++;
								}
							?>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>

	<!-- <script>
		$(document).ready(function(){
			$('.delete').click(function(){
				var id = $(this).attr('id');
				if(confirm("Are You sure want to delete this?"))
				{
					window.location="<?= base_url();?>Add/delete_data/"+id;
				}
				else{
					return false;
				}
			});
		});
	</script> -->
</body>
</html>