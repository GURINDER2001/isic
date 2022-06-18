<?php
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Bulk Coupons Import <small>it all starts here</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Coupons Management</a></li>
      <li class="active"> Import Coupons</li>
    </ol> 
  </section>
  <section class="content">
    <?=getNotificationHtml(); ?>
    <div class="row">
      <div class="col-md-12">
          <div class="box">
            <div class="box-body pad">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Import CSV:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                    </div>
                                    <?php echo form_input(array('type'=>'file','id' => 'coupon_csv', 'name' => 'coupon_csv','class'=>'form-control input-md','placeholder'=>'Import CSV File','required'=>'required')); ?>
                                </div>
                                <?php echo form_error('coupon_csv'); ?>
                            </div>
                        </div>
                    </div>
                  <div class="clearfix"></div>
                  <input type="submit" name="importfile" class="btn btn-primary" value="Import">
              </form>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>