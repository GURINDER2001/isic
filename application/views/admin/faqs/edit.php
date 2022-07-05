<?php
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit FAQ <small>it all starts here</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> FAQs Management</a></li>
      <li class="active"> Edit FAQ</li>
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
                              <label>Question:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_input(array('id' => 'question', 'name' => 'question','class'=>'form-control input-md','placeholder'=>'Question','value' => set_value('question', !empty($question)?$question:"" ))); ?>
                              </div>
                              <?php echo form_error('question'); ?>
                          </div>
                          <div class="form-group">
                              <label>Answer:</label>
                              <textarea id="answer" name="answer" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                  <?php echo set_value('answer', isset($answer)?$answer:""); ?>
                              </textarea>
                              <?php echo form_error('answer'); ?>
                          </div>
                          
                          <div class="form-group">
                              <label>Custom Order:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_input(array('id' => 'custom_order','type'=>'number','name' => 'custom_order','class'=>'form-control input-md','placeholder'=>'Order','value' => set_value('custom_order', !empty($custom_order)?$custom_order:"" ))); ?>
                              </div>
                              <?php echo form_error('custom_order'); ?>
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