<?php require_once "inc/main.php"; ?>

    <style>
        .container {
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f7f7f7;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    input:focus {
        outline: none;
        border-color: #007bff;
    }

    .btn {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    </style>

    <?php
        $user_id = Request::getGet("id");
        $conn = Database::connect("localhost", "root", "", "drophut");
        $sql = Database::select("*", "users", "user_id", $user_id);
        $resutl = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($resutl))
        {
            Session::set("username", $row["username"]);
            Session::set("email", $row["email"]);
            Session::set("password", $row["password"]);
            Session::set("phone", $row["phone_number"]);
            Session::set("job", $row["job_title"]);
        }
    ?>

<div class="container">
    <h2>Update User Information</h2>
    <form action="handlers/handle-update-employee.php?id=<?= $user_id ?>" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" value="<?= Session::get('username'); ?>">
            <?php errors("name"); ?>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" value="<?= Session::get('email'); ?>">
            <?php errors("email"); ?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" value="<?= Session::get('password'); ?>">
            <?php errors("password"); ?>
            <button type="button" id="togglePassword" class="btn btn-secondary mt-2">Show Password</button>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" value="<?= Session::get('phone'); ?>">
            <?php errors("phone"); ?>
        </div>
        <div class="form-group">
            <label for="job_title">Job Title</label>
            <input type="text" id="job_title" name="job_title" class="form-control" placeholder="Enter your job title" value="<?= Session::get('job'); ?>">
            <?php errors("job_title"); ?>
                <?php Session::remove("errors"); ?>
        </div>
        <button type="submit" class="btn btn-primary">Update Information</button>
    </form>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
        // Toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // Toggle the button text
        this.textContent = type === 'password' ? 'Show Password' : 'Hide Password';
    });
</script>


    <?php require_once "inc/footer.php"; ?>