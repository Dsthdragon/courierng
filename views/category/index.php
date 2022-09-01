<div class="row">
	<div class="panel">
		<div class="panel-body">
			<div class="col-sm-12 col-md-10 col-md-offset-1">
				<?php foreach($this->categories as $key => $value): ?>
					<div class="col-sm-12 col-md-3">
						<?= $value['title']; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>