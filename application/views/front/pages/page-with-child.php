<!------------------------ banner ------------------------>
<section class="inner-banner-contorller">
    <div class="inner-banner-contorller">
        <img src="<?=base_url(!empty($pageContent->banner_img)?$pageContent->banner_img:'assets/front/images/inner04.jpg'); ?>" alt="" />
        <div class="static-text"><a href="<?=base_url();?>">Home</a>/<?=!empty($pageContent)?$pageContent->name:'404-Not Found'?></div>
    </div>
</section>
<!--------------------- banner finish --------------------->

<!--------------------- what-we-do start --------------------->
<section class="what-we-do">
    <div class="container">
        <div class="head-title-blk"><?=!empty($pageContent)?$pageContent->name:'404-Not Found'?></div>

        <div class="inner-wrapper">
        	<?php
            if(!empty($pageContent))
            {
                ?>
	        	<div class="row">
	                <div class="col-md-12">
	                    <div class="rec-details">
	                        <?=$pageContent->description;?>
	                    </div>
	                </div>
	            </div>
	            <?php
	        }

            if(!empty($pageChilds))
            {
            	foreach ($pageChilds as $key => $child)
            	{
            		?>
            		<div class="row m-t-4">
		                <div class="col-md-7 col-sm-7">
		                    <div class="rec-details">
		                        <div class="rec-heading">
		                            <h3><?=!empty($child->name)?$child->name:'';?></h3>
		                        </div>
		                        <?=!empty($child->description)?substr($child->description, 0, 300).'...':'';?>
		                        <p><a href="<?=base_url(getPageSlug($child->id)); ?>">Read More</a></p>
		                    </div>
		                </div>
		                <div class="col-md-4 col-sm-4 pull-right">
		                    <div class="rec-pic">
		                        <img src="<?=base_url(!empty($child->featured_img)?$child->featured_img:'assets/front/images/student-pic01.jpg'); ?>" alt="" />
		                    </div>
		                </div>
		            </div>
            		<?php
            	}
            }
            ?>
            

        </div>
    </div>
</section>