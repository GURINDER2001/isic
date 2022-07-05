<?php
//pre($pageMeta);
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
            <h1 class="text-uppercase"><span style="color: #feed01;">
              <?=!empty($name)?$name:'404 - Not Found'; ?>
              </span></h1>
          </div>
        </div>
        <div class="col-lg-8 col-md-12">
          <div class="banner-image"> <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jetbanner.jpg'); ?>" alt="image" /> </div>
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
      <li class="breadcrumbs__item1"> <a href="javascript:;"><?=!empty($name)?$name:'404 - Not Found'; ?></a> </li>
    </ul>
  </nav>
</section>

<section class="rfr clbSctn">
  <div class="bgImg"><img src="<?=base_url(!empty($intro_img)?$intro_img:'assets/img/jetbanner2.jpg'); ?>" alt="image" /></div>
  <div class="container pabs">
    <div class="row">
      <div class="col-lg-7"></div>
      <div class="col-lg-5 b1 txt">
        <h3><?=!empty($intro_heading)?$intro_heading:''; ?></h3>
        <?=!empty($intro_content)?$intro_content:''; ?>
      </div>
    </div>
  </div>
</section>
<?php
$flipboxes_elements = !empty($flipboxes_elements)?unserialize($flipboxes_elements):array();
if(!empty($flipboxes_elements))
{
    ?>
    <section class="jetCards">
      <div class="container">
        <div class="jtRow">
            <?php
            foreach($flipboxes_elements as $flipbox)
            {
                ?>
                <div class="jtCol">
                    <div class="flip-card">
                      <div class="flip-card-inner">
                        <div class="flip-card-front" style="background-image:url(<?=base_url(!empty($flipbox['image'])?$flipbox['image']:'assets/img/jtbg.jpg'); ?>)"> 
                        <span class="overlay"></span>
                        <div>
                          <img src="<?=base_url(!empty($flipbox['logo'])?$flipbox['logo']:'assets/img/jetBrain.png'); ?>" alt="JetBrains" /> 
                        </div>
                       </div> 
                        <div class="flip-card-back">
                          <img src="<?=base_url(!empty($flipbox['logo'])?$flipbox['logo']:'assets/img/jetBrain.png'); ?>" alt="JetBrains" />
                          <h2><?=!empty($flipbox['heading'])?$flipbox['heading']:''; ?></h2>
                          <?=!empty($flipbox['content'])?$flipbox['content']:''; ?>
                        </div>
                      </div>
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
$carousals_items = !empty($carousals_items)?unserialize($carousals_items):array();
if(!empty($carousals_items))
{
    ?>
    <section class="withIsic">
     <div class="container">
         <?php
         if(!empty($carousal_heading))
         {
            ?>
            <h2><?=$carousal_heading; ?></h2>
            <?php
         }
         ?>
       <div class="sliderBox">
        <div id="sliderlogos" class="jetslide owl-carousel owl-theme">
            <?php
            foreach($carousals_items as $item)
            {
                ?>
                 <div class="item">
                  <div class="logoBox"><a href="#"><img src="<?=base_url(!empty($item['image'])?$item['image']:''); ?>" title="<?=!empty($item['title'])?$item['title']:''; ?>" alt="<?=!empty($item['title'])?$item['title']:''; ?>"></a></div>
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


<section class="rfr clbSctn">
  <div class="bgImg"><img src="<?=base_url(!empty($contentbox_img)?$contentbox_img:'assets/img/jetbanner3.jpg'); ?>" alt="image" /></div>
  <div class="container pabs">
    <div class="row">
      <div class="col-lg-7"></div>
      <div class="col-lg-5 b1 txt">
        <h3><?=!empty($contentbox_heading)?$contentbox_heading:''; ?></h3>
        <?=!empty($contentbox_content)?$contentbox_content:''; ?>
      </div>
    </div>
  </div>
</section>
<section class="applyNow btnCntr"> <a class="default-btn ch1" href="<?=!empty($stripe_button_url)?$stripe_button_url:''; ?>"><?=!empty($stripe_button_label)?$stripe_button_label:'Apply Now'; ?></a> </section>