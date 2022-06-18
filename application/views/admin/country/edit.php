<?php
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Category <small>it all starts here</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> CMS Management</a></li>
      <li class="active"> Edit Category</li>
    </ol> 
  </section>
  <section class="content">
    <?php getNotificationHtml(); ?>
    <div class="row">
      <div class="col-md-12">
          <div class="box">
            <div class="box-body pad">
                <form action="" method="POST" role="form">
                    <div class="form-group">
                        <label>Title:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <?php echo form_input(array('id' => 'name', 'name' => 'name','class'=>'form-control input-md','placeholder'=>'Title','value' => set_value('name', isset($name)?$name:"" ))); ?>
                        </div>
                        <?php echo form_error('name'); ?>
                    </div>

                    <div class="form-group">
                        <label>Content:</label>
                        <textarea id="description" name="description" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            <?php echo set_value('description', isset($description)?$description:""); ?>
                        </textarea>
                        <?php echo form_error('description'); ?>
                    </div>

                    <div class="form-group">
                        <label>Parents Category:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <?php echo form_dropdown('parents_category', $options_category,set_value('parents_category',isset($parents_category)?$parents_category:""),'id="parents_category" class="form-control input-md"'); ?>
                        </div>
                        <?php echo form_error('parents_category'); ?>
                    </div>

                    <div class="form-group">
                      <label>Meta Title:</label>
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-file-text-o"></i>
                          </div>
                          <input id="meta_title" name="meta_title" value="<?php echo set_value('meta_title', isset($meta_title)?$meta_title:" "); ?>" type="text" class="form-control pull-right">
                      </div>
                    </div>

                    <div class="form-group">
                          <label>Meta Key:</label>
                          <div class="input-group date">
                              <div class="input-group-addon">
                                  <i class="fa fa-file-text-o"></i>
                              </div>
                              <input id="meta_key" name="meta_key" value="<?php echo set_value('meta_key', isset($meta_key)?$meta_key:" "); ?>" type="text" class="form-control pull-right">
                          </div>
                    </div>

                    <div class="form-group">
                      <label>Meta Description:</label>
                      <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="Enter ..."><?php echo set_value('meta_description', isset($meta_description)?$meta_description:""); ?></textarea>
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