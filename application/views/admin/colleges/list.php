<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Colleges/University <?=AddButton('add'); ?> <a href="<?=base_url('admin/colleges/import'); ?>" class="btn btn-s-md btn-info"><i class="fa fa-download"></i> &nbsp; Import </a></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Colleges Management</a></li>
      <li class="active">College</li>
    </ol>
  </section>
  <section class="content">
    <?=getNotificationHtml(); ?>
    <div class="box">
        <div class="box-body">
          <table id="example" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>                                
                <!--th width="50">Verification</th-->
                <th>Campuses</th>
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
                    <td><?=$rec->college_name ?></td>
                    <td><?=$rec->college_email ?></td>
                    <td><?=!empty($rec->mobile)?$rec->mobile:"N/A"; ?></td>               
                    <?php
                      $Verified = $rec->Verified;
                      $verify_email = $rec->verify_email;
                      $verify_otp = $rec->verify_otp;
                    ?>
                    <!--td>
                    <?php
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
                    </td-->
                    <td><a href="<?=base_url('admin/campus/'.$rec->id); ?>"><i class="fa fa-list" aria-hidden="true"></i> View </a></td>
                    <td><?=statusButton($controller,'status',$rec->status,$rec->id); ?></td>
                    <td><?=$rec->created_on ?></td>
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