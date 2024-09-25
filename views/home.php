<?php require_once "inc/main.php"; ?>

<?php
    $conn = Database::connect("localhost", "root", "", "drophut");
    $sql = Database::select("*", "sliders");
    $result = mysqli_query($conn, $sql);
?>

    <!--slider area start-->
    <section class="slider_section d-flex align-items-center" data-bgimg="assets/img/slider/slider3.jpg">
        <div class="slider_area owl-carousel">
            <?php while($slider = mysqli_fetch_assoc($result)): ?>
            <div class="single_slider d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <h1><?= ucwords($slider["title"]); ?></h1>
                                <h2><?= ucwords($slider["sub_title"]); ?></h2>
                                <p><?= ucwords($slider["offer_text"]); ?> <span> <?= ucwords($slider["offer_discount"]); ?> </span> </p>
                                <a class="button" href="<?php echo url('products'); ?>">Shop now</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <img  src="<?php echo BASE_URL . "../public/images/sliders/" . $slider["image"]; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
    <!--slider area end-->

    <?php
    $sql = Database::selectJoin(["p.product_id", "p.title", "p.image", "p.price_after_discount", "p.price_before_discount",  "p.major", "p.category_id","c.category_id", "c.name"],
                                "products p", "categories c", "p.category_id = c.category_id", "p.major", "tranding products");
    $result = mysqli_query($conn, $sql);
    ?>

    <!--Tranding product-->
    <section class="pt-60 pb-30 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Tranding Products</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php while($trandingProduct = mysqli_fetch_assoc($result)): ?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-tranding">
                        <a href="<?php echo url('product-details&id=') . $trandingProduct["product_id"]; ?>">
                            <div class="tranding-pro-img">
                                <img src="<?php echo BASE_URL . "../public/images/tranding products/" . $trandingProduct["image"]; ?>" alt="">
                            </div>
                            <div class="tranding-pro-title">
                                <h3><?= ucwords($trandingProduct["title"]); ?></h3>
                                <h4><?= ucwords($trandingProduct["name"]); ?></h4>
                            </div>
                            <div class="tranding-pro-price">
                                <div class="price_box">
                                    <span class="current_price">$<?= $trandingProduct["price_after_discount"]; ?></span>
                                    <span class="old_price">$<?= $trandingProduct["price_before_discount"]; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section><!--Tranding product-->

    <?php
        $sql = Database::select("*", "awesome_features");
        $result = mysqli_query($conn, $sql);
    ?>

    <!--Features area-->
    <section class="features-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Awesome Features</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php while($awesomeFeature = mysqli_fetch_assoc($result)): ?>
                    <?php if($awesomeFeature["image"] != NULL)
                    {
                        $productImage = $awesomeFeature["image"];
                    } 
                    ?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-features">
                        <img src="<?php echo BASE_URL . "../public/images/awesome features/" . $awesomeFeature["icon"] ?>" alt="">
                        <h3><?= ucwords($awesomeFeature["title"]); ?></h3>
                        <p><?= $awesomeFeature["description"]; ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <a href="#"><img src="<?php echo BASE_URL . "../public/images/awesome features/" . $productImage ?>" alt=""></a>
                </div>
            </div>
        </div>
    </section><!--Features area-->

    <?php
        $sql = Database::select("*", "features_product");
        $result = mysqli_query($conn, $sql);
    ?>


    <!--Features area-->
    <section class="gray-bg pt-60 pb-60">
        <div class="container">
            <div class="row">
                <?php while($feature_product = mysqli_fetch_assoc($result)): ?>
                    <?php if($feature_product["id"] == 1): ?>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 order-lg-1 order-md-1 order-sm-1">
                    <div class="pro-details-feature">
                        <img src="<?php echo BASE_URL . "../public/images/features_product/" . $feature_product["image"]; ?>" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 order-lg-2 order-md-2 order-sm-2">
                    <div class="pro-details-feature">
                        <h3><?= ucwords($feature_product["title"]); ?></h3>
                        <p><?= $feature_product["description"]; ?></p>
                        <?php
                            $text = $feature_product["features"];
                            $sentences = explode(',', $text);
                        ?>
                        <ul>
                            <?php
                                foreach ($sentences as $sentence) {
                                    if (trim($sentence) !== '') 
                                    { 
                                        echo '<li>' . htmlspecialchars(trim($sentence)) . '</li>';
                                    }
                                }
                            ?>
                        </ul>
                        <a href="<?php echo url('product-details&id=11') ; ?>">$70 Buy now</a>
                    </div>
                </div>
                    <?php elseif($feature_product["id"] == 2): ?>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 order-lg-3 order-md-4 order-sm-4 order-4">
                    <div class="pro-details-feature">
                    <h3><?= ucwords($feature_product["title"]); ?></h3>
                        <p><?= $feature_product["description"]; ?></p>
                        <?php
                            $text = $feature_product["features"];
                            $sentences = explode(',', $text);
                        ?>
                        <ul>
                            <?php
                                foreach ($sentences as $sentence) {
                                    if (trim($sentence) !== '') 
                                    { 
                                        echo '<li>' . htmlspecialchars(trim($sentence)) . '</li>';
                                    }
                                }
                            ?>
                        </ul>
                        <a href="<?php echo url('product-details&id=11') ; ?>">$70 Buy now</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 order-lg-4 order-md-3 order-sm-3 order-3">
                    <div class="pro-details-feature">
                        <img src="<?php echo BASE_URL . "../public/images/features_product/" . $feature_product["image"]; ?>" alt="">
                    </div>
                </div>
                <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section><!--Features area-->

    
<!--area-->
<section class="pt-60 pb-60 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section-title">
                    <h2>Watch it now</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <video controls autoplay muted style="width: 100%;">
                    <source src="../public/videos/TOP 5_ Best Drones 2024.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</section><!--area-->



    <?php
    $sql = Database::selectJoin(["p.product_id", "p.title", "p.image", "p.price_after_discount", "p.price_before_discount",  "p.major", "p.category_id","c.category_id", "c.name"],
                                "products p", "categories c", "p.category_id = c.category_id", "p.major", "other collections");
    $result = mysqli_query($conn, $sql);
    ?>

    <!--Other product-->
    <section class="pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Other collections</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php while($other_collections = mysqli_fetch_assoc($result)): ?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-tranding mb-30">
                        <a href="<?php echo url('product-details&id=') . $other_collections["product_id"] ?>">
                            <div class="tranding-pro-img">
                                <img src="<?php echo BASE_URL . "../public/images/other_collections/" . $other_collections["image"]; ?>" alt="">
                            </div>
                            <div class="tranding-pro-title">
                                <h3><?= ucwords($other_collections["title"]); ?></h3>
                                <h4><?= ucwords($other_collections["name"]); ?></h4>
                            </div>
                            <div class="tranding-pro-price">
                                <div class="price_box">
                                    <span class="current_price">$<?= $other_collections["price_after_discount"]; ?></span>
                                    <span class="old_price">$<?= $other_collections["price_before_discount"]; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section><!--Other product-->

    <?php
        $sql = Database::selectJoin(["f.*", "u.username"],"feedback f", "users u", "f.user_id = u.user_id");
        $result = mysqli_query($conn, $sql);
    ?>

    <!--Testimonials-->
    <section class="pb-60 pt-60 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="testimonial_are">
                        <div class="testimonial_active owl-carousel">
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <article class="single_testimonial">
                                <figure>
                                    <div class="testimonial_thumb">
                                        <a href="#"><img src="<?php echo BASE_URL . "../public/images/feedback/" . $row["image"] ?>"></a>
                                    </div>
                                    <figcaption class="testimonial_content">
                                        <p><?= $row["feedback_text"]; ?></p>
                                        <h3><?= $row["username"]; ?><span> - <?= $row["user_title"]; ?></span></h3>
                                    </figcaption>
                                    
                                </figure>
                            </article>    
                        <?php endwhile; ?>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Testimonials-->

    <?php
        $sql = Database::select("*", "blogs", "major", "blog posts");
        $result = mysqli_query($conn, $sql);
    ?>

    <!--Blog-->
    <section class="pt-60">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Blog Posts</h2>
                    </div>
                </div>
            </div>
            <div class="row blog_wrapper">
                <?php while($blog_post = mysqli_fetch_assoc($result)): ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="single_blog mb-60">
                        <figure>
                            <div class="blog_thumb">
                                <a href="<?php echo url('blog-details&id=') . $blog_post["id"]; ?>"><img src="<?php echo BASE_URL . "../public/images/blog posts/" . $blog_post["image"] ?>" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h3><a href="<?php echo url('blog-details&id=') . $blog_post["id"]; ?>"><?= $blog_post["title"]; ?></a></h3>
                                <div class="blog_meta">                                        
                                    <span class="author">Posted by : <a href="#"><?= $blog_post["author"]; ?></a> / </span>
                                    <span class="post_date"><a href="#"><?= $blog_post["post_date"]; ?></a></span>
                                </div>
                                <div class="blog_desc">
                                    <p><?= $blog_post["excerpt"]; ?></p>
                                </div>
                                <footer class="readmore_button">
                                    <a href="<?php echo url('blog-details&id=') . $blog_post["id"]; ?>">read more</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section><!--/Blog-->

    <?php
        $sql = Database::select("*", "services", "major", "home");
        $result = mysqli_query($conn, $sql);
    ?>

    <!--shipping area start-->
    <section class="shipping_area">
        <div class="container">
            <div class=" row">
                <?php while($shipping = mysqli_fetch_assoc($result)): ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="<?php echo BASE_URL . "../public/images/shipping/" . $shipping["icon"]; ?>" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2><?= ucwords($shipping["title"]); ?></h2>
                            <p><?= $shipping["description"]; ?></p>
                        </div>
                    </div>
                </div>                     
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <!--shipping area end-->
    <?php require_once ROOT_PATH . 'inc/footer.php'; ?>