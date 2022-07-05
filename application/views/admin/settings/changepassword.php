<div class="content-wrapper">
    <section class="content-header">
        <h1>Change Password <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setting</a></li>
            <li class="active">Change Password</li>
        </ol>
    </section>
    <section class="content">
    	<?php getNotificationHtml(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                   <div class="box-body pad">
                        <form method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Old Password:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                        <?php echo form_input(array('type' => 'password','id' => 'old_password', 'name' => 'old_password','class'=>'form-control input-md','placeholder'=>'Old password','value' => set_value('old_password'))); ?>
                                    </div>
                                    <?php echo form_error('old_password'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Password:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                        <?php echo form_input(array('type' => 'password','id' => 'password', 'name' => 'password','class'=>'form-control input-md','placeholder'=>'New password','value' => set_value('password'))); ?>
                                    </div>
                                    <?php echo form_error('password'); ?>
                                        <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                        <?php echo form_input(array('type' => 'password','id' => 'confirm_password', 'name' => 'confirm_password','class'=>'form-control input-md','placeholder'=>'New confirm password','value' => set_value('confirm_password'))); ?>
                                    </div>
                                    <?php echo form_error('confirm_password'); ?>
                                        <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>