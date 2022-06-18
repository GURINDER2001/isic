<?php
if(!empty($editdata)) 
{  
    extract($editdata); 
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit E-mail Templates <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">E-mail Templates Management</a></li>
            <li class="active">Edit E-mail Templates</li>
        </ol>
    </section>
    <section class="content">
        <?=getNotificationHtml(); ?>

        <?php 
        if(file_exists( $path.$filename))
        {
          $html = @file_get_contents( $path.$filename );
          $nodes = extract_tags( $html, 'table' );
          if(!empty($nodes[0]['attributes']['template']))
          {
              $name = $nodes[0]['attributes']['template'];
          }
          else
          {
            $name = str_replace('.html','',str_replace('.php','', $filename));
          }
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo (!empty($name))?$name:$filename; ?></h3>
                    </div>
                    <div class="box-body pad">                        
                        <?php 
                        if(file_exists( $path.$filename))
                        {
                          ?>
                          <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Template Content:</label>
                                <textarea id="code2" class="ckeditor form-control" name="code" style="height: 1000px;"><?php echo @file_get_contents($path.$filename);?></textarea>
                            </div>

                            <div class="clearfix"></div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                        <?php
                      }
                      else
                      {
                        ?>
                          File not found
                        <?php
                      }
                      ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>