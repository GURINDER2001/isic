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
                        <h1 class="text-uppercase"><span style="color: #feed01;"><?=!empty($page_title)?$page_title:'CARDS'; ?> </span></h1>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="banner-image">
                        <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/img/card-2.jpg'); ?>" alt="image" />
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
                <a href="#"><?=!empty($page_title)?$page_title:'CARDS'; ?></a>
            </li>
        </ul>
    </nav>
</section>

<section class="cardpageSctn1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="cardsSctn1 listStyle">
                    <div class="text">
                        <?=!empty($page_content)?$page_content:''; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if(!empty($records))
{
    $record1st = array_shift($records);
    if(!empty($record1st))
    {
        ?>
        <section class="cardpageSctn2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-img y-img-1">
                            <img src="<?=base_url(!empty($record1st->featured_img)?$record1st->featured_img:'assets/img/cards-new1.png'); ?>" alt="image" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="txtwhite isicCard1">
                            <div class="text listStyle">
                                <h2><?=!empty($record1st->name)?$record1st->name:''; ?></h2>
                               <?=!empty($record1st->summary)?$record1st->summary:''; ?>
        
                                <div class="card-btn">
                                    <a href="<?=getSetting('order_url'); ?>" target="_blank" class="default-btn ch1">BUY ONLINE NOW</a>
                                    <a href="<?=!empty($record1st->slug)?base_url('cards/'.$record1st->slug):''; ?>" class="default-btn ch2">MORE INFORMATION</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
    if(!empty($records))
    {
        ?>
        <div class="card-okl1 card-img12 ba-caed-new">
            <div class="container">
                <div class="row">
                    <?php
                    foreach($records as $key=>$rec)
                    {
                       ?>
                       <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="box-card rl">
                                <div class="img-card">
                                    <img src="<?=base_url(!empty($rec->featured_img)?$rec->featured_img:'assets/img/cards-new1.png'); ?>" />
                                </div>
                                <div class="text-box listStyle">
                                    <h2><?=!empty($rec->name)?$rec->name:''; ?></h2>
                                    <?=!empty($rec->summary)?$rec->summary:''; ?>
                                </div>
            
                                <div class="card-btn ab">
                                    <a href="<?=getSetting('order_url'); ?>" target="_blank" class="default-btn ch1">BUY ONLINE NOW</a>
                                    <a href="<?=!empty($rec->slug)?base_url('cards/'.$rec->slug):''; ?>" class="default-btn ch2">MORE INFORMATION</a>
                                </div>
                            </div>
                        </div>
                       <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}
?>
<section class="carddEndor">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 listStyle">
                    <div class="text">
                        <h2>Our Endorsements</h2>
                        <p>
                         ISIC is endorsed by renowned organizations such as UNESCO, UNWTO, the European Council on Culture
and the Andean Community of Nations. The card is recognized across the globe, by Academic
Institutions, Student Organizations, National Governments and Ministries of Education, Tourism &amp;
Culture.
						</p>
                    </div>
            </div>
        </div>
    </div>
</section>

        