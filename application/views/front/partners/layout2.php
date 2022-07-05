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

<?php
$featured_elements = !empty($featured_elements)?unserialize($featured_elements):array();
if(!empty($featured_elements))
{
    ?>
    <!-- Commercial Partner Section 1 Area -->
    <section class="partnerSctn1 py50 bgGrey">
        <div class="container">
            <div class="sctnTitle">
                <h2><?=!empty($featured_section_heading)?$featured_section_heading:'ISIC Student Ecosystem for Educational Institutions'; ?></h2>
            </div>
            <div class="row acRow1 r1">
                
                <?php
                foreach ($featured_elements as $rec)
                {
                    ?>
                    <div class="hex">
                        <div class="box">
                            <div><h4><?=$rec['heading']; ?></h4></div>
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
<?php
$endorsements_elements = !empty($endorsements_elements)?unserialize($endorsements_elements):array();
if(!empty($endorsements_elements))
{
    ?>
    <section class="partnerSctn5 bgGrey py50">
        <div class="container">
            <div class="sctnTitle">
                <h2><?=!empty($endorsements_carousal_heading)?$endorsements_carousal_heading:'Endorsements'; ?></h2>
                <p><?=!empty($endorsements_carousal_content)?$endorsements_carousal_content:''; ?></p>
            </div>
    
            <div class="partnerSlider owl-carousel owl-theme">
                <?php
    		    foreach($endorsements_elements as $row)
    		    {
    		        ?>
                    <div class="item">
                        <div class="logoBox"><img src="<?=base_url(!empty($row['image'])?$row['image']:'assets/img/endorsements-logo-1.png'); ?>" /></div>
                        <h5><?=!empty($row['heading'])?$row['heading']:''; ?></h5>
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
if(!empty($partners_logos))
{
    ?>
    <section class="partnerSctn6 bgDark py50">
        <div class="container">
            <div class="sctnTitle">
                <h2><?=!empty($carousal_heading)?$carousal_heading:'Partners'; ?></h2>
            </div>
    
            <div class="partnerSlider owl-carousel owl-theme">
                <?php
    		    foreach($partners_logos as $row)
    		    {
    		        ?>
    		        <div class="item">
                        <div class="logoBox"><img src="<?=base_url($row->logo); ?>" /></div>
                        <h5><?=$row->name; ?></h5>
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
            <div class="col-lg-6 col-md-6 pull-left card-bac-na" <?=!empty($enquiry_image)?'style="background-image:url('.base_url($enquiry_image).');"':''; ?>></div>
            <div class="col-lg-6 col-md-6 pull-left txtCap">
                <?php $this->load->view('front/partners/partner-form'); ?>
            </div>
        </div>
    </div>
</section>

<!-- Commercial Partner Section 1 Area -->