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

<section class="topTxtSctn">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="txtNormal">
                    <div class="text">
                        <?=!empty($page_content)?$page_content:''; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="green-layer dsc newDsc">
	<?php $this->view('front/discounts/filter-form'); ?>
	<section class="portfolio-area dsPage">
		<div class="container-fluid">
		    <div class="row  mt-5">
    		   <div class="col-md-9">
    		        <?php
    			    if($type == 'bm' && !empty($providers))
    			    {
    			        $providers = !empty($providers['items'])?$providers['items']:array();
    			        ?>
            			<div class="row discountsLists">
            			    <?php
        			        foreach($providers['provider'] as $provider)
        			        {
    		                    $image = $provider['benefits']['benefit'][0]['media']['item']['images']['image'][0]['url'];
    		                    $imageUrl = !empty($image)?$image:$provider['logo'];
        			            ?>
                				<div class="col-md-4 providerBox mb-5">
                				    <div class="providerBox_app">
                				        <div class="card-img2">
                				            <a href="<?=base_url('discounts/abroad/provider/'.$provider['providerId']); ?>" class="image d-block">
                						        <img src="<?=!empty($imageUrl)?$imageUrl:base_url('assets/img/no_photo.png'); ?>" alt="image" width="100%" />
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
                                       <span class="plsIcn"><a href="<?=base_url('discounts/abroad/provider/'.$provider['providerId']); ?>"><i class="bx bx-plus"></i></a></span>
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
                        <div class="row discountsLists">
            			    <?php
    			            foreach($providers->items as $provider)
        			        {
        			            //pre($provider);
        			            $imgObj = $provider->image;
        			            //$imageUrl = !empty($imgObj[1]->url)?$imgObj[1]->url:$provider->logoUrl;
        			            $imageUrl = !empty($provider->imageUrl)?$provider->imageUrl:$provider->logoUrl;
        			            ?>
                				<div class="col-md-4 providerBox mb-5">
                				    <div class="providerBox_app">
                				        <div class="card-img2">
                        					<a href="<?=base_url('discounts/india/provider/'.$provider->id); ?>" class="image d-block">
                        						<img src="<?=!empty($imageUrl)?$imageUrl:base_url('assets/img/no_photo.png'); ?>" alt="image" width="100%" />
                        					</a>
                					    </div>
            						    <div class="discount-details-div2">
            								<h3><a href="<?=base_url('discounts/india/provider/'.$provider->id); ?>" class="image d-block"><?=$provider->name; ?></a></h3>
            								<p><?=!empty($provider->shortDescription)?$provider->shortDescription:''; ?></p>
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
                                        <span class="plsIcn"><a href="<?=base_url('discounts/india/provider/'.$provider->id); ?>"><i class="bx bx-plus"></i></a></span>
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
    		   <div class="col-md-3">
    				<div class="sticky">
        			    <?php $this->view('front/discounts/sidebar'); ?>
                    </div>
               </div>
               
			</div>
			</div>
		</div>
	</section>
</div>