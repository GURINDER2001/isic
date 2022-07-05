<!------------------------ banner ------------------------>
<section class="inner-banner-contorller">

    <div class="inner-banner-contorller">
        <img src="<?=base_url(!empty($pageContent->banner_img)?$pageContent->banner_img:'assets/front/images/inner01.jpg'); ?>" alt="" />
        <div class="static-text"><a href="<?=base_url(); ?>">Home</a>/<?=!empty($pageContent->name)?$pageContent->name:'Our Brands'?></div>
    </div>
</section>
<!--------------------- banner finish --------------------->


<!--------------------- what-we-do start --------------------->

<section class="what-we-do">
<div class="container">
<div class="row">
<div class="contant-wrapper">

      <?php
      if(!empty($brands))
      {
        foreach ($brands as $key => $brand)
        {
            ?>
            <div class=" col-md-3 col-sm-3  col-xs-12">
              <div class="our-brands">
                <a href="<?=$brand['url']; ?>"><img src="<?=$brand['logo']; ?>" alt=""/></a> 
              </div>
            </div>
            <?php
        }
      }
      ?>

        <div class="col-md-12 col-sm-12 col-xs-12 mb30">
          <?=$description; ?>
        </div>
      
      </div>
    </div>
  </div>
</section>


