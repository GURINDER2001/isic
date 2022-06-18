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
						<img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/faq-banner.jpg'); ?>" alt="image" />
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

<section style="padding-top: 50px; padding-bottom: 50px;" class="about-area ptb-100 cards-iy">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 col-md-12">
				<div class="faqSctn1">
					<div class="text text-center">
						<?=!empty($content)?$content:''; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

 <section class="rfr clbSctn faqsPage">
     <div class="bgImg"><img src="<?=base_url(!empty($promotional_image1)?$promotional_image1:'assets/img/f1.png'); ?>" alt="" /></div>
	<div class="container pabs">
    <div class="row">
			<div class="col-lg-7"></div>
			<div class="col-lg-5 faqsHt">
				<div class="faq-right">
					<div class="bs-example">
					    <?php
					    if(!empty($records))
					    {
					        ?>
					        <div class="accordion faqList">
					            <?php
					            foreach($records as $index => $rec)
					            {
					                ?>
        							<h4><?=!empty($rec->question)?$rec->question:''; ?></h4>
        							<div class="cardBody"><?=!empty($rec->answer)?$rec->answer:''; ?></div>
					                <?php
					            }
					            ?>
    						</div>
					        <?php
					    }
					    ?>
						
					</div>
					<?php
                    if(!empty($paginations))
                    {
                        ?>
    					<section class="page-n1">
                        	<div class="col-lg-12 col-md-12">
                        		<div class="pagination-area text-center">
                        		    <?=$paginations; ?>
                        		</div>
                        	</div>
                        </section>
                        <?php
                    }
                    ?>
				</div>
			</div>
	</div>
    </div>
</section>
		





<script>
jQuery(document).ready(function() { 
  //jQuery(".faqList h4").eq(0).addClass("active");
  //jQuery(".faqList div").eq(0).show(); 
  jQuery(".faqList h4").click(function() { 
    jQuery(this).next("div").slideToggle("mediam") .siblings("div:visible").slideUp("mediam"); 
	 jQuery(this).toggleClass("active"); $(this).siblings("h4").removeClass("active"); 
  }); 
}); 


</script>
