<form id="createPost" method="post">
	<input type="hidden" value="createPost" name="form" form="createPost" />
</form>
<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-8 text-large">
				NEW POST
			</div>
			<div class="col-md-4 text-right">
				<label>
					Posting as <?= session::get('username'); ?>
				</label>
				<button onclick="return confirm('Are you sure')" class="btn btn-danger" name="publish" value="1" form="createPost">
					Publish
				</button>
				<button onclick="return confirm('Are you sure')" class="btn btn-default" name="publish" value="0" form="createPost"> 
					Save
				</button>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="form-horizontal">
			<div class="form-group">
				<label class="control-label col-md-3">
					Title:
				</label>
				<div class="col-md-9">
					<input type="text" name="title" form="createPost" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">
					Category:
				</label>
				<div class="col-md-9">
					<select name="category" form="createPost" class="form-control">						
						<?php foreach($this->categories as $key => $value): ?>
							<option value="<?= $value['id']; ?>"><?= $value['title']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<textarea id="summernote" name="post" form="createPost"></textarea>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#summernote').summernote({
	height: 500,                 // set editor height
	minHeight: null,             // set minimum height of editor
	maxHeight: null,             // set maximum height of editor
	focus: true                  // set focus to editable area after initializing summernote
});
</script>