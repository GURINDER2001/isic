<?php
if(!empty($editdata)) 
{ 
    extract($editdata); 
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit College/University <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Colleges/Universities Management</a></li>
            <li class="active">Edit College/University</li>
        </ol>
    </section>
    <section class="content">
        <?=getNotificationHtml(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body pad">
                        <form method="post" enctype="multipart/form-data">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name <span class="astrick">*</span>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'college_name', 'name' => 'college_name','class'=>'form-control input-md','placeholder'=>'Name','value' => set_value('college_name', isset($college_name)?$college_name:"" ), 'required' => 'required')); ?>
                                    </div>
                                    <?php echo form_error('college_name'); ?>
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
                                    <label>Email <span class="astrick">*</span>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'college_email', 'type'=>'email', 'name' => 'college_email','class'=>'form-control input-md','placeholder'=>'Email','value' => set_value('college_email', isset($college_email)?$college_email:""), 'required' => 'required')); ?>
                                    </div>
                                    <?php echo form_error('college_email'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Contact <span class="astrick">*</span> :</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'mobile', 'name' => 'mobile','class'=>'form-control input-md','placeholder'=>'Mobile','value' => set_value('mobile', isset($mobile)?$mobile:"" ), 'required' => 'required')); ?>
                                    </div>
                                    <?php echo form_error('mobile'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Institution Type <span class="astrick">*</span> :</label>
                                    <div class="checkbox">
                                        <input name="institution_type" type="radio" value="School" <?=(!empty($institution_type) && $institution_type=='School')?'checked="checked"':'';?>> School
                                        <input name="institution_type" type="radio" value="College" <?=(!empty($institution_type) && $institution_type=='College')?'checked="checked"':'';?>> College
                                       <input name="institution_type" type="radio" value="University"  <?=(!empty($institution_type) && $institution_type=='University')?'checked="checked"':'';?>> University
                                    </div>
                                    <?php echo form_error('institution_type'); ?>
                                </div> 

                                <div class="form-group">
                                    <label>Address:</label>
                                    <textarea id="address" name="address" class="form-control input-md" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo set_value('address', isset($address)?$address:""); ?></textarea>
                                    <?php echo form_error('address'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="input-group">
                                        <?php
                                        $monthsList = getMonthsList();
                                        if(!empty($monthsList))
                                        {
                                            $start_date = !empty($start_date)?unserialize($start_date):array();
                                            foreach ($monthsList as $month)
                                            {
                                                ?>
                                                <div class="col-md-6"><input type="checkbox" name="start_date[]" value="<?=$month; ?>" <?=(!empty($start_date) && in_array($month, $start_date))?'checked="checked"':''; ?>> <?=$month; ?></div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Videos</label>
                                    <div class="field_wrapper" id="item_wrapper">
                                        <?php
                                        $videos = !empty($videos)?unserialize($videos):array();
                                        if(!empty($videos))
                                        {
                                            foreach ($videos as $video)
                                            {
                                               ?>
                                                <div class="row itemBox">
                                                    <div class="col-md-4 col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" id="video_title" name="video[title][]" class="form-control" placeholder="Title" value="<?=!empty($video['title'])?$video['title']:'';?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" id="video_reference" name="video[reference][]" class="form-control" placeholder="Reference" value="<?=!empty($video['reference'])?$video['reference']:'';?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-md-3">
                                                        <div class="form-group">
                                                            <select id="video_host" name="video[host][]" class="form-control select2" style="width: 100%;">
                                                                <option value="">--Host--</option>
                                                                <option value="youtube" <?=(!empty($video['host']) && $video['host']=='youtube')?'selected="selected"':'';?>>YouTube </option>
                                                                <option value="vimeo" <?=(!empty($video['host']) && $video['host']=='vimeo')?'selected="selected"':'';?>>Vimeo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-md-1">
                                                        <a href="javascript:void(0);" id="remove_item" class="remove_button" title="Remove field"><img src="<?=base_url('assets/admin/images/delete.png');?>"/></a>
                                                    </div>
                                                </div>
                                               <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <a href="javascript:void(0);" id="add_item"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Video</a>
                                </div>

                                <div class="form-group">
                                    <label>Password: (Leave blank if you don't want to change password)</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        <?php echo form_input(array('type'=>'password', 'id' => 'password', 'name' => 'password','class'=>'form-control input-md','placeholder'=>'Password')); ?>
                                    </div>
                                    <?php echo form_error('password'); ?>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="form-group" id="blah_container" style="height: 150px;">
                                        <img id="blah" src="<?=!empty($logo)?base_url($logo):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img2" />
                                    </div>
                                    <div class="form-group">
                                        <label>Logo <span class="astrick">*</span>:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <input name="logo" type="file" class="form-control pull-right" id="logo" onchange="checkPhoto(this)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="blah2_container" style="height: 150px;">
                                        <img id="blah2" src="<?=!empty($cover_image)?base_url($cover_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Cover Image" class="img2" />
                                    </div>
                                    <div class="form-group">
                                        <label>Cover Image:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <input name="cover_image" type="file" class="form-control pull-right" id="cover_image" onchange="checkPhoto(this,'blah2')">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label>Summary</label>
                                    <textarea id="summary" name="summary" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo set_value('summary', isset($summary)?$summary:""); ?></textarea>
                                    <?php echo form_error('summary'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="description" name="description" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        <?php echo set_value('description', isset($description)?$description:""); ?>
                                    </textarea>
                                    <?php echo form_error('description'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="clearfix"></div>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation

        var x = 1; //Initial field counter is 1
        var y = 1; //Initial field counter is 1

        var add_item = $('#add_item'); //Add button selector
        var item_wrapper = $('#item_wrapper'); //Input field wrapper

        //Once add button is clicked
        $(add_item).click(function()
        {
            //Check maximum number of input fields
            if (y < maxField)
            {
                var fieldHTMLSteps = '<div class="row itemBox"><div class="col-md-4 col-md-4"><div class="form-group"><input type="text" id="video_title" name="video[title][]" class="form-control" placeholder="Title" value=""></div></div><div class="col-md-4 col-md-4"><div class="form-group"><input type="text" id="video_reference" name="video[reference][]" class="form-control" placeholder="Reference" value=""></div></div><div class="col-md-3 col-md-3"><div class="form-group"><select id="video_host" name="video[host][]" class="form-control select2" style="width: 100%;"><option value="">--Host--</option><option value="youtube">YouTube </option><option value="vimeo">Vimeo</option></select></div></div><div class="col-md-1 col-md-1"><a href="javascript:void(0);" id="delete_items" class="remove_button" title="Remove field"> <img src="/assets/admin/images/delete.png"> </a></div></div>'; //New input field html 

                y++; //Increment field counter
                $(item_wrapper).append(fieldHTMLSteps); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(item_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });
    });
</script>