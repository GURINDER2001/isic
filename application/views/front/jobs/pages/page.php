<!------------------------ banner ------------------------>
<section class="inner-banner-contorller">

    <div class="inner-banner-contorller">
        <img src="<?=base_url(!empty($pageContent->banner_img)?$pageContent->banner_img:'assets/front/images/inner04.jpg'); ?>" alt="" />
        <div class="static-text"><a href="<?=base_url(); ?>">Home</a>/<?=!empty($pageContent->name)?$pageContent->name:'404-Not Found'?></div>
    </div>
</section>
<!--------------------- banner finish --------------------->

<!--------------------- what-we-do start --------------------->

<section class="what-we-do">

    <div class="container">

        <div class="head-title-blk"><?=!empty($pageContent)?$pageContent->name:'404-Not Found'?></div>

        <div class="inner-wrapper">

            <div class="row">

                <div class="col-md-12">

                    <div class="rec-details">
                        
                        <?php
                        if(!empty($pageContent))
                        {
                          echo $pageContent->description;
                        }
                        else
                        {
                          ?>
                          <div class="rec-heading">
                            <h3>404-Not Found</h3>
                          </div>
                          <p>Keyword which you want to search is not exists. Please change keyword and try again.</p> 
                          <?php
                        }
                        ?>

                    </div>

                </div>

            </div>

        </div>
    </div>
</section>