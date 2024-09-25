<?php
ob_start();
require_once "logout_icon_css.php";
require_once "core/classes/Session.php";
?>
    <!--header area start-->
    <!--Offcanvas menu area start-->
    <div class="off_canvars_overlay"></div>
    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                                <a href="javascript:void(0)"><i class="ion-android-close"></i></a>  
                        </div>
                        <div class="support_info">
                            <p>Any Enquiry: <a href="tel:">+56985475235</a></p>
                        </div>
                        <div class="top_right text-right">
                            <ul>
                                <li><a href="<?php echo url('my-account'); ?>"> My Account </a></li> 
                                <li><a href="<?php echo url('checkout'); ?>"> Checkout </a></li> 
                            </ul>
                        </div> 
                        <div class="search_container">
                            <form action="#">
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit">Search</button> 
                                </div>
                            </form>
                        </div> 
                        
                        <div class="middel_right_info">
                            <a href="<?php echo url('my-account'); ?>"><img src="assets/img/user.png" alt=""></a>
                            <div class="header_wishlist">
                                <a href="<?php echo url('wishlist'); ?>" title="Wishlist">
                                    <img src="assets/img/wishlist.png" alt="Wishlist">
                                </a>
                            </div>
                            <div class="mini_cart_wrapper">
                                <a href="<?php echo url('cart'); ?>"><img src="assets/img/shopping-bag.png" alt=""></a>
                                <span class="cart_quantity">2</span>
                            </div>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="<?php echo url('home'); ?>">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="<?php echo url('products'); ?>">products</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="<?php echo url('about'); ?>">About</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="<?php echo url('contact'); ?>">contact</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="<?php echo url('blog'); ?>">blog</a>
                                </li>
                            </ul>
                        </div>

                        <div class="Offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@drophunt.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->
    
    <header>
        <div class="main_header">
            <!--header top start-->
            <div class="header_top">
                <div class="container">  
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="support_info">
                                <p>Email: <a href="mailto:">support@drophunt.com</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top_right text-right">
                                <ul>
                                   <li><a href="<?php echo url('my-account'); ?>">Account</a></li> 
                                   <li><a href="<?php echo url('checkout'); ?>">Checkout</a></li> 
                                </ul>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
            <!--header top start-->
            <!--header middel start-->
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="logo">
                                <a href="<?php echo url('home'); ?>"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6">
                            <div class="middel_right">
                                <div class="search_container">
                                   <form action="#">
                                        <div class="search_box">
                                            <input placeholder="Search product..." type="text">
                                            <button type="submit">Search</button> 
                                        </div>
                                    </form>
                                </div>
                                <div class="middel_right_info">
                                    <div class="header_profile">
                                        <a href="<?php echo url('my-account'); ?>"><img src="assets/img/user.png" alt=""></a>
                                    </div>
                                    <div class="mini_cart_wrapper">
                                        <a href="<?php echo url('wishlist'); ?>" title="Wishlist">
                                        <span class="cart_quantity"><?= Session::get("wishlist_count") ?></span>
                                            <i class="fa fa-fw fa-heart"></i> 
                                        </a>
                                    </div>
                                    <div class="mini_cart_wrapper">
                                        <a href="<?php echo url('cart'); ?>"><img src="assets/img/shopping-bag.png" alt=""></a>
                                        <span class="cart_quantity"><?= Session::get("total_items") ?></span>
                                    </div>
                                    <div class="mini_cart_wrapper">
                                        <a href="<?php echo url('order'); ?>" title="My Orders">
                                            <i class="fa fa-fw fa-box"></i> 
                                        </a>
                                        <span class="cart_quantity"><?= Session::get("total_orders") ?></span>
                                    </div>

                                    <?php if(Session::check("user_id") == true): ?>
                                    <a href="<?= url("logout") ?>" class="header_icon logout-icon" title="Logout">
                                        <i class="fa fa-fw fa-sign-out-alt"></i>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header middel end-->
            <!--header bottom start-->
            <div class="main_menu_area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="main_menu menu_position"> 
                                <nav>  
                                    <ul>
                                        <li><a href="<?php echo url('home'); ?>">home</a></li>
                                        <li><a href="<?php echo url('products'); ?>">Products</a></li>
                                        <li class="menu-item-has-children">
                                            <a href="<?php echo url('about'); ?>">About</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="<?php echo url('blog'); ?>">blog</a>
                                        </li>
                                        <li><a href="<?php echo url('contact'); ?>"> Contact</a></li>
                                    </ul>  
                                </nav> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header bottom end-->
        </div> 
    </header>
    <!--header area end-->
