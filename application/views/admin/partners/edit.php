<?php
if(!empty($editdata)) 
{  
    extract($editdata); 
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Partner <small>it all starts here</small></h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Partners Management</a></li>
              <li class="active">Edit Partner</li>
          </ol>
    </section>
    <section class="content">
        <?=getNotificationHtml(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body pad">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label>Title:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_input(array('id' => 'name', 'name' => 'name','class'=>'form-control input-md','placeholder'=>'Name','value' => set_value('name', isset($name)?$name:""))); ?>
                              </div>
                              <?php echo form_error('name'); ?>
                          </div>

                          <div class="form-group" id="blah_container">
                              <img id="blah" src="<?=!empty($logo)?base_url($logo):base_url('assets/admin/images/no_image.gif'); ?>" alt="Logo" class="img2" />
                          </div>
                          <div class="form-group">
                              <label>Logo:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file"></i>
                                  </div>
                                  <input name="partner_logo" type="file" class="form-control pull-right" id="partner_logo" onchange="checkPhoto(this)">
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label>Associated Partner Pages:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_multiselect('associated_pages[]', $partnerPagesOptions,set_value('associated_pages',isset($associated_pages)?explode(",", $associated_pages):""),'id="associated_pages" class="form-control input-md select2"'); ?>
                              </div>
                              <?php echo form_error('associated_pages'); ?>
                          </div>
                          
                            <div class="clearfix"></div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>