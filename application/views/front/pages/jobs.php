<!------------------------ banner ------------------------>
<section class="inner-banner-contorller">
  <div class="inner-banner-contorller"> <img src="<?=base_url('assets/front/images/inner04.jpg'); ?>" alt=""/>
    <div class="static-text"><a href="<?=base_url(); ?>">Home</a>/Job</div>
  </div>
</section>
<!--------------------- banner finish ---------------------> 
<?php
//pre($job); 
if(!empty($job))
{
  extract($job);
}
?>
<section class="what-we-do">
  <div class="inner-wrapper">
    <div class="row jobs-section m-0 ">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-1 ">
        <div class="head-title-small jobs-mb60"><?=!empty($name)?$name:''; ?></div>

        <?=!empty($summary)?$summary:''; ?>
        <?=!empty($description)?$description:''; ?>

      </div>
      <div class="col-md-5 col-sm-5 col-xs-12 p-0">
        <div class="jobs-img-section">
          <h3>Sales Job</h3>
          <h4><?=!empty($name)?strtoupper($name):''; ?></h4>
          <?php
          if(!empty($location))
          {
            echo '<h5>SALES JOBS IN '.strtoupper($location).'</h5>';
          }
          ?>
          <div class="jobs-img"> <img src="<?=base_url(!empty($featured_img)?$featured_img:'assets/front/images/jobs_03.jpg'); ?>" class="img-responsive" alt=""/></div>
          <a href="<?=getJobsPortalUrl(!empty($slug)?$slug:''); ?>" class="job-butt">APPLY FOR THIS JOB</a> <a href="<?=getJobsPortalUrl(); ?>" class="job-butt-b">SEE ALL JOB OPENINGS</a> </div>
      </div>
    </div>
  </div>
</section>