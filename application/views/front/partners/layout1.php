<?php
//pre($pageContent);
if(!empty($pageContent)) 
{  
    extract($pageContent); 
}

if(!empty($pageMeta)):
    foreach ( $pageMeta as $data):
      $array[$data->name]=$data->value;
    endforeach;
    if(!empty($array))
    {
       //pre($array);
       extract($array); 
    }
endif;
?>
<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
	<div class="container-fluid">
		<div class="single-banner-item">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-12">
					<div class="banner-content">
						<h1 class="text-uppercase"><span style="color: #feed01;"><?=!empty($name)?$name:'404 - Not Found'; ?> </span></h1>
					</div>
				</div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/bn-1.jpg'); ?>" alt="image" />
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
				<a href="javascript:;">Partners</a>
			</li>

			<li class="breadcrumbs__item1 partnr-1">
				<a href="javascript:;"><?=!empty($name)?$name:'404 - Not Found'; ?></a>
			</li>
		</ul>
	</nav>
</section> 
<section class="partnerSctn1 bgGrey">
    <div class="container">
        <div class="row row1">
            <div class="col-md-6 txt">
                <!--<img src="<?=base_url(!empty($about_logo_img)?$about_logo_img:'assets/img/ak-logo.jpg'); ?>" alt="image" /> -->
                <h2><?=!empty($about_heading)?$about_heading:''; ?></h2>
                <h5><?=!empty($about_content)?$about_content:''; ?></h5>
            </div>
            <div class="col-md-6 img alCnter"><img src="<?=base_url(!empty($about_featured_img)?$about_featured_img:'assets/img/cmrcl-card-img.png'); ?>" alt="image" /></div>
        </div>
    </div>
</section>
        
<!-- Commercial Partner Section 1 Area -->

<?php
$offer_elements = !empty($offer_elements)?unserialize($offer_elements):array();
if(!empty($offer_elements))
{
    ?>
    <section class="partnerSctn2 bgDark py50">
        <div class="container">
            <div class="sctnTitle">
                <h2><?=!empty($offer_section_heading)?$offer_section_heading:'Student Ecosystem Comprises of'; ?></h2>
            </div>
            <div class="row row2">
                <?php
                foreach ($offer_elements as $rec)
                {
                    ?>
                    <div class="col-md-4">
                        <div class="cardBox">
                            <div class="cardImg"><img src="<?=base_url(!empty($rec['image'])?$rec['image']:'assets/admin/images/no_image.gif'); ?>" alt="image" /></div>
                            <h4><?=!empty($rec['heading'])?$rec['heading']:''; ?></h4>
                            <p><?=!empty($rec['content'])?$rec['content']:''; ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <?php
}
?>
<?php
$key_elements = !empty($key_elements)?unserialize($key_elements):array();
if(!empty($key_elements))
{
    ?>
    <section class="partnerSctn3 bgGrey py50">
        <div class="container">
            <div class="sctnTitle">
                <h2><?=!empty($keyelement_section_heading)?$keyelement_section_heading:''; ?></h2>
            </div>
            <div class="row row3">
                <?php
                foreach ($key_elements as $rec)
                {
                    ?>
                    <div class="col-md-4">
                        <div class="cardBox">
                            <h4><?=!empty($rec['heading'])?$rec['heading']:''; ?></h4>
                            <p><?=!empty($rec['content'])?$rec['content']:''; ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <?php
}
?>
<?php
$highlight_elements = !empty($highlight_elements)?unserialize($highlight_elements):array();
if(!empty($highlight_elements))
{
    ?>
    <section class="partnerSctn3 partnerSctn4 bgDark py50">
        <div class="container">
            <div class="sctnTitle">
                <h2><?=!empty($highlight_section_heading)?$highlight_section_heading:'Why Students Love ISIC!'; ?></h2>
            </div>
            <div class="row row3">
                <?php
                foreach ($highlight_elements as $rec)
                {
                    ?>
                    <div class="col-md-4">
                        <div class="cardBox">
                            <h4><?=!empty($rec['heading'])?$rec['heading']:''; ?></h4>
                            <p><?=!empty($rec['content'])?$rec['content']:''; ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <?php
}
?>
<section class="about-area ptb-100 new-bl2c par1-logo enquiry-1 bgGrey">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 pull-left card-bac-na" <?=!empty($enquiry_image)?'style="background-position: center right;background-image:url('.base_url($enquiry_image).');"':''; ?>></div>
            <div class="col-lg-6 col-md-6 pull-left txtCap">
                <?php $this->load->view('front/partners/partner-form'); ?>
            </div>
        </div>
    </div>
</section>