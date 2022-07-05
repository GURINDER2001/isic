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
                        <h1 class="text-uppercase"><span style="color: #feed01;"><?=!empty($page_title)?$page_title:'DISCOUNTS'; ?> </span></h1>
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
                <a href="/"> <i class="fa fa-home" aria-hidden="true"></i> </a>
            </li>

            <li class="breadcrumbs__item1">
                <a href="#"><?=!empty($page_title)?$page_title:'DISCOUNTS'; ?></a>
            </li>
        </ul>
    </nav>
</section>

<section class="about-area ptb-100 cards-iy">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3">
                <a href="<?=!empty($provider['websiteUrl'])?$provider['websiteUrl']:''; ?>" class="image d-block">
					<img src="<?=!empty($provider['logoUrl'])?$provider['logoUrl']:base_url('assets/img/no_photo.png'); ?>" alt="image" width="150px" />
				</a>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="about-content pa-ab1">
                    <div class="text">
                        <h2><?=!empty($provider['name'])?$provider['name']:'Discounts'; ?></h2>
                        <p><?=!empty($provider['description'])?$provider['description']:'Discover new discounts in shops, restaurants or many other leisure activities in your area or take advantage of some unique online offerings. Remember that our cards have thousands of unique benefits waiting for you!'; ?></p>
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
    		    <div class="col-md-9">
                    <?php
                    //pre($benefits);
                    if(!empty($benefits['items']))
                    {
                        foreach($benefits['items'] as $benefit)
                        {
                            $benefitImg = $benefit[0];
                            
                           //pre($benefit);
                            $image = $benefitImg['media']['item']['images']['image'][0]['url'];
                            $imageUrl = !empty($image)?$image:$provider['logoUrl'];
                            ?>
							<div class="ds-wrap">
                            <div class="discountrow row">
                                <div class="col-md-2">
                                    <a href="<?=!empty($provider->websiteUrl)?$provider->websiteUrl:''; ?>" class="image d-block">
                    					<img src="<?=!empty($imageUrl)?$imageUrl:base_url('assets/img/no_photo.png'); ?>" alt="image" width="150px" />
                    				</a>
                    			</div>
                                <div class="col-md-8">
                                    <h3><?=!empty($benefit['summary'])?$benefit['summary']:''; ?></h3>
                                    <p><?=!empty($benefit['description'])?$benefit['description']:''; ?></p>
                                </div>
                                <div class="col-md-2">
                                    <?php
                                    /*if(!empty($discount->cardTypes))
                                    {
                                        ?>
										<div class="cards_bx">
                                        <h4>Card Type</h4>
                                        <ul class="card-list">
                                          <?php
                                            foreach($discount->cardTypes as $ct)
                                            {
                                                ?>
                                                <li><?=$ct;?></li>
                                                <?php
                                            }
                                            ?>  
                                        </ul>
										</div>
                                        <?php
                                    }*/
                                    ?>
                                </div>
                            </div>
							</div>
                            <?php
                        }
                    }
                    ?>
                </div>
    			<div class="col-md-3">
    			    <?php $this->view('front/discounts/sidebar'); ?>
                </div>
			</div>
		</div>
	</section>
</div>