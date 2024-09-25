    <!--footer area start-->
    <?php require_once ROOT_PATH . "core/classes/Database.php" ?>
    <?php
        $conn = Database::connect("localhost", "root", "", "drophut");
        $sql = Database::select("*", "description");
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
    <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container contact_us">
                        <div class="footer_logo">
                            <a href="#"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <div class="footer_contact">
                            <p><?= $row["description"]; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="<?php echo url('products'); ?>">Products</a></li>
                                <li><a href="<?php echo url('about'); ?>">About Us</a></li>
                                <li><a href="<?php echo url('blog') ?>">blogs</a></li>
                                <li><a href="<?php echo url('contact'); ?>">Contact Us</a></li>
                                <li><a href="<?php echo url('privacy-policy') ?>">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>My Account</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="<?php echo url('my-account'); ?>">My Account</a></li>
                                <li><a href="#<?php echo url('order') ?>">Order</a></li>
                                <li><a href="<?php echo url('wishlist'); ?>">Wish List</a></li>
                                <li><a href="<?php echo url('faq'); ?>">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                    $sql = Database::select("*", "social_media");
                    $result = mysqli_query($conn, $sql);
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container newsletter">
                        <h3>Follow Us</h3>
                        <div class="footer_social_link">
                            <ul>
                                <?php while($link = mysqli_fetch_assoc($result)): ?>
                                <li><a class="<?= $link["link_name"]; ?>" href="<?= $link["link_url"]; ?>" title="<?= ucwords($link["link_name"]) ?>"><i class="fa fa-<?= $link["link_name"] ?>"></i></a></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <div class="subscribe_form">
                            <h3>Join Our Newsletter Now</h3>
                            <form id="mc-form" class="mc-form footer-newsletter" >
                                <input id="mc-email" type="email" autocomplete="off" placeholder="Your email address..." />
                                <button id="mc-submit">Subscribe!</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p> <a href="templateshub.net">Templates Hub</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_payment text-right">
                            <a href="#"><img src="assets/img/icon/payment.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </footer>
    <!--footer area end-->
<!-- JS
============================================ -->



<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>



</body>

<!--   03:22:07 GMT -->
</html>