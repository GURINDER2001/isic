<?php
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Add Coupon <small>it all starts here</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Coupons Management</a></li>
      <li class="active"> Add Coupon</li>
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
                                <label>Coupon:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                    </div>
                                    <?php echo form_input(array('id' => 'coupon', 'name' => 'coupon','class'=>'form-control input-md','placeholder'=>'coupon','required'=>'required','value' => set_value('coupon', isset($coupon)?$coupon:"" ))); ?>
                                </div>
                                <?php echo form_error('coupon'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Discount Type:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                    </div>
                                    <?php echo form_dropdown('discount_type',array('flat'=>'Flat','percent'=>'Percentage'),!empty($discount_type)?$discount_type:"",array('id' => 'discount_type','class'=>'form-control input-md','required'=>'required')); ?>
                                </div>
                                <?php echo form_error('discount_type'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Discount value:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                    </div>
                                    <?php echo form_input(array('id' => 'discount_value', 'name' => 'discount_value','class'=>'form-control input-md','placeholder'=>'Dis. Value','required'=>'required','value' => set_value('discount_value', isset($discount_value)?$discount_value:"" ))); ?>
                                </div>
                                <?php echo form_error('discount_value'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Is this coupon allowed for only cardholder(Serial Number Auth Required):</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                    </div>
                                    <?php echo form_dropdown('members_only',array(0=>'No',1=>'Yes'),!empty($members_only)?$members_only:"",array('id' => 'members_only','class'=>'form-control input-md')); ?>
                                </div>
                                <?php echo form_error('members_only'); ?>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Valid Upto:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                    </div>
                                    <?php echo form_input(array('id' => 'valid_upto', 'name' => 'valid_upto','class'=>'form-control input-md datepicker','placeholder'=>'YYYY-MM-DD','value' => set_value('valid_upto', isset($valid_upto)?$valid_upto:"" ))); ?>
                                </div>
                                <?php echo form_error('valid_upto'); ?>
                            </div>
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