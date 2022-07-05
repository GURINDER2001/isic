<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
	<div class="container-fluid">
		<div class="single-banner-item">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-12">
					<div class="banner-content">
						<h1 class="text-uppercase"><span style="color: #feed01;">Online order virtual card </span></h1>
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
                            <li><a href="<?=base_url('cards/services'); ?>">Services</a></li>
                            <li class="active">Summary</li>
                            <li>Payment</li>
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
            <div id="menu3" class="tab-pane fade in active card-img12">
                    <section class="about-area ptb-100 delivery-pl">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-12">
                                    <div class="about-img">
                                        <img src="<?=base_url('assets/img/payment-card.jpg'); ?>" alt="image" />
                                    </div>
                                </div>
        
                                <div class="col-lg-6 col-md-12">
                                    <div class="about-content">
                                        <div class="text">
                                            <h2>Check Your Card</h2>
                                            <p>This is what your virtual card will look like</p>
                                            <p>
                                                Before placing the order please make sure that the information shown at the card preview are correct and your photo has sufficient quality. If you want to correct anything, click on the button
                                                below.
                                            </p>
                                            <div class="card-btn back1">
                                                <a href="<?=base_url('cards/order/personal-details/'.$card_id); ?>" class="default-btn ch1">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
                    <section class="about-area ptb-100 delivery-p2">
                        <div class="container-fluid">
                        <form class="form-pr" method="POST" enctype="multipart/form-data">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-md-12 method12">
                                    <div class="col-lg-6 col-md-6 pull-left">
                                        <div class="pay-card-1 method-cs1">
                                            <div class="text">
                                                <h2>Delivery Method</h2>
                                                    <?php echo $delivery_option = $this->session->userdata('delivery_option'); ?>
                                                    <div class="form-group-n">
                                                        <label for="delivery_option_pickup">
                                                            <input type="radio" name="delivery_option" id="delivery_option_pickup" value="Pickup" <?php if(!empty($delivery_option) && $delivery_option =='Pickup'){ echo 'checked="checked"'; } ?>  /> Personal Pickup (for free) ISIC India Office (IInd Floor, DLF Cyber Greens, Tower C DLF Phase-III, Gurgaon, Haryana-122002)
                                                        </label>
                                                    </div>
                                                    <div class="form-group-n">
                                                        <?php $delivery_charge = $this->session->userdata('delivery_charge'); ?>
                                                        <label for="delivery_option_courier"><input type="radio" name="delivery_option" id="delivery_option_courier" value="Courier" <?php if(!empty($delivery_option) && $delivery_option =='Courier'){ echo 'checked="checked"'; } ?> /> Courier Service <span class="color-change-n">(+ ₹ <?=$delivery_charge; ?>)</span></label>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="col-lg-6 col-md-6 pull-left">
                                        <div class="pay-card-2 method-cs1">
                                            <div class="text">
                                                <h2>Summary</h2>
        
                                                <div class="sum1">
                                                    <table class="table">
                                                        <tbody>
                                                            <?php $price = $cards[$card_id]->price; ?>
                                                            <tr>
                                                                <td>Virtual ISIC card</td>
                                                                <td>₹ <?=$cards[$card_id]->price; ?></td>
                                                            </tr>
                                                            <?php
                                                            $plastic_card_charge = $this->session->userdata('plastic_card_charge');
                                                            if(!empty($plastic_card_charge))
                                                            {
                                                                ?>
                                                                <tr>
                                                                    <td>Plastic card to virtual card</td>
                                                                    <td>₹ <?=$plastic_card_charge; ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            $total = $price + $plastic_card_charge;
                                                            $delivery_option = $this->session->userdata('delivery_option');
                                                            if(!empty($delivery_option) && $delivery_option == 'courier')
                                                            {
                                                                $delivery_charge = $this->session->userdata('delivery_charge');
                                                                ?>
                                                                <tr>
                                                                    <td>Postage/Delivery Fee</td>
                                                                    <td>₹ <?=$delivery_charge; ?></td>
                                                                </tr>
                                                                <?php
                                                                $total = $total + $delivery_charge;
                                                            }
                                                            ?>
                                                            <tr class="tab-c1">
                                                                <td>Total Price Including VAT</td>
                                                                <td>₹ <?=$total; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
        
                                                <h2>Note</h2>
                                                <div class="form-group not-1">
                                                    <textarea name="message" id="message" class="form-control" cols="30" rows="3" style="height:81px;" data-error="Please enter your message"
                                                        placeholder="Here you can tell us something"></textarea>
                                                </div>
        
                                                <div class="col-lg-12 col-md-12 col-sm-12 remember-me-wrap clearfix">
                                                    <p>
                                                        <input type="checkbox" id="tnc" name="tnc" value="1" required="required" />
                                                        <label for="tnc">I agree with Terms and Conditions for online ordering. *</label>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center btm12">
                                <div class="card-btn back1">
                                    <a href="<?=base_url('cards/order/services'); ?>" class="default-btn ch1">Back</a>
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