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
              <?=!empty($heading)?$heading:'JetBrains'; ?>
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
      <li class="breadcrumbs__item1"> <a href="javascript:;">
        <?=!empty($heading)?$heading:'JetBrains'; ?>
        </a> </li>
    </ul>
  </nav>
</section>
<section class="rfr clbSctn">
  <div class="bgImg"><img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jetbanner2.jpg'); ?>" alt="image" /></div>
  <div class="container pabs">
    <div class="row">
      <div class="col-lg-7"></div>
      <div class="col-lg-5 b1 txt">
        <h3>Welcome to the world of discounts for ISIC, ITIC, IYTC!</h3>
        <p>Discover new discounts in shops, restaurants or many other leisure activities in your area or take advantage of some unique online offerings. Remember that our cards have thousands of unique benefits waiting for you!</p>
        <ul>
          <li>Access to white labelled smart phone application at Zero cost</li>
          <li>In App notification to Students, Teachers &amp; Youth</li>
          <li>A marketing tool with no recurring cost</li>
          <li>Increment in Sales</li>
          <li>Brand Building and Brand Recall</li>
          <li>Enhanced value proposition for Students, Teachers and Youth</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="jetCards">
  <div class="container">
    <div class="jtRow">
      <div class="jtCol">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front" style="background-image:url(<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jtbg.jpg'); ?>)"> 
            <span class="overlay"></span>
            <div>
              <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jetBrain.png'); ?>" alt="JetBrains" /> 
            </div>
           </div> 
            <div class="flip-card-back">
              <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jetBrain.png'); ?>" alt="JetBrains" />
              <h2>JetBrains </h2>
              <p>Developer Tools</p>
              <p>Team Tools</p>
              <p>Learning Tools</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="jtCol">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front" style="background-image:url(<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jtbg2.jpg'); ?>)"> 
            <span class="overlay"></span>
            <div>
              <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jetBrain.png'); ?>" alt="JetBrains" /> 
            </div>
           </div> 
            <div class="flip-card-back">
              <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jetBrain.png'); ?>" alt="JetBrains" />
              <h2>JetBrains Academy</h2>
              <p>Developer Tools</p>
              <p>Team Tools</p>
              <p>Learning Tools</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="withIsic">
 <div class="container">
   <h2>With ISIC also get access to 1,50,000+ benefits icluding:</h2>
   <div class="sliderBox">
    <div id="sliderlogos" class="jetslide owl-carousel owl-theme">
     <div class="item">
      <div class="logoBox"><a href="#"><img src="upload/cmsimages/1.jpg"></a></div>
     </div>
     
     <div class="item">
      <div class="logoBox"><a href="#"><img src="upload/cmsimages/2.jpg"></a></div>
     </div>
     
     <div class="item">
      <div class="logoBox"><a href="#"><img src="upload/cmsimages/3.jpg"></a></div>
     </div>
     
     <div class="item">
      <div class="logoBox"><a href="#"><img src="upload/cmsimages/4.jpg"></a></div>
     </div>
     
     <div class="item">
      <div class="logoBox"><a href="#"><img src="upload/cmsimages/Eurailcom.png"></a></div>
     </div>
     
     <div class="item">
      <div class="logoBox"><a href="#"><img src="upload/cmsimages/Flixbus.png"></a></div>
     </div>
     
     <div class="item">
      <div class="logoBox"><a href="#"><img src="upload/cmsimages/Hard_Rock_Cafe.png"></a></div>
     </div>
      
    </div>
   </div>
 </div>
</section>


<section class="rfr clbSctn">
  <div class="bgImg"><img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jetbanner3.jpg'); ?>" alt="image" /></div>
  <div class="container pabs">
    <div class="row">
      <div class="col-lg-7"></div>
      <div class="col-lg-5 b1 txt">
        <h3>Value Proposition for Students</h3>
        <p>Are you an Educational Institution or a corporate dealing with Students, Teachers or Youth?</p>
        <ul>
          <li>Access to white labelled smart phone application at Zero cost</li>
          <li>In App notification to Students, Teachers &amp; Youth</li>
          <li>A marketing tool with no recurring cost</li>
          <li>Increment in Sales</li>
          <li>Brand Building and Brand Recall</li>
          <li>Enhanced value proposition for Students, Teachers and Youth</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="applyNow btnCntr"> <a class="default-btn ch1" href="#">Apply Now</a> </section>
