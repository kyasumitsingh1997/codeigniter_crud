		<section class="p-5">
			<div class="container">
				<div class="row">
				<div class="col-12">
				<div class="card">
					<div class="card-header bg-dark clearfix text-white">
						<h2 class="float-left m-0">Add New Student</h2>
						<a class="float-right btn btn-info" href="<?php echo base_url('/'); ?>">All Students</a>
					</div>
					<div class="card-body">
						<form action="<?php echo base_url('/students/store'); ?>" class="form-horizontal bg-light p-3 row" method="POST">
							<div class="form-group col-6">
								<label for="">Student Name</label>
								<input type="text" class="form-control" name="name" placeholder="First Name">
							</div>
							<div class="form-group col-6">
								<label for="">Class</label>
								<select name="class" class="form-control">
									<option value="" selected disabled>Select Class</option>
									<?php if(!empty($classes)){
										foreach($classes as $class_list){ ?>
										<option value="<?php echo $class_list['id'] ?>"><?php echo $class_list['name']; ?></option>
										<?php }
									} ?>
								</select>
							</div>
							<div class="form-group col-6">
								<label for="">Age</label>
								<input type="number" class="form-control" name="age">
							</div>
							<div class="form-group col-6">
								<label for="">Gender</label><br>
								<input type="radio" class="" name="gender" value="m"> Male
								<input type="radio" class="" name="gender" value="f"> Female
							</div>
							<div class="col-12">
								<input type="submit" class="btn btn-info" value="Submit" name="create">
							</div>
							
						</form>
					
					</div>
				</div>
				</div>
				
					
					<div class=" offset-3 col-6">
						<?php $session = \Config\Services::session($config);
						if($session->get('error')){ ?>
						<ul class="alert alert-danger">
							<?php foreach ($session->get('error') as $error) : ?>
							<li><?= esc($error) ?></li>
							<?php endforeach ?>
						</ul>
						<?php
							}
						?>
						
					</div>
				</div>
			</div>
		</section>
		