<?php
if(!empty($record))
{
    //pre($record);
}
?>

<!-- Start Main Banner Area -->

<section class="home-wrapper-area1">
  <div class="container-fluid">
    <div class="single-banner-item">
      <div class="row align-items-center">
        <div class="col-lg-4 col-md-12">
          <div class="banner-content">
            <h1 class="text-uppercase"><span style="color: #feed01;">
              <?=!empty($record->name)?$record->name:'Isic'; ?>
              </span></h1>
          </div>
        </div>
        <div class="col-lg-8 col-md-12">
          <div class="banner-image"> <img src="<?=base_url(!empty($record->banner_img)?$record->banner_img:'assets/img/card-2.jpg'); ?>" alt="image" /> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Main Banner Area -->

<section class="breadcrumbs12">
  <nav aria-label="Breadcrumbs">
    <ul class="breadcrumbs">
      <li class="breadcrumbs__item"> <a href="/"> <i class="fa fa-home" aria-hidden="true"></i> </a> </li>
      <!--<li class="breadcrumbs__item1">
                <a href="#"> Cards </a>
            </li>-->
      <li class="breadcrumbs__item1"> <a href="#">
        <?=!empty($record->name)?strtoupper($record->name):'ISIC'; ?>
        </a> </li>
    </ul>
  </nav>
</section>
<section class="cardsDtlpg">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-12">
        <div class="about-img"><img alt="image" src="<?=base_url(!empty($record->featured_img)?$record->featured_img:'assets/img/IYTC-front.jpg'); ?>" /></div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="cardDtlSctn1">
          <div class="text listStyle">
            <?=!empty($record->description)?$record->description:''; ?>
            <?php
            $keyinfo_content = !empty($record->keyinfo_content)?unserialize($record->keyinfo_content):array();
            if(!empty($keyinfo_content))
            {
                ?>
                <div class="accordion12">
                    <?php
                    foreach($keyinfo_content as $keyinfo)
                    {
                        ?>
                        <button class="accordion"><span class="validity1"><?=!empty($keyinfo['title'])?$keyinfo['title']:''; ?></span></button>
                        <div class="panel">
                            <p><?=!empty($keyinfo['content'])?$keyinfo['content']:''; ?></p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
            <div class="card-btn back1"><a class="default-btn ch1" href="<?=getSetting('order_url'); ?>">Get your Card</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="scrnLoop">
  <?php
if(!empty($record->infobox_heading) || !empty($record->infobox_content))
{
    ?>
  <section>
    <div class="sText listStyle">
      <h2><?=!empty($record->infobox_heading)?$record->infobox_heading:''; ?></h2>
      <?=!empty($record->infobox_content)?$record->infobox_content:''; ?>
    </div>
    <div class="aboutImg"><img alt="image" src="<?=base_url(!empty($record->infobox_img)?$record->infobox_img:'assets/img/c-card-1.jpg'); ?>" /></div>
  </section>
  <?php
}


if(!empty($record->infobox2_heading) || !empty($record->infobox2_content))
{
    ?>
  <section>
    <div class="sText listStyle">
      <h2><?=!empty($record->infobox2_heading)?$record->infobox2_heading:''; ?></h2>
      <?=!empty($record->infobox2_content)?$record->infobox2_content:''; ?>
    </div>
    <div class="aboutImg"><img alt="image" src="<?=base_url(!empty($record->infobox2_img)?$record->infobox2_img:'assets/img/c-card-1.jpg'); ?>" /></div>
  </section>
  <?php
}


if(!empty($record->infobox3_heading) || !empty($record->infobox3_content))
{
    ?>
  <section>
    <div class="sText listStyle">
      <h2>
        <?=!empty($record->infobox3_heading)?$record->infobox3_heading:''; ?>
      </h2>
      <?=!empty($record->infobox3_content)?$record->infobox3_content:''; ?>
    </div>
    <div class="aboutImg"><img alt="image" src="<?=base_url(!empty($record->infobox3_img)?$record->infobox3_img:'assets/img/c-card-2.jpg'); ?>" /></div>
  </section>
  <?php
}?>
</div>
<?php
if(!empty($record->cta_heading) || !empty($record->cta_buttonlabel))
{
    ?>
<section class="subscribe-area ptb-100 all-cl1" <?=!empty($record->cta_bgimage)?'style="background:url('.base_url($record->cta_bgimage).');"':''; ?>>
  <div class="container">
    <div class="subscribe-content">
      <h2 class="max400">
        <?=!empty($record->cta_heading)?$record->cta_heading:'ALL CLEAR? GET IT NOW!'; ?>
      </h2>
      <div class="card-btn back1"><a class="default-btn ch1" href="<?=!empty($record->cta_buttonlink)?$record->cta_buttonlink:''; ?>">
        <?=!empty($record->cta_buttonlabel)?$record->cta_buttonlabel:'Buy Now'; ?>
        </a></div>
    </div>
  </div>
</section>
<?php
}
?>
