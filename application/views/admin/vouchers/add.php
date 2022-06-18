<?php
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Add Voucher <small>it all starts here</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Vouchers Management</a></li>
      <li class="active"> Add Voucher</li>
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
                      <label>Voucher:</label>
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-file-text-o"></i>
                          </div>
                      <?php echo form_input(array('id' => 'voucher', 'name' => 'voucher','class'=>'form-control input-md','placeholder'=>'Voucher','value' => set_value('voucher', isset($voucher)?$voucher:"" ))); ?>
                      </div>
                      <?php echo form_error('voucher'); ?>
                  </div>
                  
                  <div class="form-group">
                      <label>Page Content:</label>
                      <textarea id="description" name="description" class="ckeditor" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo set_value('description', isset($description)?$description:""); ?></textarea>
                      <?php echo form_error('description'); ?>
                  </div>
                  
                  <div class="form-group" id="blah2_container">
                      <img id="blah2" src="<?=!empty($banner_img)?base_url($banner_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Banner Image" class="img1" />
                  </div>
                  <div class="form-group">
                      <label>Banner Image:</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                              <i class="fa fa-file"></i>
                          </div>
                          <input name="banner_img" type="file" class="form-control pull-right" id="banner_img" onchange="checkPhoto(this,'blah2')">
                      </div>
                  </div>
                  <div class="clearfix"></div>
                  <input type="submit" name="addpage" class="btn btn-primary" value="Submit">
              </form>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
$(".js-example-placeholder-multiple").select2({
    placeholder: "Select a state"
});
</script>