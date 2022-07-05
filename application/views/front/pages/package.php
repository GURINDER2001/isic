<?php
if(!empty($pageContent)):
    extract($pageContent);
endif;
?>
<!------------------------ banner ------------------------>
<section class="inner-banner-contorller">

    <div class="inner-banner-contorller">
        <img src="<?=base_url(!empty($banner_img)?$banner_img:'assets/front/images/inner04.jpg'); ?>" alt="" />
        <div class="static-text"><a href="<?=base_url(); ?>">Home</a>/<?=!empty($heading)?$heading:'404-Not Found'?></div>
    </div>
</section>
<!--------------------- banner finish --------------------->

<section class="what-we-do">
    <div class="container">
        <div class="row">
            <div class="contant-wrapper">
                <div class=" col-sm-12 col-sm-12">
                    <?=!empty($content)?$content:''; ?>
                    <?php
                    if(!empty($package_content))
                    {
                        ?>
                        <div class="table-responsive mt40 table-sec-b table-customized-packages">
                            <?=$package_content; ?>
                        </div>
                        <?php
                    }
                    ?>

                    <!--div class="table-responsive mt40 table-sec-b">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="table-no-b">
                                        <th class="table-no-b"></th>
                                        <th class="customized-packages table-no-b  ">Starter</th>
                                        <th class="customized-packages table-no-b">Premium</th>
                                        <th class="customized-packages table-no-b">Ultimate</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th class="table-no-b "></th>
                                        <th class="customized-packages-g table-no-b ">
                                            <p>up to <span>6</span></p>
                                            <p class="p1">programs</p>
                                        </th>
                                        <th class="customized-packages-g table-no-b ">
                                            <p>up to <span>12</span></p>
                                            <p class="p1">programs</p>
                                        </th>
                                        <th class="customized-packages-g table-no-b ">
                                            <p>up to <span>30</span></p>
                                            <p class="p1">programs</p>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Student Recruitment Platform</td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                    </tr>

                                    <tr>
                                        <td>Visibility in 40+ languages </td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                    </tr>

                                    <tr>
                                        <td>Local and Global reach </td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                    </tr>

                                    <tr>
                                        <td>Unlimited Student Enquiries </td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                    </tr>

                                    <tr>
                                        <td>Real-time Metrics </td>
                                        <td align="center">Updated every 24h</td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                    </tr>

                                    <tr>
                                        <td>Best Overall Value </td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                        <td align="center"><i class="fa fa-check fa-2x icon-green"></i></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="btn-custom"><a href="#">Book a Demo</a></div>
                                        </td>
                                        <td>
                                            <div class="btn-custom"><a href="#">Book a Demo</a></div>
                                        </td>
                                        <td>
                                            <div class="btn-custom"><a href="#">Book a Demo</a></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div-->
                </div>
            </div>
        </div>
    </div>
</section>