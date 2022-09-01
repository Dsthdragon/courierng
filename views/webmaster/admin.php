<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-8">
				<h3>CATEGORIES</h3>
			</div>

			<div class="col-md-4 text-right" style="padding: 10px;">
				<a data-toggle="modal" data-target="#create_admin"  class="btn btn-info">
					CREATE
				</a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<form id="deleteAdmin" method="post">
				<input type="hidden" form="deleteAdmin" value="deleteAdmin" name="form">
			</form>
			<table class="table table-stripped">
				<thead>
					<tr>
						<th>#</th>
						<th>USERNAME</th>
						<th>EMAIL</th>
						<th>ROLE</th>
						<th>FULLNAME</th>
						<th>DELETE</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($this->admins as $key => $value): ?>
						<tr>
							<td><?= $value['id']; ?></td>
							<td><?= $value['username']; ?></td>
							<td><?= $value['email']; ?></td>
							<td><?= $value['fullname']; ?></td>
							<!-- Modal -->

								<td>
									<button class="btn btn-danger" value="<?= $value['id']; ?>" name="id" form="deleteAdmin">
									<i class="fa fa-trash"></i>
									</button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>




	<!-- Modal -->
	<div class="modal fade" id="create_admin">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="color: black;">                           
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">CREATE ADMINISTRATOR</h4>
				</div>
				<div class="modal-body">
					<form method="post" id="createAdmin">
						<input type="hidden" value="createAdmin" name="form" form="createAdmin" />
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Username</label>
									<input type="text" required="" name="username" class="form-control" placeholder="Enter Username" form="createAdmin" />
								</div>                      
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Email</label>
									<input type="text" required="" name="email" class="form-control" placeholder="Enter Email Address" form="createAdmin" />
								</div>                      
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Fullname</label>
									<input type="text" required="" name="fullname" class="form-control" placeholder="Enter Full Name" form="createAdmin" />
								</div>                      
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form">
									<label >Role</label>
									<select required="" name="role"class="form-control" form="createAdmin" >
										<option value="regular">Regular</option>
										<option value="super">Super</option>
										<option value="owner">Owner</option>
									</select>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer" >
					<a href="#" class="btn" data-dismiss="modal"> Close</a>
					<button class="btn btn-primary" type="submit" class="form-control" class="" form="createAdmin">CREATE</button>
				</div>
			</div>
		</div>
	</div>
