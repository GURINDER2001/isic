<?php
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Add Link <small>it all starts here</small></h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"> Categories Management</a></li>
          <li class="active"> Add Link</li>
      </ol>
  </section>
  <section class="content">
      <div class="row">
          <div class="col-md-12">
              <div class="box">
                  <div class="box-body pad">
                      <form action="" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                              <label>Link Caption:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_input(array('id' => 'name', 'name' => 'name','class'=>'form-control input-md','placeholder'=>'Label','value' => set_value('name', isset($name)?$name:"" ))); ?>
                              </div>
                              <?php echo form_error('name'); ?>
                          </div>

                          <div class="form-group">
                              <label>Link / Url:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_input(array('id' => 'url', 'name' => 'url','class'=>'form-control input-md','placeholder'=>'Url','value' => set_value('url', isset($url)?$url:"" ))); ?>
                              </div>
                              <?php echo form_error('url'); ?>
                          </div>

                          <div class="form-group">
                              <label>Content:</label>
                              <textarea id="description" name="description" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                  <?php echo set_value('description', isset($description)?$description:""); ?>
                              </textarea>
                              <?php echo form_error('description'); ?>
                          </div>

                          <div class="form-group">
                              <label>Parent:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_dropdown('parent', $parentOptions,set_value('parent',isset($parent)?$parent:""),'id="parent" class="form-control"'); ?>
                                  <?php echo form_error('parent'); ?>
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