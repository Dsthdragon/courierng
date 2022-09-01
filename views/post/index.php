<?php $general = new general_model(); ?>
<?php $author = $general->getAdmin($this->post['created_by']); ?>
<?php $tags = explode(',', $this->post['tags']); ?>
<?php $category = $general->getSameCategoryPost($this->post['category']); ?>
<?php $topNews = $general->getTopPost(); ?>
<div id="page-content" class="single-page container">
	<div class="row">
		<div id="main-content" class="col-md-8">
			<div class="box">
				<h1 class="vid-name"><a href="#"><?= $this->post['title'] ?> </a></h1>
				<div class="info">
					<h5>By <a href="#"><?= $author['fullname']; ?></a></h5>
					<span><i class="fa fa-calendar"></i><?= relative_time::wordmonth($this->post['created_at']) ?> </span> 
					<span><i class="fa fa-heart"></i>1,200</span>
				</div>
				<?= $this->post['post']; ?>
				<hr />
				<div class="share">
					<ul class="list-inline center">
						<li><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i> Share</a></li>
						<li><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i> Tweet</a></li>
						<li><a href="#" class="btn btn-pinterest"><i class="fa fa-pinterest"></i> Tweet</a></li>
						<li><a href="#" class="btn btn-google"><i class="fa fa-google-plus-square"></i> Google+</a></li>
						<li><a href="#" class="btn btn-mail"><i class="fa fa-envelope-o"></i> E-mail</a></li>
					</ul>
				</div>
				<div class="vid-tags">
					
					<?php foreach ($tags  as $value): ?>
						<?php $_tag = $general->getTag($value); ?>
						<a href="<?= URL.'tag/i/'.$_tag['id'].'/'.$_tag['tag'] ?>"><?= $_tag['tag']; ?></a>
					<?php endforeach ?>
				</div>
				<div class="line"></div>
				<div class="comment">
					<h3>Leave A Comment</h3>
					<form id="commentForm" method="post" >
						<input type="hidden" name="form" value="commentForm" form="commentForm" >
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input form="commentForm" type="text" class="form-control input-lg" name="name" id="name" placeholder="Enter name" required="required" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input form="commentForm" type="email" class="form-control input-lg" name="email" id="email" placeholder="Enter email" required="required" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<textarea form="commentForm" name="message" id="message" class="form-control" rows="4" cols="25" required="required"
									placeholder="Message"></textarea>
								</div>						
								<button form="commentForm"  type="submit" class="btn btn-4 btn-block" name="btnBooking" id="btnBbooking"><i class="fa fa-send"></i> SEND</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="box">
				<div class="box-header header-natural">
					<h2>Comments</h2>
				</div>
				<div class="box-content">
					<div class="row">
						<div class="col-md-12">
							<?php foreach($this->comments as $key => $value): ?>
							<div class="wrap-vid well">
								<div style="font-size: 20px;">
									<?= $value['comment']; ?>
								</div>
								<div class="info">
									<h5>By <a href="#"><?= $value['name'] ?></a></h5>
									<span><i class="fa fa-calendar"></i><?= relative_time::justdate($value['created_at']) ?></span> 
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="sidebar" class="col-md-4">
			<!---- Start Widget ---->
			<div class="widget wid-follow">
				<div class="heading"><h4>Follow Us</h4></div>
				<div class="content">
					<ul class="list-inline">
						<li>
							<a href="facebook.com/">
								<div class="box-facebook">
									<span class="fa fa-facebook fa-2x icon"></span>
									<span>1250</span>
									<span>Fans</span>
								</div>
							</a>
						</li>
						<li>
							<a href="facebook.com/">
								<div class="box-twitter">
									<span class="fa fa-twitter fa-2x icon"></span>
									<span>1250</span>
									<span>Fans</span>
								</div>
							</a>
						</li>
						<li>
							<a href="facebook.com/">
								<div class="box-google">
									<span class="fa fa-google-plus fa-2x icon"></span>
									<span>1250</span>
									<span>Fans</span>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<!---- Start Widget ---->
			<div class="widget wid-post">
				<div class="heading"><h4>Category</h4></div>
				<div class="content">
					<?php foreach($category as $key => $value): ?>
						<?php $_author = $general->getAdmin($value['created_by']); ?>
						<div class="post wrap-vid">
							<div class="zoom-container">
								<div class="zoom-caption">
									<a href="<?= URL.'post/i/'.$value['id'].'/'.$value['title'] ?>">
										<i class="fa fa-search fa-5x" style="color: #fff"></i>
									</a>
								</div>
								<?= imagedisplay::display($value['img']) ?>
							</div>
							<div class="wrapper">
								<h5 class="vid-name"><a href="<?= URL.'post/i/'.$value['id'].'/'.$value['title'] ?>"><?= $value['title'] ?></a></h5>
								<div class="info">
									<h6>By <a href="#"><?= $_author['fullname']; ?></a></h6>
									<span><i class="fa fa-calendar"></i><?= relative_time::justdate($value['created_at']) ?></span> 
									<span><i class="fa fa-heart"></i>1,200</span>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<!---- Start Widget ---->
			<div class="widget ">
				<div class="heading"><h4>Top News</h4></div>
				<div class="content">
					<?php foreach($topNews as $key => $value): ?>
						<?php $_author = $general->getAdmin($value['created_by']); ?>
						<div class="wrap-vid">
							<div class="zoom-container">
								<div class="zoom-caption">
									<a href="<?= URL.'post/i/'.$value['id'].'/'.$value['title'] ?>">
										<i class="fa fa-search fa-5x" style="color: #fff"></i>
									</a>
								</div>
								<?= imagedisplay::display($value['img']) ?>
							</div>
							<div class="wrapper">
								<h5 class="vid-name"><a href="<?= URL.'post/i/'.$value['id'].'/'.$value['title'] ?>"><?= $value['title'] ?></a></h5>
								<div class="info">
									<h6>By <a href="#"><?= $_author['fullname']; ?></a></h6>
									<span><i class="fa fa-calendar"></i><?= relative_time::justdate($value['created_at']) ?></span> 
									<span><i class="fa fa-heart"></i>1,200</span>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>