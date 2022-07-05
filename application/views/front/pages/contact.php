<?php
if(!empty($pageContent)):
    extract($pageContent);
endif;
?>
<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
	<div class="container-fluid">
		<div class="single-banner-item">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-12">
					<div class="banner-content">
						<h1><span style="color: #feed01;"><?=!empty($heading)?$heading:''; ?> </span></h1>
					</div>
				</div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/card-2.jpg'); ?>" alt="image" />
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
				<a href="<?=base_url(); ?>"> <i class="fa fa-home" aria-hidden="true"></i> </a>
			</li>

			<li class="breadcrumbs__item1 text-capatalize">
				<a href="javascript:;"><?=!empty($heading)?$heading:''; ?></a>
			</li>
		</ul>
	</nav>
</section>


<section class="about-area ptb-100 new-bl2c par1-logo contSctn1">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 pull-left card-bac-1 ctbg" <?=!empty($bg_img)?'style="background:url('.base_url($bg_img).')"':''; ?>>
                <div class="text-card1">
                    <div class="card-btn back1 card-text-bt">
                        <?=!empty($instruction)?$instruction:''; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 pull-left">
                <form class="form-pr app-form1 ctForm" method="post">
                    <h2 class="bc-1an1">Let Us Know</h2>
                    
                    <?=getNotificationHtml();?>
                    
                    <div class="row align-items-center">
                        <div class="form-group">
                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                <label>Name <span class="star1">*</span></label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 pull-left">
                                <input type="text" id="name" name="name" size="40" class="form-control" placeholder="Full name..." required>
                                <?php echo form_error('name'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                <label>E-mail <span class="star1">*</span></label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 pull-left">
                                <input type="email" id="email" name="email" size="40" class="form-control" placeholder="Email Id..." pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-z]{2,4}$" title="Invalid email address" required>
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                <label>Phone <span class="star1">*</span></label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 pull-left">
                                <input type="tel" id="phone" name="phone" size="40" class="form-control" placeholder="Phone Number..." required>
                                <?php echo form_error('phone'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                <label>Subject <span class="star1">*</span></label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 pull-left">
                                <?php echo form_dropdown('concern', $conernOptions,set_value('concern',!empty($concern)?$concern:""),'id="concern" class="form-control" required'); ?>
                                <?php echo form_error('concern'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                <label>Related to <span class="star1">*</span></label>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 pull-left">
                                <select id="concern_specification" name="concern_specification" class="form-control" required>
                                    <option value="">Please Select</option>
                                </select>
                                <?php echo form_error('concern_specification'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left"><label>Message </label></div>
                            <div class="col-lg-8 col-md-8 col-sm-8 pull-left">
                                <textarea id="comment" name="comment" class="form-control" cols="30" rows="6" required="" data-error="Please enter your message" placeholder="Message..." required></textarea>
                                <?php echo form_error('comment'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                       <div class="col-lg-4 col-md-4 col-sm-4 pull-left"><label>&nbsp; </label></div>
                        <div class="col-lg-8 col-md-8 col-sm-12 pull-left text-center">
                            <div class="card-btn back1 mb0">
                                <button type="submit" class="default-btn ch1">Submit</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
</section>

<section class="about-area bgGgrey py-5 ctbotm">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 pull-left">
                <?=!empty($content)?$content:''; ?>
            </div>
        </div>
    </div>
</section>
