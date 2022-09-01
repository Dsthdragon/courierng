<div class="row">
	<div class="col-sm-12 col-md-6 col-md-offset-3">
		<div class="well">
			<h1 class="text-center">Administrator Login</h1>
			<hr />
			<form class="form-horizontal" id="loginForm" method="post">
			<input type="hidden" value="loginForm" name="form" form="loginForm">
				<div class="form-group">
					<label class="control-label col-sm-3">Username:</label>
					<div class="col-sm-9">
						<input type="text" name="username" form="loginForm" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Password:</label>
					<div class="col-sm-9">
						<input type="password" name="password" form="loginForm" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3" id="ff">
						<button class="btn sendButton" form="loginForm">Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>