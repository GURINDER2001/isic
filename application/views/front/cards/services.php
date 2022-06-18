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
                            <li class="active">Services</li>
                            <li>Delivery</li>
                            <li>Review & Payment</li>
                            <li>Completion</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tabs-seation">
        <div class="tab-content">
            <div id="menu2" class="tab-pane fade in active card-img12">
                <div class="section-title card-pl1">
                    <h2>Plastic card to virtual card</h2>
                </div>
                <div class="container">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="ser1">
                            <p>
                                <?php $plastic_card_charge = $this->session->userdata('plastic_card_charge'); ?>
                                <input type="checkbox" id="plastic_card_charge" name="plastic_card_charge" value="118" <?=!empty($plastic_card_charge)?'checked="checked"':''; ?>/>
                                <label for="plastic_card_charge"> I want a plastic card in addition to my virtual card (+ ₹ 118)</label>
                            </p>
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="card-btn back1">
                                    <?php $id = $this->session->userdata('card_id'); ?>
                                    <a href="<?=base_url('cards/order/personal-details/'.$id); ?>" class="default-btn ch1">Back</a>
                                    <input type="submit" name="next" class="default-btn ch2" value="Next">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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