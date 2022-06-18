<?php
if(!empty($pageContent)):
    extract($pageContent);
endif;
?>
<!------------------------ banner ------------------------>
<section class="inner-banner-contorller">
    <div class="inner-banner-contorller">
        <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/front/images/inner03.jpg'); ?>" alt="" />
        <div class="static-text"><a href="<?=base_url(); ?>">Home</a>/Book a demo</div>
    </div>
</section>
<!--------------------- banner finish --------------------->

<!--------------------- what-we-do start --------------------->
<section class="what-we-do">
    <div class="container">
        <div class="row">
            <div class="contant-wrapper">
                <div class="col-lg-12">
                    <div class="head-title-small"><?=!empty($heading)?$heading:'BOOK A DEMO'; ?></div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row mb50">
        <div class="col-sm-7">
            <div class="about-img-box">
                <img src="<?=base_url('assets/front/images/book-demo.jpg'); ?>" alt="">
            </div>
        </div>

        <div class="col-sm-4 about-box">
            <div class="demo-left">
                <form id="bookdemofrm" class="demo-form" action="" method="post">
                    <p class="text01">Send a Message</p>
                    <div id="bookdemo-msg"></div>
                    <div class="row">                        
                        <div class="col-sm-12 form-group">
                            <label>Tell us about yourself*</label>
                            <?php echo form_dropdown('concern', $conernOptions,set_value('concern',!empty($concern)?$concern:""),'id="concern" class="form-control" required'); ?>
                        </div>

                        <div id="concern_specification_container" class="col-sm-12 form-group" style="display: none;">
                            <label id="concern_specification_label">Tell us about yourself*</label>
                            <select id="concern_specification" name="concern_specification" class="form-control">
                            </select>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>first Name*</label>
                            <input type="text" id="first_name" name="first_name" size="40" class="form-control" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Last name</label>
                            <input type="text" id="last_name" name="last_name" size="40" class="form-control" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Phone*</label>
                            <input type="tel" id="phone" name="phone" size="40" class="form-control" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Email*</label>
                            <input type="email" id="email" name="email" size="40" class="form-control" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-z]{2,4}$" title="Invalid email address" required>
                        </div>

                        <div class="col-sm-12 col-lg-12 form-group">
                            <label>Message*</label>
                            <textarea class="form-control" rows="3" id="comment" name="comment" required></textarea>
                        </div>

                        <div class="col-sm-12 col-lg-12 form-group">
                            <div class="btn-submit-blue"><button type="submit">SUBMIT</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>