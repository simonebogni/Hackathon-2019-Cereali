<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<?= $this->Form->create() ?>
				<div class="login-form">
					<div class="login-wrap">
						<div class="row">
							<div class="col d-flex justify-content-center">
								<img class="img img-fluid" alt="logo" id="logo-login" src="/img/logo.svg"/>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="input-group">
									<span class="input-group-addon"><i class="icon_profile"></i></span>
									<input type="text" class="form-control" name="email" placeholder="Email" autofocus>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="input-group">
									<span class="input-group-addon"><i class="icon_key_alt"></i></span>
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
							</div>
						</div>
					</div>
				</div>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>
