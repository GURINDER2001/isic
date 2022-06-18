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
						<h1 class="text-uppercase"><span style="color: #feed01;"><?=!empty($heading)?$heading:'Endorsement'; ?> </span></h1>
					</div>
				</div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/card-2.jpg'); ?>" alt="image" />
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
				<a href="javascript:;"><?=!empty($heading)?$heading:'Endorsement'; ?></a>
			</li>
		</ul>
	</nav>
</section>

<section class="about-area ptb-100 cards-iy endorsement-text">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="endorSctn1">
                    <div class="text">
                        <?=!empty($content)?$content:''; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if(!empty($keyinfo_content))
{
    $keyinfo_content = unserialize($keyinfo_content);
    ?>
    <section class="about-area ptb-100 new-bl1 par1-logo endor">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="about-content">
                        <div class="text text-left">
                            <h2><?=!empty($keyinfo_heading)?$keyinfo_heading:'Top Endorsement'; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 pull-left">
                    <?php
                    foreach ($keyinfo_content as $key => $rec)
                    {
                        ?>
                        <div class="col-lg-4 col-md-4 pull-left">
                            <div class="logo-par1">
                                <a href="#" data-toggle="modal" data-target="#myKeyModal<?=$key; ?>">
                                    <img src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/img/pdf2.png'); ?>" />
                                    <!--<img src="<?=base_url('assets/img/pdf2.png'); ?>" />-->
                                </a>
                            </div>
                            <div class="logo-cl1">
                                <?php
                                /*if(!empty($rec['logo']))
                                {
                                    ?>
                                    <img src="<?=base_url($rec['logo']); ?>" />
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <h3><?=!empty($rec['title'])?$rec['title']:''; ?></h3>
                                    <?php
                                }*/
                                ?>
                                <h3><?=!empty($rec['title'])?$rec['title']:''; ?></h3>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    foreach ($keyinfo_content as $key => $rec)
    {
        ?>
        <div class="modal fade" id="myKeyModal<?=$key; ?>" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close cl1-p" data-dismiss="modal">&times;</button>
                        <?php
                        if(!empty($rec['pdf']))
                        {
                            ?>
                            <embed src="<?=base_url($rec['pdf']); ?>#toolbar=0&navpanes=0&scrollbar=0" frameborder="0" width="100%" height="600px">
                            <?php
                        }
                        ?>
                        
                        <!--<img src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/img/end-img.png'); ?>" />-->
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
<?php
if(!empty($partner_logos))
{
    ?>
    <section class="about-area ptb-100 new-bl1 par1-logo logo-partner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="about-content">
                        <div class="text text-left">
                            <h2><?=!empty($partner_heading)?$partner_heading:'Benefits Partner'; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 pull-left">
                    <?php
    		        $partner_logos = unserialize($partner_logos);
    		        foreach($partner_logos  as  $key => $pLogo)
    		        {
    		            ?>
                        <div class="col-lg-4 col-md-4 pull-left">
                            <div class="logo-par1">
                                <a href="#" data-toggle="modal" data-target="#myPModal<?=$key; ?>">
                                    <img src="<?=base_url(!empty($pLogo['icon'])?$pLogo['icon']:'assets/img/pdf2.png'); ?>" />
                                    <!--<img src="<?=base_url('assets/img/pdf2.png'); ?>" />-->
                                </a>
                            </div>
                            <div class="logo-cl1">
                                <?php
                                /*if(!empty($pLogo['logo']))
                                {
                                    ?>
                                    <img src="<?=base_url($pLogo['logo']); ?>" />
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <h3><?=!empty($pLogo['title'])?$pLogo['title']:''; ?></h3>
                                    <?php
                                }*/
                                ?>
                                <h3><?=!empty($pLogo['title'])?$pLogo['title']:''; ?></h3>
                            </div>
                        </div>
                        <?php
    		        }
    		        ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    foreach($partner_logos  as  $key => $pLogo)
    {
        ?>
        <div class="modal fade" id="myPModal<?=$key; ?>" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close cl1-p" data-dismiss="modal">&times;</button>
                        <?php
                        if(!empty($pLogo['pdf']))
                        {
                            ?>
                            <embed src="<?=base_url($pLogo['pdf']); ?>#toolbar=0&navpanes=0&scrollbar=0" frameborder="0" width="100%" height="600px">
                            <?php
                        }
                        ?>
                        <!--<img src="<?=base_url(!empty($pLogo['logo'])?$pLogo['logo']:'assets/img/end-img.png'); ?>" />-->
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>

