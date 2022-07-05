<?php
if(!empty($editdata)) 
{ 
    extract($editdata); 
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Add User <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Users Management</a></li>
            <li class="active">Add Users</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body pad">
                        <form method="post" enctype="multipart/form-data">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'name', 'name' => 'name','class'=>'form-control input-md','placeholder'=>'Name','value' => set_value('name', isset($name)?$name:"" ))); ?>
                                    </div>
                                    <?php echo form_error('name'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </div>
                                        <input name="email" value="<?php echo set_value('email', isset($email)?$email:" "); ?>" type="text" class="form-control pull-right">
                                    </div>
                                    <?php echo form_error('email'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Contact:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input name="mobile" value="<?php echo set_value('mobile', isset($mobile)?$mobile:" "); ?>" type="text" class="form-control pull-right">
                                    </div>
                                    <?php echo form_error('mobile'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Role:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-users"></i>
                                        </div>
                                        <?php echo form_dropdown('role', $options_roles,set_value('role',isset($role)?$role:""),'id="role" class="form-control input-md"'); ?>
                                    </div>
                                    <?php echo form_error('role'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Gender:</label>
                                    <div class="input-group">
                                        <label>
                                            <input name="gender" value="1" type="radio" checked="checked" class="flat-red" <?php if(isset($gender) && $gender==1) { echo 'checked'; } ?>> Male &nbsp;&nbsp; &nbsp;&nbsp;
                                        </label>
                                        <label>
                                            <input name="gender" value="2" type="radio" class="flat-red" <?php if(isset($gender) && $gender==2) { echo 'checked'; } ?>> Female &nbsp;&nbsp;&nbsp;&nbsp;
                                        </label>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <input type="submit" name="addpage" class="btn btn-primary" value="Submit">
                            </div>

                            <div class="col-md-3">
                                <div class="clearfix" style="height:24px;"></div>
                                <div class="form-group" id="blah_container">
                                    <img style="width:100%;border: 1px solid #ccc; padding: 10px;" id="blah" src="<?php if(empty($featured_img)) { echo base_url('assets/admin/images/avatar.png'); } else { echo base_url().$featured_img; } ?>" alt="your image" />
                                </div>
                                <div class="form-group">
                                    <label>Profile Photo:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input name="featured_img" type="file" class="form-control pull-right" id="featured_img" onchange="checkPhoto(this)">
                                    </div>
                                </div>

                        </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
    </section>
</div>