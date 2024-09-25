<?php require_once "inc/main.php"; ?>

<?php
if (Session::check("user_id")) {
    $user_id = Session::get("user_id");
}else{
    redirect(url("my-account"));
}
?>


    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

    <section class="account">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="account-contents" style="background: url('assets/img/about/about2.jpg'); background-size: cover;">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                                <div class="account-thumb">
                                    <h2>Contact us</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                            <?php require_once "inc/success.php" ?>
                                    <form action="../handlers/handle-contact.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single-acc-field">
                                                    <label for="name">Name</label>
                                                    <input type="text" placeholder="Name" id="name" name="name" value="<?= htmlspecialchars(Request::getPost('name')); ?>">
                                                    <?php errors("name"); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="single-acc-field">
                                                    <label for="email">Email</label>
                                                    <input type="email" placeholder="Email" id="email" name="email" value="<?= htmlspecialchars(Request::getPost('email')); ?>">
                                                    <?php errors("email"); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="single-acc-field">
                                                    <label for="msg">Message</label>
                                                    <textarea name="msg" id="msg" rows="4"><?= htmlspecialchars(Request::getPost('msg')); ?></textarea>
                                                    <?php errors("msg"); ?>
                                                        <?php Session::remove("errors"); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-acc-field">
                                            <button type="submit">Send Message</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once ROOT_PATH . 'inc/footer.php'; ?>
