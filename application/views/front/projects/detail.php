<!------------------------ banner ------------------------>
<?php $banner_img = !empty($pageContent['banner_img'])?$pageContent['banner_img']:''; ?>
<section class="project-banner-main" <?php if(!empty($banner_img)){ echo "style='background-image: url(".base_url($banner_img).")'"; } ?>>
  <div class="abt-banner">  
    <h2>Project Details</h2>
  </div>
</section>
<!--------------------- banner finish --------------------->


<section class="about-wrapper">
  
<div class="container">
    <div class="row">
      
      <div class="col-md-6">
        <div class="about-text">
        
        <div class="title">
        <h2><?=!empty($record->name)?$record->name:'';?></h2>
        
        <!--time>
          <i class="fa fa-clock-o"></i><?=$record->duration;?>
          <span class="price"><?='$'.$record->charges;?></span>
        </time-->

        </div>
        <div class="detail-txt">
          <?=!empty($record->description)?$record->description:'';?>
          <a href="<?=base_url('donation');?>"><img src="<?=base_url('assets/front/images/donate.gif');?>" width="150"></a>
        </div>        

        <?php  
        /*if($this->session->userdata('login_data'))
        {
        ?> 
          <div class="event-btn">  
            <a href="<?=base_url('projects/pay/'.$record->slug);?>" class="common-btn donate-btn">Pay To Join Us</a>
          </div>
        <?php
        }
        else
        {
        ?>
         <div class="event-btn">  
            <a href="<?=base_url('login').'?return='.current_url();?>" class="common-btn donate-btn">Join Us</a>
            <a href="<?=base_url('register').'?return='.current_url();?>" class="org-btn">Register</a>
        </div>
        <?php
        }*/
        ?>  


        
        
        </div>
        
      </div>
      <?php $feature_img = !empty($record->featured_img)?$record->featured_img:''; ?>
      <div class="col-md-6"><div class="about-pic">
        <?php
        if(!empty($feature_img))
        {
          ?>
          <img src="<?=base_url($feature_img)?>">
          <?php
        }
        ?>
      </div></div> 
      
    </div>
  </div>  
</section>