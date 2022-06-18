<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Top Schools <?=AddButton('add'); ?></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Schools Management</a></li>
      <li class="active">Top Schools</li>
    </ol>
  </section>
  <section class="content">
    <?=getNotificationHtml(); ?>
    <div class="box">
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="20">Id</th>
                <th>School</th>
                <th>Associated Categories</th>
                <th width="50">status</th> 
                <th width="100">Date</th>                  
                <th width="50">Action</th>
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
                    <td><?=getCollegeName($rec->college_id); ?></td>
                    <td>
                    <?php
                    if(!empty($rec->associated_categories))
                    {
                      echo getProgramsCatsCollections($rec->associated_categories);
                    }
                    ?>
                    </td>
                    <td><?=statusButton($controller,'status',$rec->status,$rec->id); ?></td>
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