<?php require_once "inc/main.php"; ?>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?php echo url("home"); ?>">Home</a></li>
                        <li>Register</li>
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
                                <h2>Register now</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="account-content">
                                <form action="../handlers/handle-register.php" method="POST">
                                    <div class="single-acc-field">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="name" placeholder="Enter Your Name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                                        <?php errors("name"); ?>
                                    </div>
                                    <div class="single-acc-field">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Enter your Email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                                        <?php errors("email"); ?>
                                    </div>
                                    <!-- Adding Phone field -->
                                    <div class="single-acc-field">
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" name="phone" placeholder="Enter your Phone Number" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                                        <?php errors("phone"); ?>
                                    </div>
                                    <div class="single-acc-field">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" placeholder="At least 8 characters">
                                        <?php errors("password"); ?>
                                    </div>
                                    <div class="single-acc-field">
                                        <button type="submit">Register now</button>
                                    </div>
                                    <a href="<?php echo url("login"); ?>">Already have an account? Login</a>
                                </form>
                                <?php Session::remove("errors"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once ROOT_PATH . 'inc/footer.php'; ?>
