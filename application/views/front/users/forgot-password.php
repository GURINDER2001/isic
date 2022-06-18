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
				<a href="#">Forgot Password</a>
			</li>
		</ul>
	</nav>
</section>

<section class="login-form-div">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="login-form-div-inner">
					<div class="banner-content text-right"><a href="<?=base_url('login'); ?>" class="btn btn-success">Login</a><a href="<?=base_url('register'); ?>" class="btn btn-success">Sign Up</a></div>
					<form action="" method="post">
						<h3>Forgot Password</h3>
						<?php echo getNotificationHtml();?>
						
						<div class="form-group">
							<?php echo form_input(array('type'=>'email', 'id' => 'email', 'name' => 'email','class'=>'form-control','placeholder'=>'Email','value' => set_value('email', !empty($email)?$email:"" ), 'required'=>'required')); ?>
                            <?php echo form_error('email'); ?>
						</div>
						<div class="text-center">
							<button type="submit" class="default-btn ch1">Submit</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-4">
				<img class="login-right-img" src="<?=base_url('assets/img/Login-round-img.png'); ?>" />
			</div>
		</div>
	</div>
</section>