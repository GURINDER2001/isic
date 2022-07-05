<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Subscribers </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Subscribers Management</a></li>
            <li class="active"> Subscriber</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="row mb-5" style="margin-bottom:10px;">
                    <div class="col-md-12">
                        <a href="<?=base_url('admin/subscribers/export'); ?>" class="btn btn-primary pull-right">Export List</a>
                    </div>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="20">ID</th>
                          <th>Email</th>
                          <!--th>Name</th-->
                          <th width="50">Subscription</th>
                          <th width="50">Status</th>
                          <th width="100">Date</th>
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
                          <td><?=!empty($rec->subscriber_email)?$rec->subscriber_email:''; ?></td>
                          <!--td><?=!empty($rec->subscriber_name)?$rec->subscriber_name:''; ?></td-->
                          <td>
                            <a title="Subscription status" href="<?=$controller.'/subscription_status/'.$rec->id; ?>">
                            <?=(!empty($rec->subscription_status) && $rec->subscription_status==1)?'<small class="label bg-green">Subscribed</small>':'<small class="label bg-red">Unsubscribed</small>'; ?>                              
                            </a>
                          </td>
                          <td><?=statusButton($controller,'status',$rec->status,$rec->id); ?></td>
                          <td><?=!empty($rec->createdOn)?$rec->createdOn:''; ?></td>
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