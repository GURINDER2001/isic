<?php
//pre($pageMeta);
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
						<img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/bn-1.jpg'); ?>" alt="image" />
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
<?php
if(!empty($pageContent)) 
{ 
?>
    <section class="about-area ac-about pb0 txtRgt bpSctn1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-image" <?=!empty($intro_img)?'style="background-image: url('.base_url($intro_img).') !important"':''; ?>>
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

                    <div class="col-lg-6 col-md-12">
                        <div class="about-content">
                            <div class="content con1">
                                <?=!empty($intro_content)?$intro_content:''; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        
 <section class="hwCnct">
  <div class="container">
   <h2><?=!empty($contentbox_heading)?$contentbox_heading:'How we connect with students'; ?></h2>
   
   <div class="wecnctRow">
    <div class="weCol">
     <div class="lgoImg"><img src="<?=base_url('assets/img/youtube-img.png'); ?>" alt="" /></div>
     <h4>YouTube</h4>
    </div>
    
    <div class="weCol">
     <div class="lgoImg"><img src="<?=base_url('assets/img/instagram-img.png'); ?>" alt="" /></div>
     <h4>Instagram</h4>
    </div>
    
    <div class="weCol">
     <div class="lgoImg"><img src="<?=base_url('assets/img/facebook-img.png'); ?>" alt="" /></div>
     <h4>Facebook</h4>
    </div>
    
    <div class="weCol">
     <div class="lgoImg"><img src="<?=base_url('assets/img/twitter-img.png'); ?>" alt="" /></div>
     <h4>Twitter</h4>
    </div>
    
    <div class="weCol">
     <div class="lgoImg"><img src="<?=base_url('assets/img/isic-global-image.png'); ?>" alt="" /></div>
     <h4>In-app notifications</h4>
    </div>
    
    <div class="weCol">
     <div class="lgoImg"><img src="<?=base_url('assets/img/website-img.png'); ?>" alt="" /></div>
     <h4>Real Estate on website</h4>
    </div>
    
    <div class="weCol">
     <div class="lgoImg"><img src="<?=base_url('assets/img/emarketing-img.png'); ?>" alt="" /></div>
     <h4>E-mail Marketing</h4>
    </div>
    
    <div class="weCol">
     <div class="lgoImg"><img src="<?=base_url('assets/img/newsletter-img.png'); ?>" alt="" /></div>
     <h4>Newsletter</h4>
    </div>
    
    
   </div>
  </div>
 </section>       
        
        
<!--
    <section class="about-area new-bl1 pb0 txtLft">
    	<div class="container-fluid">
    		<div class="row align-items-center">
    			<div class="col-lg-6 col-md-6">
    				<div class="about-content">
    					<div class="content text">
    						<h2 class="key124"><?=!empty($contentbox_heading)?$contentbox_heading:'How we connect with students'; ?></h2>
    						<?=!empty($contentbox_content)?$contentbox_content:''; ?>
    					</div>
    				</div>
    			</div>
                <div class="col-lg-6 col-md-6 img12-padding">
    				<div class="about-img">
    					<img src="<?=base_url(!empty($contentbox_img)?$contentbox_img:'assets/img/bf-1.jpg'); ?>" alt="image" />
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
-->    
    
        <?php
    $offer_elements = !empty($offer_elements)?unserialize($offer_elements):array();
    if(!empty($offer_elements))
    {
        ?>
        <section class="partnerSctn2 bgGrey py50">
        	<div class="container">
        		<div class="sctnTitle">
        			<h2 class="value"><?=!empty($offer_section_heading)?$offer_section_heading:'ISIC Offering to Partner'; ?></h2>
        		</div>
        		<div class="row row2">
        			<?php
                    foreach ($offer_elements as $rec)
                    {
                        ?>
                        <div class="col-md-4">
            				<div class="cardBox">
                            <div class="cardImg">
            					<img src="<?=base_url(!empty($rec['image'])?$rec['image']:'assets/admin/images/no_image.gif'); ?>" alt="image" />
                              </div>  
            					<?=!empty($rec['content'])?$rec['content']:''; ?>
            				</div>
            </div>
                        <?php
                    }
                    ?>
                </div>
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
        <section class="partnerSctn2 bgDark py50">
        	<div class="container">
        	    
    	         <div class="sctnTitle">
                            <h2><?=!empty($infobox_section_heading)?$infobox_section_heading:'Value addition to partners'; ?></h2>
                    </div>
                    
                    <div class="row row2">
        		    <?php
                    foreach ($infobox_elements as $rec)
                    {
                        ?>
            			<div class="col-md-4">
            				<div class="cardBox">
            					<div class="cardImg">
                                  <img src="<?=base_url(!empty($rec['image'])?$rec['image']:'assets/admin/images/no_image.gif'); ?>" alt="image" />
                                </div>   
            						<?=!empty($rec['content'])?$rec['content']:''; ?>
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
        <section class="partnerSctn5 bgGrey py50">
        	<div class="container">
        		<div class="sctnTitle">
        		   <h2><?=!empty($carousal_heading)?$carousal_heading:'Partners'; ?></h2>
        		</div>
            
        		<div class="partnerSlider owl-carousel owl-theme">
        		    <?php
        		    foreach($partners_logos as $row)
        		    {
        		        ?>
        		        <div class="item"><div class="logoBox"><img src="<?=base_url($row->logo); ?>" alt="" /></div></div>
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
    $endorment_elements = !empty($endorment_elements)?unserialize($endorment_elements):array();
    if(!empty($endorment_elements))
    {
        ?>
        <section class="partnerSctn2 bgDark py50">
        	<div class="container">
            <div class="sctnTitle">
                <h2>Endorsements</h2>
            </div>
        		<div class="row">
                <div class="endorSlider owl-carousel owl-theme">
                    <?php
                    foreach ($endorment_elements as $rec)
                    {
                        ?>
                         <div class="item">
                           <div class="itmImgLogo"><img src="<?=base_url(!empty($rec['logo'])?$rec['logo']:'assets/img/mc-d-1.jpg'); ?>" alt="image" /></div>
                            <div class="itmImg"><img src="<?=base_url(!empty($rec['image'])?$rec['image']:'assets/img/mcd-2.jpg'); ?>" alt="image" /></div>
                         </div>
                        <?php
                    }
                    ?>
                 
                </div>
                
                
                
                <!--
        			<div class="col-lg-6 col-md-12 text-center">
        				<div class="about-content">
        					<img class="ak-img" src="<?=base_url(!empty($endorment_logo_img)?$endorment_logo_img:'assets/img/mc-d-1.jpg'); ?>" alt="image" />
        				</div>
        			</div>
        
        			<div class="col-lg-6 col-md-12 text-center">
        				<div class="about-content">
        					<img class="ak-img" src="<?=base_url(!empty($endorment_letter_screenshot)?$endorment_letter_screenshot:'assets/img/mcd-2.jpg'); ?>" alt="image" />
        				</div>
        			</div>
                  -->
                    
        		</div>
        	</div>
        </section>
        <?php
    }
    ?>
    

   
    <?php
    if(!empty($stripe_heading))
    {
        ?>
        <section class="subscribe-area bg-f9f9f9 ptb-100 brand-1 prlxefct" <?=!empty($stripe_bg_img)?'style="background-image: url('.base_url($stripe_bg_img).'); background-repeat: repeat-x !important;"':''; ?>>
        	<div class="container">
        		<div class="subscribe-content">
        			<h2 class="get2"><?=$stripe_heading; ?></h2>
        		</div>
        	</div>
        </section>
        <?php
    }
    ?>
    <section class="about-area ptb-100 new-bl2c par1-logo <?=!empty($enquirybg)?'enquiry-2':'enquiry-1'; ?>">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-lg-6 col-md-6 pull-left card-bac-na" <?=!empty($enquiry_image)?'style="background-image:url('.base_url($enquiry_image).');"':''; ?>></div>
    			<div class="col-lg-6 col-md-6 pull-left txtCap">
    				<?php $this->load->view('front/partners/partner-form'); ?>
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