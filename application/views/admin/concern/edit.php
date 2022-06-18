<?php
//pre($editdata);
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Contact/Concern Option <small>it all starts here</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Options Management</a></li>
      <li class="active"> Edit Contact/Concern</li>
    </ol> 
  </section>
  <section class="content">
    <?php getNotificationHtml(); ?>
    <div class="row">
      <div class="col-md-12">
          <div class="box">
            <div class="box-body pad">
                <form action="" method="POST" enctype="multipart/form-data">
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
                        <label>Label:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <?php echo form_input(array('id' => 'label', 'name' => 'label','class'=>'form-control input-md','placeholder'=>'Label','value' => set_value('label', isset($label)?$label:"" ))); ?>
                        </div>
                        <?php echo form_error('label'); ?>
                    </div>

                    <div class="form-group">
                        <label>Parent:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <?php echo form_dropdown('parent', $parentOptions,set_value('parent',isset($parent)?$parent:""),'id="parent" class="form-control"'); ?>
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