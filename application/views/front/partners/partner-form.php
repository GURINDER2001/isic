<form id="contact_frm_partner" action="" method="POST" class="form-pr app-form1">
   <div class="col-lg-12"><h2 class="title">Enquiry</h2></div>
    <div id="message" class="col-lg-12"></div>
    <div class="row align-items-center">
        <div class="form-group">
            <div class="col-lg-12 col-md-12 col-sm-12 pull-left"><input type="text" id="business_name" name="business_name" class="form-control" placeholder="Name of Company/Business *" required="required" /></div>
        </div>
        <div class="form-group">
            <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
                <input type="text" id="type_of_business" name="type_of_business" class="form-control" placeholder="Type of Business*" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
                <input type="text" id="contact_person" name="contact_person" class="form-control" placeholder="Contact Person*" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
                <input type="text" id="mobile_number" name="mobile_number" class="form-control" placeholder="Mobile Number*" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
                <input type="text" id="email_id" name="email_id" class="form-control" placeholder="E-mail*" required="required"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
                <textarea name="message" id="message" name="message" class="form-control" id="message" cols="30" rows="6" required data-error="Please enter your message" placeholder="Message*"></textarea>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <div class="card-btn back1">
                <button id="partner_frm_btn" class="default-btn ch1">Submit</button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
jQuery(document).ready( function() {
   jQuery(document).on('submit','#contact_frm_partner', function(e) {
      e.preventDefault();
      $('#partner_frm_btn').html('Sending...');
      jQuery.ajax({
         type : "post",
         dataType : "json",
         url : '<?=base_url('partners/ajaxContact'); ?>',
         data : $('#contact_frm_partner').serialize(),
         success: function(response) {
            if(response.type == "success") {
               jQuery("#message").html('<div class="alert alert-success">'+response.message+'</div>');
               $('#contact_frm_partner').find("input[type=text], textarea").val("");
            }
            else {
               jQuery("#message").html('<div class="alert alert-danger">'+response.message+'</div>');
            }
            $('#partner_frm_btn').html('Submit');
         }
      })   

   })

})
</script>