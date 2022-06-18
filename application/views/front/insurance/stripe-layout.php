<?php
if(!empty($pageContent))
{
    extract($pageContent);
}
?>
<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
	<div class="container-fluid">
		<div class="single-banner-item">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-12">
					<div class="banner-content">
						<h1 class="text-uppercase"><span style="color: #feed01;"><?=!empty($name)?$name:''; ?> </span></h1>
					</div>
				</div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url(!empty($featured_img)?$featured_img:'assets/img/in1.jpg'); ?>" alt="image" />
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
				<a href="#"><?=!empty($name)?$name:''; ?></a>
			</li>
		</ul>
	</nav>
</section>

<?php
if(!empty($keyinfo_content))
{
    $keyinfo_arr = unserialize($keyinfo_content);
    if(!empty($keyinfo_arr))
    {
        foreach($keyinfo_arr as $key => $keyinfo)
        {
            //pre($keyinfo);
            $index = $key + 1;
            if($index == 1 || $index % 4 == 0)
            {
                ?>
                <section class="about-area ptb-100 cards-iy medicl-1-c">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12">
                                <div class="about-img">
                                    <img src="<?=base_url(!empty($keyinfo['icon'])?$keyinfo['icon']:'assets/img/med1.jpg'); ?>" alt="<?=!empty($keyinfo['title'])?$keyinfo['title']:'Image'; ?>" />
                                </div>
                            </div>
                
                            <div class="col-lg-6 col-md-12">
                                <div class="about-content listStyle">
                                    <div class="text">
                                        <h2><?=!empty($keyinfo['title'])?$keyinfo['title']:''; ?></h2>
                                        <?=!empty($keyinfo['content'])?$keyinfo['content']:''; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
            }
            if($index == 2 || $index % 5 == 0)
            {
                ?>
                <section style="background-image: url('<?=base_url(!empty($keyinfo['icon'])?$keyinfo['icon']:'assets/img/beni-1.jpg'); ?>'); background-repeat: no-repeat;" class="b1 pt-100 pb-100 benefits-1-medi">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 listStyle txtblack">
                                <h2><?=!empty($keyinfo['title'])?$keyinfo['title']:''; ?></h2>
                                <?=!empty($keyinfo['content'])?$keyinfo['content']:''; ?>
                            </div>
                            <div class="col-lg-7"></div>
                        </div>
                    </div>
                </section>
                <?php
            }
            if($index == 3 || $index % 3 == 0)
            {
                ?>
                <section class="about-area ptb-100 new-bl1">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-5 img12-padding">
                                <div class="about-img">
                                    <img src="<?=base_url(!empty($keyinfo['icon'])?$keyinfo['icon']:'assets/img/medical-insurance-ct.jpg'); ?>" alt="<?=!empty($keyinfo['title'])?$keyinfo['title']:'Image'; ?>" />
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <div class="about-content listStyle txtwhite">
                                    <div class="text">
                                        <h2><?=!empty($keyinfo['title'])?$keyinfo['title']:''; ?></h2>
                                        <?=!empty($keyinfo['content'])?$keyinfo['content']:''; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
            }
        }
    }
}
?>