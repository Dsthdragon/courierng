<div class="row">
	<div class="panel">
		<div class="panel-body">
			<div class="col-sm-12 col-md-10 col-md-offset-1">
				<?php foreach($this->tags as $key => $value): ?>
					<div class="col-sm-12 col-md-3 text-center">
						<a href="<?= URL.'tag/i/'.$value['id'].'/'.$value['tag'] ?>"><?= $value['tag']; ?></a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>