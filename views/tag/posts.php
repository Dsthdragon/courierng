<?php $general = new general_model(); ?>

<div class="archive-page">
	<div class="">
		<div class="row">
			<div class="col-md-8">
				<?php foreach($this->posts as $key => $value): ?>
					<?php $author = $general->getAdmin($value['created_by']); ?>
					<div class="box">
						<a href="#"><h2 class="vid-name"><?= $value['title']; ?></h2></a>
						<div class="info">
							<h5>By <a href="#"><?= $author['fullname']; ?></a></h5>
							<span><i class="fa fa-calendar"></i> <?= relative_time::wordmonth($value['created_at']) ?> </span> 
							<span><i class="fa fa-comment"></i> 0 Comments</span>
						</div>
						<div class="wrap-vid">
							<div class="zoom-container">
								<div class="zoom-caption">

								</div>
								<?= imagedisplay::display($value['img']) ?>
							</div>
							<p><?= $value['abstract'] ?> <a href="<?= URL.'post/i/'.$value['id'].'/'.$value['title']; ?>">MORE...</a></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>