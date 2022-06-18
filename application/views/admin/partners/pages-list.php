<?php $controller = $this->uri->segment(2); ?>
 <div class="content-wrapper">
    <section class="content-header">
      <h1>Partner Pages <?=AddButton('addpage'); ?></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Partners Management</a></li>
        <li class="active">Partner Pages </li>
      </ol>
    </section>
    <section class="content">
      <?php getNotificationHtml(); ?>
      <div class="box">
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Title</th>
                <th width="100">Status</th>
                <th width="100">Action</th>
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
                    <td><?=$rec->name ?></td>
                    <td><?=statusButton($controller,'statuspage',$rec->status,$rec->id); ?></td>
                    <td><?=AllowedAction($controller, 'editpage', 'deletepage', 'Sure you want to delete this record ?', $rec->id) ?></td>
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