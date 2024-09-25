    <?php require_once "inc/main.php"; ?>

    <?php
    if(!empty(Request::getGet("id")))
    {
        Session::set("link_id", Request::getGet("id"));
    }
        $link_id = Session::get("link_id");
        $conn = Database::connect("localhost", "root", "", "drophut");
        $sql = Database::select("*", "social_media", "id", $link_id);
        $result = mysqli_query($conn, $sql);
        while($link = mysqli_fetch_assoc($result))
        {
            Session::set("link_name", $link["link_name"]);
            Session::set("link_url", $link["link_url"]);
        }
    ?>

    <section class="content">
    <div class="container mt-5">
        <h2 class="mb-4">Edit Social Media Link</h2>
        <?php require_once "inc/success.php"; ?>
        <form action="handlers/handle-update-social-media.php?id=<?= $link_id; ?>" method="POST">
        <div class="form-group">
            <label for="linkName">Link Name</label>
            <input type="text" class="form-control" id="linkName" name="link_name" value="<?= Session::get("link_name"); ?>">
            <?php errors("link_name"); ?>
        </div>

        <div class="form-group">
            <label for="linkUrl">Link URL</label>
            <input type="url" class="form-control" id="linkUrl" name="link_url" value="<?= Session::get("link_url"); ?>">
            <?php errors("link_url"); ?>
            <?php Session::remove("errors"); ?>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    </section>

    <?php require_once "inc/footer.php"; ?>
