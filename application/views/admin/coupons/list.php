<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Coupons <?=AddButton('add'); ?> <a href="<?php echo base_url('admin/coupons/bulkadd'); ?>" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add Bulk Coupons</a> <a href="<?php echo base_url('admin/coupons/bulkimport'); ?>" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Import Bulk Coupons</a></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Coupons Management</a></li>
            <li class="active"> Coupons</li>
        </ol>
    </section>
    <section class="content">
        <?=getNotificationHtml(); ?>
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="20">ID</th>
                          <th>Coupon</th>
                          <th>Discount</th>
                          <th>Validity</th>
                          <th width="100">Date</th>
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
                          <td><?=$rec->coupon ?></td>
                          <td><?=(!empty($rec->discount_type) && $rec->discount_type == 'percent')?$rec->discount_value.'%':'₹'.$rec->discount_value; ?></td>
                          <td><?=$rec->valid_upto ?></td>
                          <td><?=$rec->updatedOn ?></td>
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