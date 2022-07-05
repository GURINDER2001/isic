<div class="content-wrapper">
    <section class="content-header">
        <h1>Project Settings <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Section Setting</a></li>
            <li class="active">Project</li>
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
                                    <label>Banner Images:</label>
                                </div>
                                <div class="form-group" id="blah_container">
                                    <img style="width:200px;border: 1px solid #ccc; padding: 10px;" id="blah" src="<?=!empty($banner_img)?base_url().$banner_img:base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="banner_img" type="file" class="form-control pull-right" id="banner_img" onchange="checkPhoto(this,'blah')">
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
                                    <label>Page Title:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'page_title', 'name' => 'page_title','class'=>'form-control input-md','placeholder'=>'Page Title','value' => set_value('page_title', !empty($page_title)?$page_title:''))); ?>
                                    </div>
                                    <?php echo form_error('page_title'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Page Content:</label>
                                    <textarea name="page_content" class="ckeditor form-control" rows="5" placeholder="Enter ...">
                                        <?php echo set_value('page_content', !empty($page_content)?$page_content:''); ?>
                                    </textarea>
                                </div>
                                <?php echo form_error('page_content'); ?>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Listing Headling:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'listing_headline', 'name' => 'listing_headline','class'=>'form-control input-md','placeholder'=>'Headline','value' => set_value('listing_headline', !empty($listing_headline)?$listing_headline:''))); ?>
                                    </div>
                                    <?php echo form_error('listing_headline'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>3 Column Infobox Section</h3></div>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Headline:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'column3_headline', 'name' => 'column3_headline','class'=>'form-control input-md','placeholder'=>'Headline','value' => set_value('column3_headline', !empty($column3_headline)?$column3_headline:''))); ?>
                                    </div>
                                    <?php echo form_error('column3_headline'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content:</label>
                                    <textarea name="column3_content" class="ckeditor form-control" rows="5" placeholder="Enter ...">
                                        <?php echo set_value('column3_content', !empty($column3_content)?$column3_content:''); ?>
                                    </textarea>
                                </div>
                                <?php echo form_error('column3_content'); ?>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Images:</label>
                                </div>

                                <div class="form-group" id="blah2_container">
                                    <img style="width:200px;border: 1px solid #ccc; padding: 10px;" id="blah2" src="<?=!empty($column3_img)?base_url().$column3_img:base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="column3_img" type="file" class="form-control pull-right" id="column3_img" onchange="checkPhoto(this,'blah2')">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>2 Column Infobox Section</h3></div>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Images:</label>
                                </div>
                                <div class="form-group" id="blah3_container">
                                    <img style="width:200px;border: 1px solid #ccc; padding: 10px;" id="blah3" src="<?=!empty($column2_img)?base_url().$column2_img:base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="column2_img" type="file" class="form-control pull-right" id="column2_img" onchange="checkPhoto(this,'blah3')">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Heading:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'column2_heading', 'name' => 'column2_heading','class'=>'form-control input-md','placeholder'=>'Heading','value' => set_value('column2_heading', !empty($column2_heading)?$column2_heading:''))); ?>
                                    </div>
                                    <?php echo form_error('column2_heading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sub Heading:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'column2_subheading', 'name' => 'column2_subheading','class'=>'form-control input-md','placeholder'=>'Headline','value' => set_value('column2_subheading', !empty($column2_subheading)?$column2_subheading:''))); ?>
                                    </div>
                                    <?php echo form_error('column2_subheading'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content:</label>
                                    <textarea name="column2_content" class="ckeditor form-control" rows="5" placeholder="Enter ...">
                                        <?php echo set_value('column2_content', !empty($column2_content)?$column2_content:''); ?>
                                    </textarea>
                                </div>
                                <?php echo form_error('column2_content'); ?>
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
                                    <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="Enter ...">
                                        <?php echo set_value('meta_description', isset($meta_description)?$meta_description:""); ?>
                                    </textarea>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <input type="submit" name="addpage" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>