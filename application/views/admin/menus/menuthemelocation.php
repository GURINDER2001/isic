<?php $controller = $this->uri->segment(2); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>Manage Menu Theme Location</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Menu Theme Location</a></li>
        <li class="active">Menu</li>
      </ol>
    </section>
    <section class="content">
      <?=getNotificationHtml(); ?>
      <div class="box">
          <div class="box-body">
            <form action="<?php echo base_url();?>admin/navmenus/addLocation" method="post">
              <table>
                <tr>
                  <td style="padding:10px">Location Name: <input type="text" name="location_name" required=""></td>
                  <td style="padding:10px"><input type="submit" value="Create" class="btn bg-blue"></td>
                  <td style="padding:10px"><a href="<?php echo base_url();?>admin/navmenus/"><input type="button" value="Go To Menu"></a></td>
              </table>
            </form>
            <br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="10">Id</th>                    
                    <th>Title</th>                    
                    <th>Menu Location</th>                    
                    <th width="10">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($menu_locations)){?>
                    <?php $inc=1;foreach($menu_locations as $m){?>
                  <tr>
                    
                    <td><?=$inc?></td>
                    <td><?=$m['menulocationname'];?></td>
                    <td><?=$m['menulocationid']?></td>
                    
                    <td>
                      <a onclick="return confirm('Sure you want to delete this record ?')" href="<?php echo base_url();?>admin/navmenus/delete/<?=$m['menulocationid']?>" class="btn btn-xs btn-danger"> <i class="fa fa-trash"></i> </a>
                    </td>
                  
                  </tr>
                  <?php $inc++;} ?>
                  <?php } ?>
                
                
                  
                </tbody>
              </table>
            </div>
          </div>
    </section>
</div>