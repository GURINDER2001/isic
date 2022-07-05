<!------------------------ banner ------------------------>
<section class="login-banner-main">
	<div class="abt-banner">
		<h2>Purchase History</h2>
	</div>
</section>
<!--------------------- banner finish --------------------->

<section class="about-info">
	<div class="container">		
	
	<div class="account-info-wrapper">
	<div class="row">	
	<div class="col-sm-3">	
		<?php $this->load->view('front/users/sidebar'); ?>		
	</div>	
					
    <div class="col-sm-9">
	<div class="account-info-txt">


  
  <div class="account-description"> 
  <?php //echo "<pre>"; print_r($records); echo "</pre>"; ?>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Transaction Id</th>
        <th>Item Type</th>
        <th>Item Name</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $itemTypeArr = array("projects"=>"Projects","services"=>"Care Healthfully Pro");
      if(!empty($itemTypeArr))
      {
        foreach ($records as $key => $row)
        {
          ?>
          <tr>
              <th><?=!empty($row->txn_id)?$row->txn_id:'----------------'?></th>
              <th><?=(array_key_exists($row->item_type,$itemTypeArr))?$itemTypeArr[$row->item_type]:$row->item_type?></th>
              <th><?=$row->item_name?></th>
              <th>$<?=$row->amount?></th>
              <th><?=$row->status?></th>
              <th><?=date('d-m-Y',strtotime($row->payment_date))?></th>
          </tr>
          <?php
        }       
      }
      else
      {
        ?>
        <tr>
        <td colspan="7">No any orders done by you</td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
  
  
  
  
  
  
  </div>
  

 
	  
	  </div>	
						
	</div>														
	</div>													
	</div>	
	

				

	</div>
</section>