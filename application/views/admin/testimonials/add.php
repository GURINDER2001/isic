<?php
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Add Testimonial <small>it all starts here</small></h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"> Testimonials Management</a></li>
          <li class="active"> Add Testimonial</li>
      </ol>
  </section>
  <section class="content">
      <div class="row">
          <div class="col-md-12">
              <div class="box">
                  <div class="box-body pad">
                      <form action="" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                              <label>User Name:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_input(array('id' => 'username', 'name' => 'username','class'=>'form-control input-md','placeholder'=>'User Name','value' => set_value('username', isset($username)?$username:"" ))); ?>
                              </div>
                              <?php echo form_error('username'); ?>
                          </div>

                          <!--div class="form-group">
                              <label>Destination:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_input(array('id' => 'destination', 'name' => 'destination','class'=>'form-control input-md','placeholder'=>'Destination','value' => set_value('destination', isset($destination)?$destination:"" ))); ?>
                              </div>
                              <?php echo form_error('destination'); ?>
                          </div>

                          <div class="form-group">
                              <label>Associated With:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_input(array('id' => 'associated_with', 'name' => 'associated_with','class'=>'form-control input-md','placeholder'=>'Associated With','value' => set_value('associated_with', isset($associated_with)?$associated_with:"" ))); ?>
                              </div>
                              <?php echo form_error('associated_with'); ?>
                          </div-->
                          
                          <div class="form-group">
                              <label>User Pic:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file"></i>
                                  </div>
                                  <input name="user_pic" type="file" class="form-control pull-right" id="user_pic" onchange="checkPhoto(this)">
                              </div>
                          </div>
                          <div class="form-group" id="blah_container">
                              <img id="blah" src="<?=!empty($user_pic)?base_url($user_pic):base_url('assets/admin/images/no_image.gif'); ?>" alt="User Image" class="img1" />
                          </div>

                          <div class="form-group">
                              <label>Testimonial Content:</label>
                              <textarea id="content" name="content" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                  <?php echo set_value('content', isset($content)?$content:""); ?>
                              </textarea>
                              <?php echo form_error('content'); ?>
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