<div class="content-wrapper">
    <section class="content-header">
        <h1>Going Abroad Settings <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Section Setting</a></li>
            <li class="active">Going Abroad</li>
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
	                                    <h3>Banner Section</h3></div>
	                                <hr>
	                            </div>
	                        </div>

	                        <div class="col-md-12">
                                <div class="form-group">
                                    <label>Banner Images: </label>
                                </div>

                                <div class="form-group" id="blah_container">
                                    <img id="blah" src="<?=!empty($banner_img)?base_url($banner_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Banner Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="banner_img" type="file" class="form-control pull-right" id="banner_img" onchange="checkPhoto(this)">
                                    </div>
                                </div>
                            </div>

	                        <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Page Content Section</h3></div>
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
                                        <?php echo form_input(array('id' => 'heading', 'name' => 'heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('heading', !empty($heading)?$heading:''))); ?>
                                    </div>
                                    <?php echo form_error('heading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Comment</label>
                                    <textarea name="comment" class="form-control" rows="2" placeholder="Enter ..."><?php echo set_value('comment', !empty($comment)?$comment:''); ?></textarea>
                                </div>
                                <?php echo form_error('comment'); ?>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Facts Section</h3></div>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Facts Section Heading</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'facts_heading', 'name' => 'facts_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('facts_heading', !empty($facts_heading)?$facts_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('facts_heading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fact Elements</label>
                                </div>
                                <div class="field_wrapper" id="facts_wrapper">
                                    <?php
                                    $facts_content = !empty($facts_content)?unserialize($facts_content):array();
                                    if(!empty($facts_content))
                                    {
                                        $k=1;
                                        foreach ($facts_content as $rec)
                                        {
                                           ?>
                                           <div class="row">
                                                <div class="col-md-11">
                                                    <div class="row stepsBox">
                                                        <div class="col-md-3">
                                                            <div id="blah5<?=$k; ?>_container">
                                                                <img class="img2" id="blah5<?=$k; ?>" src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="fact_element_image" name="fact_element_image[]" value="<?=!empty($rec['icon'])?$rec['icon']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fact_element_icons">Icon:</label></div>
                                                                <div class="col-md-10"><input name="fact_element_icons[]" type="file" class="form-control pull-right" id="fact_element_icons" onchange="checkPhoto(this,'blah5<?=$k; ?>')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fact_element_key">Key:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'fact_element_key', 'name' => 'fact_element_key[]','class'=>'form-control input-md','placeholder'=>'Key...','value'=>(!empty($rec['key'])?$rec['key']:''))); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fact_element_value">Value:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'fact_element_value', 'name' => 'fact_element_value[]','class'=>'form-control input-md','placeholder'=>'Value...','value'=>(!empty($rec['value'])?$rec['value']:''))); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php
                                                    if($k==1)
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="add_facts" class="add_button" title="Add field">
                                                            <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                        </a>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="remove_facts" class="remove_button" title="Remove field">
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
                                                                <img class="img2" id="blah5" src="<?=base_url(!empty($facts_icon)?$facts_icon:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="fact_element_image" name="fact_element_image[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fact_element_icons">Icon:</label></div>
                                                                <div class="col-md-10"><input name="fact_element_icons[]" type="file" class="form-control pull-right" id="fact_element_icons" onchange="checkPhoto(this,'blah5')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fact_element_key">Key:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'fact_element_key', 'name' => 'fact_element_key[]','class'=>'form-control input-md','placeholder'=>'Key...')); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fact_element_value">Value:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'fact_element_value', 'name' => 'fact_element_value[]','class'=>'form-control input-md','placeholder'=>'Value...')); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:void(0);" id="add_facts" class="add_button" title="Add field">
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
                                        <h3>Infobox Section</h3></div>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Infobox1 Heading</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'infobox1_heading', 'name' => 'infobox1_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('infobox1_heading', !empty($infobox1_heading)?$infobox1_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('infobox1_heading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Infobox1 Content</label>
                                    <textarea name="infobox1_content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('infobox1_content', !empty($infobox1_content)?$infobox1_content:''); ?></textarea>
                                </div>
                                <?php echo form_error('infobox1_content'); ?>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Infobox1 Image</label>
                                </div>
                                <div class="form-group" id="blah9_container">
                                    <img id="blah9" src="<?=!empty($infobox_image1)?base_url($infobox_image1):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="infobox_image1" type="file" class="form-control pull-right" id="infobox_image1" onchange="checkPhoto(this,'blah9')">
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Infobox2 Heading</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'infobox2_heading', 'name' => 'infobox2_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('infobox2_heading', !empty($infobox2_heading)?$infobox2_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('infobox2_heading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Infobox2 Content</label>
                                    <textarea name="infobox2_content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('infobox2_content', !empty($infobox2_content)?$infobox2_content:''); ?></textarea>
                                </div>
                                <?php echo form_error('infobox2_content'); ?>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Infobox2 Image</label>
                                </div>
                                <div class="form-group" id="blah9b_container">
                                    <img id="blah9b" src="<?=!empty($infobox_image2)?base_url($infobox_image2):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="infobox_image2" type="file" class="form-control pull-right" id="infobox_image2" onchange="checkPhoto(this,'blah9b')">
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Infobox3 Heading</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'infobox3_heading', 'name' => 'infobox3_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('infobox3_heading', !empty($infobox3_heading)?$infobox3_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('infobox3_heading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Infobox3 Content</label>
                                    <textarea name="infobox3_content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('infobox3_content', !empty($infobox3_content)?$infobox3_content:''); ?></textarea>
                                </div>
                                <?php echo form_error('infobox3_content'); ?>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Infobox3 Image</label>
                                </div>
                                <div class="form-group" id="blah9c_container">
                                    <img id="blah9c" src="<?=!empty($infobox_image3)?base_url($infobox_image3):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="infobox_image3" type="file" class="form-control pull-right" id="infobox_image3" onchange="checkPhoto(this,'blah9c')">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Tabs Section</h3></div>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="field_wrapper" id="tab_wrapper">
                                    <?php
                                    $tabs_content = !empty($tabs_content)?unserialize($tabs_content):array();
                                    if(!empty($tabs_content))
                                    {
                                        $k=1;
                                        foreach ($tabs_content as $rec)
                                        {
                                           ?>
                                           <div class="row">
                                                <div class="col-md-11">
                                                    <div class="row stepsBox">
                                                        <div class="col-md-3">
                                                            <div id="blah6<?=$k; ?>_container">
                                                                <img class="img2" id="blah6<?=$k; ?>" src="<?=base_url(!empty($rec['image'])?$rec['image']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="tab_old_image" name="tab_old_image[]" value="<?=!empty($rec['image'])?$rec['image']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="tab_icons">Image:</label></div>
                                                                <div class="col-md-10"><input name="tab_image[]" type="file" class="form-control pull-right" id="tab_image" onchange="checkPhoto(this,'blah6<?=$k; ?>')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="tab_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'tab_title', 'name' => 'tab_title[]','class'=>'form-control input-md','placeholder'=>'Title...','value'=>(!empty($rec['title'])?$rec['title']:''))); ?></div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="tab_content">Content:</label></div>
                                                                <div class="col-md-10"><?php echo form_textarea(array('id' => 'tab_content', 'name' => 'tab_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($rec['content'])?$rec['content']:''))); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php
                                                    if($k==1)
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="add_tab" class="add_button" title="Add field">
                                                            <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                        </a>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="remove_tab" class="remove_button" title="Remove field">
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
                                                                <img class="img2" id="blah6" src="<?=base_url(!empty($tab_icons)?$tab_icons:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="tab_old_image" name="tab_old_image[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="tab_image">Image:</label></div>
                                                                <div class="col-md-10"><input name="tab_image[]" type="file" class="form-control pull-right" id="tab_image" onchange="checkPhoto(this,'blah6')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="tab_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'tab_title', 'name' => 'tab_title[]','class'=>'form-control input-md','placeholder'=>'Title...')); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="tab_content">Content:</label></div>
                                                                <div class="col-md-10"><?php echo form_textarea(array('id' => 'tab_content', 'name' => 'tab_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3)); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:void(0);" id="add_tab" class="add_button" title="Add field">
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

        var add_facts = $('#add_facts'); //Add button selector
        var facts_wrapper = $('#facts_wrapper'); //Input field wrapper
        var base_url = $('body').attr('data-url');
        //Once add button is clicked
        $(add_facts).click(function()
        {
            //Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah5a'+y;
                var fieldHTMLSteps = '<div class="row"> <div class="col-md-11"> <div class="row stepsBox"> <div class="col-md-3"> <div id="'+blah+'_container"> <img class="img2" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"> <div class="row"> <div class="col-md-2"><label for="fact_element_icons">Icon:</label></div><div class="col-md-10"><input name="fact_element_icons[]" type="file" class="form-control pull-right" id="fact_element_icons" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"> <div class="col-md-2"><label for="fact_element_key">Key:</label></div><div class="col-md-10"><input type="text" name="fact_element_key[]" value="" id="fact_element_key" class="form-control input-md" placeholder="Key..."></div></div><div class="row"> <div class="col-md-2"><label for="fact_element_value">Value:</label></div><div class="col-md-10"><input type="text" name="fact_element_value[]" id="fact_element_value" class="form-control input-md" placeholder="Value..."></div></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="delete_steps" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(facts_wrapper).append(fieldHTMLSteps); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(facts_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });
        
        
        var add_tab = $('#add_tab'); //Add button selector
        var tab_wrapper = $('#tab_wrapper'); //Input field wrapper
        
        //Once add button is clicked
        $(add_tab).click(function()
        {
            //Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah6a'+y;
                var fieldHTMLfTabs = '<div class="row"> <div class="col-md-11"> <div class="row stepsBox"> <div class="col-md-3"> <div id="'+blah+'_container"> <img class="img2" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"> <div class="row"> <div class="col-md-2"><label for="tab_icons">Image:</label></div><div class="col-md-10"><input name="tab_image[]" type="file" class="form-control pull-right" id="tab_image" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"> <div class="col-md-2"><label for="tab_title">Title:</label></div><div class="col-md-10"><input type="text" name="tab_title[]" value="" id="tab_title" class="form-control input-md" placeholder="Title..."></div></div><div class="row"> <div class="col-md-2"><label for="tab_content">Content:</label></div><div class="col-md-10"><textarea name="tab_content[]" rows="3" id="tab_content" class="form-control input-md ckeditor" placeholder="Content..."></textarea></div></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="delete_tab" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(tab_wrapper).append(fieldHTMLfTabs); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(tab_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });

    });
</script>