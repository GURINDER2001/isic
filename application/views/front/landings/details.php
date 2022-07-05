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
				<a href="javascript:;">Jet Brains</a>
			</li>

			<li class="breadcrumbs__item1 partnr-1">
				<a href="javascript:;"><?=!empty($name)?$name:'404 - Not Found'; ?></a>
			</li>
		</ul>
	</nav>
</section>

<section class="rfr clbSctn">
  <div class="bgImg"><img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jetbanner2.jpg'); ?>" alt="image" /></div>
  <div class="container pabs">
    <div class="row">
      <div class="col-lg-7"></div>
      <div class="col-lg-5 b1 txt">
        <h3>Welcome to the world of discounts for ISIC, ITIC, IYTC!</h3>
        <p>Discover new discounts in shops, restaurants or many other leisure activities in your area or take advantage of some unique online offerings. Remember that our cards have thousands of unique benefits waiting for you!</p>
        <ul>
          <li>Access to white labelled smart phone application at Zero cost</li>
          <li>In App notification to Students, Teachers &amp; Youth</li>
          <li>A marketing tool with no recurring cost</li>
          <li>Increment in Sales</li>
          <li>Brand Building and Brand Recall</li>
          <li>Enhanced value proposition for Students, Teachers and Youth</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="jetCards">
  <div class="container">
    <div class="jtRow">
      <div class="jtCol">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front" style="background-image:url(<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jtbg.jpg'); ?>)"> 
            <span class="overlay"></span>
            <div>
              <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jetBrain.png'); ?>" alt="JetBrains" /> 
            </div>
           </div> 
            <div class="flip-card-back">
              <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jetBrain.png'); ?>" alt="JetBrains" />
              <h2>JetBrains </h2>
              <p>Developer Tools</p>
              <p>Team Tools</p>
              <p>Learning Tools</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="jtCol">
        <div class="flip-card">
          <div class="flip-card-inner">
            <div class="flip-card-front" style="background-image:url(<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jtbg2.jpg'); ?>)"> 
            <span class="overlay"></span>
            <div>
              <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jetBrain.png'); ?>" alt="JetBrains" /> 
            </div>
           </div> 
            <div class="flip-card-back">
              <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jetBrain.png'); ?>" alt="JetBrains" />
              <h2>JetBrains Academy</h2>
              <p>Developer Tools</p>
              <p>Team Tools</p>
              <p>Learning Tools</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="withIsic">
 <div class="container">
   <h2>With ISIC also get access to 1,50,000+ benefits icluding:</h2>
   <div class="sliderBox">
    <div id="sliderlogos" class="jetslide owl-carousel owl-theme">
     <div class="item">
      <div class="logoBox"><a href="#"><img src="upload/cmsimages/1.jpg"></a></div>
     </div>
     
     <div class="item">
      <div class="logoBox"><a href="#"><img src="upload/cmsimages/2.jpg"></a></div>
     </div>
     
     <div class="item">
      <div class="logoBox"><a href="#"><img src="upload/cmsimages/3.jpg"></a></div>
     </div>
     
     <div class="item">
      <div class="logoBox"><a href="#"><img src="upload/cmsimages/4.jpg"></a></div>
     </div>
     
     <div class="item">
      <div class="logoBox"><a href="#"><img src="upload/cmsimages/Eurailcom.png"></a></div>
     </div>
     
     <div class="item">
      <div class="logoBox"><a href="#"><img src="upload/cmsimages/Flixbus.png"></a></div>
     </div>
     
     <div class="item">
      <div class="logoBox"><a href="#"><img src="upload/cmsimages/Hard_Rock_Cafe.png"></a></div>
     </div>
      
    </div>
   </div>
 </div>
</section>


<section class="rfr clbSctn">
  <div class="bgImg"><img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/jetbanner3.jpg'); ?>" alt="image" /></div>
  <div class="container pabs">
    <div class="row">
      <div class="col-lg-7"></div>
      <div class="col-lg-5 b1 txt">
        <h3>Value Proposition for Students</h3>
        <p>Are you an Educational Institution or a corporate dealing with Students, Teachers or Youth?</p>
        <ul>
          <li>Access to white labelled smart phone application at Zero cost</li>
          <li>In App notification to Students, Teachers &amp; Youth</li>
          <li>A marketing tool with no recurring cost</li>
          <li>Increment in Sales</li>
          <li>Brand Building and Brand Recall</li>
          <li>Enhanced value proposition for Students, Teachers and Youth</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="applyNow btnCntr"> <a class="default-btn ch1" href="#">Apply Now</a> </section>





<?php
echo $layout;
$this->load->view('front/partners/layout1');
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
