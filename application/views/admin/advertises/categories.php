<?php $controller = $this->uri->segment(2).'/'.$this->uri->segment(3); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Program Categories <?=AddButton('category/add'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Categories Management</a></li>
            <li class="active"> Category</li>
        </ol>
    </section>
    <section class="content">
        <?=getNotificationHtml(); ?>
        <div class="box">
            <div class="box-body">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="20">ID</th>
                          <th>Program Category</th>
                          <th width="50">Popular</th>
                          <th width="120">Date</th>
                          <th width="50">Status</th>
                          <th width="10">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    //pre($records);
                    if(!empty($records))
                    {
                      foreach ($records as $rec)
                      {
                        ?>
                        <tr>
                            <td class="hidden-xs"><?=$rec['id']; ?></td>
                            <td><?=$rec['name'];?></td>
                            <td align="center">
                              <a href="<?=base_url($this->uri->segment(1).'/'.$controller.'/popular/'.$rec['id']) ?>">
                                <?=!empty($rec['is_popular'])?'<i class="fa fa-star fa-lg"></i>':'<i class="fa fa-star-o fa-lg"></i>'; ?>
                              </a>
                            </td>
                            <td class="hidden-xs"><?=date('d M, Y h:i A',strtotime($rec['createdOn'])); ?></td>
                            <td><?=statusButton($controller,'status',$rec['status'],$rec['id']); ?></td>
                           <td><?=AllowedAction($controller, 'edit', 'delete', 'Sure you want to delete this record ?', $rec['id']) ?></td>
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