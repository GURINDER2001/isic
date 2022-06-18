<div class="content-wrapper">
    <section class="content-header">
        <h1>Test Email <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setting</a></li>
            <li class="active">Send Email</li>
        </ol>
    </section>
    <section class="content">
        <?php getNotificationHtml(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body pad">
                        <form method="post" enctype="multipart/form-data">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>TO Email:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'email', 'name' => 'email','class'=>'form-control input-md','placeholder'=>'Email..','value' => set_value('email', !empty($email)?$email:''))); ?>
                                    </div>
                                    <?php echo form_error('email'); ?>
                                </div>
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