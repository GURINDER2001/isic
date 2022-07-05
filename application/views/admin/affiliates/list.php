<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>Affiliates Partners <?=AddButton('add'); ?></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Affiliates Management</a></li>
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
                  <th width="5%">Id</th>
                  <th width="10%">Logo</th>
                  <th width="20%">Partner Name</th>
                  <th>Code</th>
                  <th width="5%">Status</th>
                  <th width="12%">Date</th>                  
                  <th width="5%">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($records as $rec) { ?>  
                  <tr>
                    <td><?=$rec->id; ?></td>
                    <td><img id="blah" src="<?=!empty($rec->partner_logo)?base_url($rec->partner_logo):base_url('assets/admin/images/no_image.gif'); ?>" alt="Partner Logo" class="img1" /></td>
                    <td><?=$rec->name; ?></td>
                    <td>
                        <?php
                        $token = base64_encode($rec->id.'-'.$rec->identification_number);
                        $str = '<a href="'.base_url('cards/selection?aftoken='.$token).'" target="_blank"><img src="'.base_url('assets/img/af-logo.png').'" height="100" alt="Button" title="Button"></a>';
                        ?>
                        <div class="col-md-12">
                            <pre><code><?php echo htmlspecialchars($str); ?></code></pre>
                        </div>
                    </td>
                    <td><?=statusButton($controller,'status',$rec->status,$rec->id); ?></td>
                    <td><?=$rec->createdAt ?></td>
                    <td><?=AllowedAction($controller, 'edit', 'delete', 'Sure you want to delete this record ?', $rec->id) ?></td>
                  </tr>
                <?php  } ?>
                </tfoot>
              </table>
            </div>
        </div>
    </section>
  </div>