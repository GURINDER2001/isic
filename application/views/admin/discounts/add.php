<?php
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Add Discount <small>it all starts here</small></h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"> Discounts Management</a></li>
          <li class="active"> Add Discount</li>
      </ol>
  </section>
  <section class="content">
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
                          
                          <div class="form-group">
                              <label>Summary:</label>
                              <textarea id="summary" name="summary" class="form-control" placeholder="Place some text here" style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo set_value('summary', isset($summary)?$summary:""); ?></textarea>
                              <?php echo form_error('summary'); ?>
                          </div>

                          <div class="form-group">
                              <label>Content:</label>
                              <textarea id="description" name="description" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo set_value('description', isset($description)?$description:""); ?></textarea>
                              <?php echo form_error('description'); ?>
                          </div>
                          

                          <div class="form-group" id="blah_container">
                              <img id="blah" src="<?=!empty($featured_img)?base_url($featured_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img1" />
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
                              <label>Provider Id (From API):</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_input(array('id' => 'providerId_api', 'name' => 'providerId_api','class'=>'form-control input-md','placeholder'=>'Id','value' => set_value('providerId_api', isset($providerId_api)?$providerId_api:"" ))); ?>
                              </div>
                              <?php echo form_error('providerId_api'); ?>
                          </div>
                          
                          <div class="form-group">
                              <label>Country:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_dropdown('country_id',getCountriesOptions(false),'',array('id' => 'country_id','class'=>'form-control select2')); ?>
                              </div>
                              <?php echo form_error('country_id'); ?>
                          </div>
                          
                          <div class="form-group">
                              <label>Display On:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php $display_section_arr = !empty($display_section)?explode(",",$display_section):array(); ?>
                                  <?php echo form_multiselect('display_section[]',discountDisplaySectionOptions(),$display_section_arr,array('id' => 'display_section','class'=>'form-control select2')); ?>
                              </div>
                              <?php echo form_error('display_section'); ?>
                          </div>
                          
                          <div class="form-group" id="blogCategoriesSection" style="display:none; clear:both;">
                              <label>Blog Categories:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php $blog_cat_id = !empty($blog_cat_id)?explode(",",$blog_cat_id):array(); ?>
                                  <?php echo form_multiselect('blog_cats[]',$categoryOptions,$blog_cat_id,array('id' => 'blog_cats','class'=>'form-control select2')); ?>
                              </div>
                              <?php echo form_error('blog_cats'); ?>
                          </div>
                          
                          <!--div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>SEO Metadata</h3>
                                    </div>
                                    <hr>
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
                              <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter ..."><?php echo set_value('meta_description', isset($meta_description)?$meta_description:""); ?></textarea>
                          </div-->

                          <div class="clearfix"></div>
                          <input type="submit" name="addpage" class="btn btn-primary" value="Submit">
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
<script type="text/javascript">
$(document).ready(function(){
     $(document).on('change','#display_section',function(){
         var display_section = $(this).val();
         if(jQuery.inArray( "blog", display_section ) >= 0)
         {
             $('#blogCategoriesSection').show();
         }
         else
         {
             $('#blogCategoriesSection').hide();
         }
         
     });
     
    $(".js-example-placeholder-multiple").select2({
        placeholder: "Select a state"
    });
});
</script>