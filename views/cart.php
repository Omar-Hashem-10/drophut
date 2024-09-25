<?php require_once "inc/main.php"; ?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?= url("home") ?>">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->


<?php
if (Session::check("user_id")) {
    $user_id = Session::get("user_id");
}else{
    redirect(url("my-account"));
}
?>

<?php
$user_id = Session::get("user_id");
$conn = Database::connect("localhost", "root", "", "drophut");
$sql = Database::selectJoin(
    ["p.product_id", "p.title", "p.image", "p.delivery", "p.price_after_discount", "p.price_before_discount", "c.product_id", "c.quantity", "c.color", "c.id"],
    "products p",
    "cart c",
    "p.product_id = c.product_id",
    "user_id",
    $user_id
);
$result = mysqli_query($conn, $sql);
?>

<!--shopping cart area start -->
<div class="shopping_cart_area mt-60">
    <div class="container">  
        <?php require_once "inc/success.php" ?>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <form action="../handlers/handle-coupon.php" method="POST"> 
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-color">Color</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                            <th class="product_remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total_price = 0; ?>
                                        <?php $shipping = false  ?>
                                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                                            <tr>
                                                <?php if($row["delivery"] == "not free"): ?>
                                                <?php $shipping = true ?>
                                                <?php endif; ?>
                                                <td class="product_thumb"><img src="<?php echo BASE_URL . "../public/images/products/" . $row["image"] ?>" alt=""></td>
                                                <td class="product_name"><?= $row["title"] ?></td>
                                                <?php if(isset($row["price_after_discount"])): ?>
                                                    <td class="product-price">$<?= $row["price_after_discount"] ?></td>
                                                <?php else: ?>
                                                    <td class="product-price">$<?= $row["price_before_discount"] ?></td>
                                                <?php endif; ?>
                                                <td class="product_color"><?= $row["color"] ?></td>
                                                <td class="product_quantity"><label>Quantity: </label><?= $row["quantity"]; ?></td>
                                                <?php if(isset($row["price_after_discount"])): ?>
                                                    <?php $total_price += $row["quantity"] * $row["price_after_discount"]; ?>
                                                    <td class="product_total">$<?=  $row["quantity"] * $row["price_after_discount"]; ?></td>
                                                <?php else: ?>
                                                    <?php $total_price += $row["quantity"] * $row["price_before_discount"]; ?>
                                                    <td class="product_total">$<?= $row["quantity"] * $row["price_before_discount"]; ?></td>
                                                <?php endif; ?>
                                                <td class="product_remove"><a href="../handlers/delete_product.php?id=<?= $row["id"] ?>"><i class="ion-android-close"></i></a></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>   
                            </div>        
                        </div>
                    </div>
                </div>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">   
                                    <p>Enter your coupon code if you have one.</p>                                
                                    <input placeholder="Coupon code" name="coupon" type="text">
                                    <?php errors("coupon"); ?>
                                    <?php Session::remove("errors"); ?>
                                    <button type="submit">Apply coupon</button>
                                </div>    
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal">
                                        <p>Subtotal</p>
                                        <p class="cart_amount">$<?= $total_price; ?></p>
                                    </div>
                                    <div class="cart_subtotal">
                                        <p>Shipping</p>
                                        <?php if($shipping == true): ?>
                                            <p class="cart_amount"><span>Flat Rate:</span> $255.00</p>
                                        <?php else: ?>
                                            <p class="cart_amount"><span>Flat Rate:</span> $0.00</p>
                                        <?php endif; ?>
                                    </div>
                                    <hr>
                                    <div class="cart_subtotal">
                                        <p>Total</p>
                                        <?php if(Session::get("coupon_value") != 0): ?>
                                        <?php $coupon_value = Session::get("coupon_value"); ?>
                                        <p class="cart_amount">$<?= ($total_price + ($shipping ? 255.00 : 0)) * ($coupon_value / 100 - 0); ?></p>
                                        <?php else: ?>
                                        <p class="cart_amount">$<?= ($total_price + ($shipping ? 255.00 : 0)); ?></p>
                                        <?php endif; ?>
                                        </div>
                                    <div class="checkout_btn">
                                        <a href="<?= url("checkout"); ?>">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
        <?php else: ?>
            <div class="alert alert-info text-center">
                No products in the cart.
            </div>
        <?php endif; ?>
    </div>     
</div>
<!--shopping cart area end -->

<?php require_once ROOT_PATH . 'inc/footer.php'; ?>
