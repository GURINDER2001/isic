<!------------------------ banner ------------------------>
<section class="login-banner-main">
	<div class="abt-banner">
		<h2>My Account</h2>
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
              <?=isset($response)?$response:'';?>
	           	<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">

	           		<div class="form-group">
                      <label class="control-label col-sm-5" for="name">Name*</label>
                      <div class="col-sm-10">          
                        <?php echo form_password(array('name' => 'name','placeholder'=>'Name....','class'=>'form-control')); ?>
                        <?php echo form_error('name'); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-5" for="useremail">Email*</label>
                      <div class="col-sm-10">          
                        <?php echo form_password(array('name' => 'useremail','placeholder'=>'Email....','class'=>'form-control')); ?>
                        <?php echo form_error('useremail'); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-5" for="name">Mobile*</label>
                      <div class="col-sm-10">          
                        <?php echo form_password(array('name' => 'usermobile','placeholder'=>'Mobile number....','class'=>'form-control')); ?>
                        <?php echo form_error('usermobile'); ?>
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
</section>














<section class="my-account">

	<div class="rela-block container">

	  <div class="rela-block profile-card">

	    <!-- <div class="profile-pic" ></div> 

	    <div class="profile-name-container">

	      <div class="user-name" id="user_name">User Name Here</div>

	      <div class="user-desc" id="user_description">User Description Here</div>	       

	    </div>	    

	    -->

	    <div>

	    	<div class="form-group col-12 mb-4">

	    		<?php

	    		 // echo '<pre>';

	    		 // print_r($account_data);

	    		 // print_r($options_country);

	    		 //  echo '</pre>';

	    		?>

	    	</div>



	    <div>

	  </div>	  

	</div>		

</section>