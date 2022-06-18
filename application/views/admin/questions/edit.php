<?php
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Question <small>it all starts here</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Questions Management</a></li>
      <li class="active"> Edit Question</li>
    </ol> 
  </section>
  <section class="content">
    <?php getNotificationHtml(); ?>
    <div class="row">
      <div class="col-md-12">
          <div class="box">
            <div class="box-body pad">
                <form action="" method="POST" enctype="multipart/form-data">

                  <div class="form-group">
                      <label>Title:</label>
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-file-text-o"></i>
                          </div>
                          <?php echo form_input(array('id' => 'name', 'name' => 'name','class'=>'form-control input-md','placeholder'=>'Title','value' => set_value('name', isset($name)?$name:"" ))); ?>
                      </div>
                      <?php echo form_error('name'); ?>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-file-text-o"></i>
                                </div>
                                <?php echo form_dropdown('category', $options_categories,set_value('category',isset($category)?$category:""),'id="category" class="form-control"'); ?>
                                <?php echo form_error('category'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>College/School/University:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-file-text-o"></i>
                                </div>
                                <?php echo form_dropdown('college_id', $options_colleges,set_value('college_id',isset($college_id)?$college_id:""),'id="college_id" class="form-control"'); ?>
                                <?php echo form_error('college_id'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">                        
                        <div class="form-group">
                            <label>Associated Brands:</label>
                            <?php                            
                            $associted_brands = !empty($associted_brands)?explode(",", $associted_brands):array();
                            if(!empty($brands))
                            {
                              foreach ($brands as $key => $brand)
                              {
                                ?>
                                  <div class="checkbox">
                                    <label><input name="associted_brands[]" type="checkbox" value="<?=!empty($brand->id)?$brand->id:0; ?>" <?=(!empty($associted_brands) && in_array($brand->id, $associted_brands))?'checked="checked"':''; ?>><?=!empty($brand->name)?$brand->name:''; ?></label>
                                  </div>
                                <?php
                              }
                            }
                            ?>
                        </div>
                    </div>                    
                  </div>

                  <div class="form-group">
                      <label>Summary:</label>
                      <textarea id="summary" name="summary" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          <?php echo set_value('summary', isset($summary)?$summary:""); ?>
                      </textarea>
                      <?php echo form_error('summary'); ?>
                  </div>
                  
                  <div class="form-group">
                      <label>Description:</label>
                      <textarea id="description" name="description" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          <?php echo set_value('description', isset($description)?$description:""); ?>
                      </textarea>
                      <?php echo form_error('description'); ?>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Course Duration:</label>
                          <div class="input-group date">
                              <div class="input-group-addon">
                                  <i class="fa fa-file-text-o"></i>
                              </div>
                              <input id="course_duration" name="course_duration" value="<?php echo set_value('course_duration', isset($course_duration)?$course_duration:" "); ?>" type="text" class="form-control pull-right">
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Course Fee:</label>
                          <div class="input-group date">
                              <div class="input-group-addon">
                                  <i class="fa fa-file-text-o"></i>
                              </div>
                              <input name="course_fee" value="<?php echo set_value('course_fee', isset($course_fee)?$course_fee:" "); ?>" type="text" class="form-control pull-right" id="course_fee">
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">                        
                        <div class="form-group">
                            <label>Featured Images:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <input name="featured_img" type="file" class="form-control pull-right" id="featured_img" onchange="checkPhoto(this)">
                            </div>
                        </div>
                        <div class="form-group" id="blah_container">
                            <img id="blah" src="<?=!empty($featured_img)?base_url($featured_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img1" />
                        </div>
                    </div>                    
                  </div>

                  <div class="form-group">
                        <label>Meta Title:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <input name="meta_title" value="<?php echo set_value('meta_title', isset($meta_title)?$meta_title:" "); ?>" type="text" class="form-control pull-right" id="meta_title">
                        </div>
                  </div>
                  <div class="form-group">
                      <label>Meta Key:</label>
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-file-text-o"></i>
                          </div>
                          <input name="meta_key" value="<?php echo set_value('meta_key', isset($meta_key)?$meta_key:" "); ?>" type="text" class="form-control pull-right" id="meta_key">
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