<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Gallery <a href="<?php echo base_url('admin/gallery/add'); ?>" class="btn btn-info btn-flat">Add New</a></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Gallery Management</a></li>
            <li class="active"> Gallery</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="20">ID</th>
                          <th width="100">Type</th>
                          <th>Image</th>
                          <th>Title</th>
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
                          <td><?=!empty($rec->type)?'Video':'Image'; ?></td>
                          <td><img src="<?=!empty($rec->image)?base_url($rec->image):base_url('assets/admin/images/no_image.gif'); ?>" alt="Image" height="50" width="50" /></td>
                          <td><?=!empty($rec->title)?$rec->title:''; ?></td>
                          <td><?=!empty($rec->createdOn)?$rec->createdOn:''; ?></td>
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