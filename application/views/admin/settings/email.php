<div class="content-wrapper">
    <section class="content-header">
        <h1>Email Settings <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setting</a></li>
            <li class="active">Advance Settings</li>
        </ol>
    </section>
    <section class="content">
        <?php echo getNotificationHtml(); ?>
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

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Email Assets</h3>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Email Logo:</label>
                                  <div class="input-group">
                                      <div class="input-group-addon">
                                          <i class="fa fa-file"></i>
                                      </div>
                                      <input name="email_logo" type="file" class="form-control pull-right" id="email_logo" onchange="checkPhoto(this)">
                                  </div>
                                </div>
                                <div class="form-group" id="blah_container">
                                  <img id="blah" src="<?=!empty($email_logo)?base_url($email_logo):base_url('assets/admin/images/no_image.gif'); ?>" alt="Logo" class="img2" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>From Name:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'email_fromname', 'name' => 'email_fromname','class'=>'form-control input-md','placeholder'=>'From name..','value' => set_value('email_fromname', !empty($email_fromname)?$email_fromname:''))); ?>
                                    </div>
                                    <?php echo form_error('email_fromname'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>From Email:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'email_fromemail', 'name' => 'email_fromemail','class'=>'form-control input-md','placeholder'=>'From email..','value' => set_value('email_fromemail', !empty($email_fromemail)?$email_fromemail:''))); ?>
                                    </div>
                                    <?php echo form_error('email_fromemail'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email Signature:</label>
                                    <textarea id="email_signature" name="email_signature" rows="2" class="ckeditor form-control"><?=set_value('email_signature', !empty($email_signature)?$email_signature:'');?></textarea>
                                    <?php echo form_error('email_signature'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email Disclaimer:</label>
                                    <textarea id="email_disclaimer" name="email_disclaimer" rows="2" class="ckeditor form-control"><?=set_value('email_disclaimer', !empty($email_disclaimer)?$email_disclaimer:'');?></textarea>
                                    <?php echo form_error('email_disclaimer'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>SMTP Settings</h3>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
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

                            <div class="col-md-12">
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

                            <div class="col-md-12">
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

                            <div class="col-md-12">
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

                            <div class="col-md-12">
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
                            <div class="col-md-12">
                                <a href="<?=base_url('admin/settings/send_test_mail');?>" class="pull-right"><i class="fa fa-share" aria-hidden="true"></i> Send Test Email</a>
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