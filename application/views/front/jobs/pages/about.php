<?php
if(!empty($pageContent)):
    extract($pageContent);
endif;
?>
<!------------------------ banner ------------------------>
<section class="inner-banner-contorller">
    <div class="inner-banner-contorller">
        <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/front/images/inner01.jpg'); ?>" alt="" />
        <div class="static-text"><a href="<?=base_url(); ?>">Home</a>/About Us</div>
    </div>
</section>
<!--------------------- banner finish --------------------->

<!--------------------- what-we-do start --------------------->
<?php
if(!empty($infobox_heading))
{
    ?>
    <section class="what-we-do">
        <div class="container">
            <div class="row">
                <div class="contant-wrapper">
                    <div class="col-lg-7">
                        <div class="head-title-small"><?=!empty($infobox_heading)?$infobox_heading:'WELCOME TO proeducation'; ?></div>
                        <div class="common-text-box">
                            <img src="<?=base_url(!empty($infobox_icon)?$infobox_icon:'assets/front/images/icon03.jpg'); ?>" alt="">
                            <span class="heading-blue-big"><?=!empty($infobox_subheading)?$infobox_subheading:'Learned Proeducation'; ?></span>
                            <div class="common-paragraph">
                                <?=!empty($infobox_content)?$infobox_content:''; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="abtpic">
                            <img src="<?=base_url(!empty($infobox_image)?$infobox_image:'assets/front/images/abt-pic.jpg'); ?>" alt="">
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
if(!empty($keyinfo_content))
{
    $keyinfo_content = unserialize($keyinfo_content);
    ?>
    <div class="container">
        <div class="row">
            <div class="news-wrapper">

                <div class="head-title-blk"><?=!empty($keyinfo_heading)?$keyinfo_heading:'our Recent Courses'; ?></div>

                <div class="inner-wrapper">
                    <?php
                    foreach ($keyinfo_content as $key => $rec)
                    {
                        ?>
                        <div class="col-md-4">
                            <div class="common-text-box">
                                <img src="<?=base_url(!empty($rec['icon'])?$rec['icon']:'assets/front/images/icon01.jpg'); ?>" alt="" />
                                <span class="heading-blue-big"><?=!empty($rec['title'])?$rec['title']:''; ?></span>
                                <div class="common-paragraph">
                                    <p><?=!empty($rec['content'])?$rec['content']:''; ?></p>
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
    <?php
}
?>