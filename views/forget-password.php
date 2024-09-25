<?php require_once "inc/main.php"; ?>

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?= url("home"); ?>">home</a></li>
                            <li>Forget password</li>
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
                                    <h2>Forgot password?</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-content">
                                <?php require_once "inc/success.php" ?>
                                    <form action="../handlers/handle_reset_password.php" method="POST">
                                        <div class="single-acc-field">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" placeholder="Enter your Email">
                                            <?php if (Session::check('errors') && isset(Session::get('errors')['email'])): ?>
                                                <div class="alert alert-danger text-center">
                                                    <?= htmlspecialchars(Session::get('errors')['email']); ?>
                                                </div>
                                                <?php Session::remove("errors"); ?>
                                            <?php elseif (Session::check('errors')): ?>
                                                <div class="alert alert-danger text-center">
                                                    <?= htmlspecialchars(Session::get('errors')); ?>
                                                </div>
                                                <?php Session::remove("errors"); ?>
                                            <?php endif; ?>

                                            <div class="single-acc-field">
                                                <button type="submit" class="btn btn-primary">Reset Password</button>
                                            </div>
                                        </div>
                                        <a href="<?= url("login"); ?>">Login now</a>
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