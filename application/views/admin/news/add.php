<?php
if(!empty($editdata)) 
{  
    extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Add News <small>it all starts here</small></h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">News Management</a></li>
          <li class="active">Add News</li>
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
                              <label>Category:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_multiselect('category[]', $categoryOptions,set_value('category',isset($category)?$category:""),'id="category" class="form-control input-md select2"'); ?>
                              </div>
                              <?php echo form_error('category'); ?>
                          </div>
                          
                          <div class="form-group">
                              <label>Summary:</label>
                              <textarea id="summary" name="summary" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                  <?php echo set_value('summary', isset($summary)?$summary:""); ?>
                              </textarea>
                              <?php echo form_error('summary'); ?>
                          </div>
                          <div class="form-group">
                              <label>Content:</label>
                              <textarea id="description" name="description" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                  <?php echo set_value('description', isset($description)?$description:""); ?>
                              </textarea>
                              <?php echo form_error('description'); ?>
                          </div>

                          <div class="form-group" id="blah_container">
                              <img id="blah" src="<?=!empty($featured_img)?base_url($featured_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img2" />
                          </div>
                          <div class="form-group">
                              <label>Featured Images:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file"></i>
                                  </div>
                                  <input name="featured_img" type="file" class="form-control pull-right" id="featured_img" onchange="checkPhoto(this)">
                              </div>
                          </div>

                          <div class="form-group">
                              <label>Meta Title:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <input id="meta_title" name="meta_title" value="<?php echo set_value('meta_title', isset($meta_title)?$meta_title:" "); ?>" type="text" class="form-control pull-right">
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Meta Key:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <input id="meta_key" name="meta_key" value="<?php echo set_value('meta_key', isset($meta_key)?$meta_key:" "); ?>" type="text" class="form-control pull-right">
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Meta Description:</label>
                              <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="Enter ..."><?php echo set_value('meta_description', isset($meta_description)?$meta_description:""); ?></textarea>
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