        <!-- Start Main Banner Area -->
        <section class="home-wrapper-area1">
            <div class="container-fluid">
                <div class="single-banner-item">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12"></div>

                        <div class="col-lg-8 col-md-12">
                            <div class="banner-image">
                                <img src="<?=base_url('assets/img/login-top.jpg'); ?>" alt="image" />
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
                        <a href="#">SIGN UP</a>
                    </li>
                </ul>
            </nav>
        </section>

        <section class="login-form-div log-pl1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="login-form-div-inner">
                            <div class="banner-content text-right"><a href="<?=base_url('login'); ?>" class="btn btn-primary">Login</a> <a class="btn btn-success sign-btn" href="<?=base_url('login'); ?>">Sign Up</a></div>
                            <form class="sign-up" action="" method="post">
                                <h3>Verify OTP</h3>
                                <?php echo getNotificationHtml();?>
                                <div class="form-group">
                                    <?php echo form_input(array('id' => 'otp', 'name' => 'otp','class'=>'form-control','placeholder'=>'Enter OTP','value' => set_value('otp', !empty($otp)?$otp:"" ), 'required'=>'required')); ?>
                                    <?php echo form_error('otp'); ?>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Verify</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <img class="login-right-img" src="<?=base_url('assets/img/Login-round-img.png'); ?>" />
                    </div>
                </div>
            </div>
        </section>
