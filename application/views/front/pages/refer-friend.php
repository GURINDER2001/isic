<?php
//pre($pageContent);
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
						<h1 class="text-uppercase"><span style="color: #feed01;"><?=!empty($heading)?$heading:''; ?> </span></h1>
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

			<li class="breadcrumbs__item1">
				<a href="javascript:;"><?=!empty($heading)?$heading:''; ?></a>
			</li>
		</ul>
	</nav>
</section>


<section class="about-area cards-iy">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 col-md-12">
				<div class="hmSctn1 refrSctn1">
					<div class="text">
						<?=!empty($content)?$content:''; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="about-area rfrFriend">
   
   <div class="row">
        
                <div class="col-lg-6 imgCol">
                    <div class="stickyy"><img src="<?=base_url(!empty($infobox_image)?$infobox_image:'referral-program12.jpg'); ?>" /></div>
                </div>

                <div class="col-lg-6 txtCol">
                 <div class="txtrgt new-bl1">
                    <div class="text-par-rls">
                        <?=!empty($infobox_content)?$infobox_content:''; ?>
                    </div>
                  </div>  
                </div>
                
            <!--    
                
                <?php
                if(!empty($infobox2_content))
                {
                    ?>
                    <div class="col-lg-6 col-md-6 pull-left">
                        <div class="text-par-rl1">
                            <?=!empty($infobox2_content)?$infobox2_content:''; ?>
                        </div>
                    </div>
    
                    <div class="col-lg-6 col-md-6 pull-left">
                        <div class="prl-par"><img src="<?=base_url(!empty($infobox2_image)?$infobox2_image:'assets/img/refer-a-friend3.jpg'); ?>" /></div>
                    </div>
                    <?php
                }
                ?>
                
                -->
                
        </div>
</section>