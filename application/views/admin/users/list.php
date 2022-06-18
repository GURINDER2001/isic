<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Users <?=AddButton('add'); ?></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">User Management</a></li>
      <li class="active">Users</li>
    </ol>
  </section>
  <section class="content">
    <?php getNotificationHtml(); ?>
    <div class="box">
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>                  
                <th>Role</th>                                   
                <!-- <th width="50">Verification</th> -->                  
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
                    <td><?=$rec->first_name.' '.$rec->last_name; ?></td>
                    <td><?=$rec->email ?></td>
                    <td><?=($rec->mobile!="")?$rec->mobile:"N/A"; ?></td>
                    <td><?=($rec->role!="")?getRoleName($rec->role):"N/A"; ?></td>                  
                    <!--<td>
                    <?php
                    $Verified = $rec->Verified;
                    $verify_email = $rec->verify_email;
                    $verify_otp = $rec->verify_otp;
                    if($verify_email==1)
                    {
                      ?>
                      <small data-toggle="tooltip" title="Verified email" class="label bg-green"><i class="fa fa-check-square-o"></i> Email</small>
                      <?php
                    }
                    else
                    {
                      ?>
                      <small data-toggle="tooltip" title="Unverified email" class="label bg-red"><i class="fa fa-close"></i> Email</small>
                      <?php
                    }
                    ?>
                    </td> -->
                    <td><?=statusButton($controller,'status',$rec->status,$rec->id); ?></td>
                    <td><?=$rec->created_date ?></td>
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