<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-8">
				<h3>COMMENTS</h3>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<form id="publishComment" method="post">
				<input type="hidden" form="publishComment" value="publishComment" name="form">
			</form>
			<form id="deleteComment" method="post">
				<input type="hidden" form="deleteCategory" value="deleteCategory" name="form">
			</form>
			<table class="table table-stripped">
				<thead>
					<tr>
						<th>#</th>
						<th>NAME</th>
						<th>PUBLISHED</th>
						<th>VIEW</th>
						<th>DELETE</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($this->comments as $key => $value): ?>
						<tr>
							<td><?= $value['id']; ?></td>
							<td><?= $value['name']; ?></td>
							<td>
								<button class="btn btn-info" value="<?= $value['id'] ?>" name="id" form="publishComment">
									<?= ($value['published'] == 0) ? 'Publish' : 'Unpublish' ;?>
								</button>
							</td>
							<td>
								<a data-toggle="modal" data-target="#viewComment<?= $value['id']; ?>"  class="btn btn-info">
									<i class="fa fa-info"></i>
								</a>
							</td>
							<!-- Modal -->
							<div class="modal fade" id="viewComment<?= $value['id']; ?>">
								<div class="modal-dialog" role="document">
									<div class="modal-content" style="color: black;">                           
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel"><?= $value['email']; ?></h4>
										</div>
										<div class="modal-body">
											<p><?= $value['comment']; ?></p>
										</div>
										<div class="modal-footer" >
											<a href="#" class="btn" data-dismiss="modal"> Close</a>
										</div>
									</div>
								</div>
							</div>

							<td>
								<button class="btn btn-danger" value="<?= $value['id']; ?>" name="id" form="deleteComment" onclick="return confirm('Are you sure')">
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
