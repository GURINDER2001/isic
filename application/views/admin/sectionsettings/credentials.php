<div class="content-wrapper">
    <section class="content-header">
        <h1>Credentials <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Section Setting</a></li>
            <li class="active">Credentials</li>
        </ol>
    </section>
    <section class="content">
    	<?php getNotificationHtml(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
					<?php 
					if(!empty($collection)):
					foreach ( $collection as $data):
						$array[$data->name]=$data->value;
					endforeach;
					extract($array);
					endif;
					?>
				    <div class="box-body pad">
				        <form method="post" enctype="multipart/form-data">
				            <div class="col-md-12">
				                <div class="form-group">
				                    <div>
				                        <h3>Paypal Credentials</h3></div>
				                    <hr>
				                </div>
				            </div>
				            <div class="col-md-12">
				                <div class="form-group">
				                    <label>Paypal Mode:</label>
				                    <div class="input-group">

				                        <label>
				                            <input name="paypal_mode" value="sandbox" type="radio" checked="checked" class="flat-red" <?php if(!empty($paypal_mode) && $paypal_mode=='sandbox' ) { echo 'checked'; } ?>> Sandbox &nbsp;&nbsp; &nbsp;&nbsp;
				                        </label>
				                        <label>
				                            <input name="paypal_mode" value="live" type="radio" class="flat-red" <?php if(!empty($paypal_mode) && $paypal_mode=='live' ) { echo 'checked'; } ?>> Live &nbsp;&nbsp;&nbsp;&nbsp;
				                        </label>
				                    </div>
				                </div>
				            </div>

				            <div class="col-md-12">
				                <div class="form-group">
				                    <label>Paypal Bussiness Email (Sandbox):</label>
				                    <div class="input-group date">
				                        <div class="input-group-addon">
				                            <i class="fa fa-envelope"></i>
				                        </div>
				                        <?php echo form_input(array('id' => 'paypal_sandbox_email', 'name' => 'paypal_sandbox_email','class'=>'form-control input-md','placeholder'=>'Paypal Bussiness Email','value' => set_value('paypal_sandbox_email', !empty($paypal_sandbox_email)?$paypal_sandbox_email:''))); ?>
				                    </div>
				                    <?php echo form_error('paypal_sandbox_email'); ?>
				                </div>
				            </div>

				            <div class="col-md-12">
				                <div class="form-group">
				                    <label>Paypal Bussiness Email (Live):</label>
				                    <div class="input-group date">
				                        <div class="input-group-addon">
				                            <i class="fa fa-envelope"></i>
				                        </div>
				                        <?php echo form_input(array('id' => 'paypal_live_email', 'name' => 'paypal_live_email','class'=>'form-control input-md','placeholder'=>'Paypal Bussiness Email','value' => set_value('paypal_live_email', !empty($paypal_live_email)?$paypal_live_email:''))); ?>
				                    </div>
				                    <?php echo form_error('paypal_live_email'); ?>
				                </div>
				            </div>

				            <div class="clearfix"></div>
				            <div class="col-md-12">
				                <input type="submit" name="addpage" class="btn btn-primary" value="Submit">
				            </div>
				        </form>
				    </div>
				</div>
			</div>
		</div>
	</section>
</div>