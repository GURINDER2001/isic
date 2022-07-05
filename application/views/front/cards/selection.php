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
                            //pre($affiliate_rec);
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
    <section class="blog-area bg-f9f9f911 pt-20 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo getNotificationHtml();?>
                    
                    <div class="steps-nav">
                        <ul class="nav nav-progress">
                            <li class="active">Card Type</li>
                            <li>Personal Details</li>
                            <li>Services</li>
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
            <div id="home" class="tab-pane fade in active card-img12">
                <div class="section-title">
                    <h2>Card Ordering</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <?php
                        //pre($records);
                        if(!empty($records))
                        {
                            if(!empty($affiliate_id) && !empty($affiliate_cards))
                            {
                                foreach($records as $record)
                                { 
                                    if(array_key_exists($record->id,$affiliate_cards))
                                    {
                                    ?>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="box-card">
                                            <div class="img-card">
                                                <?php
                                                if(!empty($record->id) && $record->id == 1)
                                                {
                                                    $imgUrl = base_url('assets/img/cards/card1.jpg');
                                                }
                                                elseif(!empty($record->id) && $record->id == 2)
                                                {
                                                    $imgUrl = base_url('assets/img/cards/card2.jpg');
                                                }
                                                elseif(!empty($record->id) && $record->id == 3)
                                                {
                                                    $imgUrl = base_url('assets/img/cards/card3.jpg');
                                                }
                                                else
                                                {
                                                    $imgUrl = base_url('assets/img/card-selection-2.jpg');
                                                }
                                                ?>
                                                <img src="<?=$imgUrl; ?>" />
                                            </div>
                                            <div class="text-box">
                                                <h2><?=!empty($record->card_title)?$record->card_title:''; ?></h2>
                                                <p>The only globally recognized Student ID for students currently studying full-time at High school, College or University.</p>
                                                <h3>Requirements for issuing:</h3>
                
                                                <ul class="text-ul-box">
                                                    <li>Passport style photo</li>
                                                    <li>Applicant over 6 years of age - scan or photograph of the applicant's identity card (ID card or passport)</li>
                                                    <li>
                                                        Applicant under the age of 6 - scan or photograph of the applicant's identity card (ID card, passport, insurance card or birth certificate) and his/her legal representative’s identity card (ID
                                                        card or passport)
                                                    </li>
                                                    <li>Confirmation of student status (less than 2 months old)</li>
                                                </ul>
                                            </div>
                
                                            <div class="card-btn">
                                                <span class="default-btn ch1">₹ <?=!empty($affiliate_cards[$record->id])?$affiliate_cards[$record->id]:0; ?></span>
                                                <a href="<?=base_url('cards/order/personal-details/'.$record->id); ?>" class="default-btn ch2">ORDER CARD</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                }
                            }
                            else
                            {
                                foreach($records as $record)
                                { 
                                    ?>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="box-card">
                                            <div class="img-card">
                                                <?php
                                                if(!empty($record->id) && $record->id == 1)
                                                {
                                                    $imgUrl = base_url('assets/img/cards/card1.jpg');
                                                }
                                                elseif(!empty($record->id) && $record->id == 2)
                                                {
                                                    $imgUrl = base_url('assets/img/cards/card2.jpg');
                                                }
                                                elseif(!empty($record->id) && $record->id == 3)
                                                {
                                                    $imgUrl = base_url('assets/img/cards/card3.jpg');
                                                }
                                                else
                                                {
                                                    $imgUrl = base_url('assets/img/card-selection-2.jpg');
                                                }
                                                ?>
                                                <img src="<?=$imgUrl; ?>" />
                                            </div>
                                            <div class="text-box">
                                                <h2><?=!empty($record->card_title)?$record->card_title:''; ?></h2>
                                                <p>The only globally recognized Student ID for students currently studying full-time at High school, College or University.</p>
                                                <h3>Requirements for issuing:</h3>
                
                                                <ul class="text-ul-box">
                                                    <li>Passport style photo</li>
                                                    <li>Applicant over 6 years of age - scan or photograph of the applicant's identity card (ID card or passport)</li>
                                                    <li>
                                                        Applicant under the age of 6 - scan or photograph of the applicant's identity card (ID card, passport, insurance card or birth certificate) and his/her legal representative’s identity card (ID
                                                        card or passport)
                                                    </li>
                                                    <li>Confirmation of student status (less than 2 months old)</li>
                                                </ul>
                                            </div>
                
                                            <div class="card-btn">
                                                <span class="default-btn ch1">₹ <?=!empty($record->price)?$record->price:0; ?></span>
                                                <a href="<?=base_url('cards/order/personal-details/'.$record->id); ?>" class="default-btn ch2">ORDER CARD</a>
                                            </div>
                                        </div>
                            </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
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