<?php
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Add Location <small>it all starts here</small></h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"> Locations Management</a></li>
          <li class="active"> Add Location</li>
      </ol>
  </section>
  <section class="content">
      <div class="row">
          <div class="col-md-12">
              <div class="box">
                  <div class="box-body pad">
                      <form action="" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                              <label>Country:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_dropdown('country_id', $options_countries, set_value('country_id',!empty($country_id)?$country_id:""),'id="country_id" class="form-control"'); ?>                                
                              </div>
                              <?php echo form_error('country_id'); ?>
                          </div>

                          <div class="form-group">
                              <label>Study in Country:</label>
                              <textarea id="content" name="content" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                  <?php echo set_value('content', isset($content)?$content:""); ?>
                              </textarea>
                              <?php echo form_error('content'); ?>
                          </div>

                          <div class="form-group">
                              <label>About Country:</label>
                              <textarea id="about" name="about" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                  <?php echo set_value('about', isset($about)?$about:""); ?>
                              </textarea>
                              <?php echo form_error('about'); ?>
                          </div>
                          
                          <div class="form-group">
                              <label>Cover Image:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file"></i>
                                  </div>
                                  <input name="cover_image" type="file" class="form-control pull-right" id="cover_image" onchange="checkPhoto(this)">
                              </div>
                          </div>

                          <div class="form-group" id="blah_container">
                              <img id="blah" src="<?=!empty($cover_image)?base_url($cover_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="User Image" class="img1" />
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