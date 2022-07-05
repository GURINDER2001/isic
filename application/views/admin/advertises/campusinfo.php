<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Campus Based Program Info <?=AddButton('campus/add/'.$program_id); ?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Campus Based Program Info</a></li>
            <li class="active"> Program</li>
        </ol>
    </section>
    <section class="content">
        <?=getNotificationHtml(); ?>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?=!empty($program_id)?getProgramName($program_id):'All Programs'; ?></h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="20">ID</th>
                          <th colspan="2">University/College</th>
                          <!-- <th>Programs</th> -->
                          <th>Campus Location</th>
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
                          <td><?=$rec->pid ?></td>
                          <td>
                            <img src="<?=!empty(getCollegeLogo($rec->college_id))?base_url(getCollegeLogo($rec->college_id)):base_url('assets/admin/images/no_image.gif'); ?>" alt="Image" height="50" />
                          </td>
                          <td><?=getCollegeName($rec->college_id); ?></td>
                          <!-- <td><?=getProgramName($rec->program_id) ?></td> -->
                          <td><?=$rec->location; ?></td>
                          <td><?=$rec->last_update ?></td>
                          <td>
                            <a title="Change record status" href="<?=base_url('admin/programs/campus/status/'.$rec->program_id.'/'.$rec->pid); ?>">
                                <small class="label <?=!empty($rec->pstatus)?'bg-green':'bg-red'; ?>"><?=!empty($rec->pstatus)?'Active':'Inactive'; ?></small>
                            </a>
                          </td>
                          <td>
                            <a href="<?=base_url('admin/programs/campus/edit/'.$rec->program_id.'/'.$rec->pid); ?>" class="btn btn-xs btn-success"> <i class="fa fa-pencil"></i> </a>
                            <a onclick="return confirm('Sure you want to delete this record ?')" href="<?=base_url('admin/programs/campus/delete/'.$rec->program_id.'/'.$rec->pid); ?>" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> </a>
                          </td>
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