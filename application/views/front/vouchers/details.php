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
      <?php //pre($info); ?>
    <div class="row align-items-center">
      <div class="col-lg-12 col-md-12">
        <div class="cardDtlSctn1">
          <div class="text listStyle">
              <?php
              if(empty($info['error']))
              {
                  ?>
                  <h3><?=$info['title']; ?></h3>
                  <div class="alert alert-success"><?=$info['voucher']; ?></div>
                  <p><?=$info['description']; ?></p>
                  <?php
              }
              else
              {
                  ?>
                  <div class="alert alert-danger"><?=$info['message']; ?></div>
                  <?php
              }
              ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>