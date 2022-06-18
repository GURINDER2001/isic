<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
    <div class="container-fluid">
        <div class="single-banner-item">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="banner-content">
                        <h1 class="text-uppercase"><span style="color: #feed01;">DISCOUNTS </span></h1>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="banner-image">
                        <img src="<?=base_url('assets/img/card-2.jpg'); ?>" alt="image" />
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
                <a href="#">DISCOUNTS</a>
            </li>
        </ul>
    </nav>
</section>

<section class="about-area ptb-100 cards-iy">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="about-content pa-ab1">
                    <div class="text">
                        <h2>Discounts</h2>
                        <p><strong>Welcome to the world of discounts for ISIC, ITIC, IYTC!</strong></p>
                        <p>Discover new discounts in shops, restaurants or many other leisure activities in your area or take advantage of some unique online offerings. Remember that our cards have thousands of unique benefits waiting for you!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="green-layer">
	<?php $this->view('front/discounts/filter-form'); ?>
	<section class="portfolio-area pt-00 pb-00">
		<div class="container-fluid">
		    <div class="row  mt-5">
		        <div class="col-md-3">
    			    <div class="sticky">
        			    <?php $this->view('front/discounts/sidebar'); ?>
                    </div>
                </div>
    		    <div class="col-md-9">
    		        <?php
    			    if($type == 'bm' && !empty($providers))
    			    {
    			        ?>
            			<div class="row discounts-lists">
            			    <?php
        			        foreach($providers['providers'] as $provider)
        			        {
        			            ?>
                				<div class="col-md-4 providerBox mb-5">
                				    <div class="providerBox_app">
                				        <div class="card-img2">
                				            <a href="<?=base_url('discounts/abroad/provider/'.$provider['providerId']); ?>" class="image d-block">
                						        <img src="<?=!empty($provider['logo'])?$provider['logo']:base_url('assets/img/no_photo.png'); ?>" alt="image" width="100%" />
                					        </a>
                					    </div>
            						    <div class="discount-details-div2">
            										<h3><a href="<?=base_url('discounts/abroad/provider/'.$provider['providerId']); ?>" class="image d-block"><?=$provider['name']; ?></a></h3>
            										<p><?=!empty($provider['description'])?$provider['description']:''; ?></p>
                									<?php
                									if(!empty($provider['websiteUrl']))
                									{
                									    ?>
                									    <!--a href="<?=$provider['websiteUrl']; ?>" target="_blank" class="image d-block">
                    									    <i class="bx bx-plus"></i>
                    									</a-->
                									    <?php
                									}
                									?>
            						        </div>
                                    </div>
                                </div>
                                <?php
        			        }
            			    ?>
                        </div>
                        <?php
    			    }
    			    elseif($type != 'bm' && !empty($providers->items))
    			    {
    			        ?>
                        <div class="row discounts-lists">
            			    <?php
    			            foreach($providers->items as $provider)
        			        {
        			            ?>
                				<div class="col-md-4 providerBox mb-5">
                				    <div class="providerBox_app">
                				        <div class="card-img2">
                        					<a href="<?=base_url('discounts/india/provider/'.$provider->id); ?>" class="image d-block">
                        						<img src="<?=!empty($provider->logoUrl)?$provider->logoUrl:base_url('assets/img/no_photo.png'); ?>" alt="image" width="100%" />
                        					</a>
                					    </div>
            						    <div class="discount-details-div2">
            								<h3><a href="<?=base_url('discounts/india/provider/'.$provider->id); ?>" class="image d-block"><?=$provider->name; ?></a></h3>
            								<p><?=!empty($provider->description)?$provider->description:''; ?></p>
        									<?php
        									if(!empty($provider->websiteUrl))
        									{
        									    ?>
        									    <!--a href="<?=$provider->websiteUrl; ?>" target="_blank" class="image d-block">
            									    <i class="bx bx-plus"></i>
            									</a-->
        									    <?php
        									}
        									?>	
            						    </div>
                                    </div>
                                </div>
                                <?php
        			        }
            			    ?>
                        </div>
                        <?php
    			    }
    			    else
    			    {
    			        ?>
    			        <div class="row">
    			            <div class="alert alert-danger">Discount not available !!</p>
    			        </div>
    			        <?php
    			    }
    			    ?>
                </div>
			</div>
		</div>
	</section>
</div>