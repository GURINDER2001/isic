<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Questions <?=AddButton('add'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Questions Management</a></li>
            <li class="active"> Question</li>
        </ol>
    </section>
    <section class="content">
        <?php getNotificationHtml(); ?>
        <div class="box">
            <div class="box-body">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="20">ID</th>                          
                          <th>Questions</th>
                          <th width="150">Category</th>
                          <th width="120">Date</th>
                          <th width="50">Status</th>
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
                          <td><?=$rec->question ?></td>
                          <td><?=getCategoryName($rec->category,'questions_cat'); ?></td>
                          <td><?=date('d M, Y h:i A',strtotime($rec->createdOn)); ?></td>
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