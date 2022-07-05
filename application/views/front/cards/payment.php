<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
	<div class="container-fluid">
		<div class="single-banner-item">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-12">
					<div class="banner-content">
						<?php
                        if(!empty($affiliate_id))
                        {
                            if(!empty($affiliate_rec->partner_logo))
                            { 
                                ?>
                                <p style="text-align:center;"><img src="<?=base_url($affiliate_rec->partner_logo); ?>" style="height: auto; width: 300px;"></p>
                                <?php
                            }
                            else
                            {
                                ?>
    						    <h1 class="text-uppercase"><span style="color: #feed01;">Card Ordering </span></h1>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
						    <h1 class="text-uppercase"><span style="color: #feed01;">Card Ordering </span></h1>
                            <?php
                        }
                        ?>
					</div>
				</div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url('assets/img/card-1.jpg'); ?>" alt="image" />
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Main Banner Area -->

<section class="breadcrumbs12">
	<nav aria-label="Breadcrumbs">
		<ul class="breadcrumbs">
			<li class="breadcrumbs__item">
				<a href="/"> <i class="fa fa-home" aria-hidden="true"></i> </a>
			</li>
			<li class="breadcrumbs__item1">
				<a href="<?=base_url('cards'); ?>"> Card </a>
			</li>
			<li class="breadcrumbs__item1">
				<a href="#"> Selection</a>
			</li>
		</ul>
	</nav>
</section>

<?php
if(empty($error))
{
    ?>
    <section class="blog-area bg-f9f9f911 pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo getNotificationHtml();?>
                    <div class="steps-nav">
                        <ul class="nav nav-progress">
                            <li><a href="<?=base_url('cards/selection'); ?>">Card Type</a></li>
                            <li><a href="<?=base_url('cards/personal-details'); ?>">Personal Details</a></li>
                            <!--li><a href="<?=base_url('cards/services'); ?>">Services</a></li-->
                            <li><a href="<?=base_url('cards/services'); ?>">Delivery</a></li>
                            <li class="active">Review & Payment</li>
                            <li>Completion</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $card_id = $this->session->userdata('card_id');
    $cards = $this->session->userdata('cards');
    //pre($cards);
    ?>
    <form class="form-pr" method="POST" enctype="multipart/form-data">
    <section class="tabs-seation">
        <div class="tab-content">
            <div id="menu3" class="tab-pane fade in active card-img12">
                    <section class="about-area ptb-100 delivery-pl">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-12">
                                    <div class="about-img">
                                        <img src="<?=base_url('assets/img/payment-card.jpg'); ?>" alt="image" />
                                    </div>
                                </div>
        
                                <div class="col-lg-6 col-md-6 pull-left">
                                        <div class="pay-card-2 method-cs1">
                                            <div class="text">
                                                <h2>Summary</h2>
                                                <?php
                                                if(!empty($affiliate_id) && !empty($affiliate_cards))
                                                {
                                                    $price = $affiliate_cards[$card_id];
                                                }
                                                else
                                                {
                                                    $price = $cards[$card_id]->price;
                                                }
                                                ?>
                                                <div class="sum1">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>ISIC Card</td>
                                                                <td>₹ <?=$price; ?></td>
                                                            </tr>
                                                            <?php
                                                            $discount_amount = $this->session->userdata('discount_amount');
                                                            if(!empty($discount_amount))
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td>Discount</td>
                                                                    <td> - ₹ <?=$discount_amount; ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            $plastic_card_charge = $this->session->userdata('plastic_card_charge');
                                                            if(!empty($plastic_card_charge))
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td>Plastic Card</td>
                                                                    <td>₹ <?=$plastic_card_charge; ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            $delivery_fee = $this->session->userdata('delivery_option');
                                                            if(!empty($delivery_fee))
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td>Postage/Delivery Fee</td>
                                                                    <td>₹ <?=$delivery_fee; ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td>Pickup from Store</td>
                                                                    <td>for free</td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            $total = ($price - $discount_amount) + $plastic_card_charge + $delivery_fee;
                                                            ?>
                                                            <tr class="tab-c1">
                                                                <td>Total Price Including VAT</td>
                                                                <td>₹ <?=$total; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                                    <h2>Payment Method</h2>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 pull-left">
                                                        <div class="form-group-n">
                                                            <label for="payment_option_netbanking"> <input class="payOption" type="radio" name="payment_option" id="payment_option_creditcard" value="OPTCRDC">Credit Card</label>
                                                        </div>
                                                        <div class="form-group-n">
                                                            <label for="payment_option_netbanking"><input class="payOption" type="radio" name="payment_option" id="payment_option_netbanking" value="OPTNBK">Net Banking </label>
                                                        </div>
                                                        <!--div class="form-group-n">
                                                            <label for="payment_option_mobpayment"><input class="payOption" type="radio" name="payment_option" id="payment_option_mobpayment" value="OPTMOBP">Mobile Payments </label>
                                                        </div>
                                                        <div class="form-group-n">
                                                            <label for="payment_option_wallet"><input class="payOption" type="radio" name="payment_option" id="payment_option_wallet" value="OPTWLT">Wallet </label>
                                                        </div-->
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 pull-left">
                                                        <div class="form-group-n">
                                                            <label for="payment_option_debitcard"> <input class="payOption" type="radio" name="payment_option" id="payment_option_debitcard" value="OPTDBCRD">Debit Card </label>
                                                        </div>
                                                        <!--div class="form-group-n">
                                                            <label for="payment_option_cashcard"><input class="payOption" type="radio" name="payment_option" id="payment_option_cashcard" value="OPTCASHC">Cash Card </label>
                                                        </div>
                                            
                                                        <div class="form-group-n">
                                                            <label for="payment_option_emi"><input class="payOption" type="radio" name="payment_option" id="payment_option_emi" value="OPTEMI">EMI </label>
                                                        </div-->
                                                    </div>
                                                    
                                                    <input type="hidden" id="card_type" name="card_type" class="form-control" value="" readonly="readonly" />
                                                    <input type="hidden" id="data_accept" name="data_accept" class="form-control" readonly="readonly" />
                                                        
                                                    <!--<div class="form-group method">
                                                        
                                                        <h2 class="paym-h1">Payment Method</h2>
                                                        
                                                        <div id="emi_div" style="display: none;">
                                                            <table border="1" width="100%">
                                                                <tr>
                                                                    <td colspan="2">EMI Section</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Emi plan id:</td>
                                                                    <td><input readonly="readonly" type="text" id="emi_plan_id" name="emi_plan_id" class="form-control" value="" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Emi tenure id:</td>
                                                                    <td><input readonly="readonly" type="text" id="emi_tenure_id" name="emi_tenure_id" class="form-control" value="" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Pay Through</td>
                                                                    <td>
                                                                        <select name="emi_banks" id="emi_banks"> </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <div id="emi_duration" class="span12">
                                                                            <span class="span12 content-text emiDetails">EMI Duration</span>
                                                                            <table id="emi_tbl" cellpadding="0" cellspacing="0" border="1"></table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td id="processing_fee" colspan="2"></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <select name="card_name" id="card_name" class="form-control">
                                                                    <option value="">Card Name</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <input type="text" id="card_number" name="card_number" class="form-control" placeholder="Card Number" value="" />
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <input type="text" name="expiry_month" class="form-control" placeholder="Expiry Month (MM)" value="" />
                                                            </div>
                                                            
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <<input type="text" name="expiry_year" class="form-control" placeholder="Expiry Year (YYYY)" value="" />
                                                            </div>
                                                            
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <input type="text" name="cvv_number" class="form-control" placeholder="CVV Number" value="" />
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <input type="text" name="issuing_bank" class="form-control" placeholder="Issuing Bank" value="" />
                                                            </div>
                                                            
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <input type="text" name="mobile_number" class="form-control" placeholder="Mobile Number" value="" />
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <input type="text" name="mm_id" class="form-control" placeholder="MMID" value="" />
                                                            </div>
                                                            
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <input type="text" name="otp" class="form-control" placeholder="OTP" value="" />
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <select name="promo_code" id="promo_code" class="form-control">
                                                                    <option value="">Promotions &amp; Offers</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left">
                                                            <input type="text" class="form-control" placeholder="" />
                                                        </div>
                                            
                                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                                            <div class="card-btn back1">
                                                                <a href="#" class="default-btn ch1">Verify</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                                                <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
                                                    <h2>Note</h2>
                                                    <div class="form-group not-1">
                                                        <textarea name="ordernotes" id="ordernotes" class="form-control" cols="30" rows="3" style="height:81px;" placeholder="Here you can tell us something"></textarea>
                                                    </div>
                                                </div>
        
                                                <div class="col-lg-12 col-md-12 col-sm-12 remember-me-wrap">
                                                    <p style="clear:both;">
                                                        <input type="checkbox" id="tnc" name="tnc" value="1" required="required"/>
                                                        <label for="tnc">I agree with Terms and Conditions for online ordering. *</label>
                                                    </p>
                                                    <input type="hidden" name="tid" id="tid" readonly />
                                                    <input type="hidden" name="merchant_id" value="220241"/>
                                                    <input type="hidden" name="order_id" value="123654789"/>
                            					    <input type="hidden" name="amount" value="10.00"/>
                            					    <input type="hidden" name="currency" value="INR"/>
                            					    <input type="hidden" name="redirect_url" value="http://testxone.com/isic/ccavenue/ccavResponseHandler.php"/>
                            			 		    <input type="hidden" name="cancel_url" value="http://testxone.com/isic/ccavenue/ccavResponseHandler.php"/>
                            					    <input type="hidden" name="language" value="EN"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                </section>
                <section class="about-area ptb-100 delivery-p2">
                    <div class="container-fluid">
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center btm12">
                            <div class="card-btn back1">
                                <a href="<?=base_url('cards/order/delivery'); ?>" class="default-btn ch1">Back</a>
                                <input type="submit" name="next" class="default-btn ch2" value="Proceed to Pay">
                            </div>
                        </div>
                    </div>
                </section>
                </form>
            </div>
        </div>
    </section>
    <?php
}
else
{
    ?>
    <section class="blog-area bg-f9f9f911 pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo getNotificationHtml();?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>
<script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
</script>
<script language="javascript" type="text/javascript" src="<?=base_url('assets/js/json.js'); ?>"></script>
<script type="text/javascript">
$(function(){

 /* json object contains
 	1) payOptType - Will contain payment options allocated to the merchant. Options may include Credit Card, Net Banking, Debit Card, Cash Cards or Mobile Payments.
 	2) cardType - Will contain card type allocated to the merchant. Options may include Credit Card, Net Banking, Debit Card, Cash Cards or Mobile Payments.
 	3) cardName - Will contain name of card. E.g. Visa, MasterCard, American Express or and bank name in case of Net banking. 
 	4) status - Will help in identifying the status of the payment mode. Options may include Active or Down.
 	5) dataAcceptedAt - It tell data accept at CCAvenue or Service provider
 	6)error -  This parameter will enable you to troubleshoot any configuration related issues. It will provide error description.
 */	  
    var jsonData;
    var access_code="AVMN85GE59CE88NMEC" // shared by CCAVENUE 
  var amount="6000.00";
    var currency="INR";
    
  $.ajax({
       url:'https://test.ccavenue.com/transaction/transaction.do?command=getJsonData&access_code='+access_code+'&currency='+currency+'&amount='+amount,
       dataType: 'jsonp',
       jsonp: false,
       jsonpCallback: 'processData',
       success: function (data) { 
             jsonData = data;
             // processData method for reference
             processData(data); 
	 // get Promotion details
             $.each(jsonData, function(index,value) {
		if(value.Promotions != undefined  && value.Promotions !=null){  
			var promotionsArray = $.parseJSON(value.Promotions);
	               	$.each(promotionsArray, function() {
				console.log(this['promoId'] +" "+this['promoCardName']);	
				var	promotions=	"<option value="+this['promoId']+">"
				+this['promoName']+" - "+this['promoPayOptTypeDesc']+"-"+this['promoCardName']+" - "+currency+" "+this['discountValue']+"  "+this['promoType']+"</option>";
				$("#promo_code").find("option:last").after(promotions);
			});
		}
	});
       },
       error: function(xhr, textStatus, errorThrown) {
           alert('An error occurred! ' + ( errorThrown ? errorThrown :xhr.status ));
           //console.log("Error occured");
       }
   	});
   	
   	$(".payOption").click(function(){
   		var paymentOption="";
   		var cardArray="";
   		var payThrough,emiPlanTr;
	    var emiBanksArray,emiPlansArray;
   		
       	paymentOption = $(this).val();
       	$("#card_type").val(paymentOption.replace("OPT",""));
       	$("#card_name").children().remove(); // remove old card names from old one
        $("#card_name").append("<option value=''>Select</option>");
       	$("#emi_div").hide();
       	
       	//console.log(jsonData);
       	$.each(jsonData, function(index,value) {
       		//console.log(value);
        	  if(paymentOption !="OPTEMI"){
            	 if(value.payOpt==paymentOption){
            		cardArray = $.parseJSON(value[paymentOption]);
                	$.each(cardArray, function() {
    	            	$("#card_name").find("option:last").after("<option class='"+this['dataAcceptedAt']+" "+this['status']+"'  value='"+this['cardName']+"'>"+this['cardName']+"</option>");
                	});
                 }
              }
              
              if(paymentOption =="OPTEMI"){
	              if(value.payOpt=="OPTEMI"){
	              	$("#emi_div").show();
	              	$("#card_type").val("CRDC");
	              	$("#data_accept").val("Y");
	              	$("#emi_plan_id").val("");
					$("#emi_tenure_id").val("");
					$("span.emi_fees").hide();
	              	$("#emi_banks").children().remove();
	              	$("#emi_banks").append("<option value=''>Select your Bank</option>");
	              	$("#emi_tbl").children().remove();
	              	
                    emiBanksArray = $.parseJSON(value.EmiBanks);
                    emiPlansArray = $.parseJSON(value.EmiPlans);
                	$.each(emiBanksArray, function() {
    	            	payThrough = "<option value='"+this['planId']+"' class='"+this['BINs']+"' id='"+this['subventionPaidBy']+"' label='"+this['midProcesses']+"'>"+this['gtwName']+"</option>";
    	            	$("#emi_banks").append(payThrough);
                	});
                	
                	emiPlanTr="<tr><td>&nbsp;</td><td>EMI Plan</td><td>Monthly Installments</td><td>Total Cost</td></tr>";
						
                	$.each(emiPlansArray, function() {
	                	emiPlanTr=emiPlanTr+
						"<tr class='tenuremonth "+this['planId']+"' id='"+this['tenureId']+"' style='display: none'>"+
							"<td> <input type='radio' name='emi_plan_radio' id='"+this['tenureMonths']+"' value='"+this['tenureId']+"' class='emi_plan_radio' > </td>"+
							"<td>"+this['tenureMonths']+ "EMIs. <label class='merchant_subvention'>@ <label class='emi_processing_fee_percent'>"+this['processingFeePercent']+"</label>&nbsp;%p.a</label>"+
							"</td>"+
							"<td>"+this['currency']+"&nbsp;"+this['emiAmount'].toFixed(2)+
							"</td>"+
							"<td><label class='currency'>"+this['currency']+"</label>&nbsp;"+ 
								"<label class='emiTotal'>"+this['total'].toFixed(2)+"</label>"+
								"<label class='emi_processing_fee_plan' style='display: none;'>"+this['emiProcessingFee'].toFixed(2)+"</label>"+
								"<label class='planId' style='display: none;'>"+this['planId']+"</label>"+
							"</td>"+
						"</tr>";
					});
					$("#emi_tbl").append(emiPlanTr);
                 } 
              }
       	});
       	
     });

  
  $("#card_name").click(function(){
  	if($(this).find(":selected").hasClass("DOWN")){
  		alert("Selected option is currently unavailable. Select another payment option or try again later.");
  	}
  	if($(this).find(":selected").hasClass("CCAvenue")){
  		$("#data_accept").val("Y");
  	}else{
  		$("#data_accept").val("N");
  	}
  });
      
 // Emi section start      
      $("#emi_banks").live("change",function(){
           if($(this).val() != ""){
           		var cardsProcess="";
           		$("#emi_tbl").show();
           		cardsProcess=$("#emi_banks option:selected").attr("label").split("|");
				$("#card_name").children().remove();
				$("#card_name").append("<option value=''>Select</option>");
			    $.each(cardsProcess,function(index,card){
			        $("#card_name").find("option:last").after("<option class=CCAvenue value='"+card+"' >"+card+"</option>");
			    });
				$("#emi_plan_id").val($(this).val());
				$(".tenuremonth").hide();
				$("."+$(this).val()+"").show();
				$("."+$(this).val()).find("input:radio[name=emi_plan_radio]").first().attr("checked",true);
				$("."+$(this).val()).find("input:radio[name=emi_plan_radio]").first().trigger("click");
				 
				 if($("#emi_banks option:selected").attr("id")=="Customer"){
					$("#processing_fee").show();
				 }else{
					$("#processing_fee").hide();
				 }
				 
			}else{
				$("#emi_plan_id").val("");
				$("#emi_tenure_id").val("");
				$("#emi_tbl").hide();
			}
			
			
			
			$("label.emi_processing_fee_percent").each(function(){
				if($(this).text()==0){
					$(this).closest("tr").find("label.merchant_subvention").hide();
				}
			});
			
	 });
	 
	 $(".emi_plan_radio").live("click",function(){
		var processingFee="";
		$("#emi_tenure_id").val($(this).val());
		processingFee=
				"<span class='emi_fees' >"+
		 			"Processing Fee:"+$(this).closest('tr').find('label.currency').text()+"&nbsp;"+
		 			"<label id='processingFee'>"+$(this).closest('tr').find('label.emi_processing_fee_plan').text()+
		 			"</label><br/>"+
            			"Processing fee will be charged only on the first EMI."+
            	"</span>";
         $("#processing_fee").children().remove();
         $("#processing_fee").append(processingFee);
         
         // If processing fee is 0 then hiding emi_fee span
         if($("#processingFee").text()==0){
         	$(".emi_fees").hide();
         }
		  
	});
	
	
	$("#card_number").focusout(function(){
		/*
		 emi_banks(select box) option class attribute contains two fields either allcards or bin no supported by that emi 
		*/ 
		if($('input[name="payment_option"]:checked').val() == "OPTEMI"){
			if(!($("#emi_banks option:selected").hasClass("allcards"))){
			  if(!$('#emi_banks option:selected').hasClass($(this).val().substring(0,6))){
				  alert("Selected EMI is not available for entered credit card.");
			  }
		   }
	   }
	  
	});
		
		
// Emi section end 		


// below code for reference 

function processData(data){
     var paymentOptions = [];
     var creditCards = [];
     var debitCards = [];
     var netBanks = [];
     var cashCards = [];
     var mobilePayments=[];
     $.each(data, function() {
     	 // this.error shows if any error   	
         console.log(this.error);
          paymentOptions.push(this.payOpt);
          switch(this.payOpt){
            case 'OPTCRDC':
            	var jsonData = this.OPTCRDC;
             	var obj = $.parseJSON(jsonData);
             	$.each(obj, function() {
             		creditCards.push(this['cardName']);
            	});
            break;
            case 'OPTDBCRD':
            	var jsonData = this.OPTDBCRD;
             	var obj = $.parseJSON(jsonData);
             	$.each(obj, function() {
             		debitCards.push(this['cardName']);
            	});
            break;
          	case 'OPTNBK':
              	var jsonData = this.OPTNBK;
                var obj = $.parseJSON(jsonData);
                $.each(obj, function() {
                 	netBanks.push(this['cardName']);
                });
            break;
            
            case 'OPTCASHC':
              var jsonData = this.OPTCASHC;
              var obj =  $.parseJSON(jsonData);
              $.each(obj, function() {
              	cashCards.push(this['cardName']);
              });
             break;
               
              case 'OPTMOBP':
              var jsonData = this.OPTMOBP;
              var obj =  $.parseJSON(jsonData);
              $.each(obj, function() {
              	mobilePayments.push(this['cardName']);
              });
          }
          
        });
       
       //console.log(creditCards);
      // console.log(debitCards);
      // console.log(netBanks);
      // console.log(cashCards);
     //  console.log(mobilePayments);
        
  }
});
</script>