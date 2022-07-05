<div class="content-wrapper">
	<section class="content-header">
	    <h1>Why ISIC Settings<small>it all starts here</small></h1>
	    <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="#">Section Setting</a></li>
	        <li class="active">Why ISIC?</li>
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

                            <!--div class="col-md-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('content', !empty($content)?$content:''); ?></textarea>
                                </div>
                                <?php echo form_error('content'); ?>
                            </div-->
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Key Features Section</h3></div>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Key Feature Image: </label>
                                </div>

                                <div class="form-group" id="blah10_container">
                                    <img id="blah10" src="<?=!empty($keyfeature_img)?base_url($keyfeature_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Banner Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="keyfeature_img" type="file" class="form-control pull-right" id="keyfeature_img" onchange="checkPhoto(this,'blah10')">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Key Features</label>
                                </div>
                                <div class="field_wrapper" id="keyfeatures_wrapper">
                                    <?php
                                    $key_features = !empty($key_features)?unserialize($key_features):array();
                                    if(!empty($key_features))
                                    {
                                        $k=1;
                                        foreach ($key_features as $rec)
                                        {
                                           ?>
                                           <div class="row">
                                                <div class="col-md-11">
                                                    <div class="row logosBox">
                                                        <div class="col-md-3">
                                                            <div id="blah5<?=$k; ?>_container">
                                                                <img class="img1" id="blah5<?=$k; ?>" src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="key_feature_image" name="key_feature_image[]" value="<?=!empty($rec['icon'])?$rec['icon']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row mb-5">
                                                                <div class="col-md-2"><label for="key_elements_icons">Icon:</label></div>
                                                                <div class="col-md-10"><input name="key_feature_icons[]" type="file" class="form-control pull-right" id="key_feature_icons" onchange="checkPhoto(this,'blah5<?=$k; ?>')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_feature_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'key_feature_title', 'name' => 'key_feature_title[]','class'=>'form-control input-md','placeholder'=>'Title...','value'=>(!empty($rec['title'])?$rec['title']:''))); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php
                                                    if($k==1)
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="add_keyfeature" class="add_button" title="Add field">
                                                            <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                        </a>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="remove_keyfeature" class="remove_button" title="Remove field">
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
                                                    <div class="row logosBox">
                                                        <div class="col-md-3">
                                                            <div id="blah5_container">
                                                                <img class="img1" id="blah5" src="<?=base_url(!empty($key_feature_icon)?$key_feature_icon:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="key_feature_image" name="key_feature_image[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row mb-5">
                                                                <div class="col-md-2"><label for="key_feature_icons">Icon:</label></div>
                                                                <div class="col-md-10"><input name="key_feature_icons[]" type="file" class="form-control pull-right" id="key_feature_icons" onchange="checkPhoto(this,'blah5')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_feature_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'key_feature_title', 'name' => 'key_feature_title[]','class'=>'form-control input-md','placeholder'=>'Title...')); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:void(0);" id="add_keyfeature" class="add_button" title="Add field">
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
                                        <h3>Highlights & Steps Section</h3></div>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Section Image: </label>
                                </div>

                                <div class="form-group" id="blah11_container">
                                    <img id="blah11" src="<?=!empty($section_img)?base_url($section_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Section Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="section_img" type="file" class="form-control pull-right" id="section_img" onchange="checkPhoto(this,'blah11')">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Highlights</label>
                                </div>
                                <div class="field_wrapper" id="highlights_wrapper">
                                    <?php
                                    $highlights = !empty($highlights)?unserialize($highlights):array();
                                    if(!empty($highlights))
                                    {
                                        $k=1;
                                        foreach ($highlights as $rec)
                                        {
                                           ?>
                                           <div class="row">
                                                <div class="col-md-11">
                                                    <div class="row logosBox">
                                                        <div class="col-md-3">
                                                            <div id="blah6<?=$k; ?>_container">
                                                                <img class="img1" id="blah6<?=$k; ?>" src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="highlights_image" name="highlights_image[]" value="<?=!empty($rec['icon'])?$rec['icon']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row mb-5">
                                                                <div class="col-md-2"><label for="highlights_icons">Icon:</label></div>
                                                                <div class="col-md-10"><input name="highlights_icons[]" type="file" class="form-control pull-right" id="highlights_icons" onchange="checkPhoto(this,'blah6<?=$k; ?>')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="highlights_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'highlights_title', 'name' => 'highlights_title[]','class'=>'form-control input-md','placeholder'=>'Title...','value'=>(!empty($rec['title'])?$rec['title']:''))); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php
                                                    if($k==1)
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="add_highlights" class="add_button" title="Add field">
                                                            <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                        </a>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <a href="javascript:void(0);" id="remove_highlights" class="remove_button" title="Remove field">
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
                                                    <div class="row logosBox">
                                                        <div class="col-md-3">
                                                            <div id="blah60_container">
                                                                <img class="img1" id="blah60" src="<?=base_url(!empty($highlights_icon)?$highlights_icon:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="highlights_image" name="highlights_image[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row mb-5">
                                                                <div class="col-md-2"><label for="highlights_icons">Icon:</label></div>
                                                                <div class="col-md-10"><input name="highlights_icons[]" type="file" class="form-control pull-right" id="highlights_icons" onchange="checkPhoto(this,'blah60')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="highlights_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'highlights_title', 'name' => 'highlights_title[]','class'=>'form-control input-md','placeholder'=>'Title...')); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:void(0);" id="add_highlights" class="add_button" title="Add field">
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
                                    <label>Steps</label>
                                </div>
                                <div class="field_wrapper" id="steps_wrapper">
                                    <?php
                                    $steps = !empty($steps)?unserialize($steps):array();
                                    if(!empty($steps))
                                    {
                                        $k=1;
                                        foreach ($steps as $rec)
                                        {
                                           ?>
                                           <div class="row">
                                                <div class="col-md-11">
                                                    <div class="row logosBox">
                                                        <div class="col-md-3">
                                                            <div id="blah7<?=$k; ?>_container">
                                                                <img class="img1" id="blah7<?=$k; ?>" src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="steps_image" name="steps_image[]" value="<?=!empty($rec['icon'])?$rec['icon']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row mb-5">
                                                                <div class="col-md-2"><label for="steps_icons">Icon:</label></div>
                                                                <div class="col-md-10"><input name="steps_icons[]" type="file" class="form-control pull-right" id="steps_icons" onchange="checkPhoto(this,'blah7<?=$k; ?>')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="steps_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'steps_title', 'name' => 'steps_title[]','class'=>'form-control input-md','placeholder'=>'Title...','value'=>(!empty($rec['title'])?$rec['title']:''))); ?></div>
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
                                                    <div class="row logosBox">
                                                        <div class="col-md-3">
                                                            <div id="blah70_container">
                                                                <img class="img1" id="blah70" src="<?=base_url(!empty($steps_icon)?$steps_icon:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="steps_image" name="steps_image[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row mb-5">
                                                                <div class="col-md-2"><label for="steps_icons">Icon:</label></div>
                                                                <div class="col-md-10"><input name="steps_icons[]" type="file" class="form-control pull-right" id="steps_icons" onchange="checkPhoto(this,'blah70')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="highlights_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'steps_title', 'name' => 'steps_title[]','class'=>'form-control input-md','placeholder'=>'Title...')); ?></div>
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
                                        <h3>Infobox Content</h3></div>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Infobox Heading</label>
                                    <input type="text" name="infobox_heading" class="form-control" placeholder="Heading ..." value="<?php echo set_value('infobox_heading', !empty($infobox_heading)?$infobox_heading:''); ?>">
                                </div>
                                <?php echo form_error('infobox_heading'); ?>
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
                                <div class="form-group" id="blah2_container">
                                    <img id="blah2" src="<?=!empty($infobox_image)?base_url($infobox_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Infobox Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="infobox_image" type="file" class="form-control pull-right" id="infobox_image" onchange="checkPhoto(this,'blah2')">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                            	<div class="form-group">
                            		<div>
                            			<h3>Infobox 2 Content</h3>
                            		</div>
                            		<hr>
                            	</div>
                            </div>
                            
                            <div class="col-md-12">
                            	<div class="form-group">
                            		<label>Infobox2 Heading</label>
                            		<input type="text" name="infobox2_heading" class="form-control" placeholder="Heading ..." value="<?php echo set_value('infobox2_heading', !empty($infobox2_heading)?$infobox2_heading:''); ?>">
                            	</div>
                            	<?php echo form_error('infobox2_heading'); ?>
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
                            	<div class="form-group" id="blah3_container">
                            		<img id="blah3" src="<?=!empty($infobox2_image)?base_url($infobox2_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Infobox2 Image" class="img2" />
                            	</div>
                            	<div class="form-group">
                            		<div class="input-group">
                            			<div class="input-group-addon">
                            				<i class="fa fa-file"></i>
                            			</div>
                            			<input name="infobox2_image" type="file" class="form-control pull-right" id="infobox2_image" onchange="checkPhoto(this,'blah3')">
                            		</div>
                            	</div>
                            </div>
                            
                            <div class="col-md-12">
                            	<div class="form-group">
                            		<div>
                            			<h3>Infobox 3 Content</h3>
                            		</div>
                            		<hr>
                            	</div>
                            </div>
                            
                            <div class="col-md-12">
                            	<div class="form-group">
                            		<label>Infobox3 Heading</label>
                            		<input type="text" name="infobox3_heading" class="form-control" placeholder="Heading ..." value="<?php echo set_value('infobox3_heading', !empty($infobox3_heading)?$infobox3_heading:''); ?>">
                            	</div>
                            	<?php echo form_error('infobox3_heading'); ?>
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
                            	<div class="form-group" id="blah4_container">
                            		<img id="blah4" src="<?=!empty($infobox3_image)?base_url($infobox3_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Infobox3 Image" class="img2" />
                            	</div>
                            	<div class="form-group">
                            		<div class="input-group">
                            			<div class="input-group-addon">
                            				<i class="fa fa-file"></i>
                            			</div>
                            			<input name="infobox3_image" type="file" class="form-control pull-right" id="infobox3_image" onchange="checkPhoto(this,'blah4')">
                            		</div>
                            	</div>
                            </div>
                            
                            <div class="col-md-12">
                            	<div class="form-group">
                            		<div>
                            			<h3>Infobox 4 Content</h3>
                            		</div>
                            		<hr>
                            	</div>
                            </div>
                            
                            <div class="col-md-12">
                            	<div class="form-group">
                            		<label>Infobox4 Heading</label>
                            		<input type="text" name="infobox4_heading" class="form-control" placeholder="Heading ..." value="<?php echo set_value('infobox4_heading', !empty($infobox4_heading)?$infobox4_heading:''); ?>">
                            	</div>
                            	<?php echo form_error('infobox4_heading'); ?>
                            </div>
                            
                            <div class="col-md-12">
                            	<div class="form-group">
                            		<label>Infobox5 Content</label>
                            		<textarea name="infobox4_content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('infobox4_content', !empty($infobox4_content)?$infobox4_content:''); ?></textarea>
                            	</div>
                            	<?php echo form_error('infobox4_content'); ?>
                            </div>
                            
                            <div class="col-md-12">
                            	<div class="form-group">
                            		<label>Infobox4 Image</label>
                            	</div>
                            	<div class="form-group" id="blah5_container">
                            		<img id="blah5" src="<?=!empty($infobox4_image)?base_url($infobox4_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Infobox5 Image" class="img2" />
                            	</div>
                            	<div class="form-group">
                            		<div class="input-group">
                            			<div class="input-group-addon">
                            				<i class="fa fa-file"></i>
                            			</div>
                            			<input name="infobox4_image" type="file" class="form-control pull-right" id="infobox4_image" onchange="checkPhoto(this,'blah5')">
                            		</div>
                            	</div>
                            </div>  
                            
                            <div class="col-md-12">
                            	<div class="form-group">
                            		<div>
                            			<h3>Infobox 5 Content</h3>
                            		</div>
                            		<hr>
                            	</div>
                            </div>
                            
                            <div class="col-md-12">
                            	<div class="form-group">
                            		<label>Infobox5 Heading</label>
                            		<input type="text" name="infobox5_heading" class="form-control" placeholder="Heading ..." value="<?php echo set_value('infobox5_heading', !empty($infobox5_heading)?$infobox5_heading:''); ?>">
                            	</div>
                            	<?php echo form_error('infobox5_heading'); ?>
                            </div>
                            
                            <div class="col-md-12">
                            	<div class="form-group">
                            		<label>Infobox5 Content</label>
                            		<textarea name="infobox5_content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('infobox5_content', !empty($infobox5_content)?$infobox5_content:''); ?></textarea>
                            	</div>
                            	<?php echo form_error('infobox5_content'); ?>
                            </div>
                            
                            <div class="col-md-12">
                            	<div class="form-group">
                            		<label>Infobox5 Image</label>
                            	</div>
                            	<div class="form-group" id="blah6_container">
                            		<img id="blah6" src="<?=!empty($infobox5_image)?base_url($infobox5_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Infobox5 Image" class="img2" />
                            	</div>
                            	<div class="form-group">
                            		<div class="input-group">
                            			<div class="input-group-addon">
                            				<i class="fa fa-file"></i>
                            			</div>
                            			<input name="infobox5_image" type="file" class="form-control pull-right" id="infobox5_image" onchange="checkPhoto(this,'blah6')">
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

        var add_keyfeature = $('#add_keyfeature'); //Add button selector
        var keyfeatures_wrapper = $('#keyfeatures_wrapper'); //Input field wrapper
        var base_url = $('body').attr('data-url');
        //Once add button is clicked
        $(add_keyfeature).click(function()
        {
            //Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah5a'+y;
                var fieldHTMLKeyFeatures = '<div class="row"> <div class="col-md-11"> <div class="row logosBox"> <div class="col-md-3"> <div id="'+blah+'_container"> <img class="img1" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"> <div class="row"> <div class="col-md-2"><label for="key_feature_icons">Icon:</label></div><div class="col-md-10"><input name="key_feature_icons[]" type="file" class="form-control pull-right" id="key_feature_icons" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"> <div class="col-md-2"><label for="key_feature_title">Title:</label></div><div class="col-md-10"><input type="text" name="key_feature_title[]" value="" id="key_feature_title" class="form-control input-md" placeholder="Title..."></div></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="remove_keyfeature" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(keyfeatures_wrapper).append(fieldHTMLKeyFeatures); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(keyfeatures_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });
        
        
        var add_highlights = $('#add_highlights'); //Add button selector
        var highlights_wrapper = $('#highlights_wrapper'); //Input field wrapper
        var base_url = $('body').attr('data-url');
        //Once add button is clicked
        $(add_highlights).click(function()
        {
            //Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah6a'+y;
                var fieldHTMLhighlights = '<div class="row"> <div class="col-md-11"> <div class="row logosBox"> <div class="col-md-3"> <div id="'+blah+'_container"> <img class="img1" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"> <div class="row"> <div class="col-md-2"><label for="highlights_icons">Icon:</label></div><div class="col-md-10"><input name="highlights_icons[]" type="file" class="form-control pull-right" id="highlights_icons" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"> <div class="col-md-2"><label for="highlights_title">Title:</label></div><div class="col-md-10"><input type="text" name="highlights_title[]" value="" id="highlights_title" class="form-control input-md" placeholder="Title..."></div></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="remove_highlights" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(highlights_wrapper).append(fieldHTMLhighlights); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(highlights_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });
        
        
        var add_steps = $('#add_steps'); //Add button selector
        var steps_wrapper = $('#steps_wrapper'); //Input field wrapper
        var base_url = $('body').attr('data-url');
        //Once add button is clicked
        $(add_steps).click(function()
        {
            //Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah6a'+y;
                var fieldHTMLsteps = '<div class="row"> <div class="col-md-11"> <div class="row logosBox"> <div class="col-md-3"> <div id="'+blah+'_container"> <img class="img1" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"> <div class="row"> <div class="col-md-2"><label for="steps_icons">Icon:</label></div><div class="col-md-10"><input name="steps_icons[]" type="file" class="form-control pull-right" id="steps_icons" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"> <div class="col-md-2"><label for="steps_title">Title:</label></div><div class="col-md-10"><input type="text" name="steps_title[]" value="" id="steps_title" class="form-control input-md" placeholder="Title..."></div></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="remove_highlights" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(steps_wrapper).append(fieldHTMLsteps); //Add field html
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