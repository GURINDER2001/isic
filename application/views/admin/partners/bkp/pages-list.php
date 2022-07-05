<?php $controller = $this->uri->segment(2); ?>
 <div class="content-wrapper">
    <section class="content-header">
      <h1>Partners <?=AddButton('add'); ?></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Partners Management</a></li>
        <li class="active">Partners</li>
      </ol>
    </section>
    <section class="content">
      <?php getNotificationHtml(); ?>
      <div class="box">
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="50">Logo</th>
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
                    <td><img src="<?=base_url($rec->featured_img); ?>" width="50"></td>
                    <td><?=$rec->name ?></td>
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