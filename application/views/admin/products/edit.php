<?php
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Product <small>it all starts here</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Products Management</a></li>
      <li class="active"> Edit Product</li>
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
                    
                    <div class="form-group">
                        <label>Card ID from API:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <?php echo form_input(array('id' => 'api_card_id', 'name' => 'api_card_id','class'=>'form-control input-md','placeholder'=>'Card ID','value' => set_value('api_card_id', isset($api_card_id)?$api_card_id:"" ))); ?>
                        </div>
                        <?php echo form_error('api_card_id'); ?>
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
                    
                    <div class="form-group" id="blaha_container">
                        <img id="blaha" src="<?=!empty($stripe_logo)?base_url($stripe_logo):base_url('assets/admin/images/no_image.gif'); ?>" alt="Stripe Logo Image" class="img1" />
                    </div>
                      
                      <div class="form-group">
                          <label>Stripe Logo:</label>
                          <div class="input-group">
                              <div class="input-group-addon">
                                  <i class="fa fa-file"></i>
                              </div>
                              <input name="stripe_logo" type="file" class="form-control pull-right" id="stripe_logo" onchange="checkPhoto(this,'blaha')">
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
                        <label>Content:</label>
                        <textarea id="description" name="description" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            <?php echo set_value('description', isset($description)?$description:""); ?>
                        </textarea>
                        <?php echo form_error('description'); ?>
                    </div>
                    
                    <div class="form-group">
                        <div><h3>Key Info Section</h3></div>
                        <hr>
                    </div>
                    
                    <div class="form-group">
                        <label>Key Elements</label>
                        <div class="field_wrapper" id="steps_wrapper">
                            <?php
                            $keyinfo_content = !empty($keyinfo_content)?unserialize($keyinfo_content):array();
                            if(!empty($keyinfo_content))
                            {
                                $k=1;
                                foreach ($keyinfo_content as $rec)
                                {
                                   ?>
                                   <div class="row">
                                        <div class="col-md-11">
                                            <div class="row stepsBox">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-2"><label for="key_elements_title">Title:</label></div>
                                                        <div class="col-md-10"><?php echo form_input(array('id' => 'key_elements_title', 'name' => 'key_elements_title[]','class'=>'form-control input-md','placeholder'=>'Title...','value'=>(!empty($rec['title'])?$rec['title']:''))); ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"><label for="key_elements_content">Content:</label></div>
                                                        <div class="col-md-10"><?php echo form_textarea(array('id' => 'key_elements_content', 'name' => 'key_elements_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>'3','value'=>(!empty($rec['content'])?$rec['content']:''))); ?></div>
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
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-2"><label for="key_elements_title">Title:</label></div>
                                                        <div class="col-md-10"><?php echo form_input(array('id' => 'key_elements_title', 'name' => 'key_elements_title[]','class'=>'form-control input-md','placeholder'=>'Title...')); ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"><label for="key_elements_content">Content:</label></div>
                                                        <div class="col-md-10"><?php echo form_textarea(array('id' => 'key_elements_content', 'name' => 'key_elements_content[]','class'=>'form-control input-md','rows'=>'3','placeholder'=>'Content...')); ?></div>
                                                    </div>
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
                      
                    <div class="form-group" id="blah2_container">
                        <img id="blah2" src="<?=!empty($banner_img)?base_url($banner_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Banner Image" class="img2" />
                    </div>

                    <div class="form-group">
                        <label>Banner Images:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>
                            <input name="banner_img" type="file" class="form-control pull-right" id="banner_img" onchange="checkPhoto(this,'blah2')">
                        </div>
                    </div>
                      
                    <div class="form-group">
                          <label>Price:</label>
                          <div class="input-group date">
                              <div class="input-group-addon">
                                  <i class="fa fa-file-text-o"></i>
                              </div>
                              <?php echo form_input(array('id' => 'price', 'name' => 'price','class'=>'form-control input-md','placeholder'=>'Price','value' => set_value('price', isset($price)?$price:"" ))); ?>
                          </div>
                          <?php echo form_error('price'); ?>
                    </div>
                    
                    <div class="form-group">
                        <div>
                            <h3>InfoBox Section</h3>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="form-group">
                        <label>InfoBox Heading</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <?php echo form_input(array('id' => 'infobox_heading', 'name' => 'infobox_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('infobox_heading', !empty($infobox_heading)?$infobox_heading:''))); ?>
                        </div>
                        <?php echo form_error('infobox_heading'); ?>
                    </div>

                    <div class="form-group">
                        <label>InfoBox Content</label>
                        <textarea name="infobox_content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('infobox_content', !empty($infobox_content)?$infobox_content:''); ?></textarea>
                        <?php echo form_error('infobox_content'); ?>
                    </div>
                    
                    <div class="form-group" id="blah3_container">
                        <img id="blah3" src="<?=!empty($infobox_img)?base_url($infobox_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Banner Image" class="img2" />
                    </div>
                    
                    <div class="form-group">
                        <label>Infobox Images:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>
                            <input name="infobox_img" type="file" class="form-control pull-right" id="infobox_img" onchange="checkPhoto(this,'blah3')">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div>
                            <h3>InfoBox2 Section</h3>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="form-group">
                        <label>InfoBox2 Heading</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <?php echo form_input(array('id' => 'infobox2_heading', 'name' => 'infobox2_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('infobox2_heading', !empty($infobox2_heading)?$infobox2_heading:''))); ?>
                        </div>
                        <?php echo form_error('infobox2_heading'); ?>
                    </div>

                    <div class="form-group">
                        <label>InfoBox2 Content</label>
                        <textarea name="infobox2_content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('infobox2_content', !empty($infobox2_content)?$infobox2_content:''); ?></textarea>
                        <?php echo form_error('infobox2_content'); ?>
                    </div>
                    
                    <div class="form-group" id="blah4_container">
                        <img id="blah4" src="<?=!empty($infobox2_img)?base_url($infobox2_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Banner Image" class="img2" />
                    </div>

                    <div class="form-group">
                        <label>Infobox2 Images:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>
                            <input name="infobox2_img" type="file" class="form-control pull-right" id="infobox2_img" onchange="checkPhoto(this,'blah4')">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div>
                            <h3>InfoBox3 Section</h3>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="form-group">
                        <label>InfoBox3 Heading</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <?php echo form_input(array('id' => 'infobox3_heading', 'name' => 'infobox3_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('infobox3_heading', !empty($infobox3_heading)?$infobox3_heading:''))); ?>
                        </div>
                        <?php echo form_error('infobox3_heading'); ?>
                    </div>

                    <div class="form-group">
                        <label>InfoBox3 Content</label>
                        <textarea name="infobox3_content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('infobox3_content', !empty($infobox3_content)?$infobox3_content:''); ?></textarea>
                        <?php echo form_error('infobox3_content'); ?>
                    </div>
                    
                    <div class="form-group" id="blah5_container">
                        <img id="blah5" src="<?=!empty($infobox3_img)?base_url($infobox3_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Banner Image" class="img2" />
                    </div>

                    <div class="form-group">
                        <label>Infobox3 Images:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>
                            <input name="infobox3_img" type="file" class="form-control pull-right" id="infobox3_img" onchange="checkPhoto(this,'blah5')">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div>
                            <h3>CTA Section</h3>
                        </div>
                        <hr>
                    </div>
                    
                    <div class="form-group">
                        <label>CTA Heading</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <?php echo form_input(array('id' => 'cta_heading', 'name' => 'cta_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('cta_heading', !empty($cta_heading)?$cta_heading:''))); ?>
                        </div>
                        <?php echo form_error('cta_heading'); ?>
                    </div>
                    
                    <div class="form-group">
                        <label>CTA Button Label</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <?php echo form_input(array('id' => 'cta_buttonlabel', 'name' => 'cta_buttonlabel','class'=>'form-control input-md','placeholder'=>'Button Label..','value' => set_value('cta_buttonlabel', !empty($cta_buttonlabel)?$cta_buttonlabel:''))); ?>
                        </div>
                        <?php echo form_error('cta_buttonlabel'); ?>
                    </div>
                    
                    <div class="form-group">
                        <label>CTA Button Link</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <?php echo form_input(array('id' => 'cta_buttonlink', 'name' => 'cta_buttonlink','class'=>'form-control input-md','placeholder'=>'Button Link..','value' => set_value('cta_buttonlink', !empty($cta_buttonlink)?$cta_buttonlink:''))); ?>
                        </div>
                        <?php echo form_error('cta_buttonlink'); ?>
                    </div>
                    <div class="form-group" id="blah6_container">
                        <img id="blah6" src="<?=!empty($cta_bgimage)?base_url($cta_bgimage):base_url('assets/admin/images/no_image.gif'); ?>" alt="Banner Image" class="img2" />
                    </div>

                    <div class="form-group">
                        <label>CTA BG Images:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file"></i>
                            </div>
                            <input name="cta_bgimage" type="file" class="form-control pull-right" id="cta_bgimage" onchange="checkPhoto(this,'blah6')">
                        </div>
                    </div>        
                          
                    <div class="col-md-12">
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
                            <input name="meta_key" value="<?php echo set_value('meta_key', isset($meta_key)?$meta_key:" "); ?>" type="text" class="form-control pull-right" id="meta_title">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Meta Description:</label>
                        <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter ..."><?php echo set_value('meta_description', isset($meta_description)?$meta_description:""); ?></textarea>
                    </div>

                    <div class="clearfix"></div>
                    <input type="submit" name="addpage" class="btn btn-primary" value="Submit">
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
        var base_url = $('body').attr('data-url');
        
        //Once add button is clicked
        $(add_steps).click(function()
        {
            //Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah5a'+y;
                var fieldHTMLSteps = '<div class="row"> <div class="col-md-11"> <div class="row stepsBox"> <div class="col-md-12"> <div class="row"> <div class="col-md-2"><label for="key_elements_title">Title:</label></div><div class="col-md-10"><input type="text" name="key_elements_title[]" id="key_elements_title" class="form-control input-md" placeholder="Title..."></div></div><div class="row"> <div class="col-md-2"><label for="key_elements_content">Content:</label></div><div class="col-md-10"><textarea name="key_elements_content[]" id="key_elements_content" class="form-control input-md" placeholder="Content..."></textarea></div></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="delete_steps" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

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