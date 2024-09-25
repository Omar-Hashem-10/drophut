<?php require_once "inc/main.php"; ?>
<?php require_once ROOT_PATH . 'inc/products_css.php'; ?>

  <?php
    $conn = Database::connect("localhost", "root", "", "drophut");
    $sql = Database::selectJoin(["p.product_id", "p.title", "p.image", "p.price_after_discount", "p.price_before_discount",  "p.major", "p.category_id","c.category_id", "c.name"],
                                "products p", "categories c", "p.category_id = c.category_id");
    $result = mysqli_query($conn, $sql);
  ?>

    <section class="pt-60 pb-30 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Products</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php while($Product = mysqli_fetch_assoc($result)): ?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-tranding">
                        <a href="<?php echo url('product-details&id=') . $Product["product_id"]; ?>">
                            <div class="tranding-pro-img">
                                <img src="<?php echo BASE_URL . "../public/images/products/" . $Product["image"]; ?>" alt="">
                            </div>
                            <div class="tranding-pro-title">
                                <h3><?= ucwords($Product["title"]); ?></h3>
                                <h4><?= ucwords($Product["name"]); ?></h4>
                            </div>
                            <div class="tranding-pro-price">
                                <div class="price_box">
                                    <?php if($Product["price_after_discount"] != 0): ?>
                                    <span class="current_price">$<?= $Product["price_after_discount"]; ?></span>
                                    <span class="old_price">$<?= $Product["price_before_discount"]; ?></span>
                                    <?php else: ?>
                                    <span class="current_price">$<?= $Product["price_before_discount"]; ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

<?php require_once ROOT_PATH . 'inc/footer.php'; ?>
