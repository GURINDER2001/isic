<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Partners <?=AddButton('add'); ?></h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Partners Management</a></li>
          <li class="active">Partners</li>
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
                      <th>Logo</th>
                      <th>Name</th>
                      <th>Associated Page</th>
                      <th width="50">Status</th>
                      <th width="100">Date</th>
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
                      <td><img src="<?=base_url(!empty($rec->logo)?$rec->logo:'assets/img/no_photo.png') ?>" height="50" class="img-fluid"></td>
                      <td><?=$rec->name ?></td>
                      <td>
                          <?php
                          $associated_pages = !empty($rec->associated_pages)?explode(",", $rec->associated_pages):array();
                          $pageNameArray = array();
                          if(!empty($associated_pages))
                          {
                              foreach($associated_pages as $pageId)
                              {
                                  if(!empty($partnerPagesOptions[$pageId]))
                                  {
                                      array_push($pageNameArray,$partnerPagesOptions[$pageId]);
                                  }
                              }
                          }
                          echo !empty($pageNameArray)?implode(",", $pageNameArray):'';
                          ?>
                      </td>
                      <td><?=statusButton($controller,'status',$rec->status,$rec->id); ?></td>
                      <td><?=$rec->created_at ?></td>
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