<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
	<div class="container-fluid">
		<div class="single-banner-item">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-12">
					<div class="banner-content">
						<h1 class="text-uppercase">
							<span style="color: #feed01;">
								NEWS & MEDIA
							</span>
						</h1>
					</div>
				</div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url('assets/img/news-2.jpg'); ?>" alt="image" />
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
				<a href="#">NEWS & MEDIA</a>
			</li>
		</ul>
	</nav>
</section>

<?php
if(!empty($records))
{
    foreach ($records as $key => $rec)
    {
        if(($key)%2 == 0)
        {
            ?>
            <section class="about-area ptb-100 cards-iy news-div-all1">
            	<div class="container">
            		<div class="row align-items-center">
            			<div class="col-lg-4 col-md-4">
            				<div class="about-img news-img">
            					<img src="<?=base_url(!empty($rec->featured_img)?$rec->featured_img:'assets/front/images/news-1.jpg'); ?>" alt="image" />
            				</div>
            			</div>
            			<div class="col-lg-8 col-md-8">
            				<div class="about-content">
            					<div class="text">
            						<h2><?=!empty($rec->name)?$rec->name:''?></h2>
            						<p>By ISIC India | News | <?=!empty($rec->createdOn)?date('d.m.Y',strtotime($rec->createdOn)):''?></p>
                                    <div class="newsShort"><?=!empty($rec->summary)?$rec->summary.'':''?></div>
            						<p><a href="<?=base_url('news/'.$rec->slug); ?>" class="default-btn ch1">Read More</a></p>
            					</div>
            				</div>
            			</div>
            		</div>
                </div>
            </section>
            <?php
        }
        else
        {
            ?>
            <section class="about-area ptb-100 cards-iy news-div-all2">
            	<div class="container">
            		<div class="row align-items-center">
            			<div class="col-lg-8 col-md-8">
            				<div class="about-content">
            					<div class="text">
            						<h2><?=!empty($rec->name)?$rec->name:''?></h2>
            						<p>By ISIC India | News | <?=!empty($rec->createdOn)?date('d.m.Y',strtotime($rec->createdOn)):''?></p>
                                     <div class="newsShort"><?=!empty($rec->summary)?$rec->summary.'':''?></div>
            						<p><a href="<?=base_url('news/'.$rec->slug); ?>" class="default-btn ch1">Read More</a></p>
            					</div>
            				</div>
            			</div>
            			<div class="col-lg-4 col-md-4">
            				<div class="about-img news-img">
            					<img src="<?=base_url(!empty($rec->featured_img)?$rec->featured_img:'assets/front/images/news-1.jpg'); ?>" alt="image" />
            				</div>
            			</div>
            		</div>
            	</div>
            </section>
            <?php
        }
    }
    ?>
    
    

    <?php
}
else
{
    echo '<p>No news founds !! </p>';
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
        