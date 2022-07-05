<div class="content-wrapper">
    <section class="content-header">
        <h1>Advance Settings <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setting</a></li>
            <li class="active">Advance Settings</li>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Site Settings</h3>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sitename:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'sitename', 'name' => 'sitename','class'=>'form-control input-md','placeholder'=>'Sitename','value' => set_value('sitename', !empty($sitename)?$sitename:''))); ?>
                                    </div>
                                    <?php echo form_error('sitename'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contact Person:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'contact_person', 'name' => 'contact_person','class'=>'form-control input-md','placeholder'=>'Contact Person','value' => set_value('contact_person', !empty($contact_person)?$contact_person:''))); ?>
                                    </div>
                                    <?php echo form_error('contact_person'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contact Email:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'contact_email', 'name' => 'contact_email','class'=>'form-control input-md','placeholder'=>'Contact Email..','value' => set_value('contact_email', !empty($contact_email)?$contact_email:''))); ?>
                                    </div>
                                    <?php echo form_error('contact_email'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contact Number :</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'contact_number', 'name' => 'contact_number','class'=>'form-control input-md','placeholder'=>'Contact Number','value' => set_value('contact_number', !empty($contact_number)?$contact_number:''))); ?>
                                    </div>
                                    <?php echo form_error('contact_number'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contact Address:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'contact_address', 'name' => 'contact_address','class'=>'form-control input-md','placeholder'=>'Contact Address','value' => set_value('contact_address', !empty($contact_address)?$contact_address:''))); ?>
                                    </div>
                                    <?php echo form_error('contact_address'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Card Order Url:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-globe"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'order_url', 'name' => 'order_url','class'=>'form-control input-md','value' => set_value('order_url', !empty($order_url)?$order_url:''))); ?>
                                    </div>
                                    <?php echo form_error('order_url'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Refer a Friend Url:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-globe"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'referfriends_url', 'name' => 'referfriends_url','class'=>'form-control input-md','value' => set_value('referfriends_url', !empty($referfriends_url)?$referfriends_url:''))); ?>
                                    </div>
                                    <?php echo form_error('referfriends_url'); ?>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Admin Settings</h3>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Admin Email:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'admin_email', 'name' => 'admin_email','class'=>'form-control input-md','placeholder'=>'Admin email address','value' => set_value('admin_email', !empty($admin_email)?$admin_email:''))); ?>
                                    </div>
                                    <?php echo form_error('admin_email'); ?>
                                </div>
                            </div>                          

                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Social Settings</h3>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Facebook:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-facebook"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'facebook', 'name' => 'facebook','class'=>'form-control input-md','value' => set_value('facebook', !empty($facebook)?$facebook:''))); ?>
                                    </div>
                                    <?php echo form_error('facebook'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Twitter:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-twitter"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'twitter', 'name' => 'twitter','class'=>'form-control input-md','value' => set_value('twitter', !empty($twitter)?$twitter:''))); ?>
                                    </div>
                                    <?php echo form_error('twitter'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Linkedin:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-linkedin"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'linkedin', 'name' => 'linkedin','class'=>'form-control input-md' ,'value' => set_value('linkedin', !empty($linkedin)?$linkedin:''))); ?>
                                    </div>
                                    <?php echo form_error('linkedin'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>RSS:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-rss"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'rss', 'name' => 'rss','class'=>'form-control input-md' ,'value' => set_value('rss', !empty($rss)?$rss:''))); ?>
                                    </div>
                                    <?php echo form_error('rss'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Youtube:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-youtube"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'youtube', 'name' => 'youtube','class'=>'form-control input-md' ,'value' => set_value('youtube', !empty($youtube)?$youtube:''))); ?>
                                    </div>
                                    <?php echo form_error('youtube'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Instagram:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-instagram"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'instagram', 'name' => 'instagram','class'=>'form-control input-md' ,'value' => set_value('instagram', !empty($instagram)?$instagram:''))); ?>
                                    </div>
                                    <?php echo form_error('instagram'); ?>
                                </div>
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Refer A Friends Whatsapp Message Settings</h3>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Whatsapp Message:</label>
                                    <textarea id="whatsapp_message" name="whatsapp_message" rows="2" class="form-control"><?=set_value('whatsapp_message', !empty($whatsapp_message)?$whatsapp_message:'');?></textarea>
                                    <?php echo form_error('whatsapp_message'); ?>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>Footer Settings</h3>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Copyright Text:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-copyright"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'copyright', 'name' => 'copyright','class'=>'form-control input-md','value' => set_value('copyright', !empty($copyright)?$copyright:''))); ?>
                                    </div>
                                    <?php echo form_error('copyright'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>PowerBy Text:</label>
                                    <textarea id="powerby" name="powerby" rows="2" class="form-control"><?=set_value('powerby', !empty($powerby)?$powerby:'');?></textarea>
                                    <?php echo form_error('powerby'); ?>
                                </div>
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <h3>API Settings</h3>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Client Id:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'client_id', 'name' => 'client_id','class'=>'form-control input-md','value' => set_value('client_id', !empty($client_id)?$client_id:''))); ?>
                                    </div>
                                    <?php echo form_error('client_id'); ?>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Client Secret:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <?php echo form_input(array('id' => 'client_secret', 'name' => 'client_secret','class'=>'form-control input-md','value' => set_value('client_secret', !empty($client_secret)?$client_secret:''))); ?>
                                    </div>
                                    <?php echo form_error('client_secret'); ?>
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