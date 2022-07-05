<div class="content-wrapper">
	<section class="content-header">
	    <h1>Customized Packages Settings<small>it all starts here</small></h1>
	    <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="#">Section Setting</a></li>
	        <li class="active">Customized Packages</li>
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
                                      <label>Content</label>
                                      <textarea name="content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('content', !empty($content)?$content:''); ?></textarea>
                                  </div>
                                  <?php echo form_error('content'); ?>
                              </div>

                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Packages Content</label>
                                      <textarea name="package_content" class="ckeditor form-control" rows="2" placeholder="Enter ..."><?php echo set_value('package_content', !empty($package_content)?$package_content:''); ?></textarea>
                                  </div>
                                  <?php echo form_error('package_content'); ?>
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