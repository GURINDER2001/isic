<?php
if(!empty($editdata)) 
{  
    extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Add Newsletter <small>it all starts here</small></h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Newsletters Management</a></li>
          <li class="active">Add Newsletter</li>
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
                              <label>Content:</label>
                              <textarea id="description" name="description" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                  <?php echo set_value('description', isset($description)?$description:""); ?>
                              </textarea>
                              <?php echo form_error('description'); ?>
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