<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Programs <?=AddButton('add'); ?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Programs Management</a></li>
            <li class="active"> Program</li>
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
                          <th width="50">Img</th>
                          <th>Programs</th>
                          <th>University/College</th>
                          <th>Campus</th>
                          <th width="100">Date</th>
                          <th width="50">Status</th>
                          <th>Action</th>
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
                          <td>
                            <img src="<?=!empty(getCollegeLogo($rec->college_id))?base_url(getCollegeLogo($rec->college_id)):base_url('assets/admin/images/no_image.gif'); ?>" alt="Image" height="50" />
                          </td>
                          <td><?=$rec->name ?></td>
                          <td><?=getCollegeName($rec->college_id); ?></td>
                          <td>
                            <a href="<?=base_url('admin/programs/campus/'.$rec->id); ?>"><i class="fa fa-list" aria-hidden="true"></i> Campus </a>
                            <!-- <a href="http://proeducation.markupdesigns.loc/admin/campus/1"><i class="fa fa-list" aria-hidden="true"></i> Videos </a> -->
                          </td>
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