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
                            <div class="banner-content text-right"><a href="<?=base_url('login'); ?>" class="btn btn-success sign-btn">Login</a> <a class="btn btn-primary" href="<?=base_url('login'); ?>">Sign Up</a></div>
                            <form class="sign-up" action="" method="post">
                                <h2>Create an Account2</h2>
                                <?php echo getNotificationHtml();?>
                                <div class="form-group">
                                    <?php
                                    $options = array(
                                        '' => 'Title',
                                        'Mr' => 'Mr',
                                        'Mrs' => 'Mrs',
                                        'Miss' => 'Miss',
                                        'Dr' => 'Dr',
                                        'Madam' => 'Madam',
                                    );
                                    echo form_dropdown('title', $options, set_value('title', !empty($title)?$title:'' ),array('id' => 'title', 'required' => 'required','class'=>'form-control'));
                                    ?>
                                    <?php echo form_error('title'); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_input(array('id' => 'first_name', 'name' => 'first_name','class'=>'form-control','placeholder'=>'First Name','value' => set_value('first_name', !empty($first_name)?$first_name:"" ), 'required'=>'required')); ?>
                                    <?php echo form_error('first_name'); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_input(array('id' => 'last_name', 'name' => 'last_name','class'=>'form-control','placeholder'=>'Last Name','value' => set_value('last_name', !empty($last_name)?$last_name:"" ), 'required'=>'required')); ?>
                                    <?php echo form_error('last_name'); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_input(array('id' => 'mobile_number', 'name' => 'mobile_number','class'=>'form-control','placeholder'=>'Mobile Number','pattern'=>"^\d{10}$",'title'=>"Enter a valid mobile number",'value' => set_value('mobile_number', !empty($mobile_number)?$mobile_number:"" ), 'required'=>'required')); ?>
                                    <?php echo form_error('mobile_number'); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_input(array('type'=>'email', 'id' => 'email', 'name' => 'email','class'=>'form-control','placeholder'=>'Email','value' => set_value('email', !empty($email)?$email:"" ), 'required'=>'required')); ?>
                                    <?php echo form_error('email'); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_password(array('id' => 'password', 'name' => 'password','class'=>'form-control','placeholder'=>'Password','value' => set_value('password', !empty($password)?$password:"" ), 'required'=>'required')); ?>
                                    <?php echo form_error('password'); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_password(array('id' => 'confirm_password', 'name' => 'confirm_password','class'=>'form-control','placeholder'=>'Confirm Password','value' => set_value('confirm_password', !empty($confirm_password)?$confirm_password:"" ), 'required'=>'required')); ?>
                                    <?php echo form_error('confirm_password'); ?>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group form-check">
                                            <label class="form-check-label">
                                                <?=form_checkbox(array('name' => 'is_agreed', 'id' => 'is_agreed', 'value' => 1, 'checked' => TRUE, 'class' => 'form-check-input', 'required' => 'required')); ?> I agree to <a href="<?=base_url('terms-of-use'); ?>" target="_blank" class="terd">Terms & Conditions</a>
                                            </label>
                                            <?php echo form_error('is_agreed'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="default-btn ch1">Sign up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <img class="login-right-img" src="<?=base_url('assets/img/SignUp.png'); ?>" />
                    </div>
                </div>
            </div>
        </section>
