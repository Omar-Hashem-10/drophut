<?php require_once "inc/main.php"; ?>
<?php require_once ROOT_PATH . 'inc/my_account_css.php'; ?>

<?php if(Session::check("user_id") == false): ?>
<section class="pt-60 pb-30 gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-welcome">
                    <div class="card-body text-center">
                        <h1 class="logo_l">Welcome to <span class="text-success">Drophut</span></h1>
                        <div class="btn-container">
                            <a href="<?php echo url("login"); ?>" class="btn btn-primary">Login</a>
                            <a href="<?php echo url("register"); ?>" class="btn btn-secondary">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php else: ?>
  <?php
  $user_id = Session::get("user_id");
  $conn = Database::connect("localhost", "root", "", "drophut");
  $sql = Database::select("*", "users", "user_id", "$user_id");
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_assoc($result);
  mysqli_close($conn);
  ?>
<section class="pt-60 pb-30 gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-info">
                    <div class="card-body text-center">
                        <h2 class="card-title">User Information</h2>
                        <?php require_once "inc/success.php"; ?>
                        <div class="card-content">
                            <p><strong>Name: </strong><?= $user["username"]; ?></p>
                            <p><strong>Email: </strong><?= $user["email"]; ?></p>
                            <!-- Add Edit Profile Button -->
                            <a href="<?= url('edit-profile'); ?>" class="btn btn-warning mt-3">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php require_once ROOT_PATH . 'inc/footer.php'; ?>
