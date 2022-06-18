<?php
//echo "<pre>"; print_r($pageContent); echo "</pre>";
?>

<!------------------------ banner ------------------------>
<?php $banner_img = !empty($pageContent['banner_img'])?$pageContent['banner_img']:''; ?>
<section class="project-banner-main" <?php if(!empty($banner_img)){ echo "style='background-image: url(".base_url($banner_img).")'"; } ?>>


  <div class="abt-banner">
  <h2><?=!empty($pageContent['page_title'])?$pageContent['page_title']:'Projects';?></h2>  
  </div>
  

</section>
<!--------------------- banner finish --------------------->

<section class="about-wrapper-txt">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      
      <div class="big-txt">
      <?=!empty($pageContent['page_content'])?$pageContent['page_content']:'';?>
      </div>
      </div>       
    </div>
  </div>
</section>
<?php if(!empty($records)): ?>

<section class="project-step">
  
   <div class="container">

  <div class="project-main">
    
  <h2><?=!empty($pageContent['listing_headline'])?$pageContent['listing_headline']:'our projects';?></h2>
    
  <div class="row">
  <div id="upcoming-slider02" class="owl-carousel">
  
  <?php
  foreach ($records as $rec):
    //echo "<pre>"; print_r($records); echo "</pre>";
    ?>
    <div class="item">
      <div class="project-step-box">
        <div class="project-step-img">
          <a href="<?=base_url('donation-projects').'/'.$rec->slug?>"><img src="<?=base_url($rec->featured_img)?>" alt="" height="300" width=""/></a>
        </div>
        <div class="project-step-txt">    
          <h4><?=$rec->name;?></h4>
          <p><?=$rec->summary;?></p>
          <a href="<?=base_url('donation-projects').'/'.$rec->slug?>">READ MORE<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>  
    <?php
  endforeach;
  ?>                         
  </div>  
  </div>
  
  
</section>  

<?php endif; ?>



  
   <div class="container">

  <div class="welfare-main">
  
  <div class="row">
  
  <div class="col-sm-3 pr-0">
  <div class="welfare-box">
  <ul>
  <li><img src="<?=base_url('assets/front/images/help01.jpg')?>" alt=""/><p>welfare</p></li>
  <li><img src="<?=base_url('assets/front/images/help02.jpg')?>" alt=""/><p>charity</p></li>
  <li><img src="<?=base_url('assets/front/images/help03.jpg')?>" alt=""/><p>donate</p></li> 
  </ul>
  
  </div>
  
  </div>  
  
  
  <div class="col-sm-4 no-padding">
  <div class="welfare-txt">    
  <h3><?=!empty($pageContent['column3_headline'])?$pageContent['column3_headline']:'';?></h3>
  <?=!empty($pageContent['column3_content'])?$pageContent['column3_content']:'';?>

  <a href="<?=base_url('contact-us');?>">contact us</a>
  
  </div>
  
  </div>
  
  <div class="col-sm-5 no-padding">
  <div class="welfare-img">
  <img src="<?=base_url(!empty($pageContent['column3_img'])?$pageContent['column3_img']:'assets/front/images/hands.jpg')?>" alt=""/> </div>  
  </div>
  </div>  
  
  </div>
  
</div>

<div class="about-info">
  <div class="container"> 
  
  <div class="row"> 


    
    
  
          
    <div class="col-sm-6 pr-0">
  <div class="about-left-img">
  
  <img src="<?=base_url(!empty($pageContent['column2_img'])?$pageContent['column2_img']:'assets/front/images/mission.jpg')?>" alt="mission"> 
    
  </div>            
  </div>    
    
    <div class="col-sm-6 pl-0">
    
    <div class="about-margin">
  <div class="about-left-txt">
    <h2 class="head-blk"><?=!empty($pageContent['column2_heading'])?$pageContent['column2_heading']:'';?></h2>  
    <h2 class="head-purple"><?=!empty($pageContent['column2_subheading'])?$pageContent['column2_subheading']:'';?></h2>
  <?=!empty($pageContent['column2_content'])?$pageContent['column2_content']:'';?>       
  </div>        
  </div>  
  </div>    
  </div>  
    
  </div>                        
  </div>