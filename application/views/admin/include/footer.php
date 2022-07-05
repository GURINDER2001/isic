<div class="control-sidebar-bg"></div>
</div>

<div id="jlightbox" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
</div>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/fastclick/fastclick.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/admin/js/app.min.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/chartjs/Chart.min.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/admin/js/demo.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/select2/select2.full.min.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/admin/js/custom.js'); ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>

<script type="text/javascript">

$(function() {

  //Initialize Select2 Elements
  $('.select2').select2()
	
	$('#example').dataTable( {
      "sPaginationType": "full_numbers",
      "order":[],
      "aaSorting": []
    } );

    $("#example1").DataTable();
});
$(function() {
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	//CKEDITOR.replace('information')
});
</script>
</body>
</html>