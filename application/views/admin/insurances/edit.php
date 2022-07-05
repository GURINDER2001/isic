<?php
//pre($editdata);
if(!empty($editdata)) 
{  
    extract($editdata); 
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Insurance <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Insurances Management</a></li>
            <li class="active">Edit Insurance</li>
        </ol>
    </section>
    <section class="content">
        <?=getNotificationHtml(); ?>
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
                              <label>Layout:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_dropdown('layout', $layoutOptions,set_value('layout',!empty($layout)?$layout:""),'id="layout" class="form-control input-md select2"'); ?>
                              </div>
                              <?php echo form_error('layout'); ?>
                          </div>
                          
                          <div id="basic-content" <?=!empty($layout)?'style="display:none"':''; ?>>
                              <div class="form-group">
                                  <label>Content:</label>
                                  <textarea id="description" name="description" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                      <?php echo set_value('description', isset($description)?$description:""); ?>
                                  </textarea>
                                  <?php echo form_error('description'); ?>
                          </div>
                              <div class="form-group">
                                  <label>Features:</label>
                                  <div class="input-group">
                                      <div class="input-group-addon">
                                          <i class="fa fa-file-text-o"></i>
                                      </div>
                                      <?php echo form_multiselect('features[]', $featureOptions,set_value('features',!empty($features)?explode(",",$features):""),'id="feature" class="form-control input-md select2"'); ?>
                                  </div>
                                  <?php echo form_error('features'); ?>
                          </div>
                          </div>
                          
                          <div id="stripe-content" <?=empty($layout)?'style="display:none"':''; ?>>
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label>Key Elements</label>
                                </div>
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
                                                        <div class="col-md-3">
                                                            <div id="blah5<?=$k; ?>_container">
                                                                <img class="img2" id="blah5<?=$k; ?>" src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="key_elements_image" name="key_elements_image[]" value="<?=!empty($rec['icon'])?$rec['icon']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_icons">Icon:</label></div>
                                                                <div class="col-md-10"><input name="key_elements_icons[]" type="file" class="form-control pull-right" id="key_elements_icons" onchange="checkPhoto(this,'blah5<?=$k; ?>')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'key_elements_title', 'name' => 'key_elements_title[]','class'=>'form-control input-md','placeholder'=>'Title...','value'=>(!empty($rec['title'])?$rec['title']:''))); ?></div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_content">Content:</label></div>
                                                                <div class="col-md-10"><?php echo form_textarea(array('id' => 'key_elements_content', 'name' => 'key_elements_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($rec['content'])?$rec['content']:''))); ?></div>
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
                                                        <div class="col-md-3">
                                                            <div id="blah5_container">
                                                                <img class="img2" id="blah5" src="<?=base_url(!empty($steps_icon)?$steps_icon:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="key_elements_image" name="key_elements_image[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_icons">Icon:</label></div>
                                                                <div class="col-md-10"><input name="key_elements_icons[]" type="file" class="form-control pull-right" id="key_elements_icons" onchange="checkPhoto(this,'blah5')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'key_elements_title', 'name' => 'key_elements_title[]','class'=>'form-control input-md','placeholder'=>'Title...')); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_content">Content:</label></div>
                                                                <div class="col-md-10"><?php echo form_textarea(array('id' => 'key_elements_content', 'name' => 'key_elements_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3)); ?></div>
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
<script type="text/javascript">
$(document).ready(function(){
    $(document).on('change','#layout',function(){
        var layout = $(this).val();
        if(layout == 1)
        {
            $('#basic-content').hide();
            $('#stripe-content').show();
        }
        else
        {
            $('#stripe-content').hide();
            $('#basic-content').show();
        }
    });

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
            var fieldHTMLSteps = '<div class="row"> <div class="col-md-11"> <div class="row stepsBox"> <div class="col-md-3"> <div id="'+blah+'_container"> <img class="img2" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"> <div class="row"> <div class="col-md-2"><label for="key_elements_icons">Icon:</label></div><div class="col-md-10"><input name="key_elements_icons[]" type="file" class="form-control pull-right" id="key_elements_icons" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"> <div class="col-md-2"><label for="key_elements_title">Title:</label></div><div class="col-md-10"><input type="text" name="key_elements_title[]" value="" id="key_elements_title" class="form-control input-md" placeholder="Title..."></div></div><div class="row"> <div class="col-md-2"><label for="key_elements_content">Content:</label></div><div class="col-md-10"><textarea name="key_elements_content[]" rows="3" id="key_elements_content" class="form-control input-md" placeholder="Content..."></textarea></div></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="delete_steps" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 
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