<div class="content-wrapper">
    <section class="content-header">
        <h1>Home Settings <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Section Setting</a></li>
            <li class="active">Home</li>
        </ol>
    </section>
    <section class="content">
        <?php getNotificationHtml(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <?php
                    if(!empty($collection)):
                    foreach ( $collection as $data):
                      $array[$data->name]=$data->value;
                    endforeach;
                    extract($array);
                    endif;
                    ?>
                    <div class="box-body pad">
                        <form method="post" enctype="multipart/form-data">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Intro Content</h3></div>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="intro_content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('intro_content', !empty($intro_content)?$intro_content:''); ?></textarea>
                                </div>
                                <?php echo form_error('intro_content'); ?>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Key Info Section</h3></div>
                                    <hr>
                                </div>
                            </div>

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
                                                            
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_title">Url:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'key_elements_title', 'name' => 'key_elements_url[]','class'=>'form-control input-md','placeholder'=>'Url...','value'=>(!empty($rec['url'])?$rec['url']:''))); ?></div>
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
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_title">Url:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'key_elements_title', 'name' => 'key_elements_url[]','class'=>'form-control input-md','placeholder'=>'Url...','value'=>(!empty($rec['url'])?$rec['url']:''))); ?></div>
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
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Featured Summary Section</h3></div>
                                    <hr>
                                </div>
                            </div>
							<div class="col-md-12">
                                <div class="form-group">
                                    <label>Section Heading</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'section_heading', 'name' => 'section_heading','class'=>'form-control input-md','placeholder'=>'Heading','value' => set_value('section_heading', !empty($section_heading)?$section_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('section_heading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Section Image</label>
                                </div>
                                <div class="form-group" id="blah_container">
                                    <img id="blah" src="<?=!empty($section_image)?base_url($section_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="section_image" type="file" class="form-control pull-right" id="section_image" onchange="checkPhoto(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Featured Tabs</label>
                                </div>
                                <div class="field_wrapper" id="fTabs_wrapper">
                                    <?php
                                    $featured_tabs_content = !empty($featured_tabs_content)?unserialize($featured_tabs_content):array();
                                    if(!empty($featured_tabs_content))
                                    {
                                        $k=1;
                                        foreach ($featured_tabs_content as $rec)
                                        {
                                           ?>
                                           <div class="row">
                                                <div class="col-md-11">
                                                    <div class="row fTabsBox">
                                                        <div class="col-md-3">
                                                            <div id="blah6<?=$k; ?>_container">
                                                                <img class="img2" id="blah6<?=$k; ?>" src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="fTabs_image" name="fTabs_image[]" value="<?=!empty($rec['icon'])?$rec['icon']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_icons">Icon:</label></div>
                                                                <div class="col-md-10"><input name="fTabs_icons[]" type="file" class="form-control pull-right" id="fTabs_icons" onchange="checkPhoto(this,'blah6<?=$k; ?>')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'fTabs_title', 'name' => 'fTabs_title[]','class'=>'form-control input-md','placeholder'=>'Title...','value'=>(!empty($rec['title'])?$rec['title']:''))); ?></div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_content">Content:</label></div>
                                                                <div class="col-md-10"><?php echo form_textarea(array('id' => 'fTabs_content', 'name' => 'fTabs_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($rec['content'])?$rec['content']:''))); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php
                                                    if($k==1)
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="add_fTabs" class="add_button" title="Add field">
                                                            <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                        </a>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="remove_fTabs" class="remove_button" title="Remove field">
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
                                                            <div id="blah6_container">
                                                                <img class="img2" id="blah6" src="<?=base_url(!empty($fTabs_icons)?$fTabs_icons:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="fTabs_image" name="fTabs_image[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_icons">Icon:</label></div>
                                                                <div class="col-md-10"><input name="fTabs_icons[]" type="file" class="form-control pull-right" id="fTabs_icons" onchange="checkPhoto(this,'blah6')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'fTabs_title', 'name' => 'fTabs_title[]','class'=>'form-control input-md','placeholder'=>'Title...')); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_content">Content:</label></div>
                                                                <div class="col-md-10"><?php echo form_textarea(array('id' => 'fTabs_content', 'name' => 'fTabs_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3)); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:void(0);" id="add_fTabs" class="add_button" title="Add field">
                                                        <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Discount Section</h3></div>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Discount Section Instruction</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'discount_section_instruction', 'name' => 'discount_section_instruction','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('discount_section_instruction', !empty($discount_section_instruction)?$discount_section_instruction:''))); ?>
                                    </div>
                                    <?php echo form_error('discount_section_instruction'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Student Chatter Section</h3></div>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Heading</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'chatter_section_heading', 'name' => 'chatter_section_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('chatter_section_heading', !empty($chatter_section_heading)?$chatter_section_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('chatter_section_heading'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Chatter page link</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'chatter_page_link', 'name' => 'chatter_page_link','class'=>'form-control input-md','placeholder'=>'Url..','value' => set_value('chatter_page_link', !empty($chatter_page_link)?$chatter_page_link:''))); ?>
                                    </div>
                                    <?php echo form_error('chatter_page_link'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Student Chatter Image</label>
                                </div>
                                <div class="form-group" id="blah7_container">
                                    <img id="blah7" src="<?=!empty($student_chatter_image)?base_url($student_chatter_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="student_chatter_image" type="file" class="form-control pull-right" id="student_chatter_image" onchange="checkPhoto(this,'blah7')">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Referral Section Content</h3></div>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Referral Content</label>
                                    <textarea name="referral_content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('referral_content', !empty($referral_content)?$referral_content:''); ?></textarea>
                                </div>
                                <?php echo form_error('referral_content'); ?>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Refferral Section Image</label>
                                </div>
                                <div class="form-group" id="blah8_container">
                                    <img id="blah8" src="<?=!empty($refferral_image)?base_url($refferral_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="refferral_image" type="file" class="form-control pull-right" id="refferral_image" onchange="checkPhoto(this,'blah8')">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Blog Section</h3></div>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Blog Section Heading</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'blog_section_heading', 'name' => 'blog_section_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('blog_section_heading', !empty($blog_section_heading)?$blog_section_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('blog_section_heading'); ?>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Infobox Content</h3></div>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Infobox Content</label>
                                    <textarea name="infobox_content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('infobox_content', !empty($infobox_content)?$infobox_content:''); ?></textarea>
                                </div>
                                <?php echo form_error('infobox_content'); ?>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Infobox Image</label>
                                </div>
                                <div class="form-group" id="blah9_container">
                                    <img id="blah9" src="<?=!empty($infobox_image)?base_url($infobox_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="infobox_image" type="file" class="form-control pull-right" id="infobox_image" onchange="checkPhoto(this,'blah9')">
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>SEO Meta Section</h3></div>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Meta Title:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file-text-o"></i>
                                        </div>
                                        <input name="meta_title" value="<?php echo set_value('meta_title', isset($meta_title)?$meta_title:" "); ?>" type="text" class="form-control pull-right" id="meta_title">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Meta Key:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file-text-o"></i>
                                        </div>
                                        <input name="meta_key" value="<?php echo set_value('meta_key', isset($meta_key)?$meta_key:" "); ?>" type="text" class="form-control pull-right" id="meta_key">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Meta Description:</label>
                                    <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="Enter ..."><?php echo set_value('meta_description', isset($meta_description)?$meta_description:""); ?></textarea>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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
                var fieldHTMLSteps = '<div class="row"> <div class="col-md-11"> <div class="row stepsBox"> <div class="col-md-3"> <div id="'+blah+'_container"> <img class="img2" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"> <div class="row"> <div class="col-md-2"><label for="key_elements_icons">Icon:</label></div><div class="col-md-10"><input name="key_elements_icons[]" type="file" class="form-control pull-right" id="key_elements_icons" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"> <div class="col-md-2"><label for="key_elements_title">Title:</label></div><div class="col-md-10"><input type="text" name="key_elements_title[]" value="" id="key_elements_title" class="form-control input-md" placeholder="Title..."></div></div><div class="row"> <div class="col-md-2"><label for="key_elements_content">Content:</label></div><div class="col-md-10"><textarea name="key_elements_content[]" rows="3" id="key_elements_content" class="form-control input-md" placeholder="Content..."></textarea></div></div><div class="row"><div class="col-md-2"><label for="key_elements_title">Url:</label></div><div class="col-md-10"><input type="text" name="key_elements_url[]" value="" id="key_elements_title" class="form-control input-md" placeholder="Url..."></div></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="delete_steps" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

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
        
        
        var add_fTabs = $('#add_fTabs'); //Add button selector
        var fTabs_wrapper = $('#fTabs_wrapper'); //Input field wrapper
        
        //Once add button is clicked
        $(add_fTabs).click(function()
        {
            //Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah6a'+y;
                var fieldHTMLfTabs = '<div class="row"> <div class="col-md-11"> <div class="row stepsBox"> <div class="col-md-3"> <div id="'+blah+'_container"> <img class="img2" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"> <div class="row"> <div class="col-md-2"><label for="fTabs_icons">Icon:</label></div><div class="col-md-10"><input name="fTabs_icons[]" type="file" class="form-control pull-right" id="fTabs_icons" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"> <div class="col-md-2"><label for="fTabs_title">Title:</label></div><div class="col-md-10"><input type="text" name="fTabs_title[]" value="" id="fTabs_title" class="form-control input-md" placeholder="Title..."></div></div><div class="row"> <div class="col-md-2"><label for="fTabs_content">Content:</label></div><div class="col-md-10"><textarea name="fTabs_content[]" rows="3" id="fTabs_content" class="form-control input-md" placeholder="Content..."></textarea></div></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="delete_fTabs" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(fTabs_wrapper).append(fieldHTMLfTabs); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(fTabs_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });

    });
</script>