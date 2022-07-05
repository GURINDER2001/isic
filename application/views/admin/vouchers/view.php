<?php
if(!empty($rec)) 
{ 
  extract($rec); 
}
?>
<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>View Voucher</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Vouchers Management</a></li>
            <li class="active"> View Voucher</li>
        </ol>
    </section>
    <section class="content">
        <?=getNotificationHtml(); ?>
        <div class="box">
            <div class="box-body">
                
                <h3><?=$name ?></h3>
                <p><a href="<?=base_url('dv/'.$slug); ?>" target="_blank"><?=base_url('dv/'.$slug); ?></a></p>
                <hr>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>Voucher Code</th>
                          <th>Anyone Viewed?</th>
                          <th>View Counts</th
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(!empty($vouchers_logs))
                    {
                      foreach ($vouchers_logs as $rec)
                      {
                        ?>
                        <tr>
                          <td><?=$rec['voucher']; ?></td>
                          <td><?=!empty($rec['is_viewed'])?'<span class="badge badge-success"><i class="fa fa-check-square-o" aria-hidden="true"></i> Yes</span>':'<span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i> No</span>'; ?></td>
                          <td><?=!empty($rec['view_count'])?$rec['view_count']:0; ?></td>
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