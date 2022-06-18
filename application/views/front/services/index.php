<!------------------------ banner ------------------------>
<?php $banner_img = !empty($pageContent['banner_img'])?$pageContent['banner_img']:''; ?>
<section class="project-banner-main" <?php if(!empty($banner_img)){ echo "style='background-image: url(".base_url($banner_img).")'"; } ?>>


  <div class="abt-banner">
  <h2><?=!empty($pageContent['page_title'])?$pageContent['page_title']:'Care healthfully pro';?></h2>  
  </div>
  

</section>
<!--------------------- banner finish --------------------->



<section class="project-step">
  
   <div class="container">

  <div class="project-main">

    
  <div class="row">
  
  <?php foreach ($records as $rec):?>
  <div class="col-sm-4 col-md-6 col-lg-4">  

  <div class="project-step-box">
  <div class="project-step-img">
  <a href="<?=base_url('training-and-development').'/'.$rec->slug?>"><img src="<?=base_url(!empty($rec->featured_img)?$rec->featured_img:'assets/images/care_health01.jpg');?>" alt=""/></a>
  </div>
    <div class="project-step-heading">
    
  <h5><?=$rec->name;?></h5>

    
    <a href="<?=base_url('training-and-development').'/'.$rec->slug?>">READ MORE<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
  </div>
  </div>                
  
  </div>
  <?php endforeach; ?> 
   
                          
                                                                          
  </div>  
  </div>
  
  </div>
  
</section>