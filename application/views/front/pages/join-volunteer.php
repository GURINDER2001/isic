<!------------------------ banner ------------------------>
<section class="login-banner-main">
	<div class="abt-banner">	
		<h2>Join Volunteer</h2>	
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
						   <div class="col-sm-12">
						   		<div class="login">
								   	<form id="myLogin" method="post">
								   		<input type="hidden" name="siteUrl" id="siteUrl" value="<?=base_url()?>">
									    <div class="row">
									    <div class="col-sm-12 col-lg-12 text-center"><h2>Volunteer Register For GHCT Acts of Kindness</h2></div>
									    <div class="col-sm-12 col-lg-12">
									    	<?php getNotificationHtml();?>
									    </div>

									    <div class="col-sm-12 col-lg-12">
									    <label for="name"><strong>Personal Information</strong></label>
									    <hr>
									    </div>

									    <div class="col-sm-6 col-lg-6 form-group">
									    <label for="name">First Name*</label>
									    <?php echo form_input(array('id' => 'firstname', 'name' => 'firstname','class'=>'form-control','placeholder'=>'First name','value' => set_value('firstname', isset($firstname)?$firstname:"" ))); ?>
									    <?php echo form_error('firstname'); ?>
									    </div>

									    <div class="col-sm-6 col-lg-6 form-group">
									    <label for="name">Last Name*</label>
									    <?php echo form_input(array('id' => 'lastname', 'name' => 'lastname','class'=>'form-control','placeholder'=>'Last name','value' => set_value('lastname', isset($lastname)?$lastname:"" ))); ?>
									    <?php echo form_error('lastname'); ?>
									    </div>

									    <div class="col-sm-6 col-lg-6 form-group">
									    <label for="name">Email address*</label>
									    <?php echo form_input(array('type'=>'email','id' => 'useremail', 'name' => 'useremail','class'=>'form-control','placeholder'=>'Email address','value' => set_value('useremail', isset($useremail)?$useremail:"" ))); ?>
									    <?php echo form_error('useremail'); ?>
									    </div>

									    <div class="col-sm-6 col-lg-6 form-group">
									    <label for="name">Contact Number*</label>
									    <?php echo form_input(array('id' => 'usercontact', 'name' => 'usercontact','class'=>'form-control','placeholder'=>'Contact Number','value' => set_value('usercontact', isset($usercontact)?$usercontact:"" ))); ?>
									    <?php echo form_error('usercontact'); ?>
									    </div>

									    <div class="col-sm-12 col-lg-12">
									    <label for="name"><strong>Date of Activity</strong></label>
									    <hr>
									    </div>

									    <div class="col-sm-6 col-lg-6 form-group">
									    <label for="name">Available From</label>
									    <?php echo form_input(array('id' => 'available_from', 'name' => 'available_from','class'=>'form-control','placeholder'=>'','value' => set_value('available_from', isset($available_from)?$available_from:"" ))); ?>
									    <?php echo form_error('available_from'); ?>
									    </div>

									    <div class="col-sm-6 col-lg-6 form-group">
									    <label for="name">Available To</label>
									    <?php echo form_input(array('id' => 'available_to', 'name' => 'available_to','class'=>'form-control','placeholder'=>'','value' => set_value('available_to', isset($available_to)?$available_to:"" ))); ?>
									    <?php echo form_error('available_to'); ?>
									    </div>

									    <div class="col-sm-12 col-lg-12">
									    <label for="name"><strong>Activity Checklist</strong></label>
									    <hr>
									    </div>

									    <div class="col-sm-12 col-lg-12 form-group">
									    <label for="name">Choose Your Specialization</label>
									    <?php echo form_dropdown('activity_checklist', $checklistOptions, set_value('activity_checklist', isset($activity_checklist)?$activity_checklist:'' ), array('id'=>'activity_checklist','class'=>'form-control')); ?>
									    <?php echo form_error('activity_checklist'); ?>
									    </div>

									    <?php
									    $activity_checklist = set_value('activity_checklist', isset($activity_checklist)?$activity_checklist:0 );
									    $other_checklist_display = (empty($activity_checklist) || $activity_checklist!='other')?'style="display: none;"':'';
									    ?>
									    <div id="other_activity" <?=$other_checklist_display;?> class="col-sm-12 col-lg-12 form-group">
									    <label for="name">Specify Activities.</label>									    
									    <?php echo form_textarea(array('id'=>'other_activity','name'=>'other_activity','class'=>'form-control','placeholder'=>'Specify here...','value'=>set_value('available_to', isset($available_to)?$available_to:"" ))); ?>
									    <?php echo form_error('other_activity'); ?>
									    </div>

									    <div id="activity_checklist_data" class="col-sm-12 col-lg-12 form-group">
									    
									    </div>

									    <div class="col-sm-12 col-lg-12 submit-btn"><button type="submit" class="btn btn-default">Submit</button></div>

									    <p>&nbsp;</p>
									  </div>
								    </form>
							   </div>
						   </div>
					   </div>
					</div>
				</div>											
			</div>
		</div>
	</div>
</section>