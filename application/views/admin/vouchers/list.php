<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Vouchers <?=AddButton('add'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Vouchers Management</a></li>
            <li class="active"> Vouchers</li>
        </ol>
    </section>
    <section class="content">
        <?=getNotificationHtml(); ?>
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="5%">ID</th>
                          <th>Title</th>
                          <!--th width="30%">Voucher</th-->
                          <th>Access Url</th>
                          <th width="10%">Date</th>
                          <th width="5%">Status</th>
                          <th width="10%">Action</th>
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
                          <!--td><?=$rec->voucher ?></td-->
                          <td><a href="<?=base_url('dv/'.$rec->slug); ?>" target="_blank"><?=base_url('dv/'.$rec->slug); ?></a></td>
                          <td><?=$rec->last_update ?></td>
                          <td><?=statusButton($controller,'status',$rec->status,$rec->id); ?></td>
                          <td><a href="<?=base_url('admin/vouchers/view/'.$rec->id); ?>" class="btn btn-xs btn-primary"> <i class="fa fa-eye"></i> </a><?=AllowedAction($controller, 'edit', 'delete', 'Sure you want to delete this record ?', $rec->id) ?></td>
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