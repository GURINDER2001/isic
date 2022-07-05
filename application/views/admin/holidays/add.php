<?php
if(!empty($editdata)) 
{  
    extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Add Holiday <small>it all starts here</small></h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Holidays Management</a></li>
          <li class="active">Add Holiday</li>
      </ol>
  </section>
  <section class="content">
      <div class="row">
          <div class="col-md-12">
              <div class="box">
                  <div class="box-body pad">
                      <form method="post" enctype="multipart/form-data">
                        
                          <div class="form-group">
                              <label>Title:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_input(array('id' => 'name', 'name' => 'name','class'=>'form-control input-md','placeholder'=>'Title','value' => set_value('name', isset($name)?$name:""))); ?>
                              </div>
                              <?php echo form_error('name'); ?>
                          </div>

                          <div class="form-group">
                              <label>Date:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </div>
                                  <?php echo form_input(array('id' => 'date', 'name' => 'holiday_date','class'=>'form-control input-md datepicker','placeholder'=>'YYYY-MM-DD', 'autocomplete'=>'off', 'value' => set_value('holiday_date', isset($holiday_date)?$holiday_date:""))); ?>
                              </div>
                              <?php echo form_error('holiday_date'); ?>
                          </div>
                          <div class="form-group">
                            <label>
                                <input type="checkbox" id="is_official" name="is_official" class="minimal" value="1" <?php if(!empty($is_official)) { ?> checked="" <?php } ?>> Is this official holiday?
                            </label>                            
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