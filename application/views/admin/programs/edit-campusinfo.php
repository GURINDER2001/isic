<?php
if(!empty($record)) 
{ 
  extract($record); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Program Info By Campus <small>it all starts here</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Programs Management</a></li>
      <li class="active"> Edit Program Info By Campus</li>
    </ol> 
  </section>
  <section class="content">
      <?=getNotificationHtml(); ?>
      <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?=!empty($program_id)?getProgramName($program_id):'All Programs'; ?></h3>
            </div>
            <div class="box-body">             
                <form action="" method="POST" enctype="multipart/form-data">

                  <div class="form-group">
                      <label>Campus Location:</label>
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-file-text-o"></i>
                          </div>
                          <?php echo form_dropdown('campus_id', $options_campus,set_value('campus_id',!empty($campus_id)?$campus_id:""),'id="campus_id" class="form-control select2" disabled="disabled"'); ?>
                      </div>
                      <?php echo form_error('campus_id'); ?>
                  </div>

                  <div class="row">
                      <div class="col-md-12 col-sm-12">
                          <h4>Location can have its own set of start dates, end dates and application deadlines for the programs. How would you like to add these dates?</h4>
                      </div>

                      <div class="col-md-12 col-sm-12 ">
                          <div class="form-group">
                              <?php $date_type = !empty($date_type)?$date_type:'automatic'; ?>
                              <div class="custom-checkboxes">
                                  <input type="radio" name="date_type" value="specific" class="campus-dateoption" <?=($date_type=='specific')?'checked="checked"':''; ?>> Use specific dates
                              </div>
                              <div class="custom-checkboxes">
                                  <input type="radio" name="date_type" value="automatic" class="campus-dateoption" <?=($date_type=='automatic')?'checked="checked"':''; ?>> Use automatically generated dates
                              </div>
                              <div class="custom-checkboxes">
                                  <input type="radio" name="date_type" value="open" class="campus-dateoption" <?=($date_type=='open')?'checked="checked"':''; ?>> My programs or courses do not have dates (Open Enrollment)
                              </div>
                          </div>                                                             
                      </div>
                      <div class="col-sm-12">
                          <hr/>
                          <div id="collapseAddress">
                              <div class="box-body">
                                  <div class="program-location-dates">
                                      <h4>Would you like this location displayed on our websites?</h4>
                                      <div class="form-group">
                                          <label class="custom-checkboxes location-visibility">
                                              <input type="radio" name="visibility" class="campus-location-visibility" value="yes" <?=(!empty($visibility) && $visibility=='yes')?'checked="checked"':''; ?>> Yes
                                          </label>
                                          &nbsp;
                                          <label class="custom-checkboxes location-visibility">
                                              <input type="radio" name="visibility" class="campus-location-visibility" value="no" <?=(!empty($visibility) && $visibility=='no')?'checked="checked"':''; ?>> No
                                          </label>
                                      </div>
                                      <hr>
                                      <?php
                                      $displayStatus = ($date_type == 'specific' && $visibility == 'yes')?'block':'none';
                                      $displayStatus2 = ($date_type == 'automatic' && $visibility == 'yes')?'block':'none';
                                      ?>
                                      <div id="specific-dates-boxes" style="display: <?=$displayStatus;?>">
                                          <div class="row">
                                              <div class="col-md-3">
                                                <label>Start Date</label>
                                                <input type="text" name="start_date" id="start_date" value="<?=set_value('start_date', !empty($start_date)?$start_date:""); ?>" class="form-control pull-right datepicker" placeholder="Start Date">
                                              </div>

                                              <div class="col-md-3">
                                                <label>End Date</label>
                                                <input type="text" name="end_date" id="end_date" value="<?=set_value('end_date', !empty($end_date)?$end_date:""); ?>" class="form-control pull-right datepicker" placeholder="End Date">
                                              </div>

                                              <div class="col-md-3">
                                                <label>Application Deadline</label>
                                                <input type="text" name="application_deadline" id="application_deadline" value="<?=set_value('application_deadline', !empty($application_deadline)?$application_deadline:""); ?>" class="form-control pull-right datepicker" placeholder="Application Deadline">
                                              </div>

                                              <div class="col-md-3">
                                                <label>Application Deadline Comments</label>
                                                <input type="text" name="application_deadline_comment" value="<?=set_value('application_deadline_comment', !empty($application_deadline_comment)?$application_deadline_comment:""); ?>" class="form-control pull-right" placeholder="Application Deadline">
                                              </div>
                                          </div>
                                      </div>
                                      <div id="auto-dates-boxes" style="display: <?=$displayStatus2;?>;">
                                          <p> Using auto-generated dates is an easy way to ensure you always have start dates displaying for your programs on our websites. How it works is you select your preferred months in the Start Dates tab in the School Profile section of the School menu point, and we display those months along with the corresponding year. The following automatically generated dates are currently being used for this location.</p>
                                          <p><strong><?=date('F Y'); ?></strong></p>
                                          <p>Please note that if you have not selected your preferred months to display, we will display the months according to the academic year of the location's country.</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="clearfix"></div>
                      </div>           
                  </div>
                  <div class="clearfix"></div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>
