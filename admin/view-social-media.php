    <?php require_once "inc/main.php"; ?>

    <?php
        $conn = Database::connect("localhost", "root", "", "drophut");
        $sql = Database::select("*", "social_media");
        $result = mysqli_query($conn, $sql);
    ?>

    <section class="content">
    <div class="container mt-5">
        <h2 class="mb-4">Social Media Links</h2>
        <?php require_once "inc/success.php"; ?>
        <table class="table table-striped table-bordered">
        <thead>
            <tr>
            <th>#</th>
            <th>Link Name</th>
            <th>Link URL</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i= 1; while($link = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $link["link_name"]; ?></td>
                <td><?= $link["link_url"]; ?></td>
                <td>
                <a href="edit-social-media.php?id=<?= $link['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="handlers/handle-delete-social-media.php?id=<?= $link['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
        </table>
    </div>
    </section>

    <?php require_once "inc/footer.php"; ?>
