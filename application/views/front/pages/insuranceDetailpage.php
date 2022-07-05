<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
    <div class="container-fluid">
        <div class="single-banner-item">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="banner-content">
                        <h1 class="text-uppercase"><span style="color: #feed01;"><?=!empty($pageContent->name)?$pageContent->name:'404-Not Found'?> </span></h1>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="banner-image">
                        <img src="<?=base_url(!empty($pageContent->banner_img)?$pageContent->banner_img:'assets/img/card-2.jpg'); ?>" alt="<?=!empty($pageContent->name)?$pageContent->name:'404-Not Found'?>" />
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
                <a href="#"><?=!empty($pageContent->name)?$pageContent->name:'404-Not Found'?></a>
            </li>
        </ul>
    </nav>
</section>

<?php
if(!empty($pageContent->type) && $pageContent->type == 'html')
{
    echo $pageContent->description;
}
else
{
    ?>
    <section class="blog-details-area bg-f9f9f9 ptb-100 recent-bl">
    	<div class="container">
    		<div class="what-we-do-content blog-pl12">
    			<h3><?=!empty($pageContent)?$pageContent->name:'404-Not Found'?></h3>
    		</div>
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
    </section>
    <?php
}
?>