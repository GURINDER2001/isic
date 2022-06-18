<!-- Start Main Banner Area -->
<?php //pre($record); ?>
<section class="home-wrapper-area1">
  <div class="container-fluid">
    <div class="single-banner-item">
      <div class="row align-items-center">
        <div class="col-lg-4 col-md-12">
          <div class="banner-content">
            <h1 class="text-uppercase"><span style="color: #feed01;">BLOG </span></h1>
          </div>
        </div>
        <div class="col-lg-8 col-md-12">
          <div class="banner-image"> <img src="<?=base_url(!empty($record->banner_img)?$record->banner_img:'assets/img/blog1.jpg'); ?>" alt="image" /> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Main Banner Area -->

<section class="breadcrumbs12">
  <nav aria-label="Breadcrumbs">
    <ul class="breadcrumbs">
      <li class="breadcrumbs__item"> <a href="<?=base_url(); ?>"> <i class="fa fa-home" aria-hidden="true"></i> </a> </li>
      <li class="breadcrumbs__item1"> <a href="<?=base_url('blog'); ?>">BLOG</a> </li>
      <li class="breadcrumbs__item1">Blog Details</li>
    </ul>
  </nav>
</section>

<!--------------------- what-we-do start --------------------->
<section class="blog-details-area bg-f9f9f9 ptb-100 recent-bl">
  <div class="container">
    <div class="row">
      <div class="col-md-9 bgDtl">
        <div class="event-image"> <img src="<?=base_url((!empty($record->featured_img)?$record->featured_img:'assets/front/images/event01.jpg'))?>" alt="<?=!empty($record->name)?$record->name:''?>"/> 
          <!-- <p><span class="date-format"><?=!empty($record->createdOn)?date('d.m.Y',strtotime($record->createdOn)):''?></span></p>--> 
        </div>
        <div class="rec-details listStyle">
          <h1 class="title">
            <?=!empty($record->name)?$record->name:''?>
          </h1>
          <?=!empty($record->description)?$record->description:''?>
        </div>
      </div>
      
      <div class="col-sm-3 bgsidebar">
        <?php
	    if(!empty($cats))
	    {
	        ?>
            <div class="w-100 sidbarBox mb-4">
              <div class="title">Categories</div>
              <div class="bgList">
    	        <ul>
    	            <?php
    	            foreach($cats as $cat)
    	            {
    	                ?>
    	                <li><a href="<?=base_url('blog/category/'.$cat->slug); ?>"><?=$cat->name; ?></a></li>
    	                <?php
    	            }
    	            ?>
    			</ul>
            </div>
            </div>
            <?php
	    }
	    ?>
        <?php
	    if(!empty($recents))
	    {
	        ?>
            <div class="w-100 sidbarBox mb-4">
              <div class="title">Recent Blog</div>
              <div class="bgList">
                <ul>
                    <?php
    	            foreach($recents as $post)
    	            {
    	                ?>
                        <li>
                            <a href="<?=base_url('blog/'.$post->slug); ?>"><?=$post->name; ?></a>
                            <h6><?=date('d.m.Y',strtotime($post->createdOn)); ?></h6>
                        </li>
                        <?php
    	            }
    	            ?>
                </ul>
              </div>
            </div>
            <?php
	    }
	    ?>
        <!--div class="w-100 sidbarBox mb-4">
          <div class="title">Most viewed blog</div>
          <div class="bgList">
            <ul>
              <li><a href="#">Lorem ipsum dolor</a></li>
              <li><a href="#">consectetur adipiscing</a></li>
              <li><a href="#">eiusmod tempor</a></li>
              <li><a href="#">incididunt </a></li>
              <li><a href="#">labore</a></li>
            </ul>
          </div>
        </div-->
      </div>
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
    			<h3>Trending Discounts</h3>
    		</div>
    		<div class="row">
    			<div class="col-lg-12 col-md-12">
    				<div class="row">
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
            				<div class="col-lg-3 col-md-3">
    						    <div class="single-blog-post">
    						        <div class="image">
    								    <a href="<?=$url; ?>" class="d-block trending-img">
                    						<img src="<?=base_url(!empty($discount->featured_img)?$discount->featured_img:'assets/img/no_photo.png'); ?>" alt="image" width="100%" style="height:100px; width:auto;" />
                    					</a>
            					    </div>
            					    <div class="content">
        								<h3><a href="<?=$url; ?>"><?=$discount->name; ?></a></h3>
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
