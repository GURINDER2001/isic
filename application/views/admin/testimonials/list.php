<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Testimonials <a href="<?php echo base_url('admin/testimonials/add'); ?>" class="btn btn-info btn-flat">Add New</a></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Testimonials Management</a></li>
            <li class="active"> Testimonial</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="20">ID</th>
                          <th width="100">Pic</th>
                          <th>Submitter</th>
                          <!--th>Destination</th>
                          <th>Associated</th-->
                          <th>Content</th>
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
                          <td><img src="<?=!empty($rec->user_pic)?base_url($rec->user_pic):base_url('assets/admin/images/no_image.gif'); ?>" alt="Image" height="50" width="50" /></td>
                          <td><?=!empty($rec->username)?$rec->username:''; ?></td>
                          <td><?=!empty($rec->content)?$rec->content:''; ?></td>
                          <!--td><?=!empty($rec->destination)?$rec->destination:''; ?></td>
                          <td><?=!empty($rec->associated_with)?$rec->associated_with:''; ?></td-->
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