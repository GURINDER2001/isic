<div class="content-wrapper">
    <section class="content-header">
        <h1>Involement Settings <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Section Setting</a></li>
            <li class="active">Involement</li>
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
                                    <label>Stripe Text:</label>
                                    <textarea name="stripe_text" class="textarea form-control" rows="2" placeholder="Enter ...">
                                        <?php echo set_value('stripe_text', !empty($stripe_text)?$stripe_text:''); ?>
                                    </textarea>
                                    <?php echo form_error('stripe_text'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Logobox Section</h3></div>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Heading 1:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'lb_heading1', 'name' => 'lb_heading1','class'=>'form-control input-md','placeholder'=>'Heading 1','value' => set_value('lb_heading1', !empty($lb_heading1)?$lb_heading1:''))); ?>
                                    </div>
                                    <?php echo form_error('lb_heading1'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Heading 2:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'lb_heading2', 'name' => 'lb_heading2','class'=>'form-control input-md','placeholder'=>'Heading 2','value' => set_value('lb_heading2', !empty($lb_heading2)?$lb_heading2:''))); ?>
                                    </div>
                                    <?php echo form_error('lb_heading2'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content:</label>
                                    <textarea name="lb_content" class="textarea form-control" rows="4" placeholder="Enter ...">
                                        <?php echo set_value('lb_content', !empty($lb_content)?$lb_content:''); ?>
                                    </textarea>
                                </div>
                                <?php echo form_error('lb_content'); ?>
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