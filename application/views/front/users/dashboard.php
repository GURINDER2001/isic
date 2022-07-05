<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
	<div class="container-fluid">
		<div class="single-banner-item">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-12">Dashboard</div>

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
				<div class="myaccount-div-inner">
	                <div class="row">	
                    	<div class="col-md-4">	
                    		<?php $this->load->view('front/users/sidebar'); ?>		
                    	</div>	
                    					
                        <div class="col-md-8">
                        </div>
                    </div>        
				</div>
			</div>
			<div class="col-lg-4">
				<img class="login-right-img" src="<?=base_url('assets/img/Login-round-img.png'); ?>" />
			</div>
		</div>
	</div>
</section>