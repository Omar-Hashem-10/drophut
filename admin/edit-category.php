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
        $category_id = Request::getGet("id");
        $conn = Database::connect("localhost", "root", "", "drophut");
        $sql = Database::select("*", "categories", "category_id", $category_id);
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result))
        {
            Session::set("category_name", $row["name"]);
        }
    ?>

<div class="container">
    <h2>Update User Information</h2>
    <form action="handlers/handle-update-category.php?id=<?= $category_id ?>" method="POST">
        <div class="form-group">
            <label for="category_name">Username</label>
            <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Enter your Category Name" value="<?= Session::get('category_name'); ?>">
            <?php errors("category_name"); ?>
            <?php Session::remove("errors"); ?>
        </div>
        <button type="submit" class="btn btn-primary">Update Information</button>
    </form>
</div>


    <?php require_once "inc/footer.php"; ?>