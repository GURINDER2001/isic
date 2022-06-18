<!------------------------ banner ------------------------>
<section class="login-banner-main">
	<div class="abt-banner">	
		<h2>Change Password</h2>	
	</div>
</section>
<!--------------------- banner finish --------------------->

<section class="about-info">
  <div class="container">
    <div class="account-info-wrapper">
        <div class="row"> 
          <div class="col-sm-3">
              <?php $this->load->view('front/users/sidebar'); ?>  
          </div>  
                
          <div class="col-sm-9">
            <div class="my-acct">               
                <form class="form-horizontal" method="post">
                    <?php getNotificationHtml();?>
                    <div class="form-group">
                      <label class="control-label col-sm-5" for="password">Password*</label>
                      <div class="col-sm-10">          
                        <?php echo form_password(array('id' => 'password', 'name' => 'password','placeholder'=>'Password','class'=>'form-control')); ?>
                        <?php echo form_error('password'); ?>
                      </div>
                    </div>

                  <div class="form-group">
                     <label class="control-label col-sm-5" for="repassword">Confirm Password*</label>
                     <div class="col-sm-10">
                     <?php echo form_password(array('id' => 'repassword', 'name' => 'repassword','placeholder'=>'Confirm Password','class'=>'form-control')); ?>
                     <?php echo form_error('repassword'); ?>
                     </div>
                  </div>

                    <div class="form-group">        
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                      </div>
                    </div>
                </form>
            </div>            
          </div>                            
        </div>                          
    </div>
  </div>
</section>