<?php require_once "inc/main.php"; ?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?= url("home"); ?>">home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->
<?php
    if(Session::check("user_id")){
        $user_id = Session::get("user_id");
        $conn = Database::connect("localhost", "root", "", "drophut");
        $sql = Database::select("*", "cart", "user_id", $user_id);
        $result = mysqli_query($conn, $sql);
    }else{
        redirect(url("my-account"));
    }
?>
<?php if(mysqli_num_rows($result) > 0): ?>
<?php
$sql = Database::selectJoin(
    ["p.product_id", "p.title", "p.delivery","p.price_after_discount", "p.price_before_discount", "c.product_id", "c.quantity",],
    "products p",
    "cart c",
    "p.product_id = c.product_id"
);
$result = mysqli_query($conn, $sql);
?>

<!--Checkout page section-->
<div class="Checkout_section mt-60">
    <div class="container">
        <div class="checkout_form">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    
                    <form action="../handlers/handle-checkout.php" method="POST">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-lg-6 mb-20">
                                <label>First Name <span>*</span></label>
                                <input type="text" name="first_name">   
                                <?php errors("first_name"); ?>
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label>Last Name  <span>*</span></label>
                                <input type="text" name="last_name"> 
                                <?php errors("last_name"); ?>
                            </div>
                            <div class="col-12 mb-20">
                                <label>Company Name</label>
                                <input type="text" name="company_name">     
                            </div>
                            <div class="col-12 mb-20">
                                <label for="country">Country <span>*</span></label>
                                <select class="niceselect_option" name="country" id="country" required>
                                    <option value="cairo">Cairo</option>
                                    <option value="alexandria">Alexandria</option>
                                    <option value="giza">Giza</option>
                                    <option value="aswan">Aswan</option>
                                    <option value="luxor">Luxor</option>
                                    <option value="damietta">Damietta</option>
                                    <option value="sharqia">Sharqia</option>
                                    <option value="monufia">Monufia</option>
                                    <option value="kafr_elsheikh">Kafr El Sheikh</option>
                                    <option value="minya">Minya</option>
                                    <option value="sohag">Sohag</option>
                                    <option value="beheira">Beheira</option>
                                    <option value="ismailia">Ismailia</option>
                                    <option value="port_said">Port Said</option>
                                    <option value="suez">Suez</option>
                                    <option value="red_sea">Red Sea</option>
                                    <option value="north_sinai">North Sinai</option>
                                    <option value="south_sinai">South Sinai</option>
                                </select>
                            </div>
                            <div class="col-12 mb-20">
                                <label>Street address  <span>*</span></label>
                                <input placeholder="House number and street name" name="address" type="text" >     
                                <?php errors("address"); ?>
                            </div>
                            <div class="col-12 mb-20">
                                <input placeholder="Apartment, suite, unit etc. (optional)" name="address_op" type="text">     
                            </div>
                            <div class="col-12 mb-20">
                                <label>City <span>*</span></label>
                                <input name="city" type="text">    
                                <?php errors("city"); ?>
                            </div> 
                            <div class="col-12 mb-20">
                                <label>State <span>*</span></label>
                                <input name="state" type="text">  
                                <?php errors("state"); ?>
                            </div> 
                            <div class="col-lg-6 mb-20">
                                <label>Phone<span>*</span></label>
                                <input name="phone" type="text"> 
                                <?php errors("phone"); ?>
                            </div> 
                            <div class="col-lg-6 mb-20">
                                <label>Email Address   <span>*</span></label>
                                <input name="email" type="email" > 
                                <?php errors("email"); ?>
                            </div> 
                            <?php Session::remove("errors"); ?>
                            <div class="col-12 mb-20">
                                <label for="payment_method">Payment Method <span>*</span></label>
                                <select class="niceselect_option" name="payment_method" id="payment_method" required>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="paypal">PayPal</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                    <option value="cash_on_delivery">Cash on Delivery</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Order Notes</label>
                                    <textarea id="order_note" name="order_note" rows="2" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>    
                            </div>      
                        </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h3>Your order</h3> 
                    <div class="order_table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_price = 0; ?>
                                <?php $shipped = false ?>
                                <?php while($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <?php if($row["delivery"] == "not free"): ?>
                                        <?php $shipped = true; ?>
                                    <?php endif; ?>
                                    <td> <?= $row["title"] ?> <strong> × <?= $row["quantity"] ?></strong></td>
                                    <?php if($row["price_after_discount"] != NULL): ?>
                                        <?php $total_price += $row["quantity"] * $row["price_after_discount"] ?>
                                    <td> $<?= $row["quantity"] * $row["price_after_discount"]; ?></td>
                                    <?php else: ?>
                                        <?php $total_price += $row["quantity"] * $row["price_before_discount"] ?>
                                    <td> $<?= $row["quantity"] * $row["price_before_discount"]; ?></td>
                                    <?php endif; ?>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td>$<?= $total_price; ?></td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <?php if($shipped == false): ?>
                                    <td><strong>$0.00</strong></td>
                                    <?php else: ?>
                                    <td><strong>$255.00</strong></td>
                                    <?php endif; ?>
                                </tr>
                                <tr class="order_total">
                                    <th>Order Total</th>
                                    <?php if(Session::get("coupon_value") != NULL): ?>
                                        <?php $coupon_value = Session::get("coupon_value") ?>
                                        <?php Session::set("total", ($total_price + ($shipped ? 255.00 : 0)) * ($coupon_value / 100 - 0)); ?>
                                        <td>$<?= ($total_price + ($shipped ? 255.00 : 0)) * ($coupon_value / 100 - 0); ?></td>
                                        <?php else: ?>
                                            <?php Session::set("total", ($total_price + ($shipped ? 255.00 : 0))); ?>
                                        <td>$<?= ($total_price + ($shipped ? 255.00 : 0)); ?></td>
                                        <?php endif; ?>
                                </tr>
                            </tfoot>
                        </table>     
                    </div>
                </div>
            </div> 
            <div class="order_button text-center mt-4">
                <button type="submit">Proceed to buy</button> 
            </div>
            </form>         
        </div> 
    </div>       
</div>
<?php else: ?>
            <div class="alert alert-info text-center">
                No products in the checkout.
            </div>
        <?php endif; ?>
<!--Checkout page section end-->

<?php require_once ROOT_PATH . 'inc/footer.php'; ?>
