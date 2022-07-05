<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>Brands <?=AddButton('add'); ?></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Brands Management</a></li>
        <li class="active">Brand</li>
      </ol>
    </section>
    <section class="content">
      <?=getNotificationHtml(); ?>
      <div class="box">
        <div class="box-body">
          <table id="example" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th width="30">ID</th>
              <th width="100">Brand Logo</th>
              <th>Brand Name</th>
              <th>Url</th>
              <th width="50">Status</th>
              <th width="100">Date</th>                  
              <th width="100">Action</th>
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
                  <td><?=$rec->id; ?></td>
                  <td><img src="<?=!empty($rec->logo)?base_url($rec->logo):base_url('assets/admin/images/no_image.gif'); ?>" alt="Image" width="80" /></td>
                  <td><?=$rec->name; ?></td>
                  <td><?=$rec->domain; ?></td>
                  <td><?=statusButton($controller,'status',$rec->status,$rec->id); ?></td>
                  <td><?=$rec->last_update ?></td>                  
                  <td><?=AllowedAction($controller, 'edit', 'delete', 'Sure you want to delete this record ?', $rec->id) ?></td>
                </tr>
                <?php
              }
            }            
            ?>
            </tfoot>
          </table>
        </div>
      </div>
    </section>
</div>