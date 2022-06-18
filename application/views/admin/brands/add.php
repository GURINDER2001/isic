<?php if(!empty($editdata)) 
{ 

    extract($editdata); 
} ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Add Brand <small>it all starts here</small></h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Brands Management</a></li>
          <li class="active">Add Brand</li>
      </ol>
  </section>
  <section class="content">
      <div class="row">
          <div class="col-md-12">
              <div class="box">
                  <div class="box-body pad">
                      <form method="post" enctype="multipart/form-data">
                          <div class="form-group">
                              <label>Title:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_input(array('id' => 'name', 'name' => 'name','class'=>'form-control input-md','placeholder'=>'Title','value' => set_value('name', isset($name)?$name:""))); ?>
                              </div>
                              <?php echo form_error('name'); ?>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Domain:</label>
                                  <div class="input-group date">
                                      <div class="input-group-addon">
                                          <i class="fa fa-globe"></i>
                                      </div>
                                      <?php echo form_input(array('id' => 'domain', 'name' => 'domain','class'=>'form-control input-md','placeholder'=>'www.example.com','value' => set_value('domain', isset($domain)?$domain:""))); ?>
                                  </div>
                                  <?php echo form_error('domain'); ?>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Short Label:</label>
                                  <div class="input-group date">
                                      <div class="input-group-addon">
                                          <i class="fa fa-file-text-o"></i>
                                      </div>
                                      <?php echo form_input(array('id' => 'label', 'name' => 'label','class'=>'form-control input-md','placeholder'=>'Short Label','value' => set_value('label', isset($label)?$label:""))); ?>
                                  </div>
                                  <?php echo form_error('label'); ?>
                              </div>
                            </div>                            
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Logo:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="logo" type="file" class="form-control pull-right" id="logo" onchange="checkPhoto(this,'blah')">
                                    </div>
                                </div>

                                <div class="form-group" id="blah_container">
                                    <img id="blah" src="<?=!empty($logo)?base_url($logo):base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" class="img2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Favicon:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="favicon" type="file" class="form-control pull-right" id="favicon" onchange="checkPhoto(this,'blah2')">
                                    </div>
                                </div>
                                <div class="form-group" id="blah2_container">
                                    <img id="blah2" src="<?=!empty($favicon)?base_url($favicon):base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" class="img1" />
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Cover Image:</label>
                                  <div class="input-group">
                                      <div class="input-group-addon">
                                          <i class="fa fa-file"></i>
                                      </div>
                                      <input name="cover_image" type="file" class="form-control pull-right" id="cover_image" onchange="checkPhoto(this,'blah4')">
                                  </div>
                              </div>

                              <div class="form-group" id="blah4_container">
                                  <img id="blah4" src="<?=!empty($cover_image)?base_url($cover_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" class="img2" />
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                  <label>Banner:</label>
                                  <div class="input-group">
                                      <div class="input-group-addon">
                                          <i class="fa fa-file"></i>
                                      </div>
                                      <input name="banner_image" type="file" class="form-control pull-right" id="banner_image" onchange="checkPhoto(this,'blah3')">
                                  </div>
                              </div>
                              <div class="form-group" id="blah3_container">
                                  <img id="blah3" src="<?=!empty($banner_image)?base_url($banner_image):base_url('assets/admin/images/no_image.gif'); ?>" alt="your image" class="img2" />
                              </div>
                            </div>
                          </div>
                          
                          

                          <div class="form-group">
                              <label>Content On CoverImage:</label>
                              <textarea id="cover_content" name="cover_content" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                  <?php echo set_value('cover_content', isset($cover_content)?$cover_content:""); ?>
                              </textarea>
                              <?php echo form_error('cover_content'); ?>
                          </div>

                          <div class="form-group">
                              <label>Content:</label>
                              <textarea id="description" name="description" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                  <?php echo set_value('description', isset($description)?$description:""); ?>
                              </textarea>
                              <?php echo form_error('description'); ?>
                          </div>

                          

                          <div class="form-group">
                              <div>
                                  <h3>SEO Meta Section</h3>
                              </div>
                              <hr>
                          </div>

                          <div class="form-group">
                              <label>Meta Title:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <input name="meta_title" value="<?php echo set_value('meta_title', isset($meta_title)?$meta_title:" "); ?>" type="text" class="form-control pull-right" id="meta_title">
                              </div>
                          </div>

                          <div class="form-group">
                              <label>Meta Key:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <input name="meta_key" value="<?php echo set_value('meta_key', isset($meta_key)?$meta_key:" "); ?>" type="text" class="form-control pull-right" id="meta_key">
                              </div>
                          </div>

                          <div class="form-group">
                              <label>Meta Description:</label>
                              <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter ..."><?php echo set_value('meta_description', isset($meta_description)?$meta_description:""); ?></textarea>
                          </div>

                          <div class="clearfix"></div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>