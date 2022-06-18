<?php
//pre($editdata);
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Link <small>it all starts here</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Usefull Links</a></li>
      <li class="active"> Edit Program Category</li>
    </ol> 
  </section>
  <section class="content">
    <?=getNotificationHtml(); ?>
    <div class="row">
      <div class="col-md-12">
          <div class="box">
            <div class="box-body pad">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Link Caption:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <?php echo form_input(array('id' => 'name', 'name' => 'name','class'=>'form-control input-md','placeholder'=>'Label','value' => set_value('name', isset($name)?$name:"" ))); ?>
                        </div>
                        <?php echo form_error('name'); ?>
                    </div>

                    <!--div class="form-group">
                        <label>Slug:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <input type="text" name="slug" value="<?=set_value('slug', isset($slug)?$slug:" ");?>" id="slug" class="form-control input-md" placeholder="Slug">
                        </div>
                        <?php echo form_error('slug'); ?>
                    </div-->

                    <div class="form-group">
                          <label>Link / Url:</label>
                          <div class="input-group date">
                              <div class="input-group-addon">
                                  <i class="fa fa-file-text-o"></i>
                              </div>
                              <?php echo form_input(array('id' => 'url', 'name' => 'url','class'=>'form-control input-md','placeholder'=>'Url','value' => set_value('url', isset($url)?$url:"" ))); ?>
                          </div>
                          <?php echo form_error('url'); ?>
                    </div>

                    <div class="form-group">
                        <label>Content:</label>
                        <textarea id="description" name="description" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            <?php echo set_value('description', isset($description)?$description:""); ?>
                        </textarea>
                        <?php echo form_error('description'); ?>
                    </div>

                    <div class="form-group">
                        <label>Parent:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <?php echo form_dropdown('parent', $parentOptions,set_value('parent',!empty($parent)?$parent:array()),'id="parent" class="form-control select2"'); ?>
                            <?php echo form_error('parent'); ?>
                        </div>
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