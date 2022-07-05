<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>Page <?=AddButton('add'); ?></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">CMS Management</a></li>
        <li class="active">Page</li>
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
                    <th width="120">Date</th>
                    <th width="10">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    //pre($records);
                    if(!empty($records))
                    {
                      foreach ($records as $rec)
                      {
                        ?>
                        <tr>
                            <td class="hidden-xs"><?=$rec['id']; ?></td>
                            <td><a href="<?=base_url($rec['slug']); ?>" target="_blank"><?=$rec['name'];?></a></td>
                            <td class="hidden-xs"><?=date('d M, Y h:i A',strtotime($rec['last_update'])); ?></td>
                           <td><?=AllowedAction($controller, 'edit', 'delete', 'Sure you want to delete this record ?', $rec['id']) ?></td>
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