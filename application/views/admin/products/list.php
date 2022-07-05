<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Products <a href="<?php echo base_url('admin/Products/add'); ?>" class="btn btn-info btn-flat">Add New</a></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Products Management</a></li>
            <li class="active"> Products</li>
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
                          <th width="100">Img</th>
                          <th>Products</th>
                          <th width="200">Price</th>
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
                          <td><img src="<?=!empty($rec->featured_img)?base_url($rec->featured_img):base_url('assets/admin/images/no_image.gif'); ?>" alt="Image" width="75" /></td>
                          <td><?=$rec->name ?></td>
                          <td><?=$rec->price ?></td>
                          <td><?=$rec->last_update ?></td>
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