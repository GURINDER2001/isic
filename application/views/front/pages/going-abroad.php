<?php
//pre($pageContent);
if(!empty($pageContent)):
    extract($pageContent);
endif;
?>
<!-- Start Main Banner Area -->

<section class="home-wrapper-area1">
  <div class="container-fluid">
    <div class="single-banner-item">
      <div class="row align-items-center">
        <div class="col-lg-4 col-md-12">
          <div class="banner-content">
            <h1 class="text-uppercase"><span style="color: #feed01;">
              <?=!empty($heading)?$heading:'Going Abroad'?>
              </span></h1>
          </div>
        </div>
        <div class="col-lg-8 col-md-12">
          <div class="banner-image"> <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/gcard-1.jpg'); ?>" alt="<?=!empty($heading)?$heading:' Going Abroad'?>" /> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Main Banner Area -->

<section class="breadcrumbs12">
  <nav aria-label="Breadcrumbs">
    <ul class="breadcrumbs">
      <li class="breadcrumbs__item"> <a href="/"> <i class="fa fa-home" aria-hidden="true"></i> </a> </li>
      <li class="breadcrumbs__item1"> <a href="javascript:;"><?=!empty($heading)?$heading:' Going Abroad'?></a> </li>
    </ul>
  </nav>
</section>

<?php
if(!empty($comment))
{
    ?>
    <section class="abroadSection1">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="quote">
              <p><?=$comment; ?></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
}
?>
<?php
if(!empty($facts_content))
{
    $facts_content = unserialize($facts_content);
    ?>
    <section class="abroadSection2" style="background-image:url(assets/img/number-bg.jpg)">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2><?=!empty($facts_heading)?$facts_heading:'ISIC in Numbers'; ?></h2>
          </div>
        </div>
        <div class="row mt-4">
            <?php
            foreach ($facts_content as $key => $rec)
            {
                ?>
                <div class="col-md-4 text-center">
                    <div class="aBox"> <span class="icon"><img src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/img/number-icon-1.png'); ?>" alt="<?=!empty($rec['key'])?$rec['key']:''; ?>" /></span>
                      <div>
                        <h4><?=!empty($rec['value'])?$rec['value']:''; ?></h4>
                        <h6><?=!empty($rec['key'])?$rec['key']:''; ?></h6>
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


<section class="newDesicount">
  <div class="container">
    <div class="sctnTitle">
      <h2>Start Saving in India</h2>
    </div>
    
    <div class="discountsHome">
     <div class="discountsliderNo">
        <?php
    	//pre($india_discounts);
        if(!empty($india_discounts))
        {
            foreach($india_discounts as $provider)
    		{
                ?>
                <div class="item"> 
                 <a href="<?=base_url('discounts/india/provider/'.$provider->providerId_api); ?>"> 
                   <div class="thumb">
                     <img class="poster" src="<?=base_url(!empty($provider->banner_img)?$provider->banner_img:'assets/img/no_photo.png'); ?>" alt="image" />
                     <div class="dscLogo"> <img src="<?=base_url(!empty($provider->featured_img)?$provider->featured_img:'assets/img/no_photo.png'); ?>" /> </div>
                   </div>
                    <div class="dscInfo">
                          <h3><?=$provider->name; ?></h3>
                        <?php if(!empty($provider->summary)) {?>
                          <p><?=$provider->summary; ?></p>
                        <?php } ?>
                        <span class="plsIcn"><i class="bx bx-plus"></i></span>
                      </div>
                  </a> 
                  </div>
                <?php
            }
        }
        ?>
      </div>
    </div>
    
    
  </div>
</section>


<section class="newDesicount bgGrey">
  <div class="container">
    <div class="sctnTitle">
      <h2>Top Destinations</h2>
      <div class="newDsc home">
      <div class="filter-form">
        <!--form>
          <div class="row">
            <div class="col-md-4 empty"></div>
            <div class="col-md-4">
              <select class="form-control" id="discount_country" name="discount_country">
                    <option value="">Countries</option>
                    <?php
                    if(!empty($countries))
                    {
                        foreach($countries as $id => $name)
                        {
                            ?>
                            <option value="<?=$id; ?>"><?=$name; ?></option>
                            <?php
                        }
                    }
                    ?>
				</select>
              <button class="default-btn ch1" id="discountfilter">Filter</button>
            </div>
            <div class="col-md-4 empty"></div>
          </div>
        </form-->
        
        <div class="row">
            <div class="col-md-12">
                    <?php
                    if(!empty($countries))
                    {
                        $i = 1;
                        foreach($countries as $id => $name)
                        {
                            $active = ($i == 1)?'filterBtnActive':'';
                            ?>
                            <button class="default-btn ch1 filterButton <?=$active; ?>" data-id="<?=$id; ?>"><?=$name; ?></button>
                            <?php
                            $i++;
                        }
                    }
                    ?>
              
            </div>
          </div>
      </div>
    </div>
    </div>
    
    <div class="discountsHome">
     <div class="discountsliderNo">
       <?php
    	//pre($abroad_discounts);
        if(!empty($abroad_discounts))
        {
            foreach($abroad_discounts as $provider)
    		{
    		    //pre($provider->country_id);
                ?>
                <div class="item abroadDiscount <?=!empty($provider->country_id)?$provider->country_id:''; ?>"> 
                 <a href="<?=base_url('discounts/india/provider/'.$provider->providerId_api); ?>"> 
                   <div class="thumb">
                    <img class="poster" src="<?=base_url(!empty($provider->banner_img)?$provider->banner_img:'assets/img/no_photo.png'); ?>" alt="image" />
                    <div class="dscLogo"> <img src="<?=base_url(!empty($provider->featured_img)?$provider->featured_img:'assets/img/no_photo.png'); ?>" /> </div>
                    </div>
                        <div class="dscInfo">
                          <h3><?=$provider->name; ?></h3>
                        <?php if(!empty($provider->summary)) {?>
                          <p><?=$provider->summary; ?></p>
                        <?php } ?>
                        <span class="plsIcn"><i class="bx bx-plus"></i></span>
                      </div>
                  </a> 
                  </div>
                <?php
            }
        }
        ?>
      </div>
    </div>
    
    
  </div>
</section>



<section class="abroadSection2 srchSctn" style="background-image:url(assets/img/searchBg.jpg)">
  <div class="container">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center txtCap">
          <h2>Search Your Country Here</h2>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6 srchForm">
            <a href="<?=base_url('discounts').'?type=bm'; ?>" class="default-btn ch1">Search</a>
          <!--form method="post" action="<?=base_url('discounts'); ?>">
              <input type="hidden" name="discount_type" value="dm">
            <input type="text" name="location" placeholder="Search">
            <button type="submit" class="default-btn ch1">Search</button>
          </form-->
        </div>
      </div>
    </div>
  </div>
</section>

<?php
if(!empty($infobox3_heading) || !empty($infobox3_content))
{
    ?>
    <section class="abroadSection7">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6"><img src="<?=!empty($infobox_image3)?$infobox_image3:'assets/img/gcard-4.png'; ?>"></div>
          <div class="col-md-6 listStyle">
              <h2><?=!empty($infobox3_heading)?$infobox3_heading:''; ?></h2>
              <?=!empty($infobox3_content)?$infobox3_content:''; ?>
          </div>
        </div>
      </div>
    </section>
    <?php
}
?>

<!--section class="gAbroade2e">
    <?php
    if(!empty($infobox1_heading) || !empty($infobox1_content))
    {
        ?>
        <div class="garow">
          <div class="img"><img src="<?=!empty($infobox_image1)?$infobox_image1:'assets/img/gcard-2.jpg'; ?>"></div>
          <div class="txt">
              <h2><?=!empty($infobox1_heading)?$infobox1_heading:''; ?></h2>
              <?=!empty($infobox1_content)?$infobox1_content:''; ?>
          </div>
        </div>
        <?php
    }
    if(!empty($infobox2_heading) || !empty($infobox2_content))
    {
        ?>
        <div class="garow">
          <div class="img"><img src="<?=!empty($infobox_image2)?$infobox_image2:'assets/img/gcard-3.jpg'; ?>"></div>
          <div class="txt">
              <h2><?=!empty($infobox2_heading)?$infobox2_heading:''; ?></h2>
              <?=!empty($infobox2_content)?$infobox2_content:''; ?>
          </div>
        </div>
        <?php
    }
    ?>
</section-->


<?php
if(!empty($tabs_content))
{
    $tabs_content = unserialize($tabs_content);
    ?>
    <!-- Start Feedback Area -->
    <section class="abroadTabs">
      <div class="container"> 
        <!-- Tabs navs -->
        <div class="tab">
            <?php
            foreach ($tabs_content as $key => $rec)
            {
                $refrence = 'tab_'.$key;
                ?>
                <button class="tablinks" onclick="openCard(event, '<?=$refrence; ?>')"><?=!empty($rec['title'])?$rec['title']:''; ?></button>
                <?php
            }
            ?>
        </div>
        <!-- Tabs navs --> 
        
        <!-- Tabs content -->
        <?php
        foreach ($tabs_content as $key => $rec)
        {
            $refrence = 'tab_'.$key;
            ?>
            <div id="<?=$refrence; ?>" class="tabcontent" style="display:<?=!empty($key)?'none':'block'; ?>;">
              <div class="row">
               <div class="col-md-6"><img src="<?=!empty($rec['image'])?$rec['image']:'assets/img/gcard-5.png'; ?>"></div>
               <div class="col-md-6 listStyle">
                  <?=!empty($rec['content'])?$rec['content']:''; ?>
               </div>
              </div>
            </div>
            <?php
        }
        ?>
        <!-- Tabs content --> 
      </div>
    </section>
    <?php
}
?>

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
<section class="feedback-bottom bgdark2">
	<div class="container">
		<div class="row">
			<div class="col-lg-9"></div>
			<div class="col-lg-3">
				<a class="default-btn ch1" href="<?=!empty($chatter_page_link)?base_url($chatter_page_link):''; ?>">Read More</a>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
$(document).ready(function(){
    var discount_country = $('.filterBtnActive').attr('data-id');
    $('.abroadDiscount').hide();
    $('.'+discount_country).show();
    $(document).on('click','.filterButton',function(e){
        e.preventDefault();
        var discount_country = $(this).attr('data-id');
        
        $('.filterButton').removeClass('filterBtnActive');
        $(this).addClass('filterBtnActive'); 
            
        if(discount_country != '')
        {
            $('.abroadDiscount').hide();
            $('.'+discount_country).show();
        }
        else
        {
            $('.abroadDiscount').show();
        }
        
    });
});
</script>
<script>
function openCard(evt, cardName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cardName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>