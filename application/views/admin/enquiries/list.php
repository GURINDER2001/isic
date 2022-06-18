<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Enquiries</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Enquiries Management</a></li>
            <li class="active"> Enquiry</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="20">ID</th>
                          <th>Enquirer</th>
                          <th>Program</th>
                          <th>Question</th>
                          <th width="100">Date</th>
                          <th width="20">Action</th>
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
                          <td><?=!empty($rec->first_name)?$rec->first_name.' '.$rec->last_name:''; ?></td>
                          <td><?=!empty($rec->program_id)?getName($rec->program_id,'programs'):''; ?></td>
                          <td><?=!empty($rec->question_id)?getQuestionById($rec->question_id):''; ?></td>
                          <td><?=!empty($rec->createdOn)?$rec->createdOn:''; ?></td>
                          <td>
                            <a href="<?=base_url('admin/'.$controller.'/view/'.$rec->id); ?>" class="btn btn-xs btn-primary">
                              <i class="fa fa-eye"></i>
                            </a>
                            <!--a onclick="return confirm('Sure you want to delete this record ?')" href="<?=base_url('admin/'.$controller.'/delete/'.$rec->id); ?>" class="btn btn-xs btn-danger">
                              <i class="fa fa-trash"></i>
                            </a-->
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