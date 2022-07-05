<?php
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Add Question <small>it all starts here</small></h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#"> Questions Management</a></li>
          <li class="active"> Add Question</li>
      </ol>
  </section>
  <section class="content">
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
                          <?php echo form_input(array('id' => 'question', 'name' => 'question','class'=>'form-control input-md','placeholder'=>'Question','value' => set_value('question', isset($question)?$question:"" ))); ?>
                      </div>
                      <?php echo form_error('question'); ?>
                  </div>

                  <div class="form-group">
                      <label>Category:</label>
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-file-text-o"></i>
                          </div>
                          <?php echo form_dropdown('category', $options_categories,set_value('category',isset($category)?$category:""),'id="category" class="form-control"'); ?>
                          <?php echo form_error('category'); ?>
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