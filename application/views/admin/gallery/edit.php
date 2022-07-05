<?php
if(!empty($editdata)) 
{ 
  extract($editdata); 
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Gallery <small>it all starts here</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Gallery Management</a></li>
      <li class="active"> Edit Gallery</li>
    </ol> 
  </section>
  <section class="content">
      <?php getNotificationHtml(); ?>
      <div class="row">
          <div class="col-md-12">
              <div class="box">
                  <div class="box-body pad">
                      <form action="" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                              <label>Title:</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file-text-o"></i>
                                  </div>
                                  <?php echo form_input(array('id' => 'title', 'name' => 'title','class'=>'form-control input-md','placeholder'=>'Title','value' => set_value('title', isset($title)?$title:"" ))); ?>
                              </div>
                              <?php echo form_error('title'); ?>
                          </div>
                          
                          <div class="form-group">
                                <label>Type:</label>
                                <div class="form-check form-switch">
                                  <input class="form-check-input" type="checkbox" name="type" id="is_video" value="1" <?=!empty($type)?'checked="checked"':''; ?>>
                                  <label class="form-check-label" for="is_video">Is this video?</label>
                                </div>
                                <?php echo form_error('type'); ?>
                          </div>
                          
                          <div class="form-group">
                              <label>Image <small>( Will use as video Thumbnail in case of video type )</small>:</label>
                              <div class="input-group">
                                  <div class="input-group-addon">
                                      <i class="fa fa-file"></i>
                                  </div>
                                  <input name="image" type="file" class="form-control pull-right" id="image" onchange="checkPhoto(this)">
                              </div>
                          </div>
                          <div class="form-group" id="blah_container">
                              <img id="blah" src="<?=!empty($image)?base_url($image):base_url('assets/admin/images/no_image.gif'); ?>" alt="User Image" class="img1" />
                          </div>
                          
                          <div id="videoUrlBox" class="form-group" <?=!empty($type)?'style="display:block;"':'style="display:none;"'; ?>>
                              <label>Video Url (YouTube):</label>
                              <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-globe"></i>
                                  </div>
                                  <input type="text" name="video_url" value="<?=set_value('video_url', isset($video_url)?$video_url:"" ); ?>" id="video_url" class="form-control input-md" placeholder="Video Embedded Url">
                              </div>
                              <?php echo form_error('video_url'); ?>
                          </div>

                          <div class="clearfix"></div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
<script type="text/javascript">
    $(document).on('change','#is_video',function(){
        if($(this).is(":checked")){
            $('#videoUrlBox').show();
        }
        else
        {
            $('#videoUrlBox').hide();
        }
    });
</script>
