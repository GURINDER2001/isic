<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>News <?=AddButton('add'); ?></h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">News Management</a></li>
          <li class="active">News</li>
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
                      <th>Category</th>
                      <th width="50">Status</th>
                      <th width="100">Date</th>
                      <th width="10">Action</th>
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
                      <td><?=getCategoriesName('news_cat',$rec->category); ?></td>                      
                      <td><?=statusButton($controller,'status',$rec->status,$rec->id); ?></td>
                      <td><?=$rec->last_update ?></td>
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