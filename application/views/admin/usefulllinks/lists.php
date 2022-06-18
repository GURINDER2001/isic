<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Usefull Links <?=AddButton('add'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Usefull Links</li>
        </ol>
    </section>
    <section class="content">
        <?=getNotificationHtml(); ?>
        <div class="box">
            <div class="box-body">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="20">ID</th>
                          <th width="30%">Link Caption</th>
                          <th>Link</th>
                          <th width="40">Action</th>
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
                            <td><?=$rec['name'];?></td>
                            <td><?=$rec['url'];?></td>                            
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