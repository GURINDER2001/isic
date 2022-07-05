<div class="account-info-left">
<h2>My Dashboard</h2>
<?php 
$segment=$this->uri->segment(1);
$segment2=$this->uri->segment(2);
?>
<ul>
  <li <?php echo (empty($segment2) || (!empty($segment2) && $segment2=='dashboard'))?'class="active"':''; ?>><a href="<?=base_url('my-account/dashboard'); ?>">Dashboard</a></li>
  <li <?php echo (!empty($segment2) && $segment2=='verification')?'class="active"':''; ?>><a href="<?=base_url('cards/verification'); ?>">Verification</a></li>
  <li <?php echo (!empty($segment2) && $segment2=='purchase-history')?'class="active"':''; ?>><a href="<?=base_url('my-account/purchase-history'); ?>">Purchase History</a></li>
  <li <?php echo (!empty($segment2) && $segment2=='edit-profile')?'class="active"':''; ?>><a href="<?=base_url('my-account/edit-profile'); ?>">Edit Profile</a></li>
  <li <?php echo (!empty($segment2) && $segment2=='change-password')?'class="active"':''; ?>><a href="<?=base_url('my-account/change-password'); ?>">Change Password</a></li>
  <li><a href="#refer" class="popup">Refer a Friend</a></li>
  <li><a href="<?=base_url('logout'); ?>">Logout</a></li>	
</ul>	  
</div>