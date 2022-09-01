<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-8">
				<h3>TAGS</h3>
			</div>

			<div class="col-md-4 text-right" style="padding: 10px;">
				<a data-toggle="modal" data-target="#create_tag"  class="btn btn-info">
					CREATE
				</a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<form id="deleteTag" method="post">
				<input type="hidden" form="deleteTag" value="deleteTag" name="form">
			</form>
			<table class="table table-stripped">
				<thead>
					<tr>
						<th>#</th>
						<th>TAG</th>
						<th>DATE ADDED</th>
						<th>DELETE</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($this->tags as $key => $value): ?>
						<tr>
							<td><?= $value['id']; ?></td>
							<td><?= $value['tag']; ?></td>
							<td>
								<?= $value['created_at']; ?>
							</td>
							<td>
								<button class="btn btn-danger" value="<?= $value['id']; ?>" name="id" form="deleteTag" onclick="return confirm('Are you sure')">
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
<div class="modal fade" id="create_tag">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="color: black;">                           
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">CREATE CATEGORY</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="createTag">
					<input type="hidden" value="createTag" name="form" form="createTag" />
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="tag">tag</label>
								<input type="text" required="" name="tag" id="tag" class="form-control" placeholder="Enter Tag name" form="createTag" />
							</div>                      
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer" >
				<a href="#" class="btn" data-dismiss="modal"> Close</a>
				<button  onclick="return confirm('Are you sure')" class="btn btn-primary" type="submit" class="form-control" class="" form="createTag">CREATE</button>
			</div>
		</div>
	</div>
</div>
