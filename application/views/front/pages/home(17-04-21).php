<!-- Start Main Banner Area -->
<?php
if(!empty($sliders))
{
    ?>
    <section class="home-wrapper-area">
    	<div class="container-fluid">
    		<div class="home-slides owl-carousel owl-theme">
    		    <?php
    		    foreach($sliders as $slide)
    		    {
    		        ?>
    		        <div class="single-banner-item">
        				<div class="row align-items-center">
        					<div class="col-lg-4 col-md-4">
        						<div class="banner-content">
        							<?=!empty($slide->description)?$slide->description:''; ?>
        						</div>
        					</div>
        
        					<div class="col-lg-8 col-md-8">
        						<div class="banner-image">
        							<img src="<?=base_url(!empty($slide->featured_img)?$slide->featured_img:'assets/img/slider1.jpg'); ?>" alt="image" />
        						</div>
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

//pre($pageContent);
if(!empty($pageContent)):
    extract($pageContent);
endif;
?>

<?php
if(!empty($keyinfo_content))
{
    $keyinfo_content = unserialize($keyinfo_content);
    ?>
    <section class="home-wrapper-area green-blue-orange">
    	<div class="container">
    		<div class="row align-items-center">
    			<div class="col-lg-4 col-md-4"></div>
    
    			<div class="col-lg-8 col-md-8 text-center">
    				<div class="row">
    				    <?php
    				    $colorArr = array('color-green','color-orange','color-blue');
                        foreach ($keyinfo_content as $key => $rec)
                        {
                            ?>
        					<div class="col-md-4">
        						<div class="<?=!empty($colorArr[$key])?$colorArr[$key]:'color-green'; ?>">
        							<i class="bx bx-plus"></i>
        							<h3><?=!empty($rec['title'])?$rec['title']:''; ?></h3>
        							<div class="<?=!empty($colorArr[$key])?$colorArr[$key].'-hover':'color-green-hover'; ?>">
        								<img src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/img/card-1.png'); ?>" />
        								<div class="<?=!empty($colorArr[$key])?$colorArr[$key].'-hover-inner':'color-green-hover-inner'; ?>">
        									<div class="row">
        										<div class="col-md-7">
        											<?=!empty($rec['content'])?$rec['content']:''; ?>
        										</div>
        										<div class="col-md-5">
        											<a href="<?=!empty($rec['url'])?base_url($rec['url']):''; ?>" class="btn btn-primary">Read More</a>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
                            </div>
        					<?php
                        }
                        ?>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <?php
}
?>
<?php
if(!empty($intro_content))
{
    ?>
    <section class="about-area ptb-100 cards-iy">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="about-content pa-ab1">
                        <div class="text">
                            <?=$intro_content;?>
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
if($featured_tabs_content) {
    $featured_tabs_content = unserialize($featured_tabs_content);
    ?>
    <section class="app-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 pl-0">
                    <img src="<?=base_url(!empty($section_image)?$section_image:'assets/img/img.jpg'); ?>" />
                </div>
                <div class="col-md-7">
                    <div class="right-tabs">
                        <h2><?=!empty($section_heading)?$section_heading:'ISIC Student Eco-System'; ?></h2>
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                                    <?php
                                      foreach($featured_tabs_content as $key => $fTab)
                                      {
                                          ?>
                                          <li class="nav-item">
                                              <a class="nav-link <?=empty($key)?'active':''; ?>" id="tab_<?=$key; ?>" data-toggle="tab" href="#tabcontent_<?=$key; ?>" role="tab" aria-controls="tab<?=$key; ?>" aria-selected="true"><?=!empty($fTab['title'])?$fTab['title']:''; ?></a>
                                          </li>
                                          <?php
                                      }
                                      ?>
                                </ul>
                            </div>
                            <!-- /.col-md-4 -->
                            <div class="col-md-8">
                                <div class="tab-content" id="myTabContent">
                                    <?php
                                    foreach($featured_tabs_content as $key => $fTab)
                                    {
                                       ?>
                                       <div class="tab-pane fade <?=empty($key)?'active':''; ?>" id="tabcontent_<?=$key; ?>" role="tabpanel" aria-labelledby="tab_<?=$key; ?>-tab">
                                            <div class="text-center">
                                                <img src="<?=base_url(!empty($fTab['icon'])?$fTab['icon']:'assets/img/app.png'); ?>" width="150">
                                            </div>
                                            <h3><?=!empty($fTab['title'])?$fTab['title']:''; ?></h3>
                                            <p><?=!empty($fTab['content'])?$fTab['content']:''; ?></p>
                                        </div>
                                      <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- /.col-md-8 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


<div class="green-layer">
	<div class="green-layer-inner"><img src="<?=base_url('assets/img/save.jpg'); ?>" /></div>
	<section class="filter-form">
		<div class="container">
			<form>
				<div class="row">
					<div class="col-md-7">
						<h4><?=!empty($discount_section_instruction)?$discount_section_instruction:''; ?></h4>
					</div>
					<div class="col-md-3">
						<select class="form-control" id="discount_country" name="discount_country">
							<option value="dm">India</option>
							<option value="bm">Abroad</option>
						</select>
					</div>

					<div class="col-md-2">
						<button class="default-btn ch1" id="homediscountfilter">Filter</button>
					</div>
				</div>
			</form>
		</div>
	</section>
	<section class="portfolio-area pt-00 pb-00">
    	<div class="container-fluid p-0">
    	    <div id="indiadiscountcarousal" class="portfolio-slides owl-carousel owl-theme">
            	<?php
            	//pre($india_discounts);
                if(!empty($india_discounts))
                {
                    foreach($india_discounts as $provider)
            		{
                        ?>
        				<div class="single-portfolio-item dsHome">
        					<a href="<?=base_url('discounts/india/provider/'.$provider->providerId_api); ?>" class="image d-block">
        						<img src="<?=base_url(!empty($provider->featured_img)?$provider->featured_img:'assets/img/no_photo.png'); ?>" alt="image" />
        						<div class="pro-details-div">
        							<div class="pro-details-div-inner">
        								<div class="row">
        									<div class="col-md-12">
        										<h3><?=$provider->name; ?></h3>
        									</div>
        									<i class="bx bx-plus"></i>
        								</div>
        							</div>
        						</div>
        					</a>
                        </div>
                        <?php
                    }
    			    /*foreach($india_discounts->items as $provider)
            		{
                        ?>
        				<div class="single-portfolio-item dsHome">
        					<a href="<?=base_url('discounts/india/provider/'.$provider->id); ?>" class="image d-block">
        						<img src="<?=!empty($provider->logoUrl)?$provider->logoUrl:base_url('assets/img/no_photo.png'); ?>" alt="image" />
        						<div class="pro-details-div">
        							<div class="pro-details-div-inner">
        								<div class="row">
        									<!--<div class="col-md-4">
        										<img src="<?=base_url('assets/img/pee-safe.jpg'); ?>" />
        									</div>-->
        									<div class="col-md-12">
        										<h3><?=$provider->name; ?></h3>
        									</div>
        									<!--div class="col-md-12">
        										<?=!empty($provider->description)?$provider->description:''; ?>
        									</div-->
        									<i class="bx bx-plus"></i>
        								</div>
        							</div>
        						</div>
        					</a>
                        </div>
                        <?php
                    }*/
                }
                ?>
            </div>
            
            <div id="abroaddiscountcarousal" class="portfolio-slides owl-carousel owl-theme" style="display:none;">
            	<?php
            	//pre($abroad_discounts);
                if(!empty($abroad_discounts))
                {
                    foreach($abroad_discounts as $provider)
            		{
                        ?>
        				<div class="single-portfolio-item dsHome">
        					<a href="<?=base_url('discounts/abroad/provider/'.$provider->providerId_api); ?>" class="image d-block">
        						<img src="<?=base_url(!empty($provider->featured_img)?$provider->featured_img:'assets/img/no_photo.png'); ?>" alt="image" />
        						<div class="pro-details-div">
        							<div class="pro-details-div-inner">
        								<div class="row">
        									<div class="col-md-12">
        										<h3><?=$provider->name; ?></h3>
        									</div>
        									<i class="bx bx-plus"></i>
        								</div>
        							</div>
        						</div>
        					</a>
                        </div>
                        <?php
                    }
                    
    			    /*foreach($abroad_discounts['providers'] as $provider)
            		{
                        ?>
        				<div class="single-portfolio-item dsHome">
        					<a href="<?=base_url('discounts/abroad/provider/'.$provider['providerId']); ?>" class="image d-block">
        						<img src="<?=!empty($provider['logo'])?$provider['logo']:base_url('assets/img/no_photo.png'); ?>" alt="image" />
        						<div class="pro-details-div">
        							<div class="pro-details-div-inner">
        								<div class="row">
        									<div class="col-md-12">
        										<h3><?=$provider['name']; ?></h3>
        									</div>
        									<i class="bx bx-plus"></i>
        								</div>
        							</div>
        						</div>
        					</a>
                        </div>
                        <?php
                    }*/
                }
                ?>
            </div>
		</div>
	</section>
</div>
<?php
//pre($testimonials);
if(!empty($testimonials))
{
    ?>
    <!-- Start Feedback Area -->
    <section class="feedback-area newSction1">
    	<div class="container">
    		<div class="row align-items-center">
    			<div class="col-lg-6 col-md-12 img">
                 <img src="<?=base_url(!empty($student_chatter_image)?$student_chatter_image:'assets/img/b3.jpg'); ?>" alt="" />
                </div>
    
    			<div class="col-lg-6 col-md-12 txt">
    				<div class="feedback-content">
    					<h2><?=!empty($chatter_section_heading)?$chatter_section_heading:''; ?></h2>
    
    					<div id="demo" class="carousel slide" data-ride="carousel">
    						<div class="carousel-inner">
    						    <?php
    						    foreach($testimonials as $key => $testimonial)
    						    {
    						        ?>
        							<div class="carousel-item <?=empty($key)?'active':''; ?>">
        								<div class="carousel-caption">
        									<?=!empty($testimonial->content)?$testimonial->content:''; ?>
        									<h4><?=!empty($testimonial->username)?$testimonial->username:''; ?></h4>
        								</div>
        			                </div>
        			                <?php
    						    }
    						    ?>
    						</div>
                            
                            <ul class="carousel-indicators">
    						    <?php
    						    foreach($testimonials as $key => $testimonial)
    						    {
    						        ?>
    						        <li data-target="#demo" data-slide-to="<?=$key; ?>" <?=empty($key)?'class="active"':''; ?>><?=!empty($testimonial->username)?$testimonial->username:''; ?></li>
    						        <?php
    						    }
    							?>
    						</ul>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
    <?php
}
?>
<section class="feedback-bottom">
	<div class="container">
		<div class="row">
			<div class="col-lg-9"></div>
			<div class="col-lg-3">
				<a class="default-btn ch1" href="<?=!empty($chatter_page_link)?base_url($chatter_page_link):''; ?>">Read More</a>
			</div>
		</div>
	</div>
</section>

<?php
if(!empty($referral_content))
{
    ?>
    <section class="rfr">
    	<div class="container">
    		<div class="row align-items-center">
    			<div class="col-lg-8 txtBlk">
    				<?=!empty($referral_content)?$referral_content:''; ?>
    			</div>
    			<div class="col-lg-4 img"><img src="<?=base_url(!empty($refferral_image)?$refferral_image:'assets/img/b2.jpg'); ?>" alt="" /></div>
    		</div>
    	</div>
    </section>
    <?php
}
?>
<?php
if(!empty($blogs))
{
    ?>
    <!-- Start Blog Area -->
    <section class="blog-area pt-100 pb-70">
    	<div class="container">
    		<div class="section-title">
    			<h2><?=!empty($blog_section_heading)?$blog_section_heading:''; ?></h2>
    		</div>
    
    		<div class="row">
    		    <?php
    		    $count =count($blogs);
                foreach ($blogs as $key => $rec)
                {
                    ?>
                    <div class="col-lg-4 col-md-6 <?=($key == $count-1)?'offset-lg-0 offset-md-3':''; ?>">
        				<div class="single-blog-post hm">
        					<div class="image">
        						<a href="<?=base_url('blog/'.$rec->slug); ?>" class="d-block">
        							<img src="<?=base_url(!empty($rec->featured_img)?$rec->featured_img:'assets/img/blog/blog-img1.jpg'); ?>" alt="image" />
        						</a>
        						<div class="post-date"><?=!empty($rec->createdOn)?date('d M',strtotime($rec->createdOn)):''?></div>
        					</div>
        
        					<div class="content">
        						<h3><a href="<?=base_url('blog/'.$rec->slug); ?>"><?=!empty($rec->name)?$rec->name:''?></a></h3>
        						<?=!empty($rec->summary)?$rec->summary:''?>
        						<p class="btnb">
        							<a href="<?=base_url('blog/'.$rec->slug); ?>" class="default-btn ch1">Read More</a>
        						</p>
        					</div>
        				</div>
        			</div>
                    <?php
                }
                ?>
    			
    		</div>
    	</div>
    </section>
    <!-- End Blog Area -->
    <?php
}
?>
<?php
if(!empty($infobox_content))
{
    ?>
    <section class="rfr clbSctn">
    <div class="bgImg"><img src="<?=base_url(!empty($infobox_image)?$infobox_image:'assets/img/b1.jpg'); ?>" alt="" /></div>
    	<div class="container pabs">
    		<div class="row">
    			<div class="col-lg-7"></div>
    			<div class="col-lg-5 b1 txt">
    				<?=!empty($infobox_content)?$infobox_content:''; ?>
    			</div>
    		</div>
    	</div>
    </section>
    <?php
}
?>
<script type="text/javascript">

$(".app-section").mouseenter(function(e){
var i =1;

$('.app-section').bind('mousewheel DOMMouseScroll', function(event){
	var tab_id = $( "#myTab a" ).filter('.active').attr('id');
	var get_id = tab_id.split('_');
	if(i > 1 && i < 6)
		wheel(event.originalEvent, this);

  function wheel(event, elm) {
    var delta = 0;
    if (event.wheelDelta) delta = event.wheelDelta / 120;
    else if (event.detail) delta = -event.detail / 3;

    handle(delta, elm);
    if (event.preventDefault) event.preventDefault();
    event.returnValue = false;
}

function handle(delta, elm) {
    var time = 1000;
    //$('#tab_'+get_id[1]).append("SCROLLED "+i);
      var distance = 100;

		$(elm).stop().animate({
			scrollTop: $(elm).scrollTop() - (distance * delta)
		}, time );
}

    if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0 ) {

			var next_id = parseInt(get_id[1])-1;
			i = next_id;
			if(next_id >= 1){
			$('#tab_'+get_id[1]).removeClass('active');
			$('#div_'+get_id[1]).removeClass('active show');
			$('#tab_'+next_id).addClass('active');
			$('#div_'+next_id).addClass('active show');
			}
    }
    else {

		var next_id = parseInt(get_id[1])+1;
		i = next_id;
		if(next_id <= 6){
		$('#tab_'+get_id[1]).removeClass('active');
		$('#div_'+get_id[1]).removeClass('active show');
		$('#tab_'+next_id).addClass('active');
		$('#div_'+next_id).addClass('active show');
		}
	}

});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click','#homediscountfilter',function(e){
        e.preventDefault();
        var discount_country = $('#discount_country').val();
        
        if(discount_country == 'bm')
        {
            $('#indiadiscountcarousal').hide();
            $('#abroaddiscountcarousal').show();
        }
        else
        {
            $('#indiadiscountcarousal').show();
            $('#abroaddiscountcarousal').hide();
        }
       /* var base_url = $('body').attr('data-url');
        jQuery.ajax({
             type : "post",
             url : base_url+'discounts/home_discount_ajax',
             data : {'discount_country' : discount_country},
             success: function(response) {
                   jQuery("#discountcarousal").html(response);
                   // Portfolio Slides
                	$('.portfolio-slides').owlCarousel('refresh');
             }
        });*/
    });
});
</script>
<!--script id="rendered-js">
$(document).ready(function() {
		$('a[href*=#]').bind('click', function(e) {
				e.preventDefault(); // prevent hard jump, the default behavior

				var target = $(this).attr("href"); // Set the target as variable

				// perform animated scrolling by getting top-position of target-element and set it as scroll target
				$('html, body').stop().animate({
						scrollTop: $(target).offset().top
				}, 600, function() {
						location.hash = target; //attach the hash (#jumptarget) to the pageurl
				});

				return false;
		});
});
$(window).scroll(function() {
		var scrollDistance = $(window).scrollTop();

		// Show/hide menu on scroll
		//if (scrollDistance >= 850) {
		//		$('nav').fadeIn("fast");
		//} else {
		//		$('nav').fadeOut("fast");
		//}
	
		// Assign active class to nav links while scolling
		$('.page-section').each(function(i) {
				if ($(this).position().top <= scrollDistance) {
						$('.navigation a.active').removeClass('active');
						$('.navigation a').eq(i).addClass('active');
				}
		});
}).scroll();
</script-->





















