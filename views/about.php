<?php require_once "inc/main.php"; ?>

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?= url("home") ?>">home</a></li>
                            <li>About</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

    <?php
        $conn = Database::connect("localhost", "root", "", "drophut");
        $sql = Database::select("*", "about", "image", "about_1.jpg");
        $result = mysqli_query($conn,$sql);
    ?>

    <!--about section area -->
    <section class="about_section mt-60">
        <div class="container">   
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="row align-items-center">
                <div class="col-12">
                   <figure>
                        <div class="about_thumb">
                            <img src="<?php echo BASE_URL . "../public/images/about/" . $row["image"] ?>" alt="">
                        </div>
                        <figcaption class="about_content">
                            <h1><?= ucwords($row["title"]) ?></h1>
                            <p><?= $row["description"] ?></p>
                        </figcaption>
                    </figure>
                </div>    
            </div>
            <?php endwhile; ?>
        </div>    
    </section>
    <!--about section end-->

    <?php
        $sql = Database::select("*", "about", "image", "about_2.jpg");
        $sql .= "OR `image` = 'about_3.jpg'";
        $result = mysqli_query($conn,$sql);
    ?>


    <!--services img area-->
    <div class="about_gallery_section">
        <div class="container">  
            <div class="row">
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-lg-6 col-md-6">
                    <article class="single_gallery_section">
                        <figure>
                            <div class="gallery_thumb">
                                <img src="<?php echo BASE_URL . "../public/images/about/" . $row["image"] ?>" alt="">
                            </div>
                            <figcaption class="about_gallery_content">
                               <h3><?= ucwords($row["title"]) ?></h3>
                                <p><?= $row["description"] ?></p>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <?php endwhile; ?>
            </div>
        </div>     
    </div>
    <!--services img end-->       

    <?php
        $sql = Database::select("*", "services", "major", "about");
        $result = mysqli_query($conn,$sql);
    ?>

    <!--chose us area start-->
    <div class="choseus_area">
        <div class="container">
            <div class="row">
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-lg-4 col-md-4">
                    <div class="single_chose">
                        <div class="chose_icone">
                            <img src="<?php echo BASE_URL . "../public/images/about/" . $row["icon"] ?>" alt="">
                        </div>
                        <div class="chose_content">
                            <h3><?= ucwords($row["title"]); ?></h3>
                            <p><?= $row["description"] ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <!--chose us area end-->

    <?php
        $sql = Database::select("*", "users", "role", "Employee");
        $result = mysqli_query($conn,$sql);
    ?>

   <!--team area start-->
   <div class="team_area">
       <div class="container">
           <div class="row justify-content-center">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <article class="team_member">
                        <figure>
                            <div class="team_thumb">
                                <img src="<?php echo BASE_URL . "../public/images/about/" . $row["image"] ?>" alt="">
                            </div>
                            <figcaption class="team_content">
                                <h3><?= ucwords($row["username"]); ?></h3>
                                <h5><?= ucwords($row["job_title"]); ?></h5>
                                <p>Phone: <?= $row["phone_number"]; ?> <br> Email: <?= $row["email"]; ?></p>
                            </figcaption>
                        </figure>   
                    </article>
                </div>
            <?php endwhile; ?>
           </div>
       </div>
   </div>
   <!--team area end-->
        

<?php require_once ROOT_PATH . 'inc/footer.php'; ?>