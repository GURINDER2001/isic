<?php
if(!empty($slider_data))
{   
    ?>
    <section class="banner">
        <div id="slider" class="owl-carousel">
            <?php
            foreach ($slider_data as $key => $slide) {
                ?>
                <div class="item">
                    <div class="container banner_containt">
                        <div class="banner-text">
                            <?=!empty($slide->description)?$slide->description:''; ?>
                        </div>
                    </div>
                    <img src="<?=base_url(!empty($slide->featured_img)?$slide->featured_img:'assets/front/images/banner.jpg'); ?>" alt="" class="img-responsive">
                    <div class="overlay"></div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <?php
}
else
{
    ?>
    <section class="inner-banner-contorller">
        <div class="inner-banner-contorller">
            <img src="<?=base_url('assets/front/images/inner01.jpg'); ?>" alt="" />
            <div class="static-text">Home</div>
        </div>
    </section>
    <?php
}

if(!empty($pageContent)):
    extract($pageContent);
endif;
?>
<!--------------------- what-we-do start --------------------->
<?php
if(!empty($keyinfo_content))
{
    $keyinfo_content = unserialize($keyinfo_content);
    ?>
    <section class="what-we-do">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <div class="what-we-wrapper">
                        <div class="head-title"><?=!empty($keyinfo_heading)?$keyinfo_heading:'WHAT WE DO BEST'; ?></div>
                        <div id="upcoming-slider" class="owl-carousel">
                            <?php
                            foreach ($keyinfo_content as $key => $rec) {
                                ?>
                                <div class="item">
                                    <div class="what-we-item">
                                        <img src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/front/images/icon01.jpg'); ?>" alt="" />
                                        <span class="heading-blue"><?=!empty($rec['title'])?$rec['title']:''; ?></span>
                                        <p><?=!empty($rec['content'])?$rec['content']:''; ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-wrapper-pic">
                        <img src="<?=base_url(!empty($keyinfo_image)?$keyinfo_image:'assets/front/images/what-we.jpg'); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>

<!--------------------- what-we-do end --------------------->
<?php
if(!empty($infobox_heading))
{
    ?>
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-us-txt">
                        <div class="head-title-white"><?=!empty($infobox_heading)?$infobox_heading:'About Us'; ?></div>
                        <div class="about-us-box">
                            <?=!empty($infobox_content)?$infobox_content:'About Us'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}

if(!empty($package_content))
{
    ?>
    <div class="container">
        <div class="row">
            <div class="packages">
               <?=!empty($package_content)?$package_content:''; ?>
            </div>
            <div class="clearfix"></div>
            <div class="big-txt-center">CHOOSE YOUR
                <br>CUSTOMIZED PACKAGE</div>
        </div>
    </div>
    <?php
}
?>

<?php
//pre($upcoming_event);
?>
<div class="container">
    <div class="row">
        <div class="news-wrapper">
            
                <div class="col-md-7">
                    <div class="head-title-small">UPCOMING EVENT</div>
                    <div class="upcoming-conferences">
                        <?php
                        if(!empty($upcoming_event))
                        {
                            ?>
                            <div class="conf-pic">
                                <img src="<?=base_url(!empty($upcoming_event->featured_img)?$upcoming_event->featured_img:'assets/front/images/no_image.gif'); ?>" alt="" />
                            </div>
                            <div class="conf-text">
                                <p class="conf-head"><?=!empty($upcoming_event->name)?$upcoming_event->name:''; ?></p>
                                <span><?=!empty($upcoming_event->event_date)?date('d M, Y',strtotime($upcoming_event->event_date)):''; ?> <?=!empty($upcoming_event->vanue)?'('.$upcoming_event->vanue.')':''; ?></span>
                                <?=!empty($upcoming_event->summary)?$upcoming_event->summary:''; ?>
                            </div>
                            <?php
                        }
                        else
                        {
                            echo 'No Upcoming event available !!';
                        }
                        ?> 
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="head-title-small">NEWS</div>
                    <?php
                    if(!empty($latest_news))
                    {
                        ?>
                        <div class="news-right">
                            <?php
                            foreach ($latest_news as $key => $new)
                            {
                               ?>
                               <div class="news-right-box">
                                    <div class="col-sm-5">
                                        <div class="news-right-pic">
                                            <img src="<?=base_url(!empty($new->featured_img)?$new->featured_img:'assets/front/images/no_image.gif'); ?>" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="news-right-txt">
                                            <p><strong><?=!empty($new->name)?$new->name:''; ?></strong>
                                            </p>
                                            <p class="date"><?=!empty($new->createdOn)?date('d.m.Y',strtotime($new->createdOn)):''; ?></p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                                        </div>
                                    </div>
                                </div>
                               <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>                
                </div>
                     
        </div>
    </div>
</div>
