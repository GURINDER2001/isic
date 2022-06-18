<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
	<div class="container-fluid">
		<div class="single-banner-item">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-12">
					<div class="banner-content">
						<h1 class="text-uppercase"><span style="color: #feed01;">News & Media </span></h1>
					</div>
				</div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url(!empty($pageContent->banner_img)?$pageContent->banner_img:'assets/img/news-2.jpg'); ?>" alt="image" />
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
				<a href="<?=base_url('news'); ?>">NEWS & MEDIA</a>
			</li>
			
			<li class="breadcrumbs__item1">News Details</li>
		</ul>
	</nav>
</section>

<!--------------------- what-we-do start --------------------->
<section class="blog-details-area bg-f9f9f9 ptb-100 recent-bl">
	<div class="container">
		<div class="what-we-do-content blog-pl12">
			<h3><?=!empty($record->name)?$record->name:''?></h3>
		</div>
		<div class="row">
            <div class="col-sm-3">        
              <div class="event-image">
                <img src="<?=base_url((!empty($record->featured_img)?$record->featured_img:'assets/front/images/event01.jpg'))?>" alt="<?=!empty($record->name)?$record->name:''?>"/>
                <!--<p><span class="date-format"><?=!empty($record->createdOn)?date('d.m.Y',strtotime($record->createdOn)):''?></span></p>-->
              </div>    
            </div>
            <div class="col-md-9">                    
                <div class="rec-details">
                    <p>By ISIC India | News | <?=!empty($record->createdOn)?date('d.m.Y',strtotime($record->createdOn)):''?></p>
                  <?=!empty($record->description)?$record->description:''?>                        
                </div>
            </div>
        </div>
    </div>
</section>