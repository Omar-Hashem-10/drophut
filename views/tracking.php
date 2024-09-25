<?php require_once "inc/main.php"; ?>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li>Tracking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

    <!--Tracking product start-->
    <div class="tracking-product mt-60 mb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 text-center">
                    <h2>Your Tracking Number</h2>
                    <form action="../handlers/handle_tracking.php" method="POST">
                        <input type="text" name="tracking" placeholder="Eg:#0.325FHJU658745EGU">
                        <?php errors("track"); ?>
                        <?php Session::remove("errors"); ?>
                        <button type="submit"><i class="fa fa-binoculars"></i> Track now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Tracking product end-->

    <!--Tracking product start-->
    <div class="feature-area  mt-60">
        <div class="container">
            <div class="row justify-content-center">
                <?php if(Session::check("tracking_status")): ?>
                    <?php if(Session::get("tracking_status") == "pending"): ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-after">
                    <div class="animation">
                        <i class="fa fa-clock" aria-hidden="true"></i> <!-- Pending -->
                    </div>
                        <h4>Pending</h4>
                        <p>Your order is being processed.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-before disabled">
                            <i class="fa fa-spinner" aria-hidden="true"></i> <!-- Processing -->
                        <h4>Processing</h4>
                        <p>Your order is being prepared for shipment.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-after disabled" >
                        <i class="fa fa-shipping-fast" aria-hidden="true"></i> <!-- Shipped -->
                        <h4>Shipped</h4>
                        <p>Your order has been shipped.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 disabled">
                        <i class="fa fa-check" aria-hidden="true"></i> <!-- Completed -->
                        <h4>Completed</h4>
                        <p>Your order has been delivered.</p>
                    </div>
                </div>
                <?php elseif(Session::get("tracking_status") == "processing"): ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-after">
                        <i class="fa fa-clock" aria-hidden="true"></i> <!-- Pending -->
                        <h4>Pending</h4>
                        <p>Your order is being processed.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-before ">
                    <div class="animation">
                            <i class="fa fa-spinner" aria-hidden="true"></i> <!-- Processing -->
                            </div>
                        <h4>Processing</h4>
                        <p>Your order is being prepared for shipment.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-after disabled" >
                        <i class="fa fa-shipping-fast" aria-hidden="true"></i> <!-- Shipped -->
                        <h4>Shipped</h4>
                        <p>Your order has been shipped.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 disabled">
                        <i class="fa fa-check" aria-hidden="true"></i> <!-- Completed -->
                        <h4>Completed</h4>
                        <p>Your order has been delivered.</p>
                    </div>
                </div>
                <?php elseif(Session::get("tracking_status") == "shipped"): ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-after">
                        <i class="fa fa-clock" aria-hidden="true"></i> <!-- Pending -->
                        <h4>Pending</h4>
                        <p>Your order is being processed.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-before ">
                            <i class="fa fa-spinner" aria-hidden="true"></i> <!-- Processing -->
                        <h4>Processing</h4>
                        <p>Your order is being prepared for shipment.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-after " >
                    <div class="animation">
                        <i class="fa fa-shipping-fast" aria-hidden="true"></i> <!-- Shipped -->
                        </div>
                        <h4>Shipped</h4>
                        <p>Your order has been shipped.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 disabled">
                        <i class="fa fa-check" aria-hidden="true"></i> <!-- Completed -->
                        <h4>Completed</h4>
                        <p>Your order has been delivered.</p>
                    </div>
                </div>
                <?php elseif(Session::get("tracking_status") == "completed"): ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-after">
                        <i class="fa fa-clock" aria-hidden="true"></i> <!-- Pending -->
                        <h4>Pending</h4>
                        <p>Your order is being processed.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-before ">
                            <i class="fa fa-spinner" aria-hidden="true"></i> <!-- Processing -->
                        <h4>Processing</h4>
                        <p>Your order is being prepared for shipment.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-after " >
                        <i class="fa fa-shipping-fast" aria-hidden="true"></i> <!-- Shipped -->
                        <h4>Shipped</h4>
                        <p>Your order has been shipped.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 ">
                    <div class="animation">
                        <i class="fa fa-check" aria-hidden="true"></i> <!-- Completed -->
                        </div>
                        <h4>Completed</h4>
                        <p>Your order has been delivered.</p>
                    </div>
                </div>
                <?php endif; ?>
                <?php endif; ?>
                <?php Session::remove("tracking_status"); ?>
            </div>
        </div>
    </div>
    <!--Tracking product end-->

<?php require_once ROOT_PATH . 'inc/footer.php'; ?>
