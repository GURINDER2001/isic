<div class="content-wrapper">
    <section class="content-header">
        <h1>Logo <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setting</a></li>
            <li class="active">Logo</li>
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
                                  <label>Header Logo:</label>
                                  <div class="input-group">
                                      <div class="input-group-addon">
                                          <i class="fa fa-file"></i>
                                      </div>
                                      <input name="header_logo" type="file" class="form-control pull-right" id="header_logo" onchange="checkPhoto(this)">
                                  </div>
                                </div>
                                <div class="form-group" id="blah_container">
                                  <img id="blah" src="<?=base_url(!empty($header_logo)?$header_logo:'assets/admin/images/no_image.gif'); ?>" alt="Logo" class="img2" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Footer Logo:</label>
                                  <div class="input-group">
                                      <div class="input-group-addon">
                                          <i class="fa fa-file"></i>
                                      </div>
                                      <input name="footer_logo" type="file" class="form-control pull-right" id="footer_logo" onchange="checkPhoto(this,'blah2')">
                                  </div>
                                </div>
                                <div class="form-group" id="blah2_container">
                                  <img id="blah2" src="<?=base_url(!empty($footer_logo)?$footer_logo:'assets/admin/images/no_image.gif'); ?>" alt="Logo" class="img2" />
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