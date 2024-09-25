<?php require_once "inc/main.php"; ?>

    <style>
.color_item {
    display: inline-block;
    margin-right: 10px;
}

.color_item input[type="radio"] {
    display: none;
}

.color_item label {
    display: inline-block;
    cursor: pointer;
    position: relative;
    width: 25px; 
    height: 25px; 
    border-radius: 50%;
    border: 2px solid transparent;
    transition: border-color 0.3s ease;
}

.color_item label:hover {
    border-color: #000;
}

.color_item span {
    display: block;
    width: 100%;
    height: 100%;
    border-radius: 50%;
}

.color_item input[type="radio"]:checked + span {
    border: 4px solid #fff; 
    
}

.rating input {
    display: none;
    
}

.rating label {
    font-size: 30px; 
    color: #ccc; 
    cursor: pointer;
}

.rating input:checked ~ label {
    color: gold; 
}

.rating label:hover,
.rating label:hover ~ label {
    color: gold; 
}


    </style>

    <?php
        if(Request::has("id", "GET") == true)
        {
            Session::set("product_id", Request::getGet("id"));
        }

        $conn = Database::connect("localhost", "root", "", "drophut");

        $sql = Database::selectJoin(["*","c.category_id", "c.name"],
        "products p", "categories c", "p.category_id = c.category_id", "product_id", Session::get("product_id"));

        $result = mysqli_query($conn, $sql);
    ?>

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?= url("home"); ?>">home</a></li>
                            <li>Product details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
        
    <!--product details start-->
    <?php while($product_details = mysqli_fetch_assoc($result)): ?>
    <div class="product_details mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="<?php echo BASE_URL . "../public/images/products/" . $product_details["image"]; ?>" data-zoom-image="<?php echo BASE_URL . "../public/images/products/" . $product_details["image"]; ?>" alt="big-1">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                    <?php require_once "inc/success.php" ?>
                        <form action="../handlers/handle-add-cart.php?id=<?= Session::get("product_id"); ?>" method="POST">
                            
                            <h1><?= $product_details["title"] ?></h1>
                            <div class=" product_ratting">
                            <div class="product_ratting">
                                <ul>
                                    <li>
                                    <?php 
                                        $averageRating = Session::get("count_review") > 0 ? Session::get("rate") / Session::get("count_review") : 0;
                                        $roundedRating = round($averageRating);
                                        echo str_repeat('<i class="text-warning fa fa-star"></i>', $roundedRating);
                                        echo str_repeat('<i class="text-muted fa fa-star"></i>', 5 - $roundedRating);
                                    ?>
                                    </li>
                                    <li class="review"><a href="#"> (<?= Session::get("count_review") ?> reviews) </a></li>
                                </ul>
                            </div>

                                
                            </div>
                            <div class="price_box">
                            <?php if($product_details["price_after_discount"] != 0): ?>
                                    <span class="current_price">$<?= $product_details["price_after_discount"]; ?></span>
                                    <span class="old_price">$<?= $product_details["price_before_discount"]; ?></span>
                                    <?php else: ?>
                                    <span class="current_price">$<?= $product_details["price_before_discount"]; ?></span>
                                    <?php endif; ?>
                            </div>
                            <div class="product_desc">
                                <ul>
                                    <?php if($product_details["stock"] == 1): ?>
                                    <li>In Stock</li>
                                    <?php else: ?>
                                    <li>Out Stock</li>
                                    <?php endif; ?>
                                    <?php if($product_details["stock"] == 1): ?>
                                    <?php if($product_details["delivery"] == "free"): ?>
                                    <li>Free delivery available</li>
                                    <?php endif; ?>
                                    <?php if($product_details["coupon"] != ""): ?>
                                    <li>Sale <?= $product_details["coupon_value"]; ?>% Off Use Code : '<?= $product_details["coupon"]; ?>'</li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                                <p> <?= $product_details["description"] ?> </p>
                            </div>
                            <?php
                                $colors = explode(",", $product_details["color"]);
                                $default_color = htmlspecialchars($colors[0]);
                            ?>
                            <?php if($product_details["stock"] == 1): ?>
                            <input type="hidden" name="selected_color" value="<?= $default_color; ?>">
                                <div class="product_variant color">
                                    <h3>Available Options</h3>
                                    <label>Color</label>
                                    <ul id="color-options">
                                        <?php foreach($colors as $color): ?>
                                            <li class="color_item">
                                                <label>
                                                    <input type="radio" name="selected_color" value="<?php echo htmlspecialchars($color); ?>" 
                                                    <?php if ($color === $default_color) echo 'checked'; ?>>
                                                    <span style="background-color: <?php echo htmlspecialchars($color); ?>;"></span>
                                                </label>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <div class="product_variant quantity">
                                <label>quantity</label>
                                <input id="quantity" name="qty" min="1" max="100" value="1" type="number">
                                <button class="button" id="add-to-cart" type="submit">add to cart</button>  
                            </div>
                            <?php endif; ?>
                            <div class=" product_d_action">
                            <ul>
                                <li><a href="../handlers/handle_add_wishlist.php?id=<?= Session::get("product_id"); ?>" title="Add to wishlist">+ Add to Wishlist</a></li>
                            </ul>
                            </div>
                            <div class="product_meta">
                                <span>Category: <?= $product_details["name"]; ?></a></span>
                            </div>
                            
                        </form>
                        <div class="priduct_social">
                            <ul>
                                <li><a class="facebook" href="https://facebook.com" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>           
                                <li><a class="twitter" href="https://twitter.com" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>           
                                <li><a class="pinterest" href="https://pinterest.com" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>           
                                <li><a class="google-plus" href="https://google.com" title="google +"><i class="fa fa-google-plus"></i> share</a></li>        
                                <li><a class="linkedin" href="https://linkedin.com" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>        
                            </ul>      
                        </div>

                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!--product details end-->

    <?php

    $sql = Database::select("*", "review", "product_id", Session::get("product_id"));

    $result = mysqli_query($conn, $sql);
    ?>

    <!--product info start-->
    <div class="product_d_info mb-60">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">   
                        <div class="product_info_button">    
                            <ul class="nav" role="tablist">
                                <li >
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                </li>
                                <li>
                                    <?php $count_review = mysqli_num_rows($result); ?>
                                    <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (<?= $count_review; ?>)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                <div class="product_info_content">
                                    <p><?= $product_details["description"]; ?></p>
                                </div>    
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" >
                                <div class="reviews_wrapper">
                                    <?php Session::set("count_review", $count_review); ?>
                                    <h2><?= $count_review; ?> review</h2>
                                    <?php if($count_review == 0): ?>
                                        <h3>No Review</h3>
                                    <?php else: ?>
                                    <?php $rate = 0; while($review = mysqli_fetch_assoc($result)): ?>
                                        <?php 
                                        $rate += $review["rating"];
                                        Session::set("rate", $rate);
                                        ?>
                                    <div class="reviews_comment_box">
                                        <div class="comment_thmb">
                                            <img src="assets/img/blog/comment2.jpg" alt="">
                                        </div>
                                        <div class="comment_text">
                                            <div class="reviews_meta">
                                                <div class="star_rating">
                                                <li>
                                                    <?php echo str_repeat('<i class="text-warning fa fa-star"></i>', $review["rating"]); ?>
                                                    <?php echo str_repeat('<i class="text-muted fa fa-star"></i>', 5 - $review["rating"]); ?>
                                                </li>
                                                </div>
                                                <p><?= $review["name"] ?> - <?= date("M d Y", strtotime($review["created_at"])) ?></p>
                                                <span><?= $review["you_review"]; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                    <div class="comment_title">
                                        <h2>Add a review</h2>
                                        <p>Your email address will not be published. Required fields are marked </p>
                                    </div>

                                    <div class="product_review_form">
                                    <form action="../handlers/handle-add-review.php?id=<?= Session::get('product_id'); ?>" method="POST">
                                    <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <h3>Your rating</h3>
                                                <div class="rating">
                                            <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
                                            <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
                                            <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
                                            <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
                                            <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>                                                </div>
                                            </div>
                                                <div class="col-12">
                                                    <label for="review_comment">Your review </label>
                                                    <textarea name="review_comment" id="review_comment"></textarea>
                                                    <?php if (Session::check('errors') && isset(Session::get('errors')['review_comment'])): ?>
                                                        <div class="alert alert-danger text-center">
                                                            <?= htmlspecialchars(Session::get('errors')['review_comment']); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div> 
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Name</label>
                                                    <input id="author" name="name" type="text"> 
                                                    <?php if (Session::check('errors') && isset(Session::get('errors')['name'])): ?>
                                                        <div class="alert alert-danger text-center">
                                                            <?= htmlspecialchars(Session::get('errors')['name']); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div> 
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email" name="email" type="text">
                                                    <?php if (Session::check('errors') && isset(Session::get('errors')['email'])): ?>
                                                        <div class="alert alert-danger text-center">
                                                            <?= htmlspecialchars(Session::get('errors')['email']); ?>
                                                            <?php Session::remove("errors"); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>  
                                            </div>
                                            <button type="submit">Submit</button>
                                        </form>   
                                    </div> 
                                </div>     
                            </div>
                        </div>  
                    </div>    
                </div>
            </div>   
        </div>    
    </div>  
    <!--product info end-->
    <?php endwhile; ?>

    <script>
    window.onload = function() {
        let reloadCount = localStorage.getItem('reloadCount') || 0;

        if (reloadCount < 2) {
            reloadCount++;
            localStorage.setItem('reloadCount', reloadCount);

            location.reload();
        } else {
            localStorage.removeItem('reloadCount');
        }
    };
</script>


    <?php require_once ROOT_PATH . 'inc/footer.php'; ?>

