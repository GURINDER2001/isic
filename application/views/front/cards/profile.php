<!-- Start Main Banner Area -->
<section class="home-wrapper-area1">
	<div class="container-fluid">
		<div class="single-banner-item">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-12">
					<div class="banner-content">
						<?php
                        if(!empty($affiliate_id))
                        {
                            if(!empty($affiliate_rec->partner_logo))
                            { 
                                ?>
                                <p style="text-align:center;"><img src="<?=base_url($affiliate_rec->partner_logo); ?>" style="height: auto; width: 300px;"></p>
                                <?php
                            }
                            else
                            {
                                ?>
    						    <h1 class="text-uppercase"><span style="color: #feed01;">Card Ordering </span></h1>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
						    <h1 class="text-uppercase"><span style="color: #feed01;">Card Ordering </span></h1>
                            <?php
                        }
                        ?>
					</div>
				</div>

				<div class="col-lg-8 col-md-12">
					<div class="banner-image">
						<img src="<?=base_url('assets/img/card-1.jpg'); ?>" alt="image" />
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
				<a href="<?=base_url('cards'); ?>"> Card </a>
			</li>
			<li class="breadcrumbs__item1">
				<a href="#"> Profile</a>
			</li>
		</ul>
	</nav>
</section>

<?php
if(empty($error))
{
    ?>
    <section class="blog-area bg-f9f9f911 pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo getNotificationHtml();?>
                    <div class="steps-nav">
                        <ul class="nav nav-progress">
                            <li><a href="<?=base_url('cards/selection'); ?>">Card Type</a></li>
                            <li class="active">Personal Details</li>
                            <!--li>Services</li-->
                            <li>Delivery</li>
                            <li>Review & Payment</li>
                            <li>Completion</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tabs-seation">
        <div class="tab-content">
            <div id="menu1" class="tab-pane fade in active card-img12">
                <div class="section-title">
                    <h2>Personal Details of the Applicant</h2>
                </div>
                <?php
                $personal_data = $this->session->userdata('personal_data');
                $personal_data_img = $this->session->userdata('personal_data_img');
                ?>
                <div class="container">
                    <form class="form-pr" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                                <div class="ply1" id="blah_container">
                                    <img id="blah" src="<?=base_url('assets/img/up-1.png'); ?>" />
                                </div>
                                <div class="fileContainer sprite">
                                    <span>Upload Photo</span>
                                    <input type="file" id="photo" name="photo" value="Choose File" onchange="checkPhoto(this)" required="required"/>
                                </div>
                         </div>
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="row align-items-center">
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                            <label>First Name <span class="star1">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left"><input type="text" id="fname" name="fname" class="form-control" placeholder="" required="required" value="<?=!empty($personal_data['fname'])?$personal_data['fname']:!empty($user['first_name'])?$user['first_name']:''; ?>" /></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                            <label>Last Name <span class="star1">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left"><input type="text" id="lname" name="lname" class="form-control" placeholder="" required="required" value="<?=!empty($personal_data['lname'])?$personal_data['lname']:!empty($user['last_name'])?$user['last_name']:''; ?>"/></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                            <label>Academic Institution <span class="star1">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left"><input type="text" id="institution" name="institution" class="form-control" placeholder="" required="required" value="<?=!empty($personal_data['institution'])?$personal_data['institution']:''; ?>"/></div>
                                    </div>
    
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                            <label>Date of Birth <span class="star1">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left birth-pd">
                                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                                <select class="form-control" name="dob[date]" id="dob_date" required="required">
                                                    <option value="">Day</option>
                                                    <?php
                                                    for($i = 1; $i<=31; $i++)
                                                    {
                                                        $day = ($i < 10)?'0'.$i:$i;
                                                        ?>
                                                        <option value="<?=$day; ?>" <?=(!empty($personal_data['dob']['date']) && $personal_data['dob']['date'] == $day)?'selected="selected"':''; ?>><?=$day; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                                <select class="form-control" name="dob[month]" id="dob_month" required="required">
                                                    <option value=""> Month </option>
                                                    <?php
                                                    for($i = 1; $i<=12; $i++)
                                                    {
                                                        $mon = ($i < 10)?'0'.$i:$i;
                                                        ?>
                                                        <option value="<?=$mon; ?>" <?=(!empty($personal_data['dob']['month']) && $personal_data['dob']['month'] == $mon)?'selected="selected"':''; ?>><?=$mon; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                                <select class="form-control" name="dob[year]" id="dob_year" required="required">
                                                    <option value="">Year</option>
                                                    <?php
                                                    for($i = date('Y'); $i>=date('Y') - 40; $i--)
                                                    {
                                                        ?>
                                                        <option value="<?=$i; ?>" <?=(!empty($personal_data['dob']['year']) && $personal_data['dob']['year'] == $i)?'selected="selected"':''; ?>><?=$i; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                            <label>E-mail <span class="star1">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left"><input type="text" id="email" name="email" class="form-control" placeholder="" required="required" value="<?=!empty($personal_data['email'])?$personal_data['email']:!empty($user['email'])?$user['email']:''; ?>"/></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                            <label>Phone Number <span class="star1">*</span></label>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left"><input type="text" id="phone" name="phone" class="form-control" placeholder=""  required="required" value="<?=!empty($personal_data['phone'])?$personal_data['phone']:!empty($user['mobile'])?$user['mobile']:''; ?>"/></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-4 col-md-4 col-sm-4 pull-left"><label>Gender</label></div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 pull-left">
                                            <?php $genderArr = array('M'=>'Male', 'F'=>'Female', 'O'=>'Other'); ?>
                                            <select class="form-control" name="gender" id="gender" required="required">
                                                <option value="">Choose Gender</option>
                                                <?php
                                                foreach($genderArr as $key => $val)
                                                {
                                                    ?>
                                                    <option value="<?=$key; ?>" <?=(!empty($personal_data['gender']) && $personal_data['gender'] == $key)?'selected="selected"':''; ?>><?=$val; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <!--div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                                <div class="form-group-12">
                                                    <input type="radio" name="gender" value="Male"/>
                                                    <label for="gender">Male</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                                <div class="form-group-12">
                                                    <input type="radio" name="gender" value="Female" />
                                                    <label for="gender">Female </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 pull-left">
                                                <div class="form-group-12">
                                                    <input type="radio" name="gender" value="Other" />
                                                    <label for="gender"> Other</label>
                                                </div>
                                            </div-->
                                        </div>
                                    </div>
    
                                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                        <div class="card-btn back1">
                                            <a href="<?=base_url('cards/selection'); ?>" class="default-btn ch1">Back</a>
                                            <button type="submit" class="default-btn ch2">Next</button>
                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
}
else
{
    ?>
    <section class="blog-area bg-f9f9f911 pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo getNotificationHtml();?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>