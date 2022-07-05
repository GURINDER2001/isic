<?php
//pre($editdata);
if(!empty($editdata)) 
{  
    extract($editdata); 
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Landings Page <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Landings</a></li>
            <li><a href="#">Page Setting</a></li>
            <li class="active">Landings</li>
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
                        
                        //pre($array);
                        extract($array);
                    endif;
                    ?>
                    <div class="box-body pad">
                        <form method="post" enctype="multipart/form-data">
                            
							<div class="col-md-12">
                                <div class="form-group">
                                    <label>Page Title: </label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'page_title', 'name' => 'page_title','class'=>'form-control input-md','placeholder'=>'Page Title','value' => set_value('page_title', !empty($name)?$name:''))); ?>
                                    </div>
                                    <?php echo form_error('page_title'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Slug: </label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'slug', 'name' => 'slug','class'=>'form-control input-md','placeholder'=>'Slug','value' => set_value('slug', !empty($slug)?$slug:''))); ?>
                                    </div>
                                    <?php echo form_error('slug'); ?>
                                </div>
                            </div>
                            
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
                            
                            <!--<div class="col-md-12">
	                            <div class="form-group">
	                                <div>
	                                    <h3>Layout Style</h3></div>
	                                <hr>
	                            </div>
	                        </div>
	                        
	                        <div class="col-md-12">
    	                        <div class="form-group">
                                    <label>Layout Style:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file-text-o"></i>
                                        </div>
                                        <?php echo form_dropdown('layout', array('Layout 1 (Default)','Layout 2','Layout 3'),set_value('layout',isset($layout)?$layout:""),'id="layout" class="form-control"'); ?>
                                        <?php echo form_error('layout'); ?>
                                    </div>
                                </div>
                            </div>-->
                            
                            <div id="introboxContainerStyle1" <?=!empty($layout)?'style="display:none;"':''; ?>>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div>
                                            <h3>Introduction Section</h3></div>
                                        <hr>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Intro Heading</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <?php echo form_input(array('id' => 'intro_heading', 'name' => 'intro_heading','class'=>'form-control input-md','placeholder'=>'Heading...','value' => set_value('intro_heading', !empty($intro_heading)?$intro_heading:''))); ?>
                                        </div>
                                        <?php echo form_error('intro_heading'); ?>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
    								<div class="form-group">
                                        <label>Intro Content</label>
                                    </div>
    								<div class="form-group">
    									<?php echo form_textarea(array('id' => 'intro_content', 'name' => 'intro_content','class'=>'form-control input-md ckeditor','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($intro_content)?$intro_content:''))); ?>
    								</div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Intro Image: </label>
                                    </div>
    
                                    <div class="form-group" id="blah2_container">
                                        <img id="blah2" src="<?=!empty($intro_img)?base_url($intro_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Intro Image" class="img2" />
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <input name="intro_img" type="file" class="form-control pull-right" id="intro_img" onchange="checkPhoto(this,'blah2')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
							
							<div id="flipboxContainer" <?=!empty($layout)?'style="display:none;"':''; ?>>
							    
    							<div class="col-md-12">
                                    <div class="form-group">
                                        <div>
                                            <h3>Flip Infoboxes</h3></div>
                                        <hr>
                                    </div>
                                </div>
                                
    							<div class="col-md-12">
                                    <div class="field_wrapper" id="flipboxes_wrapper">
                                        <?php
                                        $flipboxes_elements = !empty($flipboxes_elements)?unserialize($flipboxes_elements):array();
                                        if(!empty($flipboxes_elements))
                                        {
                                            $k=1;
                                            foreach ($flipboxes_elements as $rec)
                                            {
                                               ?>
                                               <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row stepsBox">
															<div class="col-md-3">
                                                                <div id="blah7a<?=$k; ?>_container">
                                                                    <img class="img1" id="blah7a<?=$k; ?>" src="<?=base_url(!empty($rec['logo'])?$rec['logo']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                    <input type="hidden" id="flipbox_old_logo" name="flipbox_old_logo[]" value="<?=!empty($rec['logo'])?$rec['logo']:'';?>">
                                                                </div>
                                                                <div id="blah7b<?=$k; ?>_container">
                                                                    <img class="img2" id="blah7b<?=$k; ?>" src="<?=base_url(!empty($rec['image'])?$rec['image']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                    <input type="hidden" id="flipbox_old_image" name="flipbox_old_image[]" value="<?=!empty($rec['image'])?$rec['image']:'';?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
																<div class="row">
                                                                    <div class="col-md-2"><label for="flipbox_image">Logo:</label></div>
                                                                    <div class="col-md-10"><input name="flipbox_logo[]" type="file" class="form-control pull-right" id="flipbox_logo" onchange="checkPhoto(this,'blah7a<?=$k; ?>')"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="flipbox_image">Image:</label></div>
                                                                    <div class="col-md-10"><input name="flipbox_image[]" type="file" class="form-control pull-right" id="flipbox_image" onchange="checkPhoto(this,'blah7b<?=$k; ?>')"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="flipbox_image">Heading:</label></div>
                                                                    <div class="col-md-10"><input name="flipbox_heading[]" type="text" class="form-control pull-right" id="flipbox_heading" placeholder="Heading..." value="<?=!empty($rec['heading'])?$rec['heading']:''; ?>"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="flipbox_content">Content:</label></div>
                                                                    <div class="col-md-10"><?php echo form_textarea(array('id' => 'flipbox_content', 'name' => 'flipbox_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($rec['content'])?$rec['content']:''))); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <?php
                                                        if($k==1)
                                                        {
                                                            ?>
                                                            <a href="javascript:void(0);" id="add_flipbox" class="add_button" title="Add field">
                                                                <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                            </a>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <a href="javascript:void(0);" id="remove_flipbox" class="remove_button" title="Remove field">
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
                                                                <div id="blah7a_container">
                                                                    <img class="img1" id="blah7a" src="<?=base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                    <input type="hidden" id="flipbox_old_logo" name="flipbox_old_logo[]" value="">
                                                                </div>
                                                                <div id="blah7b_container">
                                                                    <img class="img2" id="blah7b" src="<?=base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                    <input type="hidden" id="flipbox_old_image" name="flipbox_old_image[]" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="flipbox_image">Logo:</label></div>
                                                                    <div class="col-md-10"><input name="flipbox_logo[]" type="file" class="form-control pull-right" id="flipbox_logo" onchange="checkPhoto(this,'blah7a<?=$k; ?>')"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="flipbox_image">Image:</label></div>
                                                                    <div class="col-md-10"><input name="flipbox_image[]" type="file" class="form-control pull-right" id="flipbox_image" onchange="checkPhoto(this,'blah7b<?=$k; ?>')"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="flipbox_image">Heading:</label></div>
                                                                    <div class="col-md-10"><input name="flipbox_heading[]" type="text" class="form-control pull-right" id="flipbox_heading" placeholder="Heading..." value="<?=!empty($rec['heading'])?$rec['heading']:''; ?>"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="flipbox_content">Content:</label></div>
                                                                    <div class="col-md-10"><?php echo form_textarea(array('id' => 'flipbox_content', 'name' => 'flipbox_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3)); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="javascript:void(0);" id="add_flipbox" class="add_button" title="Add field">
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
							
                            
                            <div id="carousalsectionContainer" <?=!empty($layout)?'style="display:none;"':''; ?>>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div>
                                            <h3>Carousal Section</h3></div>
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
                                            <?php echo form_input(array('id' => 'carousal_heading', 'name' => 'carousal_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('carousal_heading', !empty($carousal_heading)?$carousal_heading:''))); ?>
                                        </div>
                                        <?php echo form_error('carousal_heading'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Carousal</label>
                                    </div>
                                    <div class="field_wrapper" id="carousal_wrapper">
                                        <?php
                                        $carousals_items = !empty($carousals_items)?unserialize($carousals_items):array();
                                        if(!empty($carousals_items))
                                        {
                                            $k=1;
                                            foreach ($carousals_items as $rec)
                                            {
                                               ?>
                                               <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row stepsBox">
                                                            <div class="col-md-2">
                                                                <div id="blah5<?=$k; ?>_container">
                                                                    <img class="img1" id="blah5<?=$k; ?>" src="<?=base_url(!empty($rec['image'])?$rec['image']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                    <input type="hidden" id="carousal_item_old_image" name="carousal_item_old_image[]" value="<?=!empty($rec['image'])?$rec['image']:'';?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="row mb-5">
                                                                    <div class="col-md-2"><label for="key_elements_icons">Icon:</label></div>
                                                                    <div class="col-md-10"><input name="carousal_item_image[]" type="file" class="form-control pull-right" id="carousal_item_image" onchange="checkPhoto(this,'blah5<?=$k; ?>')"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="old_title">Title:</label></div>
                                                                    <div class="col-md-10"><?php echo form_input(array('id' => 'carousal_item_title', 'name' => 'carousal_item_title[]','class'=>'form-control input-md','placeholder'=>'Title...','value'=>(!empty($rec['title'])?$rec['title']:''))); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <?php
                                                        if($k==1)
                                                        {
                                                            ?>
                                                            <a href="javascript:void(0);" id="add_carousal_item" class="add_button" title="Add field">
                                                                <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                            </a>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <a href="javascript:void(0);" id="remove_carousal_item" class="remove_button" title="Remove field">
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
                                                            <div class="col-md-2">
                                                                <div id="blah5_container">
                                                                    <img class="img1" id="blah5" src="<?=base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                    <input type="hidden" id="carousal_item_old_image" name="carousal_item_old_image[]">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="row mb-5">
                                                                    <div class="col-md-2"><label for="image">Icon:</label></div>
                                                                    <div class="col-md-10"><input name="carousal_item_image[]" type="file" class="form-control pull-right" id="carousal_item_image" onchange="checkPhoto(this,'blah5')"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="title">Title:</label></div>
                                                                    <div class="col-md-10"><?php echo form_input(array('id' => 'carousal_item_title', 'name' => 'carousal_item_title[]','class'=>'form-control input-md','placeholder'=>'Title...')); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="javascript:void(0);" id="add_carousal_item" class="add_button" title="Add field">
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
                            
                            <div id="contentboxContainer" <?=!empty($layout)?'style="display:none;"':''; ?>>
                            
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div>
                                            <h3>Content Box Section</h3></div>
                                        <hr>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Content Box Image: </label>
                                    </div>
    
                                    <div class="form-group" id="blah3_container">
                                        <img id="blah3" src="<?=!empty($contentbox_img)?base_url($contentbox_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img2" />
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <input name="contentbox_img" type="file" class="form-control pull-right" id="contentbox_img" onchange="checkPhoto(this,'blah3')">
                                        </div>
                                    </div>
                                </div>
                                
    							<div class="col-md-12">
                                    <div class="form-group">
                                        <label>ContentBox Heading</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <?php echo form_input(array('id' => 'contentbox_heading', 'name' => 'contentbox_heading','class'=>'form-control input-md','placeholder'=>'Heading...','value' => set_value('contentbox_heading', !empty($contentbox_heading)?$contentbox_heading:''))); ?>
                                        </div>
                                        <?php echo form_error('contentbox_heading'); ?>
                                    </div>
                                </div>
    
                                <div class="col-md-12">
    								<div class="form-group">
                                        <label>ContentBox Content</label>
                                    </div>
    								<div class="form-group">
    									<?php echo form_textarea(array('id' => 'contentbox_content', 'name' => 'contentbox_content','class'=>'form-control input-md ckeditor','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($contentbox_content)?$contentbox_content:''))); ?>
    								</div>
                                </div>
                            </div>
                            
                            <div id="stripesectionContainer" <?=!empty($layout)?'style="display:none;"':''; ?>>
                            
                                <div id="stripeContent">
                                
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div>
                                                <h3>Button Stripe Section</h3></div>
                                            <hr>
                                        </div>
                                    </div>
                                    
        							<div class="col-md-12">
                                        <div class="form-group">
                                            <label>Stripe Button Label</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <?php echo form_input(array('id' => 'stripe_button_label', 'name' => 'stripe_button_label','class'=>'form-control input-md','placeholder'=>'Button Label..','value' => set_value('stripe_button_label', !empty($stripe_button_label)?$stripe_button_label:''))); ?>
                                            </div>
                                            <?php echo form_error('stripe_button_label'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Stripe Button Url</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <?php echo form_input(array('id' => 'stripe_button_url', 'name' => 'stripe_button_url','class'=>'form-control input-md','placeholder'=>'Button Url..','value' => set_value('stripe_button_url', !empty($stripe_button_url)?$stripe_button_url:''))); ?>
                                            </div>
                                            <?php echo form_error('stripe_button_url'); ?>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            
                            <div id="seosectionContainer">
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
    
   $(document).on('change','#layout',function(){
        var layout = $(this).val();
        if(layout == 2)
        {
            $('#introboxContainerStyle1').hide();
            $('#flipboxContainer').hide();
            $('#carousalsectionContainer').hide();
            $('#contentboxContainer').hide();
            $('#stripesectionContainer').hide();
            
        }
        else if(layout == 1)
        {
            $('#introboxContainerStyle1').hide();
            $('#flipboxContainer').hide();
            $('#carousalsectionContainer').hide();
            $('#contentboxContainer').hide();
            $('#stripesectionContainer').hide();
        }
        else
        {
            $('#introboxContainerStyle1').show();
            $('#flipboxContainer').show();
            $('#carousalsectionContainer').show();
            $('#contentboxContainer').show();
            $('#stripesectionContainer').show();
        }
   });
   
   $(document).ready(function() {
        var maxField = 30; //Input fields increment limitation

        var x = 1; //Initial field counter is 1
        var y = 1; //Initial field counter is 1
        var a = 1; //Initial field counter is 1
        var b = 1; //Initial field counter is 1
        
        var base_url = $('body').attr('data-url');
        
        
        var add_carousal_item = $('#add_carousal_item'); //Add button selector
        var carousal_wrapper = $('#carousal_wrapper'); //Input field wrapper
        var base_url = $('body').attr('data-url');
        //Once add button is clicked
        $(add_carousal_item).click(function()
        {
            //Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah5a'+y;
                var fieldHTMLSteps = '<div class="row"> <div class="col-md-11"> <div class="row stepsBox"> <div class="col-md-2"> <div id="'+blah+'_container"> <img class="img1" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-10"> <div class="row"> <div class="col-md-2"><label for="image">Icon:</label></div><div class="col-md-10"><input name="carousal_item_image[]" type="file" class="form-control pull-right" id="carousal_item_image" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"> <div class="col-md-2"><label for="title">Title:</label></div><div class="col-md-10"><input type="text" name="carousal_item_title[]" value="" id="carousal_item_title" class="form-control input-md" placeholder="Title..."></div></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="delete_carousal_item" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(carousal_wrapper).append(fieldHTMLSteps); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(carousal_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });

        var add_flipbox = $('#add_flipbox'); //Add button selector
        var flipboxes_wrapper = $('#flipboxes_wrapper'); //Input field wrapper
        
        //Once add button is clicked
        $(add_flipbox).click(function()
        {
			//Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah7a'+y;
				var blah2 = 'blah7b'+y;
                var fieldHTMLflipbox = '<div class="row"><div class="col-md-11"><div class="row stepsBox"><div class="col-md-3"><div id="'+blah2+'_container"><img class="img1" id="'+blah2+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div><div id="'+blah+'_container"><img class="img2" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"><div class="row"><div class="col-md-2"><label for="flipbox_image">Logo:</label></div><div class="col-md-10"><input name="flipbox_logo[]" type="file" class="form-control pull-right" id="flipbox_logo" onchange="checkPhoto(this,\''+blah2+'\')"></div></div><div class="row"><div class="col-md-2"><label for="flipbox_image">Image:</label></div><div class="col-md-10"><input name="flipbox_image[]" type="file" class="form-control pull-right" id="flipbox_image" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"><div class="col-md-2"><label for="flipbox_image">Heading:</label></div><div class="col-md-10"><input name="flipbox_heading[]" type="text" class="form-control pull-right" id="flipbox_heading" placeholder="Heading..." value=""></div></div><div class="row"><div class="col-md-2"><label for="flipbox_content">Content:</label></div><div class="col-md-10"><textarea rows="3" name="flipbox_content[]" value="" id="flipbox_content" class="form-control input-md" placeholder="Content..."></textarea></div></div></div></div></div><div class="col-md-1"><a href="javascript:void(0);" id="remove_offerbox" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(flipboxes_wrapper).append(fieldHTMLflipbox); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(flipboxes_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });

    });
</script>