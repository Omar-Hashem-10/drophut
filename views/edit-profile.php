<?php require_once "inc/main.php"; ?>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?php echo url("home"); ?>">Home</a></li>
                        <li>Change Email & Password</li>
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
            <div class="col-lg-10">
                <div class="account-contents" style="background: url('assets/img/about/about1.jpg'); background-size: cover;">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="account-thumb">
                                <h2>Update Your Information</h2>
                                <p>You can change your email address or password below</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="account-content">
                                <!-- Check if there are any errors -->
                                    <?php errors("0"); ?>
                                    <?php require_once "inc/success.php"; ?>
                                <form action="../handlers/handle-update-account.php" method="POST">
                                    <div class="single-acc-field">
                                        <label for="email">New Email</label>
                                        <input type="email" id="email" name="email" placeholder="Enter your new email">
                                        <?php errors("email"); ?>
                                    </div>
                                    <div class="single-acc-field">
                                        <label for="current-password">Current Password</label>
                                        <input type="password" id="current-password" name="current_password" placeholder="Enter your current password">
                                        <?php errors("current_password"); ?>
                                    </div>
                                    <div class="single-acc-field">
                                        <label for="new-password">New Password</label>
                                        <input type="password" id="new-password" name="new_password" placeholder="Enter your new password">
                                        <?php errors("new_password"); ?>
                                    </div>
                                    <div class="single-acc-field">
                                        <label for="confirm-password">Confirm New Password</label>
                                        <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your new password">
                                        <?php errors("confirm_password"); ?>
                                    </div>
                                    <?php Session::remove("errors"); ?>
                                    <div class="single-acc-field">
                                        <button type="submit">Update Information</button>
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
