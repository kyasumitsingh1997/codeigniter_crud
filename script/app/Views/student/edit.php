		<section class="p-5">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header bg-dark text-white clearfix">
								<h2 class="float-left m-0">Edit Student</h2>
								<a class="float-right btn btn-info" href="<?php echo base_url('/'); ?>">All Students</a>	
							</div>
							<div class="card-body">
								<?php $session = \Config\Services::session($config);
									if($session->get('error')){ ?>
									<ul class="alert alert-danger">
										<?php foreach ($session->get('error') as $error) : ?>
										<li><?= esc($error) ?></li>
										<?php endforeach ?>
									</ul>
									<?php } ?>
									<?php if(!empty($student)){ ?>
										<form action="<?php echo base_url('/students/update/'); ?>" class="form-horizontal bg-light p-3 row" method="POST">
											<div class="form-group col-6">
												<label for="">Student Name</label>
												<input type="text" class="form-control" name="name" value="<?php echo $student['student_name'];  ?>">
												<input type="hidden"  name="id" value="<?php echo $student['id'];  ?>">
											</div>
											<div class="form-group col-6">
												<label for="">Class</label>
												<select name="class" class="form-control">
													<option value="" disabled>Select Class</option>
													<?php if(!empty($classes)){
														foreach($classes as $class_list){ 
															$selected = ($class_list == $student['student_class']) ? 'selected' : '' ;?>
														<option value="<?php echo $class_list['id'] ?>" <?php echo $selected; ?> ><?php echo $class_list['name']; ?></option>
														<?php }
													} ?>
												</select>
											</div>
											<div class="form-group col-6">
												<label for="">Age</label>
												<input type="number" class="form-control" name="age" value="<?php echo $student['student_age'];  ?>">
											</div>
											<div class="form-group col-6">
												<label for="">Gender</label><br>
												<input type="radio" class="" <?php echo ($student['student_gender'] == 'm') ? 'checked' : '' ; ?> name="gender" value="m"> Male
												<input type="radio" class="" <?php echo ($student['student_gender'] == 'f') ? 'checked' : '' ; ?> name="gender" value="f"> Female
											</div>
											<div class="col-12">
												<input type="submit" class="btn btn-info" value="Update" name="update">
											</div>
										</form>
									<?php } ?>
							</div>
						</div>
					</div>
					
					<div class=" offset-3 col-6">
						
					</div>
				</div>
			</div>
		</section>
		