<div class="content-wrapper">
    <section class="content-header">
        <h1> SMTP Settings <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setting</a></li>
            <li class="active">SMTP Settings</li>
        </ol>
    </section>
    <section class="content">
        <?php getNotificationHtml(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        	<?php
							if(!empty($records))
							{
								foreach ( $records as $rec)
								{
									$array[$rec->name]=$rec->value;
								} 
								extract($array);
							}
							?>
                            <div class="box-body pad">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>SMTP Host:</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-server"></i>
                                                </div>
                                                <?php echo form_input(array('id' => 'smtp_host', 'name' => 'smtp_host','class'=>'form-control input-md','value' => set_value('smtp_host', isset($smtp_host)?$smtp_host:""))); ?>
                                            </div>
                                            <?php echo form_error('smtp_host'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>SMTP Port:</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-life-ring"></i>
                                                </div>
                                                <?php echo form_input(array('id' => 'smtp_port', 'name' => 'smtp_port','class'=>'form-control input-md','value' => set_value('smtp_port', isset($smtp_port)?$smtp_port:""))); ?>
                                            </div>
                                            <?php echo form_error('smtp_port'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>SMTP From:</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <?php echo form_input(array('id' => 'smtp_from', 'name' => 'smtp_from','class'=>'form-control input-md','value' => set_value('smtp_from', isset($smtp_from)?$smtp_from:""))); ?>
                                            </div>
                                            <?php echo form_error('smtp_from'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>SMTP User Name:</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <?php echo form_input(array('id' => 'smtp_user', 'name' => 'smtp_user','class'=>'form-control input-md' ,'value' => set_value('smtp_user', isset($smtp_user)?$smtp_user:""))); ?>
                                            </div>
                                            <?php echo form_error('smtp_user'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>SMTP Password:</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                                <?php echo form_input(array('id' => 'smtp_pass', 'name' => 'smtp_pass','class'=>'form-control input-md','value' => isset($smtp_pass)?$smtp_pass:"")); ?>
                                            </div>
                                            <?php echo form_error('smtp_pass'); ?>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-7">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
    </section>
</div>