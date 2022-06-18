<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>E-mail Templates</h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">E-mail Template Management</a></li>
          <li class="active">E-mail Template</li>
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
                      <th>Email Template</th>
                      <th width="10">Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                if(!empty($file_list))
                {
                  $inc=1;
                  foreach($file_list as $key => $list)
                  {
                    ?>
                      <tr>
                        <td><?=$inc; ?></td>
                        <td><?=$list; ?></td>
                        <td><a href="<?=base_url('admin/email/edit/'.$key) ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a></td>
                      </tr>
                    <?php
                    $inc++;
                  }
                }
                ?>
              </tbody>
          </table>
        </div>
    </div>
  </section>
</div>