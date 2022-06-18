<!------------------------ banner ------------------------>
<?php $banner_img = !empty($pageContent['banner_img'])?$pageContent['banner_img']:''; ?>
<section class="event-banner-main" <?php if(!empty($banner_img)){ echo "style='background-image: url(".base_url($banner_img).")'"; } ?>>
  <div class="abt-banner">  
    <h2>Event Details</h2>
  </div>
</section>
<!--------------------- banner finish --------------------->


<section class="about-wrapper">
  
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="about-text">
        
        <div class="title">
        <h2><?=$record->name;?></h2>
        
        <time>
          <i class="fa fa-clock-o"></i><?=$record->startdate.' '.$record->starttime;?>
          <span class="price"><?=$record->vanue;?></span>
        </time>

        </div>
        <div class="detail-txt">
          <?=$record->description;?>
        </div>

        <?php  
        if($this->session->userdata('login_data'))
        {
        ?> 
          <div class="event-btn">  
            <a href="<?=base_url('events/join/'.$record->slug);?>" class="common-btn donate-btn">Join Us</a>
          </div>
        <?php
        }
        else
        {
        ?>
         <div class="event-btn">  
            <a href="<?=base_url('register').'?return='.current_url();?>" class="org-btn">Register</a>
        </div>
        <?php
        }
        ?>
        </div>
        
      </div>
      
      <div class="col-md-6"><div class="about-pic"><img src="<?=base_url($record->featured_img)?>"></div></div> 
      
    </div>
  </div>  
</section>