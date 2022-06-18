<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
	<div class="container-fluid">
		<div class="single-banner-item">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-12"></div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url('assets/img/login-top.jpg'); ?>" alt="image" />
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Main Banner Area -->

<section class="breadcrumbs12">
	<nav aria-label="Breadcrumbs">
		<ul class="breadcrumbs">
			<li class="breadcrumbs__item">
				<a href="/"> <i class="fa fa-home" aria-hidden="true"></i> </a>
			</li>

			<li class="breadcrumbs__item1">
				<a href="#">LOGIN</a>
			</li>
		</ul>
	</nav>
</section>

<section class="login-form-div">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="login-form-div-inner">
					<div class="banner-content text-right"><a href="<?=base_url('login'); ?>" class="btn btn-primary">Login</a><a href="<?=base_url('register'); ?>" class="btn btn-success">Sign Up</a></div>
					<form action="" method="post">
						<h2>Welcome Back!!</h2>
						<?php echo getNotificationHtml();?>
						
						<div class="form-group">
							<?php echo form_input(array('type'=>'email', 'id' => 'email', 'name' => 'email','class'=>'form-control','placeholder'=>'Email','value' => set_value('email', !empty($email)?$email:"" ), 'required'=>'required')); ?>
                            <?php echo form_error('email'); ?>
						</div>
						<div class="form-group">
							<?php echo form_password(array('id' => 'password', 'name' => 'password','class'=>'form-control','placeholder'=>'Password','value' => set_value('password', !empty($password)?$password:"" ), 'required'=>'required')); ?>
                            <?php echo form_error('password'); ?>
						</div>
						<div class="row">
							<div class="col-6 col-md-6">
								<div class="form-group form-check">
									<label class="form-check-label"> <?=form_checkbox(array('name' => 'remember_me', 'id' => 'remember_me', 'value' => 1, 'checked' => TRUE, 'class' => 'form-check-input')); ?> Remember me </label>
								</div>
							</div>
							<div class="col-6 col-md-6 col-xs-6">
								<div class="form-group text-right">
									<label><a href="<?=base_url('forgot-password'); ?>">Forgot Password?</a></label>
								</div>
							</div>
						</div>
						<div class="text-center">
							<button type="submit" class="default-btn ch1">Login</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-4">
				<img class="login-right-img" src="<?=base_url('assets/img/SignIn.png'); ?>" />
			</div>
		</div>
	</div>
</section>
