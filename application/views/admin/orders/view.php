<?php
if(!empty($viewdata)) 
{
    extract($viewdata); 
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>View Order <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Orders</a></li>
            <li class="active">View Order</li>
        </ol>
    </section>
    <section class="content">
        <?php // pre($viewdata); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body pad">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Order Details</h3>
                                    <hr>
                                    <p><strong>Order Id : </strong><?='#'.$id; ?></p>
                                    <p><strong>Order Staus : </strong><?=$order_status; ?></p>
                                    
                                    <p><strong>Payment Staus : </strong><?=$payment_status; ?></p>
                                    <p><strong>Payment Transaction : </strong><?=$payment_transaction_number; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <h3>User Details</h3>
                                    <hr>
                                    <p><strong>Name : </strong><?=$user_fname.' '.$user_lname; ?></p>
                                    <p><strong>Email : </strong><?=$user_email; ?></p>
                                    <p><strong>Contact Number : </strong><?=$user_phone; ?></p>
                                    <p><strong>Gender : </strong><?=$user_gender; ?></p>
                                    <p><strong>Date Of Birth : </strong><?=$user_dob; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Cards Details</h3>
                                    <hr>
                                    <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Card Price</th>
                                                    <th scope="col">Discount</th>
                                                    <th scope="col">Shipping</th>
                                                    <th scope="col" width="20%">Paid Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?=!empty($card_image_url)?'<img src="'.$card_image_url.'" width="50">':''; ?></td>
                                                    <td><?=$card_name; ?></td>
                                                    <td>₹<?=$card_price; ?></td>
                                                    <td>(-) ₹<?=$discount_amount; ?></td>
                                                    <td>(+) ₹<?=$card_delivery_fee; ?> (<?=ucfirst($card_delivery_type);?>)</td>
                                                    <td>₹<?=$total_order_amount; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Affiliate Details</h3>
                                    <hr>
                                    <?php
                                    if(!empty($affiliate))
                                    {
                                        $actual_price = getCardPrice($card_id);
                                        ?>
                                        <p><strong>Affliate Partner : </strong><?=getAffiliateName($affiliate); ?></p>
                                        <?php
                                        if(!empty($actual_price) && $actual_price > $card_price)
                                        {
                                            $benefit = $actual_price - $card_price;
                                            ?>
                                            <p><strong>Affliate Benefit : </strong> ₹<?=$benefit; ?></p>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <p><strong>Affliate Benefit : </strong> ₹<?=$card_price; ?></p>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <p>N/A</p>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <h3>Referral Details</h3>
                                    <hr>
                                    <?php
                                    if(!empty($discount_type) && $discount_type == 'referral')
                                    {
                                        ?>
                                        <p><strong>Card Number / Serial No : </strong><?=$discount_promocode; ?></p>
                                        <p><strong>Discount (10%) : </strong> ₹<?=$discount_amount; ?></p>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <p>N/A</p>
                                        <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>