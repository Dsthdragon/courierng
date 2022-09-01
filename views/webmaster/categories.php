<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-8">
				<h3>CATEGORIES</h3>
			</div>

			<div class="col-md-4 text-right" style="padding: 10px;">
				<a data-toggle="modal" data-target="#create_category"  class="btn btn-info">
					CREATE
				</a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<form id="toggleNav" method="post">
				<input type="hidden" form="toggleNav" value="toggleNav" name="form">
			</form>
			<form id="deleteCategory" method="post">
				<input type="hidden" form="deleteCategory" value="deleteCategory" name="form">
			</form>
			<table class="table table-stripped">
				<thead>
					<tr>
						<th>#</th>
						<th>TITLE</th>
						<th>NAVBAR</th>
						<th>VIEW</th>
						<th>DELETE</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($this->categories as $key => $value): ?>
						<tr>
							<td><?= $value['id']; ?></td>
							<td><?= $value['title']; ?></td>
							<td>
								<button class="btn btn-info" value="<?= $value['id'] ?>" name="id" form="toggleNav">
									<?= ($value['top'] == 0) ? 'ADD' : 'REMOVE' ;?>
								</button>
							</td>
							<td>
								<a data-toggle="modal" data-target="#viewCategory<?= $value['id']; ?>"  class="btn btn-info" >
									<i class="fa fa-info"></i>
								</a>
							</td>
							<!-- Modal -->
							<div class="modal fade" id="viewCategory<?= $value['id']; ?>">
								<div class="modal-dialog" role="document">
									<div class="modal-content" style="color: black;">                           
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel"><?= $value['title']; ?></h4>
										</div>
										<div class="modal-body">
											<p><?= $value['description']; ?></p>
										</div>
										<div class="modal-footer" >
											<a href="#" class="btn" data-dismiss="modal"> Close</a>
										</div>
									</div>
								</div>
							</div>

							<td>
								<button class="btn btn-danger" value="<?= $value['id']; ?>" name="id" form="deleteCategory" onclick="return confirm('Are you sure')">
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
<div class="modal fade" id="create_category">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="color: black;">                           
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">CREATE CATEGORY</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="createCategory">
					<input type="hidden" value="createCategory" name="form" form="createCategory" />
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="categoryTitle">Title</label>
								<input type="text" required="" name="title" id="categoryTitle" class="form-control" placeholder="Enter Full Name" form="createCategory" />
							</div>                      
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="categoryDescription">Description</label>
								<input type="text" required="" name="description" id="categoryDescription" class="form-control" placeholder="Enter Full Name" form="createCategory" />
							</div>                      
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form">
								<label for="categoryParent">Parent</label>
								<select required="" name="parent" id="categoryParent" class="form-control" form="createCategory" >
									<option value="0">None</option>
									<?php foreach($this->categories as $key => $value): ?>
										<option value="<?= $value['id']; ?>"><?= $value['title']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer" >
				<a href="#" class="btn" data-dismiss="modal"> Close</a>
				<button class="btn btn-primary" type="submit" class="form-control" class="" form="createCategory" onclick="return confirm('Are you sure')">CREATE</button>
			</div>
		</div>
	</div>
</div>
