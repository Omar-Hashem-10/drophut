<?php require_once "inc/main.php"; ?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?= url("home") ?>">home</a></li>
                        <li>blog details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->

<?php
    $blog_id = Request::getGet("id");
    $conn = Database::connect("localhost", "root", "", "drophut");
    $sql = Database::select("*", "blogs", "id", $blog_id);
    $result = mysqli_query($conn, $sql);
?>

<!--blog body area start-->
<div class="blog_details mt-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <!--blog grid area start-->
                <div class="blog_wrapper">
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <article class="single_blog">
                        <figure>
                           <div class="post_header">
                               <h3 class="post_title"><?= $row["title"]; ?></h3>
                                <div class="blog_meta">                                        
                                    <span class="author">Posted by : <?= $row["author"]; ?> / </span>
                                    <span class="post_date"><a href="#"><?= $row["post_date"]; ?></a></span>
                                </div>
                            </div>
                            <div class="blog_thumb">
                                <img src="<?php echo BASE_URL . "../public/images/blogs/" . $row["image"]; ?>" alt="">
                           </div>
                           <figcaption class="blog_content">
                                <div class="post_content">
                                    <p><?= $row["excerpt"]; ?></p>
                                    <blockquote>
                                        <p><?= $row["quote"]; ?></p>
                                    </blockquote>
                                    <p><?= $row["content"]; ?></p>
                                </div>
                                <div class="entry_content">
                                    <div class="post_meta">
                                        <span>Tags: </span>
                                        <span><a href="#">Drone, </a></span>
                                        <span><a href="#">Sky, </a></span>
                                        <span><a href="#">Fly</a></span>
                                    </div>

                                    <div class="social_sharing">
                                        <p>share this post:</p>
                                        <ul>
                                            <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                           </figcaption>
                        </figure>
                    </article>
                    <?php endwhile; ?>
                    <!-- end -->

    <?php
        $sql = Database::select("*", "comments", "blog_id", $blog_id);
        $result = mysqli_query($conn, $sql);
        $count_review = mysqli_num_rows($result); 
    ?>

                    <div class="comments_box">
                        <h3><?= $count_review > 0 ? $count_review . ' Comment' : 'No Comments' ?></h3>
                        <div class="comment_list">
                            <?php if ($count_review > 0): ?>
                                <?php while($row = mysqli_fetch_assoc($result)): ?>
                                <div class="comment_thumb">
                                    <img src="assets/img/blog/comment3.png.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><?= $row["name"] ?></h5>
                                        <span><?= date("M d Y", strtotime($row["created_at"])) ?></span> 
                                    </div>
                                    <p><?= $row["comment_text"]; ?></p>
                                </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="comments_form">
                        <h3>Leave a Reply </h3>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <?php require_once "inc/success.php" ?>
                        <form action="../handlers/handle-add-comment.php?id=<?= $blog_id ?>" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <label for="review_comment">Comment *</label>
                                    <textarea name="comment" id="review_comment"></textarea>
                                    <?php errors("comment"); ?>
                                </div> 
                                <div class="col-lg-4 col-md-4">
                                    <label for="name">Name *</label>
                                    <input id="name" name="name" type="text">
                                    <?php errors("name"); ?>
                                </div> 
                                <div class="col-lg-4 col-md-4">
                                    <label for="email">Email *</label>
                                    <input id="email" name="email" type="email">
                                    <?php errors("email"); ?>
                                </div> 
                                <?php Session::remove("errors"); ?>
                            </div>
                            <button class="button" type="submit">Post Comment</button>
                        </form>    
                    </div>
                </div>
                <!--blog grid area start-->
            </div>
        </div>
    </div>
</div>
<!--blog section area end-->

<?php require_once ROOT_PATH . 'inc/footer.php'; ?>
