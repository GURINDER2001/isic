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
						<h1 class="text-uppercase"><span style="color: #feed01;"><?=!empty($heading)?$heading:'Gallery'; ?></span></h1>
					</div>
				</div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/gal-1.jpg'); ?>" alt="image" />
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
				<a href="/"> <i class="fa fa-home" aria-hidden="true"></i> </a>
			</li>

			<li class="breadcrumbs__item1">
				<a href="#">Gallery</a>
			</li>
		</ul>
	</nav>
</section>

<section class="about-area ptb-100 cards-iy galler1">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 col-md-12">
				<div class="about-content pa-ab1">
					<div class="text">
						<h2 class="gal1"><?=!empty($heading)?$heading:'OUR GALLERY'; ?></h2>
						<?=!empty($content)?$content:''; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="about-area ptb-100 new-bl1 par1-logo gal-v1">
	<div class="container">
	    <div class="row">
    	    <?php
    	    if(!empty($imageGalleries))
    	    {
    	        foreach($imageGalleries as $rowIndex => $galleries)
    	        {
    	            if(($rowIndex+1)%2 == 0)
    	            {
                        if(!empty($galleries))
                        {
                            ?>
                			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                			    <?php
                			    foreach($galleries as $gallery)
                			    {
                			        if(!empty($gallery['image']))
                			        {
                    			        ?>
                    			        <div class="col-lg-6 col-md-6 col-sm-6 pull-left col-xs-12">
                        					<div class="single-gallery-item">
                        						<a data-fancybox="gallery" href="<?=base_url($gallery['image']); ?>">
                        							<img src="<?=base_url($gallery['image']); ?>" alt="<?=$gallery['title']; ?>" title="<?=$gallery['title']; ?>" />
                        						</a>
                        					</div>
                        				</div>
                    			        <?php
                			        }
                			    }
                			    ?>
                            </div>
                            <?php
                        }
                        if($videoGalleries[$rowIndex])
                        {
                            $videoGallery = $videoGalleries[$rowIndex];
                            if(!empty($videoGallery['image']))
                            {
                            ?>
                			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                					<div class="single-gallery-item">
                						<a data-fancybox="gallery" href="<?=$videoGallery['video_url']; ?>">
                							<img src="<?=base_url($videoGallery['image']); ?>" alt="<?=$videoGallery['title']; ?>" title="<?=$videoGallery['title']; ?>" />
                						</a>
                					</div>
                				</div>
                            </div>
        	                <?php
                            }
                        }
    	            }
    	            else
    	            {
    	                if($videoGalleries[$rowIndex])
                        {
                            $videoGallery = $videoGalleries[$rowIndex];
                            if(!empty($videoGallery['image']))
                            {
                                ?>
                			    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    					<div class="single-gallery-item">
                    						<a data-fancybox="gallery" href="<?=$videoGallery['video_url']; ?>">
                    							<img src="<?=base_url($videoGallery['image']); ?>" alt="<?=$videoGallery['title']; ?>" title="<?=$videoGallery['title']; ?>" />
                    						</a>
                    					</div>
                    				</div>
                                </div>
                                <?php
                            }
                        }
                        if(!empty($galleries))
                        {
                            ?>
                			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                			    <?php
                			    foreach($galleries as $gallery)
                			    {
                			        if(!empty($gallery['image']))
                			        {
                    			        ?>
                    			        <div class="col-lg-6 col-md-6 col-sm-6 pull-left col-xs-12">
                        					<div class="single-gallery-item">
                        						<a data-fancybox="gallery" href="<?=base_url($gallery['image']); ?>">
                        							<img src="<?=base_url($gallery['image']); ?>" alt="<?=$gallery['title']; ?>" title="<?=$gallery['title']; ?>" />
                        						</a>
                        					</div>
                        				</div>
                    			        <?php
                			        }
                			    }
                			    ?>
                            </div>
                            <?php
                        }
    	            }
    	        }
    	    }
    	    ?>
	    </div>
	</div>
</section>
