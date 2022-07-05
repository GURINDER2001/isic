<?php
if(!empty($editdata)) 
{ 
    extract($editdata); 
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Student <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Students Management</a></li>
            <li class="active">Add Student</li>
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
                                    <label>First Name:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'first_name', 'name' => 'first_name','class'=>'form-control input-md','placeholder'=>'First Name','value' => set_value('first_name', isset($first_name)?$first_name:"" ))); ?>
                                    </div>
                                    <?php echo form_error('first_name'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'last_name', 'name' => 'last_name','class'=>'form-control input-md','placeholder'=>'Last Name','value' => set_value('last_name', isset($last_name)?$last_name:"" ))); ?>
                                    </div>
                                    <?php echo form_error('last_name'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope-o"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'email', 'type'=>'email', 'name' => 'email','class'=>'form-control input-md','placeholder'=>'Email','value' => set_value('email', isset($email)?$email:""))); ?>
                                    </div>
                                    <?php echo form_error('email'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Contact:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'mobile', 'name' => 'mobile','class'=>'form-control input-md','placeholder'=>'Mobile','value' => set_value('mobile', isset($mobile)?$mobile:"" ))); ?>
                                    </div>
                                    <?php echo form_error('mobile'); ?>
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

                                <div class="form-group">
                                    <label>Password:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'password', 'name' => 'password','class'=>'form-control input-md','placeholder'=>'Password','value' => set_value('password', isset($password)?$password:"" ))); ?>
                                    </div>
                                    <?php echo form_error('password'); ?>
                                </div>


                                <div class="clearfix"></div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                            <div class="col-md-3">
                                <div class="clearfix" style="height:24px;"></div>
                                <div class="form-group" id="blah_container">
                                    <img id="blah" src="<?=!empty($featured_img)?base_url($featured_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Feature Image" class="img3" />
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