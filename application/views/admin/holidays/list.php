<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Holidays <?=AddButton('add'); ?></h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Holidays Management</a></li>
          <li class="active">Holidays</li>
      </ol>
  </section>
  <section class="content">
    <?=getNotificationHtml(); ?>
    <div class="box">
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th width="10">Id</th>
                      <th>Title</th>
                      <th width="100">Date</th>
                      <th width="100">Is Official?</th>
                      <th width="70">Status</th>
                      <th width="70">Action</th>
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
                      <td><?=$rec->name ?></td>
                      <td><?=date('d M, Y', strtotime($rec->holiday_date)); ?></td>
                      <td><?=!empty($rec->is_official)?'Yes':'No'; ?></td> 
                      <td><?=statusButton($controller,'status',$rec->status,$rec->id); ?></td>
                      <td><?=AllowedAction($controller, 'edit', 'delete', 'Sure you want to delete this record ?', $rec->id) ?></td>
                  </tr>
                  <?php
                  }
                }
                ?>
              </tbody>
          </table>
        </div>
    </div>
  </section>
</div>