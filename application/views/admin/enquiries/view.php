<?php
if(!empty($data)) 
{ 
  extract($data); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Enquiery : <?=!empty($id)?'#'.$id:''; ?></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Enquiries Management</a></li>
      <li class="active"> View Enquiery</li>
    </ol> 
  </section>
  <section class="content">
      <div class="row">
          <div class="col-md-12">
              <div class="box">                  
                  <div class="box-body no-padding">
                      <div class="row">
                        <?php
                        $college_logo = getCollegeLogo($college_id);
                        if(!empty($college_logo))
                        {
                          ?>
                          <div class="col-md-3">
                            <img src="<?=base_url($college_logo); ?>">
                          </div>
                          <?php
                        }
                        ?>
                        <div class="<?=!empty($college_logo)?'col-md-9':'col-md-12'; ?>">
                          <h2><?=!empty($program_id)?getName($program_id,'programs'):''; ?></h2>
                          <h4><?=!empty($college_id)?getCollegeName($college_id):''; ?></h4>
                        </div>
                      </div>
                      <!-- <table class="table table-striped">
                          <tbody>
                              <tr>
                                  <td><strong>First Name : </strong></td>
                                  <td><?=!empty($first_name)?$first_name:''; ?></td>
                                  <td><strong>Last Name : </strong></td>
                                  <td><?=!empty($last_name)?$last_name:''; ?></td>
                              </tr>
                              <tr>
                                  <td><strong>Email : </strong></td>
                                  <td><?=!empty($email_address)?$email_address:''; ?></td>
                                  <td><strong>Phone : </strong></td>
                                  <td><?=!empty($phonenumber)?$phonenumber:''; ?></td>
                              </tr>
                              <tr>
                                  <td><strong>Gender : </strong></td>
                                  <td><?=!empty($gender)?$gender:''; ?></td>
                                  <td><strong>Year Of Birth : </strong></td>
                                  <td><?=!empty($year_of_birth)?$year_of_birth:''; ?></td>
                              </tr>
                              <tr>
                                  <td><strong>Nationality : </strong></td>
                                  <td><?=!empty($nationality)?getCountryName($nationality):''; ?></td>
                                  <td><strong>Currently Live In : </strong></td>
                                  <td><?=!empty($live_in)?getCountryName($live_in):''; ?></td>
                              </tr>
                              <tr>
                                  <td><strong>Last Study Location : </strong></td>
                                  <td><?=!empty($last_study_location)?getCountryName($last_study_location):''; ?></td>
                                  <td><strong>Highest Education : </strong></td>
                                  <td><?=!empty($highest_education)?$highest_education:''; ?></td>
                              </tr>

                              <tr>
                                  <td><strong>Desired Start : </strong></td>
                                  <td><?=!empty($start_period)?$start_period:''; ?></td>
                              </tr>                            
                          </tbody>
                      </table> -->
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- DIRECT CHAT PRIMARY -->
              <div class="box box-primary direct-chat direct-chat-primary">
                  <div class="box-header with-border">
                      <h3 class="box-title">Communications / Chat</h3>

                      <div class="box-tools pull-right">
                          
                          <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                              <i class="fa fa-comments"></i></button>
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <!-- Conversations are loaded here -->
                      <div class="direct-chat-messages">

                            <!-- Message. Default to the left -->
                            <div class="direct-chat-msg">
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name pull-left"><?=!empty($first_name)?$first_name.' '.$last_name:''; ?></span>
                                    <span class="direct-chat-timestamp pull-right"><?=!empty($createdOn)?date('d M Y h:i A', strtotime($createdOn)):date('d M Y h:i A'); ?></span>
                                </div>
                                <!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="<?=getStudentProfilePic($student_id); ?>" alt="Message User Image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    <?=!empty($question_id)?getQuestionName($question_id):''; ?>
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->

                          <?php
                          //pre($responses);
                          if(!empty($responses))
                          {
                              foreach ($responses as $key => $response)
                              {
                                  if(!empty($response->sender_type) && $response->sender_type=='student')
                                  {
                                      ?>
                                      <!-- Message. Default to the left -->
                                      <div class="direct-chat-msg">
                                          <div class="direct-chat-info clearfix">
                                              <span class="direct-chat-name pull-left"><?=getStudentName($response->sender_id); ?></span>
                                              <span class="direct-chat-timestamp pull-right"><?=!empty($response->createdOn)?date('d M Y h:i A', strtotime($response->createdOn)):date('d M Y h:i A'); ?></span>
                                          </div>
                                          <!-- /.direct-chat-info -->
                                          <img class="direct-chat-img" src="<?=getStudentProfilePic($response->sender_id); ?>" alt="Student Image">
                                          <!-- /.direct-chat-img -->
                                          <div class="direct-chat-text">
                                              <?=!empty($response->response_content)?$response->response_content:''; ?>
                                          </div>
                                          <!-- /.direct-chat-text -->
                                      </div>
                                      <!-- /.direct-chat-msg -->
                                      <?php
                                  }
                                  else
                                  {
                                      ?>
                                      <!-- Message to the right -->
                                      <div class="direct-chat-msg right">
                                          <div class="direct-chat-info clearfix">
                                              <span class="direct-chat-name pull-right">
                                                <?=!empty($response->sender_id)?getCollegeStaffNameById($response->sender_id):getCollegeName($college_id); ?>                                                  
                                              </span>
                                              <span class="direct-chat-timestamp pull-left"><?=!empty($response->createdOn)?date('d M Y h:i A', strtotime($response->createdOn)):date('d M Y h:i A'); ?></span>
                                          </div>
                                          <!-- /.direct-chat-info -->
                                          <img class="direct-chat-img" src="<?=!empty($response->sender_id)?getCollegeStaffPicById($response->sender_id):getCollegeLogoUrl($college_id); ?>" alt="Staff Image">
                                          <div class="direct-chat-text">
                                             <?=!empty($response->response_content)?$response->response_content:''; ?>
                                          </div>
                                          <!-- /.direct-chat-text -->
                                      </div>
                                      <!-- /.direct-chat-msg -->
                                      <?php
                                  }                                
                              }
                          }
                          ?>
                      </div>
                      <!--/.direct-chat-messages-->

                      <!-- Contacts are loaded here -->
                      <div class="direct-chat-contacts">
                          <ul class="contacts-list">
                              <li>
                                  <div class="contacts-list-info">
                                      <span class="contacts-list-name">
                                        <small class="contacts-list-date pull-right"><?=!empty($createdOn)?date('d M Y h:i A', strtotime($createdOn)):date('d M Y h:i A'); ?></small>
                                      </span>
                                      <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td><strong>First Name : </strong></td>
                                                <td><?=!empty($first_name)?$first_name:''; ?></td>
                                                <td><strong>Last Name : </strong></td>
                                                <td><?=!empty($last_name)?$last_name:''; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email : </strong></td>
                                                <td><?=!empty($email_address)?$email_address:''; ?></td>
                                                <td><strong>Phone : </strong></td>
                                                <td><?=!empty($phonenumber)?$phonenumber:''; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Gender : </strong></td>
                                                <td><?=!empty($gender)?$gender:''; ?></td>
                                                <td><strong>Year Of Birth : </strong></td>
                                                <td><?=!empty($year_of_birth)?$year_of_birth:''; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nationality : </strong></td>
                                                <td><?=!empty($nationality)?getCountryName($nationality):''; ?></td>
                                                <td><strong>Currently Live In : </strong></td>
                                                <td><?=!empty($live_in)?getCountryName($live_in):''; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Last Study Location : </strong></td>
                                                <td><?=!empty($last_study_location)?getCountryName($last_study_location):''; ?></td>
                                                <td><strong>Highest Education : </strong></td>
                                                <td><?=!empty($highest_education)?$highest_education:''; ?></td>
                                            </tr>

                                            <tr>
                                                <td><strong>Desired Start : </strong></td>
                                                <td><?=!empty($start_period)?$start_period:''; ?></td>
                                                <td></td>
                                                <td></td>
                                                <!-- <td><strong>Status : </strong></td>
                                                <td><?=!empty($status)?'<label class="label label-success">Active</label>':'<label class="label label-warning">Deactivate</label>'; ?></td> -->
                                            </tr>                            
                                        </tbody>
                                    </table>
                                  </div>
                              </li>
                              <!-- End Contact Item -->
                          </ul>
                          <!-- /.contatcts-list -->
                      </div>
                      <!-- /.direct-chat-pane -->
                  </div>
                  <!-- /.box-body -->
                  <?php
                  /*if(!empty($status) && $status==1)
                  {
                    ?>
                    <div class="box-footer">
                        <form action="#" method="post">
                            <div class="input-group">
                                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                  </span>
                            </div>
                        </form>
                    </div>
                    <?php
                  }*/
                  ?>
              </div>
              <!--/.direct-chat -->

              <table class="table table-striped">
                  <tbody>
                      <tr>
                          <td><strong>First Name : </strong></td>
                          <td><?=!empty($first_name)?$first_name:''; ?></td>
                          <td><strong>Last Name : </strong></td>
                          <td><?=!empty($last_name)?$last_name:''; ?></td>
                      </tr>
                      <tr>
                          <td><strong>Email : </strong></td>
                          <td><?=!empty($email_address)?$email_address:''; ?></td>
                          <td><strong>Phone : </strong></td>
                          <td><?=!empty($phonenumber)?$phonenumber:''; ?></td>
                      </tr>
                      <tr>
                          <td><strong>Gender : </strong></td>
                          <td><?=!empty($gender)?$gender:''; ?></td>
                          <td><strong>Year Of Birth : </strong></td>
                          <td><?=!empty($year_of_birth)?$year_of_birth:''; ?></td>
                      </tr>
                      <tr>
                          <td><strong>Nationality : </strong></td>
                          <td><?=!empty($nationality)?getCountryName($nationality):''; ?></td>
                          <td><strong>Currently Live In : </strong></td>
                          <td><?=!empty($live_in)?getCountryName($live_in):''; ?></td>
                      </tr>
                      <tr>
                          <td><strong>Last Study Location : </strong></td>
                          <td><?=!empty($last_study_location)?getCountryName($last_study_location):''; ?></td>
                          <td><strong>Highest Education : </strong></td>
                          <td><?=!empty($highest_education)?$highest_education:''; ?></td>
                      </tr>

                      <tr>
                          <td><strong>Desired Start : </strong></td>
                          <td><?=!empty($start_period)?$start_period:''; ?></td>
                      </tr>                            
                  </tbody>
              </table>
          </div>
      </div>
  </section>
</div>