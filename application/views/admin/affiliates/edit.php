<?php
if(!empty($editdata)) 
{
    extract($editdata); 
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Affiliate Partner <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Affiliates Management</a></li>
            <li class="active">Edit Partner</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body pad">
                        <form method="post" enctype="multipart/form-data">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Basic Details</h3>
                                    <hr>
                                    <div class="form-group">
                                        <label>Partner Name:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file-text-o"></i>
                                            </div>
                                            <?php echo form_input(array('id' => 'name', 'name' => 'name','class'=>'form-control input-md','value' => set_value('name', isset($name)?$name:""))); ?>
                                        </div>
                                        <?php echo form_error('name'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Corporate Identification Number:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file-text-o"></i>
                                            </div>
                                            <?php echo form_input(array('id' => 'identification_number', 'name' => 'identification_number','class'=>'form-control input-md','value' => set_value('identification_number', isset($identification_number)?$identification_number:""))); ?>
                                        </div>
                                        <?php echo form_error('identification_number'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file-text-o"></i>
                                            </div>
                                            <?php echo form_input(array('id' => 'contact_number', 'name' => 'contact_number','class'=>'form-control input-md','value' => set_value('contact_number', isset($contact_number)?$contact_number:""))); ?>
                                        </div>
                                        <?php echo form_error('contact_number'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Id:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file-text-o"></i>
                                            </div>
                                            <?php echo form_input(array('id' => 'email_id', 'name' => 'email_id','class'=>'form-control input-md','value' => set_value('email_id', isset($email_id)?$email_id:""))); ?>
                                        </div>
                                        <?php echo form_error('email_id'); ?>
                                    </div>
                                    
                                    <div class="form-group" id="blah_container">
                                          <img id="blah" src="<?=!empty($partner_logo)?base_url($partner_logo):base_url('assets/admin/images/no_image.gif'); ?>" alt="Partner Logo" class="img1" />
                                    </div>
                                      
                                      <div class="form-group">
                                          <label>Partner logo:</label>
                                          <div class="input-group">
                                              <div class="input-group-addon">
                                                  <i class="fa fa-file"></i>
                                              </div>
                                              <input name="partner_logo" type="file" class="form-control pull-right" id="featured_img" onchange="checkPhoto(this)">
                                          </div>
                                      </div>
                                    
                                    <h3>Address Details</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address Line 1:</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-file-text-o"></i>
                                                    </div>
                                                    <?php echo form_input(array('id' => 'address1', 'name' => 'address1','class'=>'form-control input-md','value' => set_value('address1', isset($address1)?$address1:""))); ?>
                                                </div>
                                                <?php echo form_error('address1'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address Line 2:</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-file-text-o"></i>
                                                    </div>
                                                    <?php echo form_input(array('id' => 'address2', 'name' => 'address2','class'=>'form-control input-md','value' => set_value('address2', isset($address2)?$address2:""))); ?>
                                                </div>
                                                <?php echo form_error('address2'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City:</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-file-text-o"></i>
                                                    </div>
                                                    <?php echo form_input(array('id' => 'city', 'name' => 'city','class'=>'form-control input-md','value' => set_value('city', isset($city)?$city:""))); ?>
                                                </div>
                                                <?php echo form_error('city'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State:</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-file-text-o"></i>
                                                    </div>
                                                    <?php echo form_input(array('id' => 'state', 'name' => 'state','class'=>'form-control input-md','value' => set_value('state', isset($state)?$state:""))); ?>
                                                </div>
                                                <?php echo form_error('state'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country:</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-file-text-o"></i>
                                                    </div>
                                                    <?php echo form_input(array('id' => 'country', 'name' => 'country','class'=>'form-control input-md','value' => set_value('country', isset($country)?$country:""))); ?>
                                                </div>
                                                <?php echo form_error('country'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pincode:</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-file-text-o"></i>
                                                    </div>
                                                    <?php echo form_input(array('id' => 'pincode', 'name' => 'pincode','class'=>'form-control input-md','value' => set_value('pincode', isset($pincode)?$pincode:""))); ?>
                                                </div>
                                                <?php echo form_error('pincode'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3>Cards Selection</h3>
                                    <hr>
                                    <?php
                                    if(!empty($cards))
                                    {
                                        ?>
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Actual Price</th>
                                                    <th scope="col" width="20%">Offer Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach($cards as $card)
                                                {
                                                    $checked = '';
                                                    $offer_price = '';
                                                    if(array_key_exists($card->api_card_id, $affiliates_cards))
                                                    {
                                                        $checked = 'checked="checked"';
                                                        $offer_price = $affiliates_cards[$card->api_card_id];
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="card_selected[]" value="<?=$card->api_card_id; ?>" <?=$checked; ?>></td>
                                                        <td><?=!empty($card->featured_img)?'<img src="'.base_url($card->featured_img).'" width="50">':''; ?></td>
                                                        <td><?=$card->name; ?></td>
                                                        <td>₹<?=$card->price; ?></td>
                                                        <td><input type="number" name="offer_price[<?=$card->api_card_id; ?>]" class="form-control" value="<?=$offer_price; ?>"></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php
                                    }
                                    ?>
                                    
                                    <h3>Allowed Shipment</h3>
                                    
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $checked = '';
                                                    if(array_key_exists('pickup', $affiliates_shipping))
                                                    {
                                                        $checked = 'checked="checked"';
                                                    }
                                                    ?>
                                                    <input type="checkbox" name="shipment_selected[]" value="pickup" <?=$checked; ?>></td>
                                                <td>Pick-Up</td>
                                                <td>₹0.00</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $checked = '';
                                                    $price = 100;
                                                    if(array_key_exists('delivery', $affiliates_shipping))
                                                    {
                                                        $checked = 'checked="checked"';
                                                        $price = $affiliates_shipping['delivery'];
                                                    }
                                                    ?>
                                                    <input type="checkbox" name="shipment_selected[]" value="delivery" <?=$checked; ?>>
                                                </td>
                                                <td>Delivery</td>
                                                <td width="20%"><input type="number" name="shipping_price[delivery]" class="form-control" value="<?=$price; ?>"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    <h3>Affiliate Code</h3>
                                    <hr>
                                    <div class="row">
                                        <?php
                                        $token = base64_encode($id.'-'.$identification_number);
                                        $str = '<a href="'.base_url('cards/selection?aftoken='.$token).'" target="_blank"><img src="'.base_url('assets/img/af-logo.png').'" height="100" alt="Button" title="Button"></a>';
                                        ?>
                                        <div class="col-md-12">
                                            <pre><code><?php echo htmlspecialchars($str); ?></code></pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>