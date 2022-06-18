<div class="content-wrapper">
    <section class="content-header">
        <h1>Benefit Partners Settings <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Partners</a></li>
            <li><a href="#">Benefit Setting</a></li>
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
                    extract($array);
                    endif;
                    ?>
                    <div class="box-body pad">
                        <form method="post" enctype="multipart/form-data">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Top Banner Section</h3></div>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Top Banner Elements</label>
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
                                                                <input type="hidden" id="top_banner_image" name="top_banner_image[]" value="<?=!empty($rec['icon'])?$rec['icon']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_icons">Banner:</label></div>
                                                                <div class="col-md-10"><input name="top_banner_icons[]" type="file" class="form-control pull-right" id="top_banner_icons" onchange="checkPhoto(this,'blah5<?=$k; ?>')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_title">Heading:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'top_banner_title', 'name' => 'top_banner_title[]','class'=>'form-control input-md','placeholder'=>'Title...','value'=>(!empty($rec['title'])?$rec['title']:''))); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="key_elements_title">Url:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'top_banner_title', 'name' => 'top_banner_url[]','class'=>'form-control input-md','placeholder'=>'Url...','value'=>(!empty($rec['url'])?$rec['url']:''))); ?></div>
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
                                                                <input type="hidden" id="top_banner_image" name="top_banner_image[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="top_banner_icons">Banner:</label></div>
                                                                <div class="col-md-10"><input name="top_banner_icons[]" type="file" class="form-control pull-right" id="top_banner_icons" onchange="checkPhoto(this,'blah5')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="top_banner_title">Heading:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'top_banner_title', 'name' => 'top_banner_title[]','class'=>'form-control input-md','placeholder'=>'Title...')); ?></div>
                                                            </div>
                                                          
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="top_banner_title">Url:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'top_banner_title', 'name' => 'top_banner_url[]','class'=>'form-control input-md','placeholder'=>'Url...','value'=>(!empty($rec['url'])?$rec['url']:''))); ?></div>
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
                                        <h3>Video Summary Section</h3></div>
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
                                        <?php echo form_input(array('id' => 'video_section_heading', 'name' => 'video_section_heading','class'=>'form-control input-md','placeholder'=>'Heading','value' => set_value('video_section_heading', !empty($section_heading)?$section_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('video_section_heading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Video Upload</label>
                                </div>
                                <div class="form-group" id="blah_container">
                                    <img id="blah" src="<?=!empty($section_image)?base_url($section_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="video_upload" type="file" class="form-control pull-right" id="video_upload" onchange="checkPhoto(this)">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label>Content</label>
                                </div>
								<div class="form-group">
									
									<div class="col-md-10"><?php echo form_textarea(array('id' => 'video_content', 'name' => 'video_content','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($rec['content'])?$rec['content']:''))); ?></div>
								</div>
                            </div>
							
							<div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Summary Section</h3></div>
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
                                        <?php echo form_input(array('id' => 'summary_section_heading', 'name' => 'summary_section_heading','class'=>'form-control input-md','placeholder'=>'Heading','value' => set_value('summary_section_heading', !empty($section_heading)?$section_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('summary_section_heading'); ?>
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
                                    <label>Content</label>
                                </div>
								<div class="form-group">
									
									<div class="col-md-10"><?php echo form_textarea(array('id' => 'video_content', 'name' => 'video_content','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($rec['content'])?$rec['content']:''))); ?></div>
								</div>
							</div>
							
							
							<div class="col-md-12">
                                <div class="form-group">
                                    <h3>ISIC Offering to Partner</h3>
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
                                                                <img class="img2" id="blah6<?=$k; ?>" src="<?=base_url(!empty($rec['icon'])?$rec['offering_image']:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="offering_image" name="offering_image[]" value="<?=!empty($rec['offering_image'])?$rec['offering_image']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_icons">Slider Image:</label></div>
                                                                <div class="col-md-10"><input name="slider_icons[]" type="file" class="form-control pull-right" id="slider_icons" onchange="checkPhoto(this,'blah6<?=$k; ?>')"></div>
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
                                                                <input type="hidden" id="offering_image" name="offering_image[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_icons">Slider Image:</label></div>
                                                                <div class="col-md-10"><input name="slider_icons[]" type="file" class="form-control pull-right" id="slider_icons" onchange="checkPhoto(this,'blah6')"></div>
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
                                    <h3>Below ISIC Offering to Partner Image</h3>
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
                                                        <div class="row stepsBox">
                                                        <div class="col-md-3">
                                                            <div id="blah6_container">
                                                                <img class="img2" id="blah6" src="<?=base_url(!empty($fTabs_icons)?$fTabs_icons:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="fTabs_image" name="fTabs_image[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_icons">Left Image:</label></div>
                                                                <div class="col-md-10"><input name="fTabs_icons[]" type="file" class="form-control pull-right" id="fTabs_icons" onchange="checkPhoto(this,'blah6')"></div>
                                                            </div>
														</div>
                                                    </div>
													
													<div class="row stepsBox">
                                                        <div class="col-md-3">
                                                            <div id="blah6_container">
                                                                <img class="img2" id="blah6" src="<?=base_url(!empty($fTabs_icons)?$fTabs_icons:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="fTabs_image" name="fTabs_image[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_icons">Right Image:</label></div>
                                                                <div class="col-md-10"><input name="fTabs_icons[]" type="file" class="form-control pull-right" id="fTabs_icons" onchange="checkPhoto(this,'blah6')"></div>
                                                            </div>
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
                                                                <div class="col-md-2"><label for="fTabs_icons">Left Image:</label></div>
                                                                <div class="col-md-10"><input name="fTabs_icons[]" type="file" class="form-control pull-right" id="fTabs_icons" onchange="checkPhoto(this,'blah6')"></div>
                                                            </div>
														</div>
                                                    </div>
													
													<div class="row stepsBox">
                                                        <div class="col-md-3">
                                                            <div id="blah6_container">
                                                                <img class="img2" id="blah6" src="<?=base_url(!empty($fTabs_icons)?$fTabs_icons:'assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                                                <input type="hidden" id="fTabs_image" name="fTabs_image[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_icons">Right Image:</label></div>
                                                                <div class="col-md-10"><input name="fTabs_icons[]" type="file" class="form-control pull-right" id="fTabs_icons" onchange="checkPhoto(this,'blah6')"></div>
                                                            </div>
														</div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
							
							
							<div class="col-md-12">
                                <div class="form-group">
                                    <h3>What will partners get</h3>
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
                                                                <input type="hidden" id="pget_image" name="pget_image[]" value="<?=!empty($rec['icon'])?$rec['icon']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_icons">Image:</label></div>
                                                                <div class="col-md-10"><input name="pget_icons[]" type="file" class="form-control pull-right" id="pget_icons" onchange="checkPhoto(this,'blah6<?=$k; ?>')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'pget_title', 'name' => 'pget_title[]','class'=>'form-control input-md','placeholder'=>'Title...','value'=>(!empty($rec['title'])?$rec['title']:''))); ?></div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_content">Content:</label></div>
                                                                <div class="col-md-10"><?php echo form_textarea(array('id' => 'pget_content', 'name' => 'pget_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($rec['content'])?$rec['content']:''))); ?></div>
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
                                                                <input type="hidden" id="pget_image" name="pget_image[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_icons">Image:</label></div>
                                                                <div class="col-md-10"><input name="pget_icons[]" type="file" class="form-control pull-right" id="pget_icons" onchange="checkPhoto(this,'blah6')"></div>
                                                            </div>
                                                           <div class="row">
                                                                <div class="col-md-2"><label for="pget_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'pget_title', 'name' => 'pget_title[]','class'=>'form-control input-md','placeholder'=>'Title...')); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_content">Content:</label></div>
                                                                <div class="col-md-10"><?php echo form_textarea(array('id' => 'pget_content', 'name' => 'pget_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3)); ?></div>
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
                                    <h3>Why to Partner</h3>
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
                                                                <input type="hidden" id="why_image" name="why_image[]" value="<?=!empty($rec['icon'])?$rec['icon']:'';?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="why_icons">Image:</label></div>
                                                                <div class="col-md-10"><input name="why_icons[]" type="file" class="form-control pull-right" id="why_icons" onchange="checkPhoto(this,'blah6<?=$k; ?>')"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="why_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'why_title', 'name' => 'why_title[]','class'=>'form-control input-md','placeholder'=>'Title...','value'=>(!empty($rec['title'])?$rec['title']:''))); ?></div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="fTabs_content">Content:</label></div>
                                                                <div class="col-md-10"><?php echo form_textarea(array('id' => 'why_content', 'name' => 'why_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3,'value'=>(!empty($rec['content'])?$rec['content']:''))); ?></div>
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
                                                                <input type="hidden" id="why_image" name="why_image[]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="why_icons">Image:</label></div>
                                                                <div class="col-md-10"><input name="why_icons[]" type="file" class="form-control pull-right" id="why_icons" onchange="checkPhoto(this,'blah6')"></div>
                                                            </div>
                                                           <div class="row">
                                                                <div class="col-md-2"><label for="why_title">Title:</label></div>
                                                                <div class="col-md-10"><?php echo form_input(array('id' => 'why_title', 'name' => 'why_title[]','class'=>'form-control input-md','placeholder'=>'Title...')); ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2"><label for="why_content">Content:</label></div>
                                                                <div class="col-md-10"><?php echo form_textarea(array('id' => 'why_content', 'name' => 'why_content[]','class'=>'form-control input-md','placeholder'=>'Content...','rows'=>3)); ?></div>
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
                                        <h3>GET ATTENTION TO YOUR BRAND</h3></div>
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
                                        <?php echo form_input(array('id' => 'attention_section_heading', 'name' => 'attention_section_heading','class'=>'form-control input-md','placeholder'=>'Heading..','value' => set_value('attention_section_heading', !empty($attention_section_heading)?$attention_section_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('attention_section_heading'); ?>
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image</label>
                                </div>
                                <div class="form-group" id="blah7_container">
                                    <img id="blah7" src="<?=!empty($attention_image)?base_url($attention_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img2" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="attention_image" type="file" class="form-control pull-right" id="attention_image" onchange="checkPhoto(this,'blah7')">
                                    </div>
                                </div>
                            </div>

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
                                        <input name="$enquiry_image" type="file" class="form-control pull-right" id="$enquiry_image" onchange="checkPhoto(this,'blah8')">
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
		
			alert('aaaaa1');
            //Check maximum number of input fields
            if (y < maxField)
            {
                var blah = 'blah5a'+y;
                var fieldHTMLSteps = '<div class="row"><div class="col-md-11"><div class="row stepsBox"><div class="col-md-3"><div id="'+blah+'_container"><img class="img2" id="'+blah+'" src="'+base_url+'/assets/admin/images/no_image.gif" alt="your image"/> </div></div><div class="col-md-9"><div class="row"><div class="col-md-2"><label for="top_banner_icons">Banner:</label></div><div class="col-md-10"><input name="top_banner_icons[]" type="file" class="form-control pull-right" id="top_banner_icons" onchange="checkPhoto(this,\''+blah+'\')"></div></div><div class="row"><div class="col-md-2"><label for="top_banner_title">Heading:</label></div><div class="col-md-10"><input type="text" name="top_banner_title[]" value="" id="top_banner_title" class="form-control input-md" placeholder="Title..."></div></div><div class="row"><div class="col-md-2"><label for="top_banner_title">Url:</label></div><div class="col-md-10"><input type="text" name="top_banner_url[]" value="" id="top_banner_url" class="form-control input-md" placeholder="URL..."></div></div></div></div></div><div class="col-md-1"> <a href="javascript:void(0);" id="delete_steps" class="remove_button" title="Remove field"> <img src="'+base_url+'/assets/admin/images/delete.png"></a></div></div>'; //New input field html 

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
            alert('aaaaa2');
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