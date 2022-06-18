<?php
$active = $this->uri->segment(2);
$segment = $this->uri->segment(2).'/'.$this->uri->segment(3);
$admin_id = $this->session->userdata('admin_id');
$admin_name = $this->session->userdata('admin_name');
$admin_role = $this->session->userdata('admin_role');
?>
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?=getUserAvatar($admin_id); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><a href="<?=base_url();?>" target="_blank"><?=!empty($admin_role)?getRoleName($admin_role):''; ?></a></p>
            <a href="<?=base_url();?>" target="_blank"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>

    <ul class="sidebar-menu">
      <li class="<?php if($active=='dashboard') { echo 'active'; } ?> treeview">
          <a href="<?=base_url('admin/dashboard');?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
      </li>

      <?php
      	$settings = array('settings','smtp','email','holidays','changepassword','concern','sectionsettings/credentials', 'settings/send_test_mail','navmenus','navmenus/manageLocation');
        ?>
        <li class="<?php if(!empty($active) && in_array($active, $settings)) { echo 'active'; } ?> treeview">
          <a href="#">
              <i class="fa fa-cog"></i>
              <span>Settings</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              <li class="<?php if($active=='settings' && $segment!='settings/email' && $segment!='settings/smtp' && $segment!='settings/send_test_mail' && $segment!='settings/logo') { echo 'active'; } ?>"><a href="<?=base_url('admin/settings');?>"><i class="fa fa-circle-o"></i>Site Prefrences</a></li>

              <li class="<?php if($segment=='settings/logo') { echo 'active'; } ?>"><a href="<?=base_url('admin/settings/logo');?>"><i class="fa fa-circle-o"></i>Logo</a></li>
              
              <!--<li class="<?php if($segment=='settings/smtp') { echo 'active'; } ?>"><a href="<?=base_url('admin/settings/smtp');?>"><i class="fa fa-circle-o"></i>SMTP Settings</a></li>-->
              <li class="<?php if($segment=='settings/email' || $segment=='settings/send_test_mail') { echo 'active'; } ?>"><a href="<?=base_url('admin/settings/email');?>"><i class="fa fa-circle-o"></i>Email Settings</a></li>
              <li class="<?php if($active=='email') { echo 'active'; } ?>"><a href="<?=base_url('admin/email');?>"><i class="fa fa-circle-o"></i>Email Templates</a></li>
              <!--li class="<?php if($active=='concern') { echo 'active'; } ?>"><a href="<?=base_url('admin/concern');?>"><i class="fa fa-circle-o"></i>Conern/Contact Options</a></li>
              <li class="<?php if($segment=='sectionsettings/credentials') { echo 'active'; } ?>"><a href="<?=base_url('admin/sectionsettings/credentials');?>"><i class="fa fa-circle-o"></i>Credentials</a></li-->
              <li class="<?php if($active=='changepassword') { echo 'active'; } ?>"><a href="<?=base_url('admin/changepassword');?>"><i class="fa fa-circle-o"></i>Change Password</a></li>
              <!--li class="<?php if($active=='holidays') { echo 'active'; } ?>"><a href="<?=base_url('admin/holidays');?>"><i class="fa fa-circle-o"></i>Holidays</a></li>
              <li class="<?php if($active=='navmenus') { echo 'active'; } ?>"><a href="<?=base_url('admin/navmenus');?>"><i class="fa fa-circle-o"></i>Menu</a></li>
              <li class="<?php if($active=='navmenus') { echo 'active'; } ?>"><a href="<?=base_url('admin/navmenus/manageLocation');?>"><i class="fa fa-circle-o"></i>Menu Location</a></li-->
          </ul>
      	</li>
        
        <li class="<?php if($active=='slider') { echo 'active'; } ?> treeview">
            <a href="<?=base_url('admin/slider');?>">
                <i class="fa fa-picture-o"></i>
                <span>Slides Management</span>
            </a>
  	    </li>
  	    
        <li class="<?php if($active=='page' || $segment=='sectionsettings/home' || $segment=='sectionsettings/aboutus' || $segment=='sectionsettings/contactus' || $segment=='sectionsettings/whyisic' || $segment=='sectionsettings/endorsement' || $segment=='sectionsettings/goingAbroad' || $segment=='sectionsettings/referFriend') { echo 'active'; } ?> treeview">
		<a href="#"><i class="fa fa-file-text"></i>CMS Pages 
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($segment=='sectionsettings/home') { echo 'active'; } ?>">
              <a href="<?=base_url('admin/sectionsettings/home');?>"><i class="fa fa-circle-o"></i>Home Page</a>
            </li>
            <li class="<?php if($segment=='sectionsettings/aboutus') { echo 'active'; } ?>">
              <a href="<?=base_url('admin/sectionsettings/aboutus');?>"><i class="fa fa-circle-o"></i>About Us</a>
            </li>
            <li class="<?php if($segment=='sectionsettings/whyisic') { echo 'active'; } ?>">
              <a href="<?=base_url('admin/sectionsettings/whyisic');?>"><i class="fa fa-circle-o"></i>Why ISIC?</a>
            </li>
            
            <li class="<?php if($segment=='sectionsettings/endorsement') { echo 'active'; } ?>">
              <a href="<?=base_url('admin/sectionsettings/endorsement');?>"><i class="fa fa-circle-o"></i>Endorsement</a>
            </li>
            
            <li class="<?php if($segment=='sectionsettings/referFriend') { echo 'active'; } ?>">
              <a href="<?=base_url('admin/sectionsettings/referFriend');?>"><i class="fa fa-circle-o"></i>Refer A Friend</a>
            </li>
            
            <li class="<?php if($segment=='sectionsettings/contactus') { echo 'active'; } ?>">
              <a href="<?=base_url('admin/sectionsettings/contactus');?>"><i class="fa fa-circle-o"></i>Contact Us</a>
            </li>
            
            
            <li class="<?php if($segment=='sectionsettings/goingAbroad') { echo 'active'; } ?>">
              <a href="<?=base_url('admin/sectionsettings/goingAbroad');?>"><i class="fa fa-circle-o"></i>Going Abroad</a>
            </li>
            <li class="<?php if($active=='page') { echo 'active'; } ?>"><a href="<?=base_url('admin/page');?>"><i class="fa fa-circle-o"></i>Pages</a></li>
          </ul>
        </li>

  	    <li class="<?php if($active=='events') { echo 'active'; } ?> treeview">
			<a href="<?=base_url('admin/events');?>">
				<i class="fa fa-calendar"></i>
				<span>Events Management</span>
			</a>
		</li>
		
		<li class="<?php if($active=='landings') { echo 'active'; } ?> treeview">
			<a href="<?=base_url('admin/landings');?>">
				<i class="fa fa-file-text"></i>
				<span>Landing Pages</span>
			</a>
		</li>

		<li class="<?php if($active=='partners' || $segment=='partners/pages' || $active=='affiliates') { echo 'active'; } ?> treeview">
            <a href="#">
                <i class="fa fa-commenting"></i>
                <span>Partners Management</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php if($active=='partners') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/partners');?>"><i class="fa fa-circle-o"></i>Global Partners</a>
                </li>
                <li class="<?php if($segment=='partners/pages') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/partners/pages');?>"><i class="fa fa-circle-o"></i>Partners Pages </a>
				</li>
				<li class="<?php if($active=='affiliates') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/affiliates');?>"><i class="fa fa-circle-o"></i>Affiliates Partners </a>
				</li>
            </ul>
      	</li>
      	
      	<li class="<?php if($active=='products' || $segment=='sectionsettings/products') { echo 'active'; } ?> treeview">
            <a href="#">
                <i class="fa fa-commenting"></i>
                <span>Products Management</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php if($active=='products') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/products');?>"><i class="fa fa-circle-o"></i>Products</a>
                </li>
                <li class="<?php if($segment=='sectionsettings/products') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/sectionsettings/products');?>"><i class="fa fa-circle-o"></i>Products Settings</a>
                </li>
            </ul>
      	</li>
      	
      	<li class="<?php if($active=='orders') { echo 'active'; } ?> treeview">
			<a href="<?=base_url('admin/orders');?>">
				<i class="fa fa-shopping-cart"></i>
				<span>Orders</span>
			</a>
		</li>
      	
      	<li class="<?php if($active=='discounts' || $active=='vouchers' || $active=='coupons' || $segment=='sectionsettings/discounts') { echo 'active'; } ?> treeview">
            <a href="#">
                <i class="fa fa-tags"></i>
                <span>Discounts Management</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php if($active=='discounts') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/discounts');?>"><i class="fa fa-circle-o"></i>Discounts</a>
                </li>
                <li class="<?php if($active=='coupons') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/coupons');?>"><i class="fa fa-circle-o"></i>Coupons</a>
                </li>
                <li class="<?php if($active=='vouchers') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/vouchers');?>"><i class="fa fa-circle-o"></i>Vouchers</a>
                </li>
                <li class="<?php if($segment=='sectionsettings/discounts') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/sectionsettings/discounts');?>"><i class="fa fa-circle-o"></i>Discounts Settings</a>
                </li>
            </ul>
      	</li>
      	
      	<li class="<?php if($active=='gallery' || $segment=='sectionsettings/gallery') { echo 'active'; } ?> treeview">
            <a href="#">
                <i class="fa fa-picture-o"></i>
                <span>Gallery Management</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php if($active=='gallery') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/gallery');?>"><i class="fa fa-circle-o"></i>Gallery</a>
                </li>
                <li class="<?php if($segment=='sectionsettings/gallery') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/sectionsettings/gallery');?>"><i class="fa fa-circle-o"></i>Gallery Settings </a>
                </li>
            </ul>
      	</li>

	    <li class="<?php if($active=='testimonials' || $segment=='sectionsettings/testimonials') { echo 'active'; } ?> treeview">
            <a href="#">
                <i class="fa fa-commenting"></i>
                <span>Testimonials Management</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php if($active=='testimonials') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/testimonials');?>"><i class="fa fa-circle-o"></i>Testimonials</a>
                </li>
                <li class="<?php if($segment=='sectionsettings/testimonials') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/sectionsettings/testimonials');?>"><i class="fa fa-circle-o"></i>Testimonials Settings </a>
                </li>
            </ul>
      	</li>
      	
      	
      	<!--li class="<?php if($active=='cards' || $segment=='sectionsettings/cards') { echo 'active'; } ?> treeview">
            <a href="#">
                <i class="fa fa-commenting"></i>
                <span>Cards Management</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php if($active=='cards') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/cards');?>"><i class="fa fa-circle-o"></i>Cards</a>
                </li>
                <li class="<?php if($segment=='sectionsettings/cards') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/sectionsettings/cards');?>"><i class="fa fa-circle-o"></i>Cards Settings </a>
                </li>
            </ul>
      	</li-->
      	
      	<li class="<?php if($active=='faqs' || $segment=='sectionsettings/faqs') { echo 'active'; } ?> treeview">
            <a href="#">
                <i class="fa fa-commenting"></i>
                <span>FAQ's Management</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php if($active=='faqs') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/faqs');?>"><i class="fa fa-circle-o"></i>FAQs</a>
                </li>
                <li class="<?php if($segment=='sectionsettings/faqs') { echo 'active'; } ?>">
                  <a href="<?=base_url('admin/sectionsettings/faqs');?>"><i class="fa fa-circle-o"></i>FAQs Settings </a>
                </li>
            </ul>
      	</li>

        <li class="<?php if($active=='roles' || $active=='students' || $active=='users') { echo 'active'; } ?> treeview">
          <a href="#">
              <i class="fa fa-users"></i>
              <span>Users Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              <li class="<?php if($active=='users') { echo 'active'; } ?>"><a href="<?=base_url('admin/users');?>"><i class="fa fa-circle-o"></i>Users</a></li>
              <li class="<?php if($active=='roles') { echo 'active'; } ?>"><a href="<?=base_url('admin/roles');?>"><i class="fa fa-circle-o"></i>User Roles</a></li>
              <!--li class="<?php if($active=='subscribers') { echo 'active'; } ?>"><a href="<?=base_url('admin/subscribers');?>"><i class="fa fa-circle-o"></i>Subscribers</a></li-->
          </ul>
        </li>
        <li class="<?php if(($active=='newsletters') || ($active=='subscribers')) { echo 'active'; } ?> treeview">
            <a href="#">
              <i class="fa fa-newspaper-o"></i>
              <span>Newsletter Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php if($active=='newsletters') { echo 'active'; } ?>"><a href="<?=base_url('admin/newsletters');?>"><i class="fa fa-circle-o"></i>Newsletter</a></li>
              <li class="<?php if($active=='subscribers') { echo 'active'; } ?>"><a href="<?=base_url('admin/subscribers');?>"><i class="fa fa-circle-o"></i>Subscribers</a></li>
            </ul>
        </li>      	
        
		<!--li class="<?php if(($active=='programs')) { echo 'active'; } ?> treeview">
			<a href="#">
				<i class="fa fa-tasks"></i>
				<span>Programs Management</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li class="<?php if($active=='programs' && $segment!='programs/category') { echo 'active'; } ?>"><a href="<?=base_url('admin/programs');?>"><i class="fa fa-circle-o"></i>Programs</a></li>
				<li class="<?php if($segment=='programs/category') { echo 'active'; } ?>"><a href="<?=base_url('admin/programs/category');?>"><i class="fa fa-circle-o"></i>Category</a></li>
			</ul>
		</li-->

      <li class="<?php if($active=='news' || $segment=='news/category') { echo 'active'; } ?> treeview">
          <a href="#">
              <i class="fa fa-rss"></i>
              <span>News Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              <li class="<?php if($active=='news' && $segment!='news/category') { echo 'active'; } ?>"><a href="<?=base_url('admin/news');?>"><i class="fa fa-circle-o"></i>News</a></li>
              <li class="<?php if($segment=='news/category') { echo 'active'; } ?>"><a href="<?=base_url('admin/news/category');?>"><i class="fa fa-circle-o"></i>News Categories</a></li>
          </ul>
      </li>
      
      
      <li class="<?php if($active=='insurances' || $segment=='insurances/features') { echo 'active'; } ?> treeview">
          <a href="#">
              <i class="fa fa-rss"></i>
              <span>Insurances Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              <li class="<?php if($active=='insurances' && $segment!='insurances/features') { echo 'active'; } ?>"><a href="<?=base_url('admin/insurances');?>"><i class="fa fa-circle-o"></i>Insurances</a></li>
              <li class="<?php if($segment=='insurances/features') { echo 'active'; } ?>"><a href="<?=base_url('admin/insurances/features');?>"><i class="fa fa-circle-o"></i>Insurance Features</a></li>
          </ul>
      </li>
      
      
      <li class="<?php if($active=='events' || $segment=='events/category') { echo 'active'; } ?> treeview">
          <a href="#">
              <i class="fa fa-rss"></i>
              <span>Events Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              <li class="<?php if($active=='events' && $segment!='events/category') { echo 'active'; } ?>"><a href="<?=base_url('admin/events');?>"><i class="fa fa-circle-o"></i>Events</a></li>
              <li class="<?php if($segment=='events/category') { echo 'active'; } ?>"><a href="<?=base_url('admin/events/category');?>"><i class="fa fa-circle-o"></i>Categories</a></li>
          </ul>
      </li>

      <li class="<?php if($active=='blogs' || $segment=='blogs/category' || $segment=='sectionsettings/blog') { echo 'active'; } ?> treeview">
          <a href="#">
              <i class="fa fa-rss"></i>
              <span>Blogs Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              <li class="<?php if($active=='blogs' && $segment!='blogs/category') { echo 'active'; } ?>"><a href="<?=base_url('admin/blogs');?>"><i class="fa fa-circle-o"></i>Blogs</a></li>
              <li class="<?php if($segment=='blogs/category') { echo 'active'; } ?>"><a href="<?=base_url('admin/blogs/category');?>"><i class="fa fa-circle-o"></i>Categories</a></li>
              <li class="<?php if($segment=='sectionsettings/blog') { echo 'active'; } ?>"><a href="<?=base_url('admin/sectionsettings/blog');?>"><i class="fa fa-circle-o"></i>Blog Settings </a></li>
          </ul>
      </li>

      <li class="<?php if($active=='enquiries' || $active=='concern' || $active=='questions') { echo 'active'; } ?> treeview">
          <a href="#">
              <i class="fa fa-commenting"></i>
              <span>Enquiries Management</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              <li class="<?php if($active=='enquiries') { echo 'active'; } ?>">
                <a href="<?=base_url('admin/enquiries');?>"><i class="fa fa-circle-o"></i>Enquiries</a>
              </li>
              
              <li class="<?php if($active=='concern') { echo 'active'; } ?>">
                <a href="<?=base_url('admin/concern');?>"><i class="fa fa-circle-o"></i>Conerns Type</a>
              </li>

	            <!--li class="<?php if($active=='questions' && $segment!='questions/category') { echo 'active'; } ?>">
	               <a href="<?=base_url('admin/questions');?>"><i class="fa fa-circle-o"></i>Questions</a>
	            </li>
	            <li class="<?php if($segment=='questions/category') { echo 'active'; } ?>">
	               <a href="<?=base_url('admin/questions/category');?>"><i class="fa fa-circle-o"></i>Question Categories</a>
	            </li-->     
          </ul>
      </li>


    </ul>
  </section>
</aside>