<?php
$controller = $this->uri->segment(2);
$id = $this->uri->segment(3);
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>College Campuses <?=!empty($id)?AddButton('add/'.$id):''; ?></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Campuses Management</a></li>
      <li class="active">Campus</li>
    </ol>
  </section>
  <section class="content">
    <?=getNotificationHtml(); ?>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?=getCollegeName($id); ?></h3>
        </div>
        <div class="box-body">

          <div class="col-md-4">
              <div class="form-group mt30">
                  <?php echo form_dropdown('college', $colleges, !empty($id)?$id:'','id="college_campus_filter" class="form-control select2" style="width:100%;" data-base="'.base_url('admin/campus').'"'); ?>
              </div>
          </div>
          <div class="clearfix"></div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Campus Location</th>
                <th>College</th>
                <th width="50">status</th> 
                <th width="100">Date</th>                  
                <th width="60">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(!empty($records))
              {
                foreach ($records as $rec)
                {
                  ?>
                    <tr>
                      <td><?=$rec->id ?></td>
                      <td><?=$rec->location ?></td>
                      <td><?=getCollegeName($rec->college_id); ?></td>
                      <td><a title="Change record status" href="<?=base_url('admin/campus/status/'.$rec->college_id.'/'.$rec->id); ?>"><small class="label <?=!empty($rec->status)?'bg-green':'bg-red'; ?>"><?=!empty($rec->status)?'Active':'Deactive'; ?></small></a></td>
                      <td><?=$rec->createdOn ?></td>
                      <td><?=AllowedAction($controller, 'edit', 'delete', 'Sure you want to delete this record ?', $rec->id) ?></td>
                    </tr>
                  <?php
                }
              }
              ?>
            </tbody>
          </table>
          <div class="pull-right"><?=!empty($pagination)?$pagination:''; ?></div>
        </div>
    </div>
  </section>
</div>