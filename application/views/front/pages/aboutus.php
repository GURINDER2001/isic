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
				<div class="hmSctn1">
					<div class="text">
						<?=!empty($content)?$content:''; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="about-area ptb-100 new-bl1 par1-logo">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 col-md-12">
				<div class="about-content">
					<div class="text">
						<h2><?=!empty($partner_heading)?$partner_heading:'Global Partners'; ?></h2>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 pull-left">
			    <?php
			    if(!empty($partner_logos))
			    {
			        $partner_logos = unserialize($partner_logos);
			        foreach($partner_logos  as  $pLogo)
			        {
			            ?>
			            <div class="col-lg-3 col-md-3 pull-left">
        					<div class="logo-par">
        					    <?php
        					    if(!empty($pLogo['url']))
        					    {
        					        ?>
        					        <a href="<?=$pLogo['url']; ?>" target="_blank">
        					        <?php
        					    }
        					    ?>
        						<img src="<?=!empty($pLogo['logo'])?$pLogo['logo']:'assets/img/l-1.png'; ?>" />
        						<?php
        					    if(!empty($pLogo['url']))
        					    {
        					        ?>
        					        </a>
        					        <?php
        					    }
        					    ?>
        					</div>
        				</div>
			            <?php
			        }
			    }
			    ?>
			</div>
		</div>
	</div>
</section>


    <section class="rfr clbSctn">
    <div class="bgImg"><img src="<?=base_url(!empty($infobox_image)?$infobox_image:'assets/img/b1.jpg'); ?>" alt="" /></div>
    	<div class="container pabs">
    		<div class="row">
    			<div class="col-lg-7"></div>
    			<div class="col-lg-5 b1 txt listStyle hmprtnrSt">
    				<?=!empty($infobox_content)?$infobox_content:''; ?>
    			</div>
    		</div>
    	</div>
    </section>