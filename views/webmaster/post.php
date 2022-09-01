<?php $general = new general_model(); ?>
<?php $tags = explode(',', $this->post['tags']); ?>
<form id="updatePost" method="post">
	<input type="hidden" value="updatePost" name="form" form="updatePost" />
</form>

<!-- START UPLOAD ISH -->
<div style="display: none;">
	<form method="post" id="updatePostImg" enctype="multipart/form-data">
		<input type="hidden" value="updatePostImg" form="updatePostImg" name="form"/>
		<input type="file" form="updatePostImg" id="updateImg" onchange="$('#postImg').click()" name="img" accept="image/*" style="display: none;">
		<button form="updatePostImg" id='postImg' type="submit">
			POST
		</button>
	</form>
</div>
<!-- END UPLOAD ISH -->
<div class="panel panel-primary">
	<div class="panel-heading">
		<div class="row">
			<div class="pull-right text-right">
				<label>
					Posting as <?= session::get('username'); ?>
				</label>
				<button class="btn btn-warning"  data-toggle="modal" data-target="#addPostTag" >
					tags
				</button>

				<button class="btn" onclick="$('#updateImg').click()">
					Update Thumbnail
				</button>
				<?php if($_SESSION['role'] !=  "regular"): ?>
					<button onclick="return confirm('Are you sure')" class="btn btn-danger" name="publish" value="<?= ($this->post['published'] == 0) ? 1 :0 ?>"
						form="updatePost" >
						<?= ($this->post['published'] == 0) ? "Publish" : "Unpublish" ?>
					</button>
				<?php endif; ?>
				<button onclick="return confirm('Are you sure')" class="btn btn-default editMode" name="publish" value="<?= $this->post['published'] ?>"  form="updatePost" style="display: none"> 
					Save
				</button>
				<button class="btn btn-info" onclick="$('.editMode').toggle()">
					Edit
				</button>
			</div>
			<div style="padding-left: 20px; font-size: 20px;">
				<?= $this->post['title']; ?>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="form-horizontal">
			<div class="row">
				<div class="col-md-9">
					<div class="form-group">

						<label class="control-label col-md-3">
							Tags:
						</label>
						<div class="col-md-9">
							<div style="padding-top: 7px">
								<?php 
								$x =0; 
								$tag = "";
								foreach ($tags  as $value){
									$_tag = $general->getTag($value);
									if($x == 0){
										$tag = $_tag['tag'];
									}else{
										$tag .= ', '.$_tag['tag'];
									}
									$x++;
								}?>
								<?= $tag ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">
							Title:
						</label>
						<div class="col-md-9">
							<div style="padding-top: 7px" class="editMode">
								<?= $this->post['title']; ?>
							</div>
							<input style="display: none" value="<?= $this->post['title']; ?>" type="text" name="title" form="updatePost" class="form-control editMode">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">
							Top News:
						</label>
						<div class="col-md-9">
							<div style="padding-top: 7px" class="editMode">
								<?= ($this->post['top'] == 1)? 'Top' : 'Regular'; ?>
							</div>
							<input <?= ($this->post['top'] == 1)? 'checked=""' : '' ?> style="display: none" value="<?= $this->post['title']; ?>" type="checkbox" name="top" form="updatePost" class="form-control editMode">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" >
							Category:
						</label>
						<div class="col-md-9">
							<div style="padding-top: 7px" class="editMode">
								<?php $category = $general->getCategory($this->post['category']); ?>
								<?= $category['title']; ?>
							</div>

							<select style="display: none" name="category" form="updatePost" class="form-control editMode">						
								<?php foreach($this->categories as $key => $value): ?>
									<option value="<?= $value['id']; ?>" <?= ($value['id']== $this->post['category']) ? "selected=''" : '' ?>>
										<?= $value['title']; ?>
									</option>
								<?php endforeach; ?>
							</select>

						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">
							Abstract:
						</label>
						<div class="col-md-9">
							<div style="padding-top: 7px" class="editMode">
								<?= $this->post['abstract']; ?>
							</div>
							<textarea style="display: none" type="text" name="abstract" form="updatePost" class="form-control editMode"><?= $this->post['abstract']; ?></textarea>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<?= imagedisplay::display($this->post['img']) ?>
				</div>
			</div>
			<hr />
			<div class="form-group">
				<div class="col-md-12">
					<div class="editMode">
						<?= $this->post['post']; ?>
					</div>
					<div class="editMode" style="display: none;">
						<textarea id="summernote" name="post" form="updatePost" class="editmode"><?= $this->post['post'] ?></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="addPostTag">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="color: black;">                           
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">ADD POST TAGS</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="addPostTagForm">
					<input type="hidden" value="addPostTagForm" name="form" form="addPostTagForm" />
					<div class="row">

						<?php foreach($this->tags as $key => $value): ?>
							<div class="col-md-4">
								<input type="checkbox" value="<?= $value['id']; ?>" name="tags[]" form="addPostTagForm" <?= (in_array($value['id'], $tags))? 'checked=""' : ''?> >
								<?= $value['tag'] ?>
							</div>
						<?php endforeach; ?>
					</div>
				</form>
			</div>
			<div class="modal-footer" >
				<a href="#" class="btn" data-dismiss="modal"> Close</a>
				<button class="btn btn-primary" type="submit" class="form-control" class="" form="addPostTagForm" onclick="return confirm('Are you sure')">UPDATE</button>
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