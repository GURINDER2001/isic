<?php
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Program <small>it all starts here</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Programs Management</a></li>
      <li class="active"> Edit Program</li>
    </ol> 
  </section>
  <section class="content">
    <?=getNotificationHtml(); ?>
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
                      <label>Slug:</label>
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-file-text-o"></i>
                          </div>
                          <input type="text" name="slug" value="<?=set_value('slug', isset($slug)?$slug:" ");?>" id="slug" class="form-control input-md" placeholder="Slug">
                      </div>
                      <?php echo form_error('slug'); ?>
                  </div>

                  <div class="row">
                    <div class="col-md-6">

                      <div class="form-group">
                        <label>Associated Brands</label>
                        <?php echo form_multiselect('associted_brands[]', $options_brands, $brands,'id="program_associted_brands" class="form-control select2"'); ?>
                        <?php echo form_error('associted_brands'); ?>
                      </div>
                      <div id="cat_program_containers" class="row">
                          <?php
                          if(!empty($brands))
                          {
                              foreach ($brands as $key => $brand_id)
                              {
                                  $brandName = !empty($options_brands[$brand_id])?'( '.$options_brands[$brand_id].' )':'';
                                  ?>
                                  <div id="program_category_box_<?=$brand_id; ?>" class="col-md-12">
                                      <div class="form-group">
                                        <label>Program Categories <?=$brandName; ?></label>
                                        <?php echo form_multiselect('category['.$brand_id.'][]', $options_categories, $cats[$brand_id],'id="program_category_'.$brand_id.'" class="form-control select2" required'); ?>
                                        <?php //echo form_error('category'); ?>
                                      </div>
                                  </div>
                                  <?php
                              }
                          }
                          ?>                                
                      </div>
                      <!--div class="form-group">
                          <label>Category:</label>
                          <div class="input-group date">
                              <div class="input-group-addon">
                                  <i class="fa fa-file-text-o"></i>
                              </div>
                              <?php echo form_multiselect('category[]', $options_categories,set_value('category',!empty($category)?explode(",", $category):""),'id="category" class="form-control select2"'); ?>
                              <?php echo form_error('category'); ?>
                          </div>
                      </div-->
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
                        <div class="form-group">
                            <label>Study Type:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-file-text-o"></i>
                                </div>
                                <?php echo form_multiselect('study_type[]', $options_studytype,set_value('study_type',isset($study_type)?explode(",", $study_type):""),'id="study_type" class="form-control input-md select2"'); ?>
                                <?php echo form_error('study_type'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pace:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-file-text-o"></i>
                                </div>
                                <?php echo form_multiselect('pace[]', $options_pace,set_value('pace',isset($pace)?explode(",", $pace):""),'id="pace" class="form-control input-md select2"'); ?>
                                <?php echo form_error('pace'); ?>
                            </div>
                        </div>
                        <!--div class="form-group">
                            <label>Associated Brands:</label>
                            <?php                            
                            /*$associted_brands = !empty($associted_brands)?explode(",", $associted_brands):array();
                            if(!empty($brands))
                            {
                              foreach ($brands as $key => $brand)
                              {
                                ?>
                                <div class="checkbox">
                                  <label>
                                    <input name="associted_brands[]" type="checkbox" value="<?=!empty($brand->id)?$brand->id:0; ?>" <?=(!empty($associted_brands) && in_array($brand->id, $associted_brands))?'checked="checked"':''; ?>>
                                    <?=!empty($brand->name)?$brand->name:''; ?>
                                  </label>
                                </div>
                                <?php
                              }
                            }*/
                            ?>
                        </div-->
                        <div class="form-group">
                          <label>Course Duration:</label>
                          <div class="row">
                            <div class="col-md-3">
                              <input type="number" min="0" id="duration_start" name="duration_start" class="form-control" value="<?=!empty($duration_start)?$duration_start:0; ?>">
                            </div>
                            <div class="col-md-2">
                              Up To
                            </div>
                            <div class="col-md-3">
                              <input type="number" min="0" id="duration_end" name="duration_end" class="form-control" value="<?=!empty($duration_start)?$duration_start:0; ?>">
                            </div>
                            <div class="col-md-4">
                                <?php
                                echo form_dropdown('duration_term', durationTerms_options(), set_value('duration_term',!empty($duration_term)?$duration_term:""),'id="duration_term" class="form-control"');
                                echo form_error('duration_term');
                                ?>
                            </div>
                            <div class="col-md-12 mt15">
                              <label class="control-label" style="margin-right: 10px;">Show duration on website? </label>
                              <label class="switch switch-left-right">
                                  <input id="is_duration_shown" name="is_duration_shown" class="switch-input" type="checkbox" value="1" <?=!empty($is_duration_shown)?'checked="checked"':''; ?>>
                                  <span class="switch-label" data-on="Yes" data-off="No"></span> <span class="switch-handle"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="form-group">
                          <label>Course Fee:</label>
                          <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <label class="control-label" for="price">Price</label>
                                    <input type="number" min="0" id="program_price" name="program_price" class="form-control" value="<?=!empty($program_price)?$program_price:''; ?>">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <label class="control-label" for="price">Currency</label>
                                    <?php
                                    echo form_dropdown('program_price_currency', currency_options(), set_value('program_price_currency',!empty($program_price_currency)?$program_price_currency:""),'id="program_price_currency" class="form-control"');
                                    echo form_error('program_price_currency');
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="program_price_comment"> Price Comment <i class="fa fa-info-circle icon-message"> </i> </label>
                                    <input type="text" id="program_price_comment" name="program_price_comment" class="form-control" value="<?=!empty($program_price_comment)?$program_price_comment:''; ?>">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 mt15">
                              <label class="control-label" style="margin-right: 10px;">Show price and comment on website? </label>
                              <label class="switch switch-left-right">
                                  <input id="is_price_shown" name="is_price_shown" class="switch-input" type="checkbox" value="1" <?=!empty($is_price_shown)?'checked="checked"':''; ?>>
                                  <span class="switch-label" data-on="Yes" data-off="No"></span> <span class="switch-handle"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <!-- <div class="form-group">
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
                        </div> -->
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Summary:</label>
                          <textarea id="summary" name="summary" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo set_value('summary', isset($summary)?$summary:""); ?></textarea>
                          <?php echo form_error('summary'); ?>
                      </div>                  
                      <div class="form-group">
                          <label>Description:</label>
                          <textarea id="description" name="description" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                              <?php echo set_value('description', isset($description)?$description:""); ?>
                          </textarea>
                          <?php echo form_error('description'); ?>
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
