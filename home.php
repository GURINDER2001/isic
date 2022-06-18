<section class="banner-section">
    <div class="banner-contorller">
        <img src="<?=base_url(!empty($brandData->cover_image)?$brandData->cover_image:'assets/brand/images/banner-bg.jpg'); ?>" class="img-responsive" alt="" />
    </div>
    <div class="container">
        <div class="row">
            <div class="header-text">
                <div class="col-sm-8">
                    <div class="banner-text">
                        <?=!empty($brandData->cover_content)?$brandData->cover_content:''; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="find-main">

                <div class="col-md-12">

                    <div class="register-form">

                        <form class="eq-form">
                            <div class="col-sm-4">
                                <p>Find Your Degree</p>
                            </div>
                            <div class="col-sm-4 form-group">
                                <span class="inputusericon"><i class="fa fa-search"></i></span>
                                <input id="autosearch" name="q" type="text" value="" size="40" class="form-control" placeholder="Search your course...">
                            </div>
                            <div class="col-sm-4 form-group">
                                <?php echo form_dropdown('degree', $degree_options,set_value('degree',isset($degree)?$degree:""),'id="degree" class="form-control"'); ?>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<?php
if(!empty($popular_categories))
{
    ?>
    <div class="container">
        <div class="row">
            <div class="categories">

                <div class="head-title-center">Popular Categories</div>
                <div class="categories-main">
                    <?php
                    foreach ($popular_categories as $key => $cat)
                    {
                        //pre($cat);
                        ?>
                        <div class="categories-box">
                            <div class="categories-heading">
                                <a href="<?=getCategoryUrl($cat['slug']); ?>">
                                    <?=!empty($cat['name'])?$cat['name']:''; ?>
                                </a>
                            </div>
                            <?php
                            if(!empty($cat['children']))
                            {
                                ?>
                                <ul>
                                    <?php
                                    foreach ($cat['children'] as $key => $childCat)
                                    {
                                        ?>
                                        <li>
                                            <a href="<?=getCategoryUrl($childCat['slug']); ?>">
                                                <?=!empty($childCat['name'])?$childCat['name']:''; ?><span>(554)</span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
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
    <?php
}
?>

<section class="gray-bg">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="white-box">

                    <span>Universities & Colleges</span>
                    <p>Search for top universities, colleges and business schools worldwide and contact their admission offices directly!</p>

                    <ul class="point">
                        <li><a href="#">Universities in UK</a></li>
                        <li><a href="#">Universities in Canada</a></li>
                        <li><a href="#">Universities in USA</a></li>
                        <li><a href="#">Universities in Australia</a></li>
                        <li><a href="#">Universities in Germany</a></li>
                        <li><a href="#">Universities in the Netherlands</a></li>
                        <li><a href="#">Universities in France</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="white-box">

                    <span>Online Masters</span>
                    <p>Getting your <strong>Masters degree online</strong> is highly convenient and can be completed at a pace which suits you best. Online Masters degrees awarded by accredited online colleges and universities have the same respect and prestige as those from traditional educational institutions. Online programs are an excellent way to obtain degrees and pursue higher education.</p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="white-box">

                    <span>Health Studies</span>
                    <p><strong>Graduate Health Studies</strong> are aimed at students who wish to specialize further in a particular health-related discipline, and to advance their medical career. A graduate degree in Health provide students with advanced research training and strong academic foundation in their chosen specialization. The programs often also include practical hands-on training in a healthcare facility. Graduates of a Master in a Health related program are prepared for a clinical, managerial, or research-oriented career in the public, non-profit, or private sector.</p>

                </div>
            </div>

        </div>
    </div>
</section>

<?php
if(!empty($latest_news))
{
    ?>
    <div class="container">
        <div class="row">
            <div class="news-wrapper">
                <div class="col-md-12">
                    <div class="head-title-left">Educational News</div>
                    <a class="showall" href="<?=base_url('news'); ?>">Show All</a>
                </div>

                <?php
                $last_news = array_shift($latest_news);
                ?>
                <div class="col-md-6">
                    <?php
                    if(!empty($last_news))
                    {
                        ?>
                        <div class="upcoming-conferences">
                            <div class="conf-pic">
                                <img src="<?=base_url(!empty($last_news->featured_img)?$last_news->featured_img:'assets/brand/images/no_image.gif'); ?>" alt="">
                            </div>
                            <div class="conf-text">
                                <p class="conf-head"><?=!empty($last_news->name)?$last_news->name:''; ?></p>
                                <span>On <?=!empty($last_news->createdOn)?date('d.m.Y',strtotime($last_news->createdOn)):''; ?></span>
                                <p><?=!empty($last_news->summary)?$last_news->summary:''; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>                
                </div>

                <div class="col-md-6">
                    <?php
                    if(!empty($latest_news))
                    {
                        ?>
                        <div class="news-right">
                            <?php                    
                            foreach ($latest_news as $key => $news)
                            {
                                ?>
                                <div class="news-right-box">
                                    <div class="col-sm-5">
                                        <div class="news-right-pic">
                                            <img src="<?=base_url(!empty($news->featured_img)?$news->featured_img:'assets/brand/images/no_image.gif'); ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="news-right-txt">
                                            <p><strong><?=!empty($news->name)?$news->name:''; ?></strong></p>
                                            <p class="date"><?=!empty($news->createdOn)?date('d.m.Y',strtotime($news->createdOn)):''; ?></p>
                                            <p><?=!empty($news->summary)?substr($news->summary, 0,90):''; ?></p>
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
    <?php
}

if(!empty($news_cat))
{
    ?>
    <section class="shelter-wrapper">
        <div class="container">
            <div class="row">
                <div id="work-slider01" class="owl-carousel">
                    <?php
                    foreach ($news_cat as $key => $newCat)
                    {
                        //pre($newCat);
                        ?>
                        <div class="item">
                            <div class="white-box-shelter">
                                <span><?=!empty($newCat['name'])?$newCat['name']:''; ?></span> <a class="viewall" href="<?=base_url('news-category/'.$newCat['slug']); ?>">View All</a>
                                <?php
                                if(!empty($newCat['news']))
                                {
                                    $newsArrOfCat = $newCat['news'];
                                    if(!empty($newsArrOfCat))
                                    {
                                        foreach ($newsArrOfCat as $key => $news)
                                        {
                                            ?>
                                            <div class="edu-news">
                                                <date><?=!empty($news['createdOn'])?date('F d, Y',strtotime($news['createdOn'])):''; ?></date>
                                                <a href="<?=base_url('news/'.$newCat['slug'].'/'.$news['slug']); ?>"><?=!empty($news['name'])?$news['name']:''; ?></a>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                ?>
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

if(!empty($latest_aticles))
{
    ?>
    <div class="container">
        <div class="row">
            <div class="news-wrapper">

                <div class="col-md-12">

                    <div class="head-title-left">Educational articles</div>

                    <a class="showall" href="<?=base_url('articles'); ?>">Show All</a>

                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="courses-wrapper feature-pro-sec">

                <div id="work-slider" class="owl-carousel">

                    <?php
                    foreach ($latest_aticles as $key => $rec)
                    {
                        ?>
                        <div class="item">
                            <div class="home-pro-col product">
                                <a href="<?=base_url('articles/'.$rec->slug); ?>">
                                    <div class="home-f-pro"><img src="<?=base_url(!empty($rec->featured_img)?$rec->featured_img:'assets/brand/images/no_image.gif'); ?>"></div>
                                    <div class="artical-name"><?=!empty($rec->name)?$rec->name:''; ?></div>
                                    <div class="client-name">By Alyssa Walker
                                        <date><?=!empty($rec->createdOn)?date('F d, Y',strtotime($rec->createdOn)):''; ?></date>
                                    </div>
                                    <p><?=!empty($rec->summary)?substr($rec->summary, 0,150).'....':''; ?></p>

                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>

            </div>
        </div>
    </div>
    <?php
}

if(!empty($new_programs))
{
    ?>
    <section class="newly-program-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="head-title-center">Newly Added Programs</div>
                </div>

                <div class="feature-pro-sec newly-program">

                    <?php
                    foreach ($new_programs as $key => $program)
                    {
                        //pre($program);
                       ?>
                       <div class="col-sm-4">
                            <div class="home-pro-col product">
                                <div class="home-f-pro"><img src="<?=base_url(!empty($program->featured_img)?$program->featured_img:'assets/brand/images/no_image.gif'); ?>"></div>
                                <div class="artical-name"><?=!empty($program->name)?$program->name:''; ?></div>
                                <div class="client-name">By Alyssa Walker
                                    <date><?=!empty($program->createdOn)?date('F d, Y',strtotime($program->createdOn)):''; ?></date>
                                </div>
                                <p><?=!empty($program->summary)?substr($program->summary, 0,150).'....':''; ?></p>

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

if(!empty($usefull_links))
{
    ?>
    <section class="gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="head-title-center">Useful Links</div>
                </div>
                <div class="useful-main">
                    <?php
                    $i=1;
                    foreach ($usefull_links as $key => $catData)
                    {
                        //pre($catData);
                        if($i==1 || $i%4==0)
                        {
                            echo '<div class="useful-wrapper">';
                        }

                        ?>
                            <div class="col-md-4">
                                <div class="useful-white-box">
                                    <span><?=!empty($catData['name'])?$catData['name']:''; ?></span>
                                    <?=!empty($catData['description'])?$catData['description']:''; ?>
                                    <?php
                                    if(!empty($catData['children']))
                                    {
                                        ?>
                                        <ul class="usefulpoint">
                                            <?php
                                            foreach ($catData['children'] as $key => $child)
                                            {
                                                ?>
                                                <li><a href="#"><?=!empty($child['name'])?$child['name']:''; ?></a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                        <?php
                                    }
                                    ?>                                    
                                </div>
                            </div>
                        <?php

                        if($i==3 || $i%3==0)
                        {
                            echo '</div>';
                        }

                        $i++;
                    }
                    ?>
                </div>

            </div>
        </div>
    </section>
    <?php
}
?>