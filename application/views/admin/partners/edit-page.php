<?php
//pre($editdata);
if(!empty($editdata)) 
{  
    extract($editdata); 
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Partners Page <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Partners</a></li>
            <li><a href="#">Page Setting</a></li>
            <li class="active">Partners</li>
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
                            
                            <div class="col-md-12">
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
                            </div>
                            
                            <div id="introboxContainerStyle1" <?=($layout != 2)?'style="display:none;"':''; ?>>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div>
                                            <h3>Introduction Section</h3></div>
                                        <hr>
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
                                
    							<div class="col-md-12">
                                    <div class="form-group">
                                        <label>Intro Video Url</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <?php echo form_input(array('id' => 'intro_video_url', 'name' => 'intro_video_url','class'=>'form-control input-md','placeholder'=>'Video Url','value' => set_value('intro_video_url', !empty($intro_video_url)?$intro_video_url:''))); ?>
                                        </div>
                                        <?php echo form_error('intro_video_url'); ?>
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
                            </div>
                            
                            <div id="additionalContentContainer" <?=($layout != 2)?'style="display:none;"':''; ?>>
                            
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
                        
                            <div id="aboutboxContainerStyle1" <?=!empty($layout)?'style="display:none;"':''; ?>>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div>
                                            <h3>About Section</h3>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Logo: </label>
                                    </div>
    
                                    <div class="form-group" id="blah20_container">
                                        <img id="blah20" src="<?=!empty($about_logo_img)?base_url($about_logo_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Logo Image" class="img2" />
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <input name="about_logo_img" type="file" class="form-control pull-right" id="about_logo_img" onchange="checkPhoto(this,'blah20')">
                                        </div>
                                    </div>
                                </div>
                                
    							<div class="col-md-12">
                                    <div class="form-group">
                                        <label>Heading</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <?php echo form_input(array('id' => 'about_heading', 'name' => 'about_heading','class'=>'form-control input-md','placeholder'=>'Heading...','value' => set_value('about_heading', !empty($about_heading)?$about_heading:''))); ?>
                                        </div>
                                        <?php echo form_error('about_heading'); ?>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
    								<div class="form-group">
                                        <label>Intro Content</label>
                                    </div>
    								<div class="form-group">
    									<?php echo form_textarea(array('id' => 'about_content', 'name' => 'about_content','class'=>'form-control input-md ckeditor','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($about_content)?$about_content:''))); ?>
    								</div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Featured Image: </label>
                                    </div>
    
                                    <div class="form-group" id="blah21_container">
                                        <img id="blah21" src="<?=!empty($about_featured_img)?base_url($about_featured_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Featured Image" class="img2" />
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <input name="about_featured_img" type="file" class="form-control pull-right" id="about_featured_img" onchange="checkPhoto(this,'blah21')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="featuredsectionContainer" <?=($layout != 1)?'style="display:none;"':''; ?>>                        
                            	<div class="col-md-12">
                            		<div class="form-group">
                            			<div>
                            				<h3>Featured Section</h3></div>
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
                            				<?php echo form_input(array('id' => 'featured_section_heading', 'name' => 'featured_section_heading','class'=>'form-control input-md','placeholder'=>'Heading...','value' => set_value('featured_section_heading', !empty($featured_section_heading)?$featured_section_heading:''))); ?>
                            			</div>
                            			<?php echo form_error('featured_section_heading'); ?>
                            		</div>
                            	</div>
                            	
                            	<div class="col-md-12">
                            		<div class="field_wrapper" id="featureds_wrapper">
                            			<?php
                            			$featured_elements = !empty($featured_elements)?unserialize($featured_elements):array();
                            			if(!empty($featured_elements))
                            			{
                            				$k=1;
                            				foreach ($featured_elements as $rec)
                            				{
                            				   ?>
                            				   <div class="row">
                            						<div class="col-md-11">
                            							<div class="row stepsBox">
                            								<div class="col-md-12">
                            									<div class="row">
                            										<div class="col-md-2"><label for="featured_heading">Heading:</label></div>
                            										<div class="col-md-10"><input name="featured_heading[]" type="text" class="form-control pull-right" id="featured_heading" placeholder="Heading..." value="<?=!empty($rec['heading'])?$rec['heading']:''; ?>"></div>
                            									</div>
                            								</div>
                            							</div>
                            						</div>
                            						<div class="col-md-1">
                            							<?php
                            							if($k==1)
                            							{
                            								?>
                            								<a href="javascript:void(0);" id="add_featured" class="add_button" title="Add field">
                            									<img src="<?=base_url('assets/admin/images/add.png');?>"/>
                            								</a>
                            								<?php
                            							}
                            							else
                            							{
                            								?>
                            								<a href="javascript:void(0);" id="remove_featured" class="remove_button" title="Remove field">
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
                            									<div class="col-md-2"><label for="featured_heading">Heading:</label></div>
                            									<div class="col-md-10"><input name="featured_heading[]" type="text" class="form-control pull-right" id="featured_heading" placeholder="Heading..." value=""></div>
                            								</div>
                            							</div>
                            						</div>
                            					</div>
                            					<div class="col-md-1">
                            						<a href="javascript:void(0);" id="add_featured" class="add_button" title="Add field">
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
                            
                            <div id="endormentBoxSection" <?=($layout != 2)?'style="display:none;"':''; ?>>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div>
                                            <h3>Endorment Box Section</h3>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="field_wrapper" id="endorment_wrapper">
                                        <?php
                                        $endorment_elements = !empty($endorment_elements)?unserialize($endorment_elements):array();
                                        if(!empty($endorment_elements))
                                        {
                                            $k=1;
                                            foreach ($endorment_elements as $rec)
                                            {
                                               ?>
                                               <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row stepsBox">
                                                            <div class="col-md-3">
                                                                <div id="blah5<?=$k; ?>_container">
                                                                    <img class="img2" id="blah5<?=$k; ?>" src="<?=base_url(!empty($rec['logo'])?$rec['logo']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                    <input type="hidden" id="endorment_old_logo" name="endorment_old_logo[]" value="<?=!empty($rec['logo'])?$rec['logo']:'';?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div id="blah6<?=$k; ?>_container">
                                                                    <img class="img2" id="blah6<?=$k; ?>" src="<?=base_url(!empty($rec['image'])?$rec['image']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                    <input type="hidden" id="endorment_old_image" name="endorment_old_image[]" value="<?=!empty($rec['image'])?$rec['image']:'';?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="endorment_heading">Heading:</label></div>
                                                                    <div class="col-md-10"><input name="endorment_heading[]" type="text" class="form-control pull-right" id="endorment_heading" placeholder="Heading..." value="<?=!empty($rec['heading'])?$rec['heading']:''; ?>"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="endorment_logo">Logo:</label></div>
                                                                    <div class="col-md-10"><input name="endorment_logo[]" type="file" class="form-control pull-right" id="endorment_logo" onchange="checkPhoto(this,'blah5<?=$k; ?>')"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="endorment_image">Image:</label></div>
                                                                    <div class="col-md-10"><input name="endorment_image[]" type="file" class="form-control pull-right" id="endorment_image" onchange="checkPhoto(this,'blah6<?=$k; ?>')"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <?php
                                                        if($k==1)
                                                        {
                                                            ?>
                                                            <a href="javascript:void(0);" id="add_endormentbox" class="add_button" title="Add field">
                                                                <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                            </a>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <a href="javascript:void(0);" id="remove_endormentbox" class="remove_button" title="Remove field">
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
                                                                    <img class="img2" id="blah5" src="<?=base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div id="blah6_container">
                                                                    <img class="img2" id="blah6" src="<?=base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="endorment_image">Heading:</label></div>
                                                                    <div class="col-md-10"><input name="endorment_heading[]" type="text" class="form-control pull-right" id="endorment_heading" placeholder="Heading..." value=""></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="endorment_logo">Logo:</label></div>
                                                                    <div class="col-md-10"><input name="endorment_logo[]" type="file" class="form-control pull-right" id="endorment_logo" onchange="checkPhoto(this,'blah5')"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="endorment_image">Image:</label></div>
                                                                    <div class="col-md-10"><input name="endorment_image[]" type="file" class="form-control pull-right" id="endorment_image" onchange="checkPhoto(this,'blah6')"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="javascript:void(0);" id="add_endormentbox" class="add_button" title="Add field">
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
                            
                            <div id="offersectionContainer">
                        
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div>
                                            <h3>Offers Section</h3></div>
                                        <hr>
                                    </div>
                                </div>
                                    
    							<div class="col-md-12">
                                    <div class="form-group">
                                        <label>Offer Section Heading</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <?php echo form_input(array('id' => 'offer_section_heading', 'name' => 'offer_section_heading','class'=>'form-control input-md','placeholder'=>'Heading...','value' => set_value('offer_section_heading', !empty($offer_section_heading)?$offer_section_heading:''))); ?>
                                        </div>
                                        <?php echo form_error('offer_section_heading'); ?>
                                    </div>
                                </div>
    							
    							<div class="col-md-12">
                                    <div class="field_wrapper" id="offer_wrapper">
                                        <?php
                                        $offer_elements = !empty($offer_elements)?unserialize($offer_elements):array();
                                        if(!empty($offer_elements))
                                        {
                                            $k=1;
                                            foreach ($offer_elements as $rec)
                                            {
                                               ?>
                                               <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row stepsBox">
                                                            <div class="col-md-3">
                                                                <div id="blah6<?=$k; ?>_container">
                                                                    <img class="img2" id="blah6<?=$k; ?>" src="<?=base_url(!empty($rec['image'])?$rec['image']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                    <input type="hidden" id="offer_old_image" name="offer_old_image[]" value="<?=!empty($rec['image'])?$rec['image']:'';?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="offer_image">Image:</label></div>
                                                                    <div class="col-md-10"><input name="offer_image[]" type="file" class="form-control pull-right" id="offer_image" onchange="checkPhoto(this,'blah6<?=$k; ?>')"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="offer_image">Heading:</label></div>
                                                                    <div class="col-md-10"><input name="offer_heading[]" type="text" class="form-control pull-right" id="offer_heading" placeholder="Heading..." value="<?=!empty($rec['heading'])?$rec['heading']:''; ?>"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="offer_content">Content:</label></div>
                                                                    <div class="col-md-10"><?php echo form_textarea(array('id' => 'offer_content', 'name' => 'offer_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($rec['content'])?$rec['content']:''))); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <?php
                                                        if($k==1)
                                                        {
                                                            ?>
                                                            <a href="javascript:void(0);" id="add_offerbox" class="add_button" title="Add field">
                                                                <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                            </a>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <a href="javascript:void(0);" id="remove_offerbox" class="remove_button" title="Remove field">
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
                                                                    <img class="img2" id="blah6" src="<?=base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="offer_image">Image:</label></div>
                                                                    <div class="col-md-10"><input name="offer_image[]" type="file" class="form-control pull-right" id="offer_image" onchange="checkPhoto(this,'blah6')"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="offer_image">Heading:</label></div>
                                                                    <div class="col-md-10"><input name="offer_heading[]" type="text" class="form-control pull-right" id="offer_heading" placeholder="Heading..." value=""></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="offer_content">Content:</label></div>
                                                                    <div class="col-md-10"><?php echo form_textarea(array('id' => 'offer_content', 'name' => 'offer_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3)); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="javascript:void(0);" id="add_offerbox" class="add_button" title="Add field">
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
							
							<div id="partnersectionContainer" <?=($layout != 2)?'style="display:none;"':''; ?>>
							    
    							<div class="col-md-12">
                                    <div class="form-group">
                                        <div>
                                            <h3>Partner Infoboxes</h3></div>
                                        <hr>
                                    </div>
                                </div>
                                    
    							<div class="col-md-12">
                                    <div class="form-group">
                                        <label>Infobox Heading</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <?php echo form_input(array('id' => 'infobox_section_heading', 'name' => 'infobox_section_heading','class'=>'form-control input-md','placeholder'=>'Heading...','value' => set_value('infobox_section_heading', !empty($infobox_section_heading)?$infobox_section_heading:''))); ?>
                                        </div>
                                        <?php echo form_error('infobox_section_heading'); ?>
                                    </div>
                                </div>
                                
    							<div class="col-md-12">
                                    <div class="field_wrapper" id="infoboxes_wrapper">
                                        <?php
                                        $infobox_elements = !empty($infobox_elements)?unserialize($infobox_elements):array();
                                        if(!empty($infobox_elements))
                                        {
                                            $k=1;
                                            foreach ($infobox_elements as $rec)
                                            {
                                               ?>
                                               <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row stepsBox">
                                                            <div class="col-md-3">
                                                                <div id="blah7<?=$k; ?>_container">
                                                                    <img class="img2" id="blah7<?=$k; ?>" src="<?=base_url(!empty($rec['image'])?$rec['image']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                    <input type="hidden" id="infobox_old_image" name="infobox_old_image[]" value="<?=!empty($rec['image'])?$rec['image']:'';?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="infobox_image">Image:</label></div>
                                                                    <div class="col-md-10"><input name="infobox_image[]" type="file" class="form-control pull-right" id="infobox_image" onchange="checkPhoto(this,'blah7<?=$k; ?>')"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="infobox_image">Heading:</label></div>
                                                                    <div class="col-md-10"><input name="infobox_heading[]" type="text" class="form-control pull-right" id="infobox_heading" placeholder="Heading..." value="<?=!empty($rec['heading'])?$rec['heading']:''; ?>"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="infobox_content">Content:</label></div>
                                                                    <div class="col-md-10"><?php echo form_textarea(array('id' => 'infobox_content', 'name' => 'infobox_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($rec['content'])?$rec['content']:''))); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <?php
                                                        if($k==1)
                                                        {
                                                            ?>
                                                            <a href="javascript:void(0);" id="add_infoBox" class="add_button" title="Add field">
                                                                <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                            </a>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <a href="javascript:void(0);" id="remove_infoBox" class="remove_button" title="Remove field">
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
                                                                    <img class="img2" id="blah7" src="<?=base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="infobox_image">Image:</label></div>
                                                                    <div class="col-md-10"><input name="infobox_image[]" type="file" class="form-control pull-right" id="infobox_image" onchange="checkPhoto(this,'blah7')"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="infobox_image">Heading:</label></div>
                                                                    <div class="col-md-10"><input name="infobox_heading[]" type="text" class="form-control pull-right" id="infobox_heading" placeholder="Heading..." value="<?=!empty($rec['heading'])?$rec['heading']:''; ?>"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="infobox_content">Content:</label></div>
                                                                    <div class="col-md-10"><?php echo form_textarea(array('id' => 'infobox_content', 'name' => 'infobox_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3)); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="javascript:void(0);" id="add_infoBox" class="add_button" title="Add field">
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
							
							<div id="keyelementssectionContainer" <?=(!empty($layout) && $layout != 1)?'style="display:none;"':''; ?>>
                        
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div>
                                            <h3>Key Elements Section</h3></div>
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
                                            <input type="text" name="keyelement_section_heading" value="<?=set_value('keyelement_section_heading', !empty($keyelement_section_heading)?$keyelement_section_heading:''); ?>" id="keyelement_section_heading" class="form-control input-md" placeholder="Heading...">
                                        </div>
                                        <?php echo form_error('keyelement_section_heading'); ?>
                                    </div>
                                </div>
    							
    							<div class="col-md-12">
                                    <div class="field_wrapper" id="keyelements_wrapper">
                                        <?php
                                        $key_elements = !empty($key_elements)?unserialize($key_elements):array();
                                        if(!empty($key_elements))
                                        {
                                            $k=1;
                                            foreach ($key_elements as $rec)
                                            {
                                               ?>
                                               <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row stepsBox">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="keyelement_heading">Heading:</label></div>
                                                                    <div class="col-md-10"><input name="keyelement_heading[]" type="text" class="form-control pull-right" id="keyelement_heading" placeholder="Heading..." value="<?=!empty($rec['heading'])?$rec['heading']:''; ?>"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="keyelement_content">Content:</label></div>
                                                                    <div class="col-md-10"><?php echo form_textarea(array('id' => 'keyelement_content', 'name' => 'keyelement_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($rec['content'])?$rec['content']:''))); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <?php
                                                        if($k==1)
                                                        {
                                                            ?>
                                                            <a href="javascript:void(0);" id="add_keyelement" class="add_button" title="Add field">
                                                                <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                            </a>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <a href="javascript:void(0);" id="remove_keyelement" class="remove_button" title="Remove field">
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
                                                                <div class="col-md-2"><label for="keyelement_heading">Heading:</label></div>
                                                                <div class="col-md-10"><input name="keyelement_heading[]" type="text" class="form-control pull-right" id="keyelement_heading" placeholder="Heading..." value=""></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="keyelement_content">Content:</label></div>
                                                                <div class="col-md-10"><?php echo form_textarea(array('id' => 'keyelement_content', 'name' => 'keyelement_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3)); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:void(0);" id="add_keyelement" class="add_button" title="Add field">
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
							
							<div id="highlightssectionContainer" <?=(!empty($layout) && $layout != 1)?'style="display:none;"':''; ?>>                        
                            	<div class="col-md-12">
                            		<div class="form-group">
                            			<div>
                            				<h3>Highlights Section</h3></div>
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
                            				<?php echo form_input(array('id' => 'highlight_section_heading', 'name' => 'highlight_section_heading','class'=>'form-control input-md','placeholder'=>'Heading...','value' => set_value('highlight_section_heading', !empty($highlight_section_heading)?$highlight_section_heading:''))); ?>
                            			</div>
                            			<?php echo form_error('highlight_section_heading'); ?>
                            		</div>
                            	</div>
                            	
                            	<div class="col-md-12">
                            		<div class="field_wrapper" id="highlights_wrapper">
                            			<?php
                            			$highlight_elements = !empty($highlight_elements)?unserialize($highlight_elements):array();
                            			if(!empty($highlight_elements))
                            			{
                            				$k=1;
                            				foreach ($highlight_elements as $rec)
                            				{
                            				   ?>
                            				   <div class="row">
                            						<div class="col-md-11">
                            							<div class="row stepsBox">
                            								<div class="col-md-12">
                            									<div class="row">
                            										<div class="col-md-2"><label for="highlight_heading">Heading:</label></div>
                            										<div class="col-md-10"><input name="highlight_heading[]" type="text" class="form-control pull-right" id="highlight_heading" placeholder="Heading..." value="<?=!empty($rec['heading'])?$rec['heading']:''; ?>"></div>
                            									</div>
                            									<div class="row">
                            										<div class="col-md-2"><label for="highlight_content">Content:</label></div>
                            										<div class="col-md-10"><?php echo form_textarea(array('id' => 'highlight_content', 'name' => 'highlight_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($rec['content'])?$rec['content']:''))); ?></div>
                            									</div>
                            								</div>
                            							</div>
                            						</div>
                            						<div class="col-md-1">
                            							<?php
                            							if($k==1)
                            							{
                            								?>
                            								<a href="javascript:void(0);" id="add_highlight" class="add_button" title="Add field">
                            									<img src="<?=base_url('assets/admin/images/add.png');?>"/>
                            								</a>
                            								<?php
                            							}
                            							else
                            							{
                            								?>
                            								<a href="javascript:void(0);" id="remove_highlight" class="remove_button" title="Remove field">
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
                            									<div class="col-md-2"><label for="highlight_heading">Heading:</label></div>
                            									<div class="col-md-10"><input name="highlight_heading[]" type="text" class="form-control pull-right" id="highlight_heading" placeholder="Heading..." value=""></div>
                            								</div>
                            								<div class="row">
                            									<div class="col-md-2"><label for="highlight_content">Content:</label></div>
                            									<div class="col-md-10"><?php echo form_textarea(array('id' => 'highlight_content', 'name' => 'highlight_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3)); ?></div>
                            								</div>
                            							</div>
                            						</div>
                            					</div>
                            					<div class="col-md-1">
                            						<a href="javascript:void(0);" id="add_highlight" class="add_button" title="Add field">
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
                            
                            <div id="endormentscarousalsectionContainer" <?=($layout != 1)?'style="display:none;"':''; ?>>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div>
                                            <h3>Endorsements Carousal Section</h3></div>
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
                                            <?php echo form_input(array('id' => 'endorsements_carousal_heading', 'name' => 'endorsements_carousal_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('endorment_carousal_heading', !empty($endorsements_carousal_heading)?$endorsements_carousal_heading:''))); ?>
                                        </div>
                                        <?php echo form_error('endorsements_carousal_heading'); ?>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Content</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <?php echo form_textarea(array('id' => 'endorsements_carousal_content', 'name' => 'endorsements_carousal_content','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($endorsements_carousal_content)?$endorsements_carousal_content:''))); ?>
                                        </div>
                                        <?php echo form_error('endorsements_carousal_content'); ?>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="field_wrapper" id="endorsements_wrapper">
                                        <?php
                                        $endorsements_elements = !empty($endorsements_elements)?unserialize($endorsements_elements):array();
                                        if(!empty($endorsements_elements))
                                        {
                                            $k=1;
                                            foreach ($endorsements_elements as $rec)
                                            {
                                               ?>
                                               <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="row stepsBox">
                                                            <div class="col-md-3">
                                                                <div id="blah16<?=$k; ?>_container">
                                                                    <img class="img2" id="blah16<?=$k; ?>" src="<?=base_url(!empty($rec['image'])?$rec['image']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                    <input type="hidden" id="endorsements_old_image" name="endorsements_old_image[]" value="<?=!empty($rec['image'])?$rec['image']:'';?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="endorsements_image">Image:</label></div>
                                                                    <div class="col-md-10"><input name="endorsements_image[]" type="file" class="form-control pull-right" id="endorsements_image" onchange="checkPhoto(this,'blah16<?=$k; ?>')"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="endorsements_heading">Heading:</label></div>
                                                                    <div class="col-md-10"><input name="endorsements_heading[]" type="text" class="form-control pull-right" id="endorsements_heading" placeholder="Heading..." value="<?=!empty($rec['heading'])?$rec['heading']:''; ?>"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <?php
                                                        if($k==1)
                                                        {
                                                            ?>
                                                            <a href="javascript:void(0);" id="add_endorsements" class="add_button" title="Add field">
                                                                <img src="<?=base_url('assets/admin/images/add.png');?>"/>
                                                            </a>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <a href="javascript:void(0);" id="remove_endorsements" class="remove_button" title="Remove field">
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
                                                                <div id="blah16_container">
                                                                    <img class="img2" id="blah16" src="<?=base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="endorsements_image">Image:</label></div>
                                                                    <div class="col-md-10"><input name="endorsements_image[]" type="file" class="form-control pull-right" id="endorsements_image" onchange="checkPhoto(this,'blah16')"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"><label for="endorsements_heading">Heading:</label></div>
                                                                    <div class="col-md-10"><input name="endorsements_heading[]" type="text" class="form-control pull-right" id="endorsements_heading" placeholder="Heading..." value=""></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="javascript:void(0);" id="add_endorsements" class="add_button" title="Add field">
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
                            
                            <div id="logocarousalsectionContainer" <?=($layout != 1 && $layout != 2)?'style="display:none;"':''; ?>>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div>
                                            <h3>Partner Carousal Section</h3></div>
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
                            </div>
                            
                            <div id="stripesectionContainer" <?=($layout != 2)?'style="display:none;"':''; ?>>
                            
                                <div id="stripeContent">
                                
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div>
                                                <h3>Stripe Section</h3></div>
                                            <hr>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Background Image: </label>
                                        </div>
        
                                        <div class="form-group" id="blah4_container">
                                            <img id="blah4" src="<?=!empty($stripe_bg_img)?base_url($stripe_bg_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="BG Image" class="img2" />
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-file"></i>
                                                </div>
                                                <input name="stripe_bg_img" type="file" class="form-control pull-right" id="stripe_bg_img" onchange="checkPhoto(this,'blah4')">
                                            </div>
                                        </div>
                                    </div>
                                    
        							<div class="col-md-12">
                                        <div class="form-group">
                                            <label>Stripe Heading</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <textarea name="stripe_heading" class="form-control input-md" id="stripe_heading" placeholder="Heading..."><?=!empty($stripe_heading)?$stripe_heading:''; ?></textarea>
                                            </div>
                                            <?php echo form_error('stripe_heading'); ?>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            
                            <div id="enquierysectionContainer">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div>
                                            <h3>Enquiry Section</h3></div>
                                        <hr>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Enquiry Section Image</label>
                                    </div>
                                    <div class="form-group" id="blah8_container">
                                        <img id="blah8" src="<?=!empty($enquiry_image)?base_url($enquiry_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img2" />
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <input name="enquiry_image" type="file" class="form-control pull-right" id="enquiry_image" onchange="checkPhoto(this,'blah8')">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Background Color:</label>
                                      <div class="input-group">
                                          <div class="input-group-addon">
                                              <i class="fa fa-file-text-o"></i>
                                          </div>
                                          <?php echo form_dropdown('enquirybg', array('Dark','Light'),set_value('enquirybg',isset($enquirybg)?$enquirybg:""),'id="enquirybg" class="form-control input-md select2"'); ?>
                                      </div>
                                      <?php echo form_error('enquirybg'); ?>
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
            $('#aboutboxContainerStyle1').hide();
            $('#featuredsectionContainer').hide();
            $('#endormentBoxSection').show();
            $('#endormentscarousalsectionContainer').hide();
            $('#logocarousalsectionContainer').show();
            
            $('#keyelementssectionContainer').hide();
            $('#highlightssectionContainer').hide();
            
            $('#introboxContainerStyle1').show();
            $('#additionalContentContainer').show();
            
            $('#partnersectionContainer').show();
            $('#stripesectionContainer').show();
            
        }
        else if(layout == 1)
        {
            $('#aboutboxContainerStyle1').hide();
            $('#featuredsectionContainer').show();
            $('#endormentBoxSection').hide();
            $('#endormentscarousalsectionContainer').show();
            $('#logocarousalsectionContainer').show();
            
            $('#keyelementssectionContainer').show();
            $('#highlightssectionContainer').show();
            
            $('#introboxContainerStyle1').hide();
            $('#additionalContentContainer').hide();
            
            $('#partnersectionContainer').hide();
            $('#stripesectionContainer').hide();
        }
        else
        {
            $('#aboutboxContainerStyle1').show();
            $('#featuredsectionContainer').hide();
            $('#endormentBoxSection').hide();
            $('#endormentscarousalsectionContainer').hide();
            $('#logocarousalsectionContainer').hide();
            
            $('#keyelementssectionContainer').show();
            $('#highlightssectionContainer').show();
            
            $('#introboxContainerStyle1').hide();
            $('#additionalContentContainer').hide();
            
            $('#partnersectionContainer').hide();
            $('#stripesectionContainer').hide();
        }
   });
   $(document).on('change','#additional_content',function(){
        if($(this).is(":checked"))
        {
            $('#additionalContentContainer').show();
        }
        else
        {
            $('#additionalContentContainer').hide();
        }
   });

   $(document).ready(function() {
        var maxField = 30; //Input fields increment limitation

        var x = 1; //Initial field counter is 1
        var y = 1; //Initial field counter is 1
        var a = 1; //Initial field counter is 1
        var b = 1; //Initial field counter is 1
        
        var base_url = $('body').attr('data-url');

        var add_infoBox = $('#add_infoBox'); //Add button selector
        var infoboxes_wrapper = $('#infoboxes_wrapper'); //Input field wrapper
        
        //Once add button is clicked
        $(add_infoBox).click(function()
        {
			//Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah7a'+y;
                var fieldHTMLinfobox = '<div class="row"><div class="col-md-11"><div class="row stepsBox"><div class="col-md-3"><div id="'+blah+'_container"><img class="img2" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"><div class="row"><div class="col-md-2"><label for="infobox_image">Image:</label></div><div class="col-md-10"><input name="infobox_image[]" type="file" class="form-control pull-right" id="infobox_image" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"><div class="col-md-2"><label for="infobox_content">Content:</label></div><div class="col-md-10"><textarea rows="3" name="infobox_content[]" value="" id="infobox_content" class="form-control input-md" placeholder="Content..."></textarea></div></div></div></div></div><div class="col-md-1"><a href="javascript:void(0);" id="remove_offerbox" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(infoboxes_wrapper).append(fieldHTMLinfobox); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });

        //Once remove button is clicked
        $(infoboxes_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });
		
		
		
		var add_offerbox = $('#add_offerbox'); //Add button selector
        var offer_wrapper = $('#offer_wrapper'); //Input field wrapper
        
        //Once add button is clicked
        $(add_offerbox).click(function()
        {
           // alert('aaaaa2');
			//Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah6a'+y;
                var fieldHTMLoffer = '<div class="row"><div class="col-md-11"><div class="row stepsBox"><div class="col-md-3"><div id="'+blah+'_container"><img class="img2" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"><div class="row"><div class="col-md-2"><label for="offer_image">Image:</label></div><div class="col-md-10"><input name="offer_image[]" type="file" class="form-control pull-right" id="offer_image" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"><div class="col-md-2"><label for="offer_image">Heading:</label></div><div class="col-md-10"><input name="offer_heading[]" type="text" class="form-control pull-right" id="offer_heading" placeholder="Heading..." value=""></div></div><div class="row"><div class="col-md-2"><label for="offer_content">Content:</label></div><div class="col-md-10"><textarea rows="3" name="offer_content[]" value="" id="offer_content" class="form-control input-md" placeholder="Content..."></textarea></div></div></div></div></div><div class="col-md-1"><a href="javascript:void(0);" id="remove_offerbox" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(offer_wrapper).append(fieldHTMLoffer); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });
		
		//Once remove button is clicked
        $(offer_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });
        
        
        var add_endorsements = $('#add_endorsements'); //Add button selector
        var endorsements_wrapper = $('#endorsements_wrapper'); //Input field wrapper
        
        //Once add button is clicked
        $(add_endorsements).click(function()
        {
           // alert('aaaaa2');
			//Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah16a'+y;
                var fieldHTMLEndorsements = '<div class="row"><div class="col-md-11"><div class="row stepsBox"><div class="col-md-3"><div id="'+blah+'_container"><img class="img2" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"><div class="row"><div class="col-md-2"><label for="endorsements_image">Image:</label></div><div class="col-md-10"><input name="endorsements_image[]" type="file" class="form-control pull-right" id="endorsements_image" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"><div class="col-md-2"><label for="endorsements_heading">Heading:</label></div><div class="col-md-10"><input name="endorsements_heading[]" type="text" class="form-control pull-right" id="endorsements_heading" placeholder="Heading..." value=""></div></div></div></div></div><div class="col-md-1"><a href="javascript:void(0);" id="remove_offerbox" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(endorsements_wrapper).append(fieldHTMLEndorsements); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });
        
        //Once remove button is clicked
        $(endorsements_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });
        
        var add_keyelement = $('#add_keyelement'); //Add button selector
        var keyelements_wrapper = $('#keyelements_wrapper'); //Input field wrapper
        
        //Once add button is clicked
        $(add_keyelement).click(function()
        {
        	//Check maximum number of input fields
        	if (a < maxField)
        	{
        		var fieldHTMLkeyelement = '<div class="row"><div class="col-md-11"><div class="row stepsBox"><div class="col-md-12"><div class="row"><div class="col-md-2"><label for="keyelement_heading">Heading:</label></div><div class="col-md-10"><input name="keyelement_heading[]" type="text" class="form-control pull-right" id="keyelement_heading" placeholder="Heading..." value=""></div></div><div class="row"><div class="col-md-2"><label for="keyelement_content">Content:</label></div><div class="col-md-10"><textarea rows="3" name="keyelement_content[]" id="keyelement_content" class="form-control input-md" placeholder="Content..."></textarea></div></div></div></div></div><div class="col-md-1"><a href="javascript:void(0);" id="remove_offerbox" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a></div></div>'; //New input field html 
        
        		a++; //Increment field counter
        		$(keyelements_wrapper).append(fieldHTMLkeyelement); //Add field html
        	}
        	else
        	{
        		alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
        	}
        });
        
        //Once remove button is clicked
        $(keyelements_wrapper).on('click', '.remove_button', function(e) {
        	e.preventDefault();
        	//alert( $(this).closest(".col-md-12").html());
        	$(this).closest(".row").remove(); //Remove field html
        	a--; //Decrement field counter
        });
        
        
        
        var add_endormentbox = $('#add_endormentbox'); //Add button selector
        var endorment_wrapper = $('#endorment_wrapper'); //Input field wrapper
        
        //Once add button is clicked
        $(add_endormentbox).click(function()
        {
           // alert('aaaaa2');
			//Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah5a'+y;
                var blah6 = 'blah6a'+y;
                var fieldHTMLendorment = '<div class="row"><div class="col-md-11"><div class="row stepsBox"><div class="col-md-3"><div id="'+blah+'_container"><img class="img2" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-3"><div id="'+blah6+'_container"><img class="img2" id="'+blah6+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-6"><div class="row"><div class="col-md-2"><label for="offer_image">Heading:</label></div><div class="col-md-10"><input name="endorment_heading[]" type="text" class="form-control pull-right" id="endorment_heading" placeholder="Heading..." value=""></div></div><div class="row"><div class="col-md-2"><label for="endorment_logo">Logo:</label></div><div class="col-md-10"><input name="endorment_logo[]" type="file" class="form-control pull-right" id="endorment_logo" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"><div class="col-md-2"><label for="endorment_image">Image:</label></div><div class="col-md-10"><input name="endorment_image[]" type="file" class="form-control pull-right" id="endorment_image" onchange="checkPhoto(this,\''+blah6+'\')"></div></div></div></div></div><div class="col-md-1"><a href="javascript:void(0);" id="remove_endormentbox" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a> </div></div>'; //New input field html 

                y++; //Increment field counter
                $(endorment_wrapper).append(fieldHTMLendorment); //Add field html
            }
            else
            {
                alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
            }
        });
		
		//Once remove button is clicked
        $(endorment_wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            //alert( $(this).closest(".col-md-12").html());
            $(this).closest(".row").remove(); //Remove field html
            y--; //Decrement field counter
        });
        
        var add_highlight = $('#add_highlight'); //Add button selector
        var highlights_wrapper = $('#highlights_wrapper'); //Input field wrapper
        
        //Once add button is clicked
        $(add_highlight).click(function()
        {
        	//Check maximum number of input fields
        	if (b < maxField)
        	{
        		var fieldHTMLhighlight = '<div class="row"><div class="col-md-11"><div class="row stepsBox"><div class="col-md-12"><div class="row"><div class="col-md-2"><label for="highlight_heading">Heading:</label></div><div class="col-md-10"><input name="highlight_heading[]" type="text" class="form-control pull-right" id="highlight_heading" placeholder="Heading..." value=""></div></div><div class="row"><div class="col-md-2"><label for="highlight_content">Content:</label></div><div class="col-md-10"><textarea rows="3" name="highlight_content[]" id="highlight_content" class="form-control input-md" placeholder="Content..."></textarea></div></div></div></div></div><div class="col-md-1"><a href="javascript:void(0);" id="remove_offerbox" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a></div></div>'; //New input field html 
        
        		b++; //Increment field counter
        		$(highlights_wrapper).append(fieldHTMLhighlight); //Add field html
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
        	b--; //Decrement field counter
        });
        
        var add_featured = $('#add_featured'); //Add button selector
        var featureds_wrapper = $('#featureds_wrapper'); //Input field wrapper
        
        //Once add button is clicked
        $(add_featured).click(function()
        {
        	//Check maximum number of input fields
        	if (b < maxField)
        	{
        		var fieldHTMLfeatured = '<div class="row"><div class="col-md-11"><div class="row stepsBox"><div class="col-md-12"><div class="row"><div class="col-md-2"><label for="featured_heading">Heading:</label></div><div class="col-md-10"><input name="featured_heading[]" type="text" class="form-control pull-right" id="featured_heading" placeholder="Heading..." value=""></div></div></div></div></div><div class="col-md-1"><a href="javascript:void(0);" id="remove_offerbox" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"> </a></div></div>'; //New input field html 
        
        		b++; //Increment field counter
        		$(featureds_wrapper).append(fieldHTMLfeatured); //Add field html
        	}
        	else
        	{
        		alert('Exceed maximum limit of records, Only '+maxField+' records are allowed');
        	}
        });
        
        //Once remove button is clicked
        $(featureds_wrapper).on('click', '.remove_button', function(e) {
        	e.preventDefault();
        	//alert( $(this).closest(".col-md-12").html());
        	$(this).closest(".row").remove(); //Remove field html
        	b--; //Decrement field counter
        });

    });
</script>