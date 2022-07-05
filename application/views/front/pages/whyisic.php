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
            <h1 class="text-uppercase"><span style="color: #feed01;">
              <?=!empty($heading)?$heading:''; ?>
              </span></h1>
          </div>
        </div>
        <div class="col-lg-8 col-md-12">
          <div class="banner-image"> <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/card-2.jpg'); ?>" alt="image" /> </div>
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
      <li class="breadcrumbs__item1"> <a href="javascript:;">
        <?=!empty($heading)?$heading:''; ?>
        </a> </li>
    </ul>
  </nav>
</section>
<?php
if(!empty($key_features))
{
    $key_features = unserialize($key_features);
    ?>
<section class="about-area eco-ls">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="about-image eco-ls1"><img alt="image" src="<?=!empty($keyfeature_img)?$keyfeature_img:'assets/img/cards-new1.png'; ?>" /></div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="about-content">
          <div class="content">
            <?php
                            foreach ($key_features as $key => $rec)
                            {
                                ?>
            <div class="icon-cso">
              <div class="col-lg-2 col-md-2 pull-left"><img src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/img/ecosy1.png'); ?>" /></div>
              <div class="col-lg-10 col-md-10 pull-left">
                <p>
                  <?=!empty($rec['title'])?$rec['title']:''; ?>
                </p>
              </div>
            </div>
            <?php
                            }
                            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
}
?>
<?php
if(!empty($highlights) || !empty($steps))
{
    $highlights = unserialize($highlights);
    $steps = unserialize($steps);
    ?>
<section class="mobil services-area services-style-two pt-110 pb-120">
  <div class="container-fluid">
    <div class="row align-items-center">
      <?php
                $classArr = array('card-p1p','card-p1p2','card-p1p3','card-p1p4');
                $class2Arr = array('card-p1p5','card-p1p6','card-p1p6','card-p1p8');
                $delayArr = array('0.2s','0.4s','0.6s','0.8s');
                ?>
      <div class="col-xl-4 col-lg-6 col-md-6">
        <?php
                    foreach($highlights as $index => $highlight)
                    {
                        ?>
        <div class="single-delivery-services mb-70 pr-40 wow fadeInLeft <?=$classArr[$index]; ?>" data-wow-delay="<?=$delayArr[$index]; ?>" style="visibility: visible; animation-delay: <?=$delayArr[$index]; ?>; animation-name: fadeInLeft;">
          <div class="col-lg-8 col-md-8 pull-left ds-content text-center text-sm-left text-md-right">
            <p>
              <?=!empty($highlight['title'])?$highlight['title']:''; ?>
            </p>
          </div>
          <div class="col-lg-4 col-md-4 pull-left ds-icon order-0 order-md-2"><img src="<?=base_url(!empty($highlight['icon'])?$highlight['icon']:'assets/img/cd-1.png'); ?>" /></div>
        </div>
        <?php
                    }
                    ?>
      </div>
      <div class="col-xl-4 d-none d-xl-block">
        <div class="d-services-img"><img alt="img" src="<?=base_url('assets/img/eco-ba.png'); ?>" /> <img alt="image" class="icol" src="<?=base_url(!empty($section_img)?$section_img:'assets/img/em.png'); ?>" /></div>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-6">
        <?php
                    foreach($steps as $index => $step)
                    {
                        ?>
        <div class="single-delivery-services mb-70 pl-40 wow fadeInRight <?=$class2Arr[$index]; ?>" data-wow-delay="<?=$delayArr[$index]; ?>" style="visibility: visible; animation-delay: <?=$delayArr[$index]; ?>; animation-name: fadeInRight;">
          <div class="col-lg-3 col-md-3 pull-left"><img src="<?=base_url(!empty($step['icon'])?$step['icon']:'assets/img/cd-5.png'); ?>" /></div>
          <div class="col-lg-9 col-md-9 pull-left ds-content">
            <p>
              <?=!empty($step['title'])?$step['title']:''; ?>
            </p>
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
}
?>
<div class="scrnLoop sctnWhyisic">
<section class="empty"></section>
  <?php
if(!empty($infobox_content))
{
    ?>
  <section class="wsctn1">
    <div class="aboutImg"><img alt="image" src="<?=base_url(!empty($infobox_image)?$infobox_image:'assets/img/cards-new1.png'); ?>" /></div>
    <div class="sText listStyle">
      <h2>
        <?=!empty($infobox_heading)?$infobox_heading:''; ?>
      </h2>
      <?=!empty($infobox_content)?$infobox_content:''; ?>
    </div>
  </section>
  <?php
}
/*if(!empty($infobox2_content))
{
    ?>
  <section class="wsctn2">
    <div class="aboutImg"><img alt="image" src="<?=base_url(!empty($infobox2_image)?$infobox2_image:'assets/img/em.png'); ?>" /></div>
    <div class="sText listStyle">
      <h2>
        <?=!empty($infobox2_heading)?$infobox2_heading:''; ?>
      </h2>
      <?=!empty($infobox2_content)?$infobox2_content:''; ?>
    </div>
  </section>
  <?php
}*/
if(!empty($infobox3_content))
{
    ?>
  <section class="wsctn3">
    <div class="aboutImg"><img alt="image" src="<?=base_url(!empty($infobox3_image)?$infobox3_image:'assets/img/em.png'); ?>" /></div>
    <div class="sText listStyle">
      <h2>
        <?=!empty($infobox3_heading)?$infobox3_heading:''; ?>
      </h2>
      <?=!empty($infobox3_content)?$infobox3_content:''; ?>
    </div>
  </section>
  <?php
}
if(!empty($infobox4_content))
{
    ?>
  <section class="wsctn4">
    <div class="aboutImg"><img alt="image" src="<?=base_url(!empty($infobox4_image)?$infobox4_image:'assets/img/em.png'); ?>" /></div>
    <div class="sText listStyle">
      <h2>
        <?=!empty($infobox4_heading)?$infobox4_heading:''; ?>
      </h2>
      <?=!empty($infobox4_content)?$infobox4_content:''; ?>
    </div>
  </section>
  <?php
}
/*if(!empty($infobox5_content))
{
    ?>
  <section class="wsctn5">
    <div class="aboutImg"><img alt="image" src="<?=base_url(!empty($infobox5_image)?$infobox5_image:'assets/img/em.png'); ?>" /></div>
    <div class="sText listStyle">
      <h2>
        <?=!empty($infobox5_heading)?$infobox5_heading:''; ?>
      </h2>
      <?=!empty($infobox5_content)?$infobox5_content:''; ?>
    </div>
  </section>
  <?php
}*/
?>
</div>
