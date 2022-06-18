<?php
if(!empty($pageContent)):
    extract($pageContent);
endif;
?>
<!------------------------ banner ------------------------>
<section class="inner-banner-contorller">
    <div class="inner-banner-contorller">
        <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/front/images/inner01.jpg'); ?>" alt="" />
        <div class="static-text"><a href="<?=base_url(); ?>">Home</a> / Testimonials</div>
    </div>
</section>
<!--------------------- banner finish --------------------->

<!--------------------- what-we-do start --------------------->

<section class="what-we-do">

    <div class="container">

        <div class="head-title-blk"><?=!empty($heading)?$heading:'Testimonials'; ?></div>

        <div class="inner-wrapper">

            <div class="row">
                <div class="col-md-6">
                    <div class="story-wrapper-pic">
                        <img src="<?=base_url('assets/front/images/testimonials-pic.jpg'); ?>" alt="" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="test-heading">
                        <div class="story-heading">
                            <span><?=!empty($fadetext_heading)?$fadetext_heading:'Customers'; ?></span>
                            <?=!empty($content)?$content:''; ?>
                        </div>
                    </div>
                </div>

                <?php
                if(!empty($testimonials))
                {
                  ?>
                    <div class="story-wrapper-text">
                      <div id="work-slider01" class="owl-carousel">
                          <?php
                          foreach ($testimonials as $key => $testimonial)
                          {
                            ?>
                            <div class="item">
                                <div class="customer-txt">
                                    “<?=!empty($testimonial->content)?$testimonial->content:'';?>"
                                    <br>
                                    <strong><?=!empty($testimonial->username)?$testimonial->username:'';?></strong>
                                    <small><?=!empty($testimonial->destination)?$testimonial->destination:'';?><?=!empty($testimonial->associated_with)?'<br>'.$testimonial->associated_with:'';?></small>
                                    <img src="<?=base_url(!empty($testimonial->user_pic)?$testimonial->user_pic:'assets/front/images/no_image.gif'); ?>">
                                </div>
                            </div>
                            <?php
                          }
                          ?>
                      </div>
                  </div>
                  <?php
                }
                ?>



            </div>

        </div>
    </div>
</section>