<?php
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
						<h1 class="text-uppercase"><span style="color: #feed01;"><?=!empty($page_title)?$page_title:'BLOGS'; ?> </span></h1>
					</div>
				</div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/blog1.jpg'); ?>" alt="image" />
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
				<a href="#"><?=!empty($page_title)?$page_title:'BLOGS'; ?></a>
			</li>
		</ul>
	</nav>
</section>
<section class="page-n2">
	<div class="container tpcs">
		<div class="row align-center">
			<div class="col-lg-12 col-md-12">
				<h2>Topics</h2>
			</div>
			<div class="col-lg-12 col-md-12">
				<div class="topics-1-area">
				    <?php
				    if(!empty($cats))
				    {
				        ?>
				        <ul class="trev1">
				            <li><a href="<?=base_url('blog'); ?>">All</a></li>
				            <?php
				            foreach($cats as $cat)
				            {
				                ?>
				                <li><a href="<?=base_url('blog/category/'.$cat->slug); ?>"><?=$cat->name; ?></a></li>
				                <?php
				            }
				            ?>
    					</ul>
				        <?php
				    }
				    ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="blog-details-area bg-f9f9f9 ptb-70 recent-bl">
	<div class="container">
		<div class="what-we-do-content blog-pl12">
			<h2>Recent Blogs </h2>
		</div>
	   <div class="row">
                    <?php if(!empty($records)) { ?>
    				    <?php foreach ($records as $key => $rec) { ?>
                            <div class="col-lg-3 col-md-3 mb-4">
                                <div class="single-blog-post bp">
                                  <div class="image">
                                        <a href="<?=base_url('blog/'.$rec->slug); ?>" class="d-block">
                                            <img src="<?=base_url(!empty($rec->featured_img)?$rec->featured_img:'assets/front/images/news.jpg'); ?>" alt=""/>
                                        </a>
                                    </div>
                                  <div class="content">
                                    <h3><a href="<?=base_url('blog/'.$rec->slug); ?>"><?=!empty($rec->name)?$rec->name:''?></a></h3>
                                    <?=!empty($rec->summary)?$rec->summary:''?>
                                    <!--p><?=!empty($rec->createdOn)?date('d.m.Y',strtotime($rec->createdOn)):''?> </p-->
                                    <div class="card-btn btnb">
                            			<a href="<?=base_url('blog/'.$rec->slug); ?>" class="default-btn ch1">Read More</a>
                            		</div>
                                  </div>
                                </div>
                        </div>
                            <?php } ?>
                    <?php } else { echo '<p>No Topics founds !! </p>'; } ?> 
    				</div>
	</div>
</section>
<?php
if(!empty($popular_records))
{
    ?>
    <section class="blog-details-area bg-f9f9f9 ptb-70 blog-color1">
    	<div class="container">
    		<div class="what-we-do-content blog-pl12">
    			<h2>Most Viewed Blogs</h2>
    		</div>
    		<div class="row">
    			<div class="col-lg-12 col-md-12">
    				<div class="row">
    				    <?php
                        foreach ($popular_records as $key => $rec)
                        {
                            ?>
                            <div class="col-lg-3 col-md-3">
                                <div class="single-blog-post bp">
                                  <div class="image">
                                        <a href="<?=base_url('blog/'.$rec->slug); ?>" class="d-block">
                                            <img src="<?=base_url(!empty($rec->featured_img)?$rec->featured_img:'assets/front/images/news.jpg'); ?>" alt=""/>
                                        </a>
                                    </div>
                                  <div class="content">
                                    <h3><a href="<?=base_url('blog/'.$rec->slug); ?>"><?=!empty($rec->name)?$rec->name:''?></a></h3>
                                    <?=!empty($rec->summary)?$rec->summary:''?>
                                    <!--p><?=!empty($rec->createdOn)?date('d.m.Y',strtotime($rec->createdOn)):''?> </p-->
                                    <div class="card-btn btnb">
                            			<a href="<?=base_url('blog/'.$rec->slug); ?>" class="default-btn ch1">Read More</a>
                            		</div>
                                  </div>
                                </div>
                        </div>
                            <?php
                        }
                        ?>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <?php
}
?>


    <section class="page-n1">
    	<div class="col-lg-12 col-md-12">
    		<div class="pagination-area text-center">
    		    <?php
                if(!empty($paginations))
                {
                    echo $paginations;
                }
                ?>
    		</div>
    	</div>
    </section>

<?php
if(!empty($discounts))
{
    ?>
    <section class="blog-details-area bg-f9f9f9 ptb-100 blog-color1 trending-ds">
    	<div class="container">
    		<div class="what-we-do-content blog-pl12 trending-text">
    			<h2>Trending Discounts</h2>
    		</div>
    		<div class="row">
    			<div class="col-lg-12 col-md-12 blgTrnd">
    				<div class="partnerSlider owl-carousel owl-theme">
    				    <?php
    				    foreach($discounts as $discount)
    			        {
    			            if(!empty($discount->country_id) && $discount->country_id == 101)
    			            {
    			                $url = base_url('discounts/india/provider/'.$discount->providerId_api);
    			            }
    			            else
    			            {
    			                $url = base_url('discounts/abroad/provider/'.$discount->providerId_api);
    			            }
    			            ?>
            				<div class="item">
    						        <div class="logoBox">
    								    <a href="<?=$url; ?>" class="d-block trending-img">
                    						<img src="<?=base_url(!empty($discount->featured_img)?$discount->featured_img:'assets/img/no_photo.png'); ?>" alt="image" width="100%" style="height:100px; width:auto;" />
                    					</a>
            					    </div>
        								<h5><a href="<?=$url; ?>"><?=$discount->name; ?></a></h5>
                                </div>
                            <?php
    			        }
    			        ?>
    				</div>
    			</div>
    		</div>
        </div>
    </section>
    <?php
}
?>

