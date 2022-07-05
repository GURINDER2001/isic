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
                            <li>Card Type</li>
                            <li>Personal Details</li>
                            <li>Services</li>
                            <li>Delivery</li>
                            <li>Review</li>
                            <li>Payment</li>
                            <li class="active">Completion</li>
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
                    <h2>Online virtual card ordering</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <?php
                        if(!empty($records))
                        {
                            foreach($records as $record)
                            {
                                //pre($record)
                                ?>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="box-card">
                                        <div class="img-card">
                                            <img src="<?=base_url('assets/img/card-selection-2.jpg'); ?>" />
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
                                            <a href="<?=base_url('cards/order/personal-details/'.$record->id); ?>" class="default-btn ch1">₹ <?=!empty($record->price)?$record->price:0; ?></a>
                                            <a href="<?=base_url('cards/order/personal-details/'.$record->id); ?>" class="default-btn ch2">ORDER CARD</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <div class="section-title">
                    <h2>Personal Details of the Applicant</h2>
                </div>
    
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                            <div class="ply1">
                                <img src="<?=base_url('assets/img/up-1.png'); ?>" />
                            </div>
                            <div class="fileContainer sprite">
                                <span>Upload Photo</span>
                                <input type="file" value="Choose File" />
                            </div>
                        </div>
    
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <form class="form-pr">
                                <div class="row align-items-center">
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                            <label>First Name <span class="star1">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left"><input type="text" class="form-control" placeholder="" /></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                            <label>Last Name <span class="star1">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left"><input type="text" class="form-control" placeholder="" /></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                            <label>Academic Institution <span class="star1">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left"><input type="text" class="form-control" placeholder="" /></div>
                                    </div>
    
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                            <label>Date of Birth <span class="star1">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left birth-pd">
                                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                                <select class="form-control" name="cars" id="cars">
                                                    <option value="volvo">Day</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                                <select class="form-control" name="cars" id="cars">
                                                    <option value="volvo"> Month </option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                                <select class="form-control" name="cars" id="cars">
                                                    <option value="volvo">Year</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                            <label>E-mail <span class="star1">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left"><input type="text" class="form-control" placeholder="" /></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                            <label>Phone Number <span class="star1">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left"><input type="text" class="form-control" placeholder="" /></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left"><label>Gender</label></div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left birth-pd">
                                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                                <div class="form-group-12">
                                                    <input type="checkbox" id="html" />
                                                    <label for="html">Male</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                                <div class="form-group-12">
                                                    <input type="checkbox" id="css" />
                                                    <label for="css">Female </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                                <div class="form-group-12">
                                                    <input type="checkbox" id="javascript" />
                                                    <label for="javascript"> Other</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                        <div class="card-btn back1">
                                            <a href="#" class="default-btn ch1">Back</a>
                                            <a href="#" class="default-btn ch2">Next</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <div class="section-title card-pl1">
                    <h2>Plastic card to virtual card</h2>
                </div>
                <div class="container">
                    <div class="ser1">
                        <p>
                            <input type="checkbox" id="test2" />
                            <label for="test2"> I want a plastic card in addition to my virtual card (+ ₹ 118)</label>
                        </p>
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                            <div class="card-btn back1">
                                <a href="#" class="default-btn ch1">Back</a>
                                <a href="#" class="default-btn ch2">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu3" class="tab-pane fade">
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
                                            <a href="#" class="default-btn ch1">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    
                <section class="about-area ptb-100 delivery-p2">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-md-12 method12">
                                <div class="col-lg-6 col-md-6 pull-left">
                                    <div class="pay-card-1 method-cs1">
                                        <div class="text">
                                            <h2>Delivery Method</h2>
                                            <form>
                                                <div class="form-group-n">
                                                    <label for="html">
                                                        <input type="checkbox" id="html" /> Personal Pickup (for free) ISIC India Office (IInd Floor, DLF Cyber Greens, Tower C DLF Phase-III, Gurgaon, Haryana-122002)
                                                    </label>
                                                </div>
                                                <div class="form-group-n">
                                                    <label for="css"><input type="checkbox" id="css" /> Courier Service <span class="color-change-n">(+ ₹ 100)</span></label>
                                                </div>
                                            </form>
                                            <hr class="lin1" />
    
                                            <h2>Payment Method</h2>
                                            <form>
                                                <div class="col-lg-6 col-md-6 col-sm-6 pull-left">
                                                    <div class="form-group-n">
                                                        <label for="html"> <input type="checkbox" id="html" /> Bank Transfe</label>
                                                    </div>
                                                    <div class="form-group-n">
                                                        <label for="css"><input type="checkbox" id="css" /> Debit Card (EBS) </label>
                                                    </div>
                                                    <div class="form-group-n">
                                                        <label for="css"><input type="checkbox" id="css" /> Cash Card (EBS) </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 pull-left">
                                                    <div class="form-group-n">
                                                        <label for="html"> <input type="checkbox" id="html" /> Credit Card (EBS) </label>
                                                    </div>
                                                    <div class="form-group-n">
                                                        <label for="css"><input type="checkbox" id="css" /> Bank Tranfer (EBS) </label>
                                                    </div>
    
                                                    <div class="form-group-n">
                                                        <label for="css"><input type="checkbox" id="css" /> Credit Card EMI (EBS) </label>
                                                    </div>
                                                </div>
                                                <div class="form-group method">
                                                    <h2 class="paym-h1">Payment Method</h2>
                                                    <div class="col-lg-8 col-md-8 col-sm-8 pull-left">
                                                        <input type="text" class="form-control" placeholder="" />
                                                    </div>
    
                                                    <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                                        <div class="card-btn back1">
                                                            <a href="#" class="default-btn ch1">Verify</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
                                                        <tr>
                                                            <td>Virtual ISIC card</td>
                                                            <td>₹ 590</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Plastic card to virtual card</td>
                                                            <td>₹ 118</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Postage/Delivery Fee</td>
                                                            <td>for free</td>
                                                        </tr>
                                                        <tr class="tab-c1">
                                                            <td>Total Price Including VAT</td>
                                                            <td>₹ 708</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
    
                                            <h2>Note</h2>
                                            <form>
                                                <div class="form-group not-1">
                                                    <textarea
                                                        name="message"
                                                        id="message"
                                                        class="form-control"
                                                        cols="30"
                                                        rows="6"
                                                        required=""
                                                        data-error="Please enter your message"
                                                        placeholder="Here you can tell us something"
                                                    ></textarea>
                                                </div>
                                            </form>
    
                                            <h2 class="paym-h1">Payment Method</h2>
                                            <div class="col-lg-12 col-md-12 col-sm-12 remember-me-wrap">
                                                <p>
                                                    <input type="checkbox" id="test2" />
                                                    <label for="test2">I agree with Terms and Conditions for online ordering. *</label>
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
                            <a href="#" class="default-btn ch1">Back</a>
                            <a href="#" class="default-btn ch2">Next</a>
                        </div>
                    </div>
                </section>
            </div>
            <div id="menu4" class="tab-pane fade order-tabel">
                <h3>Thank you for your order</h3>
                <p>To complete the card order please make the following bank transfer.</p>
                <table style="width: 100%;">
                    <tr>
                        <td>Account Number:</td>
                        <td>07087630000123</td>
                    </tr>
                    <tr>
                        <td>Beneficiary Name:</td>
                        <td>STIC YOUTH TRAVELS PVT LTD.</td>
                    </tr>
                    <tr>
                        <td>Company:</td>
                        <td>HDFC Bank Ltd.</td>
                    </tr>
                    <tr>
                        <td>SWIFT Code:</td>
                        <td>HDFCINBBDEL</td>
                    </tr>
                    <tr>
                        <td>CIN:</td>
                        <td>U63000DL2011PTC226033</td>
                    </tr>
                    <tr>
                        <td>IFSC Code:</td>
                        <td>HDFC0000708</td>
                    </tr>
                    <tr>
                        <td>Branch Address:</td>
                        <td>Grond Floor DCM Building 16, Barakhamaba Road New Delhi - 110001</td>
                    </tr>
                    <tr>
                        <td>Amount:</td>
                        <td>₹ 708</td>
                    </tr>
                    <tr>
                        <td>Variable Symbol:</td>
                        <td>5905677</td>
                    </tr>
                    <tr>
                        <td>Recipient Message:</td>
                        <td>Ram Malik</td>
                    </tr>
                </table>
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