<?php
//pre($pageContent);
if(!empty($pageContent)) 
{  
    extract($pageContent); 
}

if(!empty($pageMeta)):
    foreach ( $pageMeta as $data):
      $array[$data->name]=$data->value;
    endforeach;
    if(!empty($array))
    {
       //pre($array);
       extract($array); 
    }
endif;
?>
<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
	<div class="container-fluid">
		<div class="single-banner-item">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-12">
					<div class="banner-content">
						<h1 class="text-uppercase"><span style="color: #feed01;"><?=!empty($name)?$name:'404 - Not Found'; ?> </span></h1>
					</div>
				</div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/acd1.jpg'); ?>" alt="image" />
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
				<a href="<?=base_url(); ?>"> <i class="fa fa-home" aria-hidden="true"></i> </a>
			</li>

			<li class="breadcrumbs__item1">
				<a href="javascript:;">Partners</a>
			</li>

			<li class="breadcrumbs__item1 partnr-1">
				<a href="javascript:;"><?=!empty($name)?$name:'404 - Not Found'; ?></a>
			</li>
		</ul>
	</nav>
</section>

<section class="partnerSctn1 bgGrey">
    <div class="container">
        <div class="row row1">
            <div class="col-md-6 txt">
                <img src="<?=base_url('assets/img/ak-logo.jpg'); ?>" alt="image" />
                <h4>We believe in Enhancing Customer Engagement and Customer Retention for our Partners</h4>
                <h5>Enhance your Product Proposition and Become Part of a Global Community with ISIC</h5>
            </div>
            <div class="col-md-6 img"><img src="<?=base_url('assets/img/cmrcl-card-img.png'); ?>" alt="image" /></div>
        </div>
    </div>
</section>
        
<!-- Commercial Partner Section 1 Area -->
<section class="partnerSctn1 py50 bgGrey">
    <div class="container">
        <div class="sctnTitle">
            <h2>ISIC Student Ecosystem for Educational Institutions</h2>
        </div>
        <div class="row acRow1">
            <div class="col-md-3">
                <div class="box">
                    <h4>Globally Recognized Official Identity Card</h4>
                </div>
            </div>

            <div class="col-md-3">
                <div class="box">
                    <h4>Cashless Campus with INR Prepaid Payment Card</h4>
                </div>
            </div>

            <div class="col-md-3">
                <div class="box">
                    <h4>Educational Institution Branded Smartphone Application</h4>
                </div>
            </div>

            <div class="col-md-3">
                <div class="box">
                    <h4>150,000+ Student Benefits/ Discountsd</h4>
                </div>
            </div>

            <div class="col-md-3">
                <div class="box">
                    <h4>Software Development Tools</h4>
                </div>
            </div>

            <div class="col-md-3">
                <div class="box">
                    <h4>Communication with Students through In-app Notifications</h4>
                </div>
            </div>

            <div class="col-md-3">
                <div class="box">
                    <h4>Placement Support</h4>
                </div>
            </div>

            <div class="col-md-3">
                <div class="box">
                    <h4>Insurance for Each Student</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="partnerSctn2 bgDark py50">
    <div class="container">
        <div class="sctnTitle">
            <h2>Student Ecosystem Comprises of</h2>
        </div>
        <div class="row row2">
            <div class="col-md-4">
                <div class="cardBox">
                    <div class="cardImg"><img src="<?=base_url('assets/img/pat1.jpg'); ?>" alt="image" /></div>
                    <h4>UNESCO Endorsed Multi-functional Card</h4>
                    <p>Official Identity Card of the Educational Institutions, ISIC Benefits card, and Prepaid Payment Card in Physical & Digital form making the campus Cashless</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <div class="cardImg"><img src="<?=base_url('assets/img/pat1.jpg'); ?>" alt="image" /></div>
                    <h4>Zero Cost Application (Worth INR 75+ Lacs)</h4>
                    <p>Val U – A White labelled Smartphone Application with Educational Institution’s Branding & Color scheme</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <div class="cardImg"><img src="<?=base_url('assets/img/pat1.jpg'); ?>" alt="image" /></div>
                    <h4>Val U Communication Centre</h4>
                    <p>Val U Communication Centre - To send in-app notifications to students in the form of texts, images, UTM links, and documents</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <div class="cardImg"><img src="<?=base_url('assets/img/pat1.jpg'); ?>" alt="image" /></div>
                    <h4>ISIC Benefits</h4>
                    <p>1,50,000+ Global Online, Premium Online, Offline and Local Benefits in India and 125+ other countries</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <div class="cardImg"><img src="<?=base_url('assets/img/pat1.jpg'); ?>" alt="image" /></div>
                    <h4>Value Added Services</h4>
                    <p>Value Added Services including Forex & Travel Insurance, all on the same platform</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <div class="cardImg"><img src="<?=base_url('assets/img/pat1.jpg'); ?>" alt="image" /></div>
                    <h4>ISIC Career Center</h4>
                    <p>An effective and interactive tool to help students prepare their resume and prepare for job interviews relevant to their field</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <div class="cardImg"><img src="<?=base_url('assets/img/pat1.jpg'); ?>" alt="image" /></div>
                    <h4>JetBrains</h4>
                    <p>An essential software suite worth $250 for Students and Teachers <strong>FREE OF COST </strong></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <div class="cardImg"><img src="<?=base_url('assets/img/pat1.jpg'); ?>" alt="image" /></div>
                    <h4>Student Insurance</h4>
                    <p>Accidental, Permanent Disability and Accidental OPD Reimbursement of INR 1,10,000/- per student with Coverage across India</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="partnerSctn3 bgGrey py50">
    <div class="container">
        <div class="sctnTitle">
            <h2>What’s In It for Educational Institutions</h2>
        </div>
        <div class="row row3">
            <div class="col-md-4">
                <div class="cardBox">
                    <h4>Globally Recognized Student Identity Card</h4>
                    <p>A concrete and tangible step towards internationalization by converting your local student ID to a globally recognized student status proof</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <h4>Zero Cost Smartphone Application – Worth INR 75+ Lacs</h4>
                    <p>Zero Development, Maintenance and Upgradation cost of the Smartphone Application</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <h4>Communication Centre</h4>
                    <p>Seamless communication with an individual/group of students, through in-app notifications on the Val U Application</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <h4>Brand Visibility & Brand Recall</h4>
                    <p>Brand Building through daily/weekly use of Educational Institution Branded Card and Application (Val U)</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <h4>Placement Support</h4>
                    <p>An effective tool to address the key concern of the Educational Institutions – THE PLACEMENT RATE</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <h4>Incremental Revenue</h4>
                    <p>Revenue opportunity for Educational Institutions through card sales</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="partnerSctn3 partnerSctn4 bgDark py50">
    <div class="container">
        <div class="sctnTitle">
            <h2>Why Students Love ISIC!</h2>
        </div>
        <div class="row row3">
            <div class="col-md-4">
                <div class="cardBox">
                    <h4>World Full of Benefits</h4>
                    <p>
                        With <strong>1,50,000+</strong> ISIC benefits/discounts across categories including Travel, Shopping, Education, Food & Beverages, Sports & Entertainment in India and 125+ other countries, students can save
                        up to 30% of their monthly expenses
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <h4>Smartphone Application – Val U</h4>
                    <p>Access to E-wallet, ISIC Benefits, Forex, Travel Insurance, and internationally recognized Official Identity Card endorsed by UNESCO on one smartphone application</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <h4>Financial Independence with Global Recognition</h4>
                    <p>Financial power and freedom to students across 5+ Million VISA accepting Outlets through a Globally recognized Student Identity and Benefits Card</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <h4>Job Assistance</h4>
                    <p>An effective tool to help students prepare for their job interview and get their first job fast</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <h4>Software Suite</h4>
                    <p>JetBrains, Free access to essential tools for Software Developers and exclusive discounted software courses</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <h4>Student Insurance</h4>
                    <p>Accidental insurance for INR 1,10,000/- covering Accidental, Permanent Disability and Accidental OPD Reimbursement with Coverage across India</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="cardBox">
                    <h4>Student Engagement Activities</h4>
                    <p>Engagement activities like Brand Kiosks, Eye-check Camp, Health Check-up camp for students in collaboration with Benefit providers</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="partnerSctn5 bgGrey py50">
    <div class="container">
        <div class="sctnTitle">
            <h2>Endorsements</h2>
            <p>
                ISIC comes highly recommended by various organizations including UNESCO, UNWTO, WYSE Travel Confederation, National Governments, Ministries of Education Culture & Tourism, Academic Institutions & Student
                Organizations.
            </p>
        </div>

        <div class="partnerSlider owl-carousel owl-theme">
            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/endorsements-logo-1.png'); ?>" /></div>
                <h5>United Nations Educational, Scientific and Cultural Organization</h5>
            </div>

            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/endorsements-logo-2.png'); ?>" /></div>
                <h5>European Union – Youth on the Move</h5>
            </div>

            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/endorsements-logo-3.png'); ?>" /></div>
                <h5>Erasmus Student Network (ESN)</h5>
            </div>

            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/endorsements-logo-4.png'); ?>" /></div>
                <h5>United Nations World Tourism Organization</h5>
            </div>

            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/endorsements-logo-5.png'); ?>" /></div>
                <h5>Ministry of Education, Science & Technology, Kenya</h5>
            </div>

            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/endorsements-logo-6.png'); ?>" /></div>
                <h5>Canadian Association of University Teachers</h5>
            </div>
        </div>
    </div>
</section>

<section class="partnerSctn6 bgDark py50">
    <div class="container">
        <div class="sctnTitle">
            <h2>Global Partners</h2>
        </div>

        <div class="partnerSlider owl-carousel owl-theme">
            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/global-partner-logo-1.png'); ?>" /></div>
                <h5>International Association of Students in Economic and Commercial Sciences</h5>
            </div>

            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/global-partner-logo-2.png'); ?>" /></div>
                <h5>Youth Hostelling International</h5>
            </div>

            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/global-partner-logo-3.png'); ?>" /></div>
                <h5>International Association of Universities</h5>
            </div>

            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/global-partner-logo-4.png'); ?>" /></div>
                <h5>Education First</h5>
            </div>

            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/global-partner-logo-5.png'); ?>" /></div>
                <h5>British Council</h5>
            </div>

            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/global-partner-logo-6.png'); ?>" /></div>
                <h5>ISIC Career Center</h5>
            </div>

            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/global-partner-logo-7.png'); ?>" /></div>
                <h5>The Economist</h5>
            </div>

            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/global-partner-logo-8.png'); ?>" /></div>
                <h5>Lonely Planet</h5>
            </div>

            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/global-partner-logo-9.png'); ?>" /></div>
                <h5>Jet Brains</h5>
            </div>

            <div class="item">
                <div class="logoBox"><img src="<?=base_url('assets/img/global-partner-logo-10.png'); ?>" /></div>
                <h5>Jet Brains</h5>
            </div>
        </div>
    </div>
</section>

<section class="about-area ptb-100 new-bl2c par1-logo enquiry-1">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 pull-left card-bac-na" style="background-image: url(https://testxone.com/isic/upload/partners/academy-form.jpg);"></div>
            <div class="col-lg-6 col-md-6 pull-left">
                <form class="form-pr app-form1">
                    <h2 class="bc-1an1">Enquiry</h2>

                    <div class="row align-items-center">
                        <div class="form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 pull-left"><input type="text" class="form-control" placeholder="Name of Company/Business *" /></div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
                                <input type="text" class="form-control" placeholder="Type of Business*" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
                                <input type="text" class="form-control" placeholder="Contact Person*" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
                                <input type="text" class="form-control" placeholder="Mobile Number*" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
                                <input type="text" class="form-control" placeholder="E-mail*" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 col-md-12 col-sm-12 pull-left">
                                <textarea name="message" class="form-control" id="message" cols="30" rows="6" required data-error="Please enter your message" placeholder="Message*"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                            <div class="card-btn back1">
                                <a href="#" class="default-btn ch1">Submit</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
if(!empty($pageContent)) 
{ 
?>
    <section class="about-area ac-about">
    	<div class="container-fluid">
    		<div class="row">
                <div class="col-lg-6 col-md-12">
    				<div class="about-content">
    					<div class="content">
    						<?=!empty($intro_content)?$intro_content:''; ?>
    					</div>
    				</div>
    			</div>
                
    			<div class="col-lg-6 col-md-12">
    				<div class="about-image">
    					<img src="<?=base_url(!empty($intro_img)?$intro_img:'assets/img/ac-video.jpg'); ?>" alt="image" />
    					<?php
    					if(!empty($intro_video_url))
    					{
    					    ?>
    					    <a href="<?=$intro_video_url; ?>"><img class="video-ic" href="<?=base_url('assets/img/vid-ic.png'); ?>" alt="image" /></a>
    					    <?php
    					}
    					?>
    				</div>
    			</div>
    
    		</div>
    	</div>
    </section>
    
    <?php
    if(!empty($additional_content))
    {
        ?>
        <section class="about-area ptb-100 new-bl1">
        	<div class="container-fluid">
        		<div class="row align-items-center">
        			<div class="col-lg-5 col-md-5 img12-padding">
        				<div class="about-img">
        					<img src="<?=base_url(!empty($contentbox_img)?$contentbox_img:'assets/img/bf-1.jpg'); ?>" alt="image" />
        				</div>
        			</div>
        			<div class="col-lg-7 col-md-7">
        				<div class="about-content">
        					<div class="text">
        						<h2 class="key124"><?=!empty($contentbox_heading)?$contentbox_heading:'How we connect with students'; ?></h2>
        						<?=!empty($contentbox_content)?$contentbox_content:''; ?>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <?php
    }
    ?>
    
    <?php
    $offer_elements = !empty($offer_elements)?unserialize($offer_elements):array();
    if(!empty($offer_elements))
    {
        ?>
        <section class="about-area ptb-100 new-bl1 par1-logo">
        	<div class="container-fluid">
        		<div class="row prtGet">
        			<div class="col-lg-12 col-md-12 about-content">
        				<div class="text">
        					<h2><?=!empty($offer_heading)?$offer_heading:'ISIC Offering to Partner'; ?></h2>
        				</div>
        			</div>
        			<?php
                    foreach ($offer_elements as $rec)
                    {
                        ?>
            			<div class="col-lg-4 col-md-12 content-ak">
            				<div class="about-content">
            					<img class="ak-img" src="<?=base_url(!empty($rec['image'])?$rec['image']:'assets/admin/images/no_image.gif'); ?>" alt="image" />
            					<div class="content ak-text">
            						<p><?=!empty($rec['content'])?$rec['content']:''; ?></p>
            					</div>
            				</div>
                        </div>
                        <?php
                    }
                    ?>
        		</div>
        	</div>
        </section>
        <?php
    }
    ?>
    <?php
    $infobox_elements = !empty($infobox_elements)?unserialize($infobox_elements):array();
    if(!empty($infobox_elements))
    {
        ?>
        <section class="featured-services-area">
        	<div class="container">
        		<div class="col-lg-12 col-md-12 about-content">
        			<div class="text value-p1">
        				<h2 class="value"><?=!empty($infobox_heading)?$infobox_heading:'Value addition to partners'; ?></h2>
        			</div>
        		</div>
        
        		<div class="row">
        		    <?php
                    foreach ($infobox_elements as $rec)
                    {
                        ?>
            			<div class="col-lg-4 col-md-6 col-sm-6">
            				<div class="single-featured-services-box dolor-1">
            					<img class="ak-img" src="<?=base_url(!empty($rec['image'])?$rec['image']:'assets/admin/images/no_image.gif'); ?>" alt="image" />
            
            					<p><?=!empty($rec['content'])?$rec['content']:''; ?></p>
            				</div>
            			</div>
            			<?php
                    }
                    ?>
        		</div>
        	</div>
        </section>
        <?php
    }
    ?>
    <?php
    if(!empty($partners_logos))
    {
        ?>
        <section class="featured-services-area partner-12">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-12 col-md-12 about-content">
        				<div class="text isi-1">
        					<h2 class="isi"><?=!empty($carousal_heading)?$carousal_heading:'Partners'; ?></h2>
        				</div>
        			</div>
        		</div>
            
        		<div class="bxslider logosImgs">
        		    <?php
        		    foreach($partners_logos as $row)
        		    {
        		        ?>
        		        <div><img src="<?=base_url($row->logo); ?>" alt="Homestay" height="100" /></div>
        		        <?php
        		    }
        		    ?>
        		</div>
        	</div>
        </section>
        <?php
    }
    ?>
    <!--section class="about-area ptb-100 new-bl1 par1-logo par1-logo1">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 col-md-12 text-center">
    				<div class="about-content">
    					<img class="ak-img" src="<?=base_url('assets/img/mc-d-1.jpg'); ?>" alt="image" />
    				</div>
    			</div>
    
    			<div class="col-lg-6 col-md-12 text-center">
    				<div class="about-content">
    					<img class="ak-img" src="<?=base_url('assets/img/mcd-2.jpg'); ?>" alt="image" />
    				</div>
    			</div>
    		</div>
    	</div>
    </section-->
    


<!--    
    <?php
    if(!empty($stripe_heading))
    {
        ?>
        <section class="subscribe-area bg-f9f9f9 ptb-100 brand-1" <?=!empty($stripe_bg_img)?'style="background-image: url('.base_url($stripe_bg_img).'); background-repeat: repeat-x !important;"':''; ?>>
        	<div class="container">
        		<div class="subscribe-content">
        			<h2 class="get2"><?=$stripe_heading; ?></h2>
        		</div>
        	</div>
        </section>
        <?php
    }
    ?>
    -->
    <section class="about-area ptb-100 new-bl2c par1-logo <?=!empty($enquirybg)?'enquiry-2':'enquiry-1'; ?>">
    	<div class="container-fluid">
    		<div class="row align-items-center">
    			<div class="col-lg-6 col-md-6 pull-left card-bac-na" <?=!empty($enquiry_image)?'style="background-image:url('.base_url($enquiry_image).');"':''; ?>></div>
    			<div class="col-lg-6 col-md-6 pull-left">
    				<form class="form-pr app-form1">
    					<h2 class="bc-1an1">Enquiry</h2>
    
    					<div class="row align-items-center">
    						<div class="form-group">
    							<div class="col-lg-12 col-md-12 col-sm-12 pull-left"><input type="text" class="form-control" placeholder="Name of Company/Business *" /></div>
    						</div>
    						<div class="form-group">
    							<div class="col-lg-12 col-md-12 col-sm-12 pull-left">
    								<input type="text" class="form-control" placeholder="Type of Business*" />
    							</div>
    						</div>
    						<div class="form-group">
    							<div class="col-lg-12 col-md-12 col-sm-12 pull-left">
    								<input type="text" class="form-control" placeholder="Contact Person*" />
    							</div>
    						</div>
    						<div class="form-group">
    							<div class="col-lg-12 col-md-12 col-sm-12 pull-left">
    								<input type="text" class="form-control" placeholder="Mobile Number*" />
    							</div>
    						</div>
    						<div class="form-group">
    							<div class="col-lg-12 col-md-12 col-sm-12 pull-left">
    								<input type="text" class="form-control" placeholder="E-mail*" />
    							</div>
    						</div>
    						<div class="form-group">
    							<div class="col-lg-12 col-md-12 col-sm-12 pull-left">
    								<textarea name="message" class="form-control" id="message" class="form-control" cols="30" rows="6" required="" data-error="Please enter your message" placeholder="Message*"></textarea>
    							</div>
    						</div>
    
    						<div class="col-lg-12 col-md-12 col-sm-12 text-center">
    							<div class="card-btn back1">
    								<a href="#" class="default-btn ch1">Submit</a>
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
    <section class="about-area ac-about">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-lg-12 col-md-12">
    				<div class="about-content">
    					<div class="content">
    						<h3>404 - Not Found</h3>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <?php
}
?>
