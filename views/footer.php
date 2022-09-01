	</div>
	<?php $general = new general_model(); ?>	
	<footer>
		<div class="wrap-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-footer footer-1">
						<div class="footer-heading"><h1><span style="color: #fff;"><?= strtoupper(NAME) ?></span></h1></div>
						<div class="content">
							<p><?= ABOUT ?></p>
							<strong>Email address:</strong>
							<form action="#" method="post">
								<input type="text" name="your-name" value="" size="40" placeholder="Your Email" />
								<input type="submit" value="SUBSCRIBE" class="btn btn-3" />
							</form>
						</div>
					</div>
					<div class="col-md-4 col-footer footer-2">
						<div class="footer-heading"><h4>Tags</h4></div>
						<div class="content">
							<?php $tags = $general->getTags(); ?>
							<?php foreach($tags as $key => $value): ?>
								<a href="<?= URL.'tag/i/'.$value['id'].'/'.$value['tag'] ?>"><?= $value['tag']; ?></a>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="col-md-4 col-footer footer-3">
						<div class="footer-heading"><h4>Link List</h4></div>
						<div class="content">
							<ul>
								<?php $random = $general->randomPost(); ?>
								<?php foreach($random as $key => $value): ?>
									<li><a href="<?= URL.'post/i/'.$value['id'].'/'.$value['title']; ?>"><?= $value['title']; ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copy-right">
			<p>Copyright 2015 - <a href="https://www.365bootstrap.com" target="_blank">Bootstrap Themes</a> by 365bootstrap</p>
		</div>
	</footer>
	<!-- Footer -->
	
	<!-- JS -->
	<script src="<?= URL ?>public/owl-carousel/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo-1").owlCarousel({
				autoPlay: 3000,
				items : 1,
				itemsDesktop : [1199,1],
				itemsDesktopSmall : [400,1]
			});
			$("#owl-demo-2").owlCarousel({
				autoPlay: 3000,
				items : 3,

			});
		});
	</script>
	
	
	<script type="text/javascript" src="<?= URL ?>public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="<?= URL ?>public/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
	<script type="text/javascript">
		$('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
		$('.form_date').datetimepicker({
			language:  'fr',
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0
		});
		$('.form_time').datetimepicker({
			language:  'fr',
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 1,
			minView: 0,
			maxView: 1,
			forceParse: 0
		});
	</script>
</body>
</html>