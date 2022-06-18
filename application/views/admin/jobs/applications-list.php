<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>Job Applications</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Jobs Management</a></li>
        <li class="active">Job Applications</li>
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
                  <th>Aplicant</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Job Title</th>
                  <th width="30">Resume</th>
                  <th width="95">Date</th>                  
                  <th width="10">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($records as $rec)
                {
                  ?>  
                  <tr>
                    <td><?=$rec->id; ?></td>
                    <td><?=$rec->firstname.' '.$rec->lastname; ?></td>
                    <td><?=$rec->email; ?></td>
                    <td><?=$rec->phonenumber; ?></td>
                    <td><?=getJobTitle($rec->job_id); ?></td>      
                    <td><a href="<?=base_url($rec->resume); ?>" class="btn btn-xs btn-primary" target="_blank"> <i class="fa fa-download"></i> Download </a></td>
                    <td><?=$rec->submitOn ?></td>
                    <td>
                      <a href="javascript:;" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-viewapp-<?=$rec->id; ?>"> <i class="fa fa-eye"></i></a>
                      <div class="modal fade" id="modal-viewapp-<?=$rec->id; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title"><strong>View Job Application : </strong><?=getJobTitle($rec->job_id); ?></h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped">
                                  <tbody>
                                      <tr>
                                        <td><strong>First Name : </strong></td>
                                        <td><?=!empty($rec->firstname)?$rec->firstname:''; ?></td>
                                      </tr>

                                      <tr>
                                        <td><strong>Last Name : </strong></td>
                                        <td><?=!empty($rec->lastname)?$rec->lastname:''; ?></td>
                                      </tr>

                                      <tr>
                                        <td><strong>Email : </strong></td>
                                        <td><?=!empty($rec->email)?$rec->email:''; ?></td>
                                      </tr>

                                      <tr>
                                        <td><strong>Phone Number : </strong></td>
                                        <td><?=!empty($rec->phonenumber)?$rec->phonenumber:''; ?></td>
                                      </tr>

                                      <tr>
                                        <td><strong>Cover Letter : </strong></td>
                                        <td><?=!empty($rec->cover_letter)?$rec->cover_letter:''; ?></td>
                                      </tr>

                                      <tr>
                                        <td><strong>Have you worked in sales before? : </strong></td>
                                        <td><?=!empty($rec->worked_in_sales)?$rec->worked_in_sales:''; ?></td>
                                      </tr>

                                      <tr>
                                        <td><strong>Do you have a bachelor's or master's degree? : </strong></td>
                                        <td><?=!empty($rec->have_you_degree)?$rec->have_you_degree:''; ?></td>
                                      </tr>

                                      <tr>
                                        <td><strong>Do you live in the Oslo area? : </strong></td>
                                        <td><?=!empty($rec->live_in_oslo)?$rec->live_in_oslo:''; ?></td>
                                      </tr>

                                      <tr>
                                        <td><strong>If you don't live in the Oslo area, do you plan on moving here? : </strong></td>
                                        <td><?=!empty($rec->ready_to_relocate)?$rec->ready_to_relocate:''; ?></td>
                                      </tr>
                                  </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php
                }
                ?>
                </tfoot>
              </table>
            </div>
        </div>

    </section>
  </div>