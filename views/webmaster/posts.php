<?php $general = new general_model(); ?>
<form id="deletePost" method="post">
	<input type="hidden" value="deletePost" name="form" form="deletePost" />
</form>
<form id="publishPost" method="post">
	<input type="hidden" value="publishPost" name="form" form="publishPost" />
</form>
<form id="editAll" method="post">
	<input type="hidden" value="editAll" name="form" form="editAll" />
</form>
<div class="panel panel-primary" >
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-7">
				<h3>POSTS - <?= count($this->posts); ?></h3>
			</div>
			<div class="col-md-5">
				<button title="Check all boxes" class="btn btn-success" onclick="$('.myCheckBoxes').prop('checked', true)"><i class="fa fa-plus"></i></button>
				<button title="Uncheck all boxes" class="btn btn-warning" onclick="$('.myCheckBoxes').prop('checked', false)"><i class="fa fa-minus"></i></button>
				<button class="btn btn-info" form="editAll" name="action" value="publish">Publish</button>
				<button class="btn btn-default" form="editAll" name="action" value="draft">Revert To Draft</button>
				<button class="btn btn-danger" form="editAll" name="action" value="delete"><i class="fa fa-trash"></i></button>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-hover">
				<tbody>
					<?php foreach($this->posts as $key => $value): ?>
						<?php 
						$author = $general->getAdmin($value['created_by']);
						$category = $general->getCategory($value['category']);
						$comments = $general->getPostComments($value['post']);
						?>
						<tr>
							<td>
								<input type="checkbox" class="form-control myCheckBoxes" name="posts[]" value="<?= $value['id']; ?>" form="editAll">
							</td>
							<td>
								<?= $value['title']; ?><br />
								<a href="<?= URL; ?>webmaster/post/<?= $value['id'] ?>" class="btn-link">view</a> | <button class="btn-link" name="id" form="deletePost" value="<?= $value['id']; ?>">delete</button> | <button class="btn-link" name="id" form="publishPost" value="<?= $value['id'] ?>"><?= ($value['published'] == 0)? "Publish": "Revert To Draft" ?></button>
							</td>
							<td><?= $author['username']; ?></td>
							<td><?= $category['title']; ?></td>
							<td><?= $comments ?> <i class="text-primary fa fa-comment"></i></td>
							<td><?= $value['views'] ?> <i class="text-primary fa fa-eye"></i></td>
							<td><?= relative_time::justdate($value['created_at']); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>