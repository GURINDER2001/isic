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
						<h1 class="text-uppercase"><span style="color: #feed01;"><?=!empty($heading)?$heading:'Search Result'; ?> </span></h1>
					</div>
				</div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/t2.jpg'); ?>" alt="image" />
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
				<a href="javascript:;"><?=!empty($heading)?$heading:'Search Result For "'.$this->input->get('s').'"'; ?></a>
			</li>
		</ul>
	</nav>
</section>

<section style="padding-top: 50px; padding-bottom: 50px;" class="about-area ptb-100 cards-iy">
	<div class="container">
	    <?php
        if(!empty($records))
        {
            ?>
    	    <div class="row discounts-lists srchList">
                <?php
                foreach ($records as $key => $rec)
                {
                    ?>
                    <div class="col-md-3 providerBox mb-5">
                        <div class="providerBox_app">
                          <div class="card-img2"> <a href="<?=base_url('blog/'.$rec->slug); ?>" class="image d-block"> <img src="<?=base_url(!empty($rec->featured_img)?$rec->featured_img:'assets/front/images/news.jpg'); ?>" alt="image" width="100%"> </a> </div>
                          <div class="discount-details-div2">
                            <h4><a href="<?=base_url('blog/'.$rec->slug); ?>" class="image d-block"><?=!empty($rec->name)?$rec->name:''?></a></h4>
                            <?=!empty($rec->summary)?$rec->summary:''?>
                            <span class="mt-3"><a href="<?=base_url('blog/'.$rec->slug); ?>" class="default-btn ch1">Read More</a></span>
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
            <div class="row discounts-lists srchList">
                <div class="col-md-12 mb-5">
                    <p>Results not founds !!</p>
                </div>
            </div>
            <?php
        }
        ?>
	    
		<!--div class="faq-right testi">
			<nav aria-label="...">
				<ul style="text-align: center; display: block;" class="pagination">
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item active">
						<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
					</li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">4</a></li>
					<li class="page-item"><a class="page-link" href="#">5</a></li>
				</ul>
			</nav>
		</div-->
		
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
    
	</div>
</section>

        