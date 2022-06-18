<!------------------------ banner ------------------------>
<?php $banner_img = !empty($pageContent['banner_img'])?$pageContent['banner_img']:''; ?>
<section class="event-banner-main" <?php if(!empty($banner_img)){ echo "style='background-image: url(".base_url($banner_img).")'"; } ?>>
  <div class="abt-banner">  
      <h2><?=!empty($pageContent['page_title'])?$pageContent['page_title']:'event registration';?></h2>
  </div>
</section>
<!--------------------- banner finish --------------------->

<?php //echo "<pre>"; print_r($records); echo "</pre>"; ?>

<section class="event-wrapper-txt">
  <div class="container">   
  
<?php
if(!empty($records))
{
    foreach ($records as $key => $rec)
    {
      ?>
      <div class="event-info">
        <div class="row"> 
        <div class="col-sm-4">        
        <div class="event-image">         
         <div><img src="<?=base_url((!empty($rec->featured_img)?$rec->featured_img:'assets/front/images/event01.jpg'))?>" alt="<?=!empty($rec->name)?$rec->name:''?>"/> </div>
         <div class="event-date"><span class="date"><?=!empty($rec->startdate)?date('d',strtotime($rec->startdate)):'00'?></span> <span class="month"><?=!empty($rec->startdate)?date('F',strtotime($rec->startdate)):'Month'?></span></div>
        </div>    
        </div>  
                
          <div class="col-sm-8">
        <div class="event-txt">
      <div class="event-content"><h3 class="post-title"><a href="#" rel="bookmark"><?=!empty($rec->name)?$rec->name:''?></a></h3><div class="event-meta"> <span class="event-time"> <?=!empty($rec->startdate)?$rec->startdate:''?> <?=!empty($rec->starttime)?$rec->starttime:''?> </span> <span class="event-address"> <?=!empty($rec->vanue)?$rec->vanue:''?> </span></div><div class="event-line"></div>
        
        <div class="event-description"> <?=!empty($rec->summary)?$rec->summary:''?></div>        
        <div class="event-btn">           
        <a href="<?=base_url('register')//.'?return='.current_url()?>" class="org-btn">Register</a>
        <a href="<?=base_url('events/'.$rec->slug)?>" class="common-btn donate-btn">Details</a>
        
        </div>
        
        </div>
          
          </div>  
                  
        </div>                            
        </div>                          
        </div> 
      <?php
    }
}
else
{
   ?>
  <div class="event-info">
    <div class="row"> 
      <div class="col-sm-12">
        No any events available.
      </div>
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