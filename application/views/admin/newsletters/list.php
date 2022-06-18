<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
  <section class="content-header">
      <h1>Newsletters <?=AddButton('add'); ?></h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Newsletters Management</a></li>
          <li class="active">Newsletters</li>
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
                      <th>Title</th>
                      <th width="50">Status</th>
                      <th width="100">Date</th>
                      <th width="100" align="center">Action</th>
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
                      <td><?=$rec->name ?></td>
                      <td><?=statusButton($controller,'status',$rec->status,$rec->id); ?></td>
                      <td><?=$rec->createdOn ?></td>
                      <td align="center"><?=AllowedAction($controller, 'edit', 'delete', 'Sure you want to delete this record ?', $rec->id) ?>
                      <button id="sendNewsletter" type="button" class="btn btn-xs btn-primary" data-id="<?=$rec->id; ?>"><i class="fa fa-share-square-o" aria-hidden="true"></i></button></td>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Send Newsletter</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="newsletters/send">
          <input type="hidden" id="newsletter_id" name="newsletter_id" value="">
          <div class="box-body">
            <div class="form-group">              
              <div class="col-sm-12">
                <label for="subscriber_recipient" class="control-label">Recipient</label>
                <select id="subscriber_recipient" name="recipient" class="form-control" required="required">
                  <option value="all">All Subscribers</option>
                  <option value="specific">Specific Subscribers</option>
                </select>
              </div>
            </div>
            <div id="specific_subscribers_sections" class="form-group hide">              
              <div class="col-sm-12">
                <label for="specific_subscribers" class="control-label">Specific Subscribers</label>
                <?php echo form_multiselect('specific_subscribers[]', $subscribers, set_value('specific_subscribers',!empty($specific_subscribers)?$specific_subscribers:""),'id="specific_subscribers" class="form-control"'); ?>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
        $(document).on('click','#sendNewsletter',function(){
            var dataId = $(this).attr('data-id');
            $('#newsletter_id').val(dataId);
            $('#modal-default').modal('show');
        });
        $('#subscriber_recipient').change(function(){
          let recipient_type = $(this).val();
          if(recipient_type == 'specific')
          {
              $('#specific_subscribers_sections').removeClass('hide');
          }
          else
          {
              $('#specific_subscribers_sections').addClass('hide');
          }
        });
  });
</script>