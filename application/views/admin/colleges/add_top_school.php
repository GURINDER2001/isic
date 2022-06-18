<?php
if(!empty($editdata)) 
{ 
    extract($editdata); 
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Top School <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Colleges Management</a></li>
            <li class="active">Add Top School</li>
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
                                    <label>College/School/University:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file-text-o"></i>
                                        </div>
                                        <?php echo form_dropdown('college_id', !empty($options_colleges)?$options_colleges:array(), set_value('college_id',isset($college_id)?$college_id:""),'id="college_id" class="form-control"  required="required"' ); ?>
                                        <?php echo form_error('college_id'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Assign Categories:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file-text-o"></i>
                                        </div>
                                        <?php echo form_multiselect('associated_categories[]', !empty($options_categories)?$options_categories:array(),set_value('associated_categories',isset($associated_categories)?explode(",", $associated_categories):""),'id="associated_categories" class="form-control input-md select2" required="required"'); ?>
                                        <?php echo form_error('associated_categories'); ?>
                                    </div>
                                </div>                                
                            </div>
                            <div class="col-md-12">
                                <div class="clearfix"></div>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>