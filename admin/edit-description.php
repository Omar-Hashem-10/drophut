<?php require_once "inc/main.php"; ?>

<?php
if(!empty(Request::getGet("id")))
{
    Session::set("description_id", Request::getGet("id"));
}
    $description_id = Session::get("description_id");
    $conn = Database::connect("localhost", "root", "", "drophut");
    $sql = Database::select("*", "description", "id", $description_id);
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
        Session::set("description", $row["description"]);
    }
?>

<section class="content">
<div class="container mt-5">
    <h2 class="text-center">Edit Description</h2>
    <div class="card">
        <div class="card-header">
            Update Description
        </div>
        <div class="card-body">
            <form action="handlers/handle-update-description.php?id=<?= $description_id ?>" method="POST">
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required><?= Session::get("description"); ?></textarea>
                    <?php errors("description"); ?>
                </div>
            <?php Session::remove("errors"); ?>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</section>

<?php require_once "inc/footer.php"; ?>
