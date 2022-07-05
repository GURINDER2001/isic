<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>Events <?=AddButton('add'); ?></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Events Management</a></li>
        <li class="active">Events</li>
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
                  <th>Event Title</th>
                  <th>Vanue</th>                  
                  <th>Event Date</th>
                  <th>Event By</th>
                  <th width="30">Status</th>
                  <th width="95">Date</th>                  
                  <th width="10">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($records as $rec) { ?>  
                  <tr>
                    <td><?=$rec->id; ?></td>
                    <td><?=$rec->name; ?></td>
                    <td><?=$rec->vanue; ?></td>
                    <td><?=$rec->event_date; ?></td>
                    <td><?=$rec->event_by; ?></td>
                    <td><?=statusButton($controller,'status',$rec->status,$rec->id); ?></td>
                    <td><?=$rec->last_update ?></td>
                    <td><?=AllowedAction($controller, 'edit', 'delete', 'Sure you want to delete this record ?', $rec->id) ?></td>
                  </tr>
                <?php  } ?>
                </tfoot>
              </table>
            </div>
        </div>
    </section>
  </div>