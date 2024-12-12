<section class="p-5 vh-100">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header bg-dark text-white clearfix">
						<h2 class="float-left m-0">All Students</h2>
						<a class="float-right btn btn-info" href="<?php echo base_url('/students/create'); ?>">Add New</a>
					</div>
					<?php
					
					?>
					<div class="card-body p-0">
						<?php
						$session = \Config\Services::session();
						if($session->getflashdata('success')){ ?>
							<div class="alert alert-success"><?php echo $session->getflashdata('success'); ?></div>
						<?php } ?>
							<table class="table table-borderd table-striped">
								<thead>
									<tr>
										<th>S.No.</th>
										<th>First Name</th>
										<th>Class</th>
										<th>Age</th>
										<th>Gender</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($students)){
										$config = config('Pager');
										$pageSize = $config->perPage;
										$i = 0;
										if(isset($_GET['page']) && $_GET['page'] > 1){
											$i = $pageSize;
										}
										foreach($students as $student){ $i++;?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $student['student_name']; ?></td>
											<td><?php echo $student['name']; ?></td>
											<td><?php echo $student['student_age']; ?></td>
											<td>
												<?php if($student['student_gender'] == 'm'){
													echo 'Male';
												}else{
													echo 'Female';
												} ?>	
											</td>
											<td><a href="students/edit/<?php echo $student['id']; ?>" class="btn btn-primary">Edit</a>
												<a href="students/delete/<?php echo $student['id']; ?>" class="btn btn-danger">Delete</a></td>
										</tr>
									<?php }
									} ?>
								</tbody>
							</table>
					</div>
					<div class="card-footer">
						<nav>
							<?= $pager->links() ?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
		