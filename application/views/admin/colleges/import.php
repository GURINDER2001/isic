<?php
if(!empty($editdata)) 
{ 
    extract($editdata); 
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Imports Colleges <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Colleges Management</a></li>
            <li class="active">Import Colleges</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div id="messagebox"></div>
                <div class="box">
                    <div class="box-body pad">
                        <form method="post" id="import_csv" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <input type="file" name="csv_file" id="csv_file" class="form-control pull-right" required="required" accept=".csv">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="form-group">
                                    <button type="submit" name="import_csv" id="import_csv_btn" class="btn btn-primary pull-right">Import Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="imported_csv_data" class="row"></div>
    </section>
</div>
<script>
$(document).ready(function(){

    //load_data();

    function load_data()
    {
        $.ajax({
            url:"<?php echo base_url('admin/colleges/load_import'); ?>",
            method:"POST",
            success:function(data)
            {
                $('#imported_csv_data').html(data);
            }
        })
    }

    $('#import_csv').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url('admin/colleges/importing'); ?>",
            method:"POST",
            data:new FormData(this),
            dataType : "json",
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
                $('#messagebox').html('');
                $('#import_csv_btn').html('Importing...');
            },
            success:function(data)
            {
                $('#import_csv')[0].reset();
                $('#import_csv_btn').attr('disabled', false);
                $('#import_csv_btn').html('Import Data');
                //load_data();
                if(data.error == 1)
                {
                    $('#messagebox').html('<div class="alert alert-danger"><a href="#" data-dismiss="alert" aria-label="close" title="close" class="close">×</a>'+data.message+'</div>');
                }
                else
                {
                    $('#messagebox').html('<div class="alert alert-success"><a href="#" data-dismiss="alert" aria-label="close" title="close" class="close">×</a>'+data.message+'</div>');
                }

            }
        })
    });
    
});
</script>