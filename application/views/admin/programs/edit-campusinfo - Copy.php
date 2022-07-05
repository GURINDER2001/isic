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
                          <?php echo form_dropdown('campus_id[]', $options_campus,set_value('campus_id',isset($campus_id)?$campus_id:""),'id="campus_id_0" data-index="0" class="form-control campus_id select2"'); ?>
                          <input type="hidden" name="edit_campus[]" id="edit_campus_0" value="<?php echo set_value('edit_campus', isset($campus_id)?$campus_id:""); ?>">
                      </div>
                      <?php echo form_error('campus_id'); ?>
                  </div>

                  <div class="row">
                      <div class="col-md-12 col-sm-12">
                          <h4>Location can have its own set of start dates, end dates and application deadlines for the programs. How would you like to add these dates?</h4>
                      </div>

                      <div class="col-md-12 col-sm-12 ">
                          <div class="form-group">
                              <div class="custom-checkboxes">
                                  <input type="radio" name="date_type" value="specific_dates" class="campus-dateoption" <?=(!empty($date_type) && $date_type=='specific_dates')?'checked="checked"':''; ?>> Use specific dates
                              </div>
                              <div class="custom-checkboxes">
                                  <input type="radio" name="date_type" value="automatic_dates" class="campus-dateoption" <?=(!empty($date_type) && $date_type=='automatic_dates')?'checked="checked"':''; ?>> Use automatically generated dates
                              </div>
                              <div class="custom-checkboxes">
                                  <input type="radio" name="date_type" value="open_dates" class="campus-dateoption" <?=(!empty($date_type) && $date_type=='open_dates')?'checked="checked"':''; ?>> My programs or courses do not have dates (Open Enrollment)
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
                                          <label class="custom-checkboxes location-visibility">
                                              <input type="radio" name="visibility" class="campus-location-visibility" value="no" <?=(!empty($visibility) && $visibility=='no')?'checked="checked"':''; ?>> No
                                          </label>
                                          <label class="custom-checkboxes location-visibility">
                                              <input type="radio" name="visibility" class="campus-location-visibility" value="inherit" <?=(!empty($visibility) && $visibility=='inherit')?'checked="checked"':''; ?>> Inherit School Settings (Currently set to Yes)
                                          </label>
                                      </div>
                                      <hr>
                                      <div id="specific-dates-boxes">
                                          <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Campus Based Information</label>
                                                </div>
                                                <div class="field_wrapper" id="steps_wrapper">
                                                  <?php
                                                    //pre($campusDatas);
                                                    if(!empty($campusDatas1))
                                                    {
                                                        $k=1;
                                                        foreach ($campusDatas as $rec)
                                                        {
                                                           extract($rec);
                                                           ?>
                                                            <div class="row">
                                                                <div class="col-md-11">
                                                                    <div class="row stepsBox">
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-3 clearfix">
                                                                                  <?php echo form_dropdown('campus_id[]', $options_campus,set_value('campus_id',isset($campus_id)?$campus_id:""),'id="campus_id_0" data-index="0" class="form-control campus_id"'); ?>
                                                                                  <input type="hidden" name="edit_campus[]" id="edit_campus_0" value="<?php echo set_value('edit_campus', isset($id)?$id:""); ?>">
                                                                                  </div>

                                                                                  <div class="col-md-3"><input type="text" name="start_date[]" id="start_date_0" value="<?php echo set_value('start_date', isset($start_date)?$start_date:""); ?>" class="form-control pull-right" placeholder="Start Date"></div>

                                                                                  <div class="col-md-3"><input type="text" name="end_date[]" id="end_date_0" value="<?php echo set_value('end_date', isset($end_date)?$end_date:""); ?>" class="form-control pull-right" placeholder="End Date"></div>

                                                                                  <div class="col-md-3"><input type="text" name="application_deadline[]" id="application_deadline_0" value="<?php echo set_value('application_deadline', isset($application_deadline)?$application_deadline:""); ?>" class="form-control pull-right" placeholder="Application Deadline"></div>             
                                                                            </div>                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <?php
                                                                    if($k==1)
                                                                    {
                                                                        ?>
                                                                        <a href="javascript:void(0);" id="add_steps" class="add_button" title="Add field">
                                                                            <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                                        </a>
                                                                        <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        ?>
                                                                        <a href="javascript:void(0);" id="remove_steps" class="remove_button" title="Remove field">
                                                                            <img src="<?=base_url('assets/admin/images/delete.png');?>"/>
                                                                        </a>                                                               
                                                                        <?php
                                                                    }
                                                                    ?>                                                            
                                                                </div>
                                                            </div>
                                                           <?php
                                                           $k++;
                                                        }
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <div class="row">
                                                                <div class="col-md-11">
                                                                    <div class="row stepsBox">
                                                                        <div class="col-md-3 clearfix">
                                                                          <label>Start Date</label>
                                                                          <input type="text" name="start_date[]" id="start_date_0" value="<?php echo set_value('start_date', isset($start_date)?$start_date:""); ?>" class="form-control pull-right datepicker" placeholder="Start Date">
                                                                        </div>

                                                                        <div class="col-md-3">
                                                                          <label>End Date</label>
                                                                          <input type="text" name="end_date[]" id="end_date_0" value="<?php echo set_value('end_date', isset($end_date)?$end_date:""); ?>" class="form-control pull-right datepicker" placeholder="End Date">
                                                                        </div>

                                                                        <div class="col-md-3">
                                                                          <label>Application Deadline</label>
                                                                          <input type="text" name="application_deadline[]" id="application_deadline_0" value="<?php echo set_value('application_deadline', isset($application_deadline)?$application_deadline:""); ?>" class="form-control pull-right datepicker" placeholder="Application Deadline">
                                                                        </div>

                                                                        <div class="col-md-3">
                                                                          <label>Application Deadline Comments</label>
                                                                          <input type="text" name="application_deadline_comment[]" value="<?=set_value('application_deadline_comment', !empty($application_deadline_comment)?$application_deadline:""); ?>" class="form-control pull-right datepicker" placeholder="Application Deadline">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <a href="javascript:void(0);" id="add_steps" class="add_button" title="Add field">
                                                                        <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                                    </a>
                                                                </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                          </div>
                                      </div>
                                      <div class="program-location-dates-text">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

   $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation

        var x = 1; //Initial field counter is 1
        var y = 1; //Initial field counter is 1

        var add_steps = $('#add_steps'); //Add button selector
        var steps_wrapper = $('#steps_wrapper'); //Input field wrapper
        //Once add button is clicked
        $(add_steps).click(function()
        {
            //Check maximum number of input fields
            if (y < maxField)
            {
                var fieldHTMLSteps = '<div class="row"><div class="col-md-11"><div class="row stepsBox"><div class="col-md-3 clearfix"><label>Start Date</label><input type="text" name="start_date[]" id="start_date_0" class="form-control pull-right datepicker" placeholder="Start Date"></div><div class="col-md-3"><label>End Date</label><input type="text" name="end_date[]" id="end_date_0" class="form-control pull-right datepicker" placeholder="End Date"></div><div class="col-md-3"><label>Application Deadline</label><input type="text" name="application_deadline[]" id="application_deadline_0" class="form-control pull-right datepicker" placeholder="Application Deadline"></div><div class="col-md-3"><label>Application Deadline Comments</label><input type="text" name="application_deadline_comment[]" value="" class="form-control pull-right datepicker" placeholder="Application Deadline"></div></div></div><div class="col-md-1"><a href="javascript:void(0);" id="delete_steps" class="remove_button" title="Remove field"> <img src="/assets/admin/images/delete.png"></a></div></div>'; //New input field html 

                y++; //Increment field counter
                $(steps_wrapper).append(fieldHTMLSteps); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(steps_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });

    });
</script>