<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>Orders</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Orders Management</a></li>
        <li class="active">Orders</li>
      </ol>
    </section>
    <section class="content">
      <?=getNotificationHtml(); ?>
        <div class="box">
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">Id</th>
                  <th width="20%">User Name</th>
                  <th>Card Name</th>
                  <th>Paid Amount</th>
                  <th>Payment Status</th>
                  <th>Affiliate</th>
                  <th width="5%">Status</th>
                  <th width="12%">Date</th>                  
                  <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($records as $rec) { ?>  
                  <tr>
                    <td><?=$rec->id; ?></td>
                    <td><?=$rec->user_fname.' '.$rec->user_lname; ?></td>
                    <td><?=$rec->card_name; ?></td>
                    <td><?='₹'.$rec->total_order_amount; ?></td>
                    <td><?=$rec->payment_status; ?></td>
                    <td><?=!empty($rec->affiliate)?getAffiliateName($rec->affiliate):''; ?></td>
                    <td><?=orderStatusButton($rec->order_status); ?></td>
                    <td><?=$rec->order_date ?></td>
                    <td>
                        <a href="<?=base_url('admin/orders/view/'.$rec->id); ?>" class="btn btn-xs btn-primary"> <i class="fa fa-eye"></i> </a>
                        <?=AllowedAction($controller, 'edit', 'delete', 'Sure you want to delete this record ?', $rec->id) ?>
                    </td>
                  </tr>
                <?php  } ?>
                </tfoot>
              </table>
            </div>
        </div>
    </section>
  </div>