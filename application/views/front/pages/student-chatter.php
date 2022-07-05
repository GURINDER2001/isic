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
						<h1 class="text-uppercase"><span style="color: #feed01;"><?=!empty($heading)?$heading:''; ?> </span></h1>
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
				<a href="javascript:;"><?=!empty($heading)?$heading:''; ?></a>
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
    		<div class="row stuChtr">
    		    <?php
	            foreach($records as $index => $rec)
	            {
	                //pre($rec);
	                ?>
        			<div class="col-lg-6 col-md-6">
        				<div class="test-inner">
        					<div class="test-inner1">
        						<img class="qt1" src="<?=base_url('assets/img/quote1.png'); ?>" />
        						<?=!empty($rec->content)?$rec->content:''; ?>
        						<img class="quote2" src="<?=base_url('assets/img/quote2.png'); ?>" />
        						
        					</div>
        						<div class="user-info">
        							<h5><img src="<?=base_url(!empty($rec->user_pic)?$rec->user_pic:'assets/img/kalna.jpg'); ?>" /> <span><?=!empty($rec->username)?$rec->username:''; ?></span></h5>
        						</div>
        				
        	            </div>
                    </div>
        			<?php
	            }
	            ?>
            </div>
    		<?php
	    }
	    ?>
	    <?php
        if(!empty($paginations))
        {
            ?>
			<section class="page-n1">
            	<div class="col-lg-12 col-md-12">
            		<div class="pagination-area text-center">
            		    <?=$paginations; ?>
            		</div>
            	</div>
            </section>
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
	</div>
</section>

        