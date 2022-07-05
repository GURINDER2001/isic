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
                            <li class="active">Delivery</li>
                            <li>Review & Payment</li>
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
    <section class="tabs-seation">
        <div class="tab-content">
            <div id="menu3" class="tab-pane fade in active">

                    <section class="about-area ptb-100 delivery-p2">
                        <div class="container-fluid">
                        <form class="form-pr" method="POST" enctype="multipart/form-data">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-md-12 method12">
                                    <div class="col-lg-6 col-md-6 pull-left">
                                        <div class="pay-card-1 method-cs1">
                                            <div class="text">
                                                <h2>Delivery Method</h2>
                                                <?php
                                                if(!empty($affiliate_id) && !empty($affiliate_shipping))
                                                {
                                                    if(array_key_exists('pickup',$affiliate_shipping))
                                                    {
                                                        ?>
                                                        <div class="form-group-n">
                                                            <label for="delivery_option_pickup">
                                                                <input type="radio" name="delivery_option" id="delivery_option_pickup" value="<?=!empty($affiliate_shipping['pickup'])?$affiliate_shipping['pickup']:0; ?>" checked="checked"  /> Personal Pickup (for free) ISIC India Office (IInd Floor, DLF Cyber Greens, Tower C DLF Phase-III, Gurgaon, Haryana-122002)
                                                            </label>
                                                        </div>
                                                        <?php
                                                    }
                                                    if(array_key_exists('delivery',$affiliate_shipping))
                                                    {
                                                        ?>
                                                        <div class="form-group-n">
                                                            <?php $delivery_charge = $this->session->userdata('delivery_charge'); ?>
                                                            <label for="delivery_option_courier"><input type="radio" name="delivery_option" id="delivery_option_courier" value="<?=!empty($affiliate_shipping['delivery'])?$affiliate_shipping['delivery']:$delivery_charge; ?>" /> Courier Service <span class="color-change-n">(+ ₹ <?=!empty($affiliate_shipping['delivery'])?$affiliate_shipping['delivery']:$delivery_charge; ?>)</span></label>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    ?>
                                                    <div class="form-group-n">
                                                        <label for="delivery_option_pickup">
                                                            <input type="radio" name="delivery_option" id="delivery_option_pickup" value="0" checked="checked"  /> Personal Pickup (for free) ISIC India Office (IInd Floor, DLF Cyber Greens, Tower C DLF Phase-III, Gurgaon, Haryana-122002)
                                                        </label>
                                                    </div>
                                                    <div class="form-group-n">
                                                        <?php $delivery_charge = $this->session->userdata('delivery_charge'); ?>
                                                        <label for="delivery_option_courier"><input type="radio" name="delivery_option" id="delivery_option_courier" value="<?=$delivery_charge; ?>" /> Courier Service <span class="color-change-n">(+ ₹ <?=$delivery_charge; ?>)</span></label>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                
                                                
                                                <div class="row mt-5 clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 pull-left"><h2>Promocode / Referral Code</h2></div>
                                                    <div class="col-lg-10 col-md-10 col-sm-12 pull-left">
                                                        <input type="text" id="promocode" name="promocode" class="form-control" placeholder=""/>
                                                        <div id="messagebox"></div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-12 pull-left">
                                                        <input type="button" id="applyPromo" class="btn btn-success btn-lg" value="Apply">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 pull-left">
                                        <div class="pay-card-2 method-cs1">
                                            <div class="text">
                                                <h2>Summary</h2>
        
                                                <div class="sum1">
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
                                                    <div id="summary_table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>ISIC Card</td>
                                                                    <td>₹ <?=$price; ?></td>
                                                                </tr>
                                                                <?php
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
                                                                ?>
                                                                <tr>
                                                                    <td>Postage/Delivery Fee</td>
                                                                    <td>for free</td>
                                                                </tr>
                                                                <?php
                                                                $total = $price + $plastic_card_charge;
                                                                ?>
                                                                <tr class="tab-c1">
                                                                    <td>Total Price Including VAT</td>
                                                                    <td>₹ <?=$total; ?></td>
                                                                </tr>
                                                            </tbody>
                                                    </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center btm12">
                                <div class="card-btn back1">
                                    <a href="<?=base_url('cards/order/personal-details/'.$card_id); ?>" class="default-btn ch1">Back</a>
                                    <input type="submit" name="next" class="default-btn ch2" value="Next">
                                </div>
                            </div>
                        </form>
                </section>
                
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

<script type="text/javascript">
$(document).ready(function(){
    $(document).on('change','input[name="delivery_option"]',function(){
        $('#summary_table').html('Updating...');
        var delivery_option = $("input[name='delivery_option']:checked").val();
        var base_url = $('body').attr('data-url');
        jQuery.ajax({
             type : "post",
             url : base_url+'cards/getAjaxSummary',
             data : {delivery_option : delivery_option},
             success: function(response) {
                $('#summary_table').html(response);
             }
        })
    });
    
    $(document).on('click','#applyPromo',function(){
        var delivery_option = $("input[name='delivery_option']:checked").val();
        var promocode = $("#promocode").val();
        
        var base_url = $('body').attr('data-url');
        jQuery.ajax({
             type : "post",
             dataType : "json",
             url : base_url+'cards/ajaxApplyCoupon',
             data : {promocode:promocode, delivery_option : delivery_option},
             success: function(response) {
                 if(response.error == 0)
                 {
                     $('#summary_table').html(response.summaryHtml);
                     $('#messagebox').html('<div class="alert alert-success">'+response.message+'</div>');
                 }
                 else
                 {
                     $('#messagebox').html('<div class="alert alert-danger">'+response.message+'</div>');
                 }
                
             }
        })
    });
});
</script>