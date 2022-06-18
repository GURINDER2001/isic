<!------------------------ banner ------------------------>
<section class="login-banner-main">
	<div class="abt-banner">	
		<h2>Reset Password</h2>	
	</div>
</section>
<!--------------------- banner finish --------------------->

<section class="login-wrapper-txt">
	<div class="container">		
	
	<div class="login-info">
	<div class="row cnt-section justify-content-center">	
	

<div class="col-sm-8 col-lg-8">
<div class="login-page">
    <div class="row">
   <div class="col-sm-6">
   	<img src="<?=base_url('assets/front/images/login.jpg')?>" class="img-responsive">
   </div>
   <div class="col-sm-6">
   <div class="login">
   	<form id="myLogin" method="post">
    <div class="row">
    <div class="col-sm-12 col-lg-12"><h2>Reset your password</h2></div>
    <?php getNotificationHtml();?>

    <div class="col-sm-12 col-lg-12 form-group">
     <label for="name">Password*</label>
     <?php echo form_password(array('id' => 'password', 'name' => 'password','placeholder'=>'Password','class'=>'form-control')); ?>
     <?php echo form_error('password'); ?>
    </div>

    <div class="col-sm-12 col-lg-12 form-group">
     <label for="name">Confirm Password*</label>
     <?php echo form_password(array('id' => 'repassword', 'name' => 'repassword','placeholder'=>'Confirm Password','class'=>'form-control')); ?>
     <?php echo form_error('repassword'); ?>
    </div>

    <div class="col-sm-12 col-lg-12 submit-btn"><button type="submit" class="btn btn-default">Submit</button></div>
    <p class="password"><a href="<?= base_url('login'); ?>">Login</a> | <a href="<?= base_url('register'); ?>">Register</a></p>
  </div>
   
    </form>
   </div>
      </div>  
       </div>
        </div>
        </div>																		
																																								
																																																					
																																																																															
	</div>	
		
						
				

	</div>
</section>