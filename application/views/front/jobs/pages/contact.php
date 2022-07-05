<?php
if(!empty($pageContent)):
    extract($pageContent);
endif;
?>
<!------------------------ banner ------------------------>
<section class="inner-banner-contorller">
    <div class="inner-banner-contorller">
        <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/front/images/inner01.jpg'); ?>" alt="" />
        <div class="static-text"><a href="<?=base_url(); ?>">Home</a>/Contact Us</div>
    </div>
</section>
<!--------------------- banner finish --------------------->

<!--------------------- what-we-do start --------------------->

<section class="what-we-do">
    <div class="container">
        <div class="row">
            <div class="contant-wrapper">
                <div class="col-lg-12">
                    <div class="head-title-small"><?=!empty($heading)?$heading:'Contact Us'; ?></div>
                    <div class="common-text-box">
                        <div class="common-paragraph m-t-2">
                            <?=!empty($content)?$content:''; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">

        <div class="col-md-6 padd-right">
            <div class="contact-detail">
                <strong><?=!empty($contactbox_heading)?$contactbox_heading:"Let's get in touch"; ?></strong>
                <?=!empty($contactbox_message)?$contactbox_message:''; ?>
                <div class="col-md-12">
                    <div class="white-box">
                        <div class="contact-icon01">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="step-txt">
                            <h5>Visit out work place</h5>
                            <p><?=!empty($contact_address)?$contact_address:''; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 padd-right">
                    <div class="white-box">
                        <div class="contact-icon01">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="step-txt">
                            <h5>Give us a call</h5>
                            <p><?=!empty($contact_number)?$contact_number:''; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="white-box">
                        <div class="contact-icon01">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="step-txt">
                            <h5>Send an email</h5>
                            <p><?=!empty($contact_email)?$contact_email:''; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 padd-left">

            <div class="cnt-section">

                <form id="contactfrm" class="eq-form" method="past">

                    <p class="text01">Send a Message</p>
                    <div id="contact-msg"></div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input type="text" id="name" name="name" size="40" class="form-control" placeholder="YOUR NAME" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <input type="email" id="email" name="email" size="40" class="form-control" placeholder="YOUR EMAIL" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-z]{2,4}$" title="Invalid email address" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <input type="tel" id="phone" name="phone" size="40" class="form-control" placeholder="PHONE NUMBER" required>
                        </div>

                        <div class="col-sm-6 form-group">
                            <input type="text" id="subject" name="subject" size="40" class="form-control" placeholder="SUBJECT" required>
                        </div>

                        <div class="col-sm-12 col-lg-12 form-group">

                            <textarea id="comment" name="comment" class="form-control" rows="3" placeholder="MESSAGE" required></textarea>
                        </div>

                        <div class="col-sm-12 col-lg-12 form-group">
                            <div class="btn-submit">
                                <button type="submit">SUBMIT</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>


