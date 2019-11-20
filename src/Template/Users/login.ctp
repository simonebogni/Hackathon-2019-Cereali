<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<?= $this->Form->create() ?>
				<div class="login-form">
					<div class="login-wrap">
						<p class="login-img"><i class="icon_lock_alt"></i></p>
						<div class="input-group">
							<span class="input-group-addon"><i class="icon_profile"></i></span>
							<input type="text" class="form-control" name="email" placeholder="Email" autofocus>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="icon_key_alt"></i></span>
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
						<button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
					</div>
				</div>
			<?= $this->Form->end() ?>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col">
			<p class="text-center">To create an account click here: <?= $this->Html->link(__('Register'), ['controller' => 'Registers', 'action' => 'register']) ?></p>
		</div>
	</div>
</div>
