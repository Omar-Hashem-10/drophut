<?php require_once "inc/main.php"; ?>

<?php
    $conn = Database::connect("localhost", "root", "", "drophut");
    $sql = Database::select("*", "description");
    $result = mysqli_query($conn, $sql);
?>

<div class="container mt-5">
    <h2 class="text-center">Description Display</h2>

    <div class="card">
        <div class="card-header">
            Description List
        </div>
        <div class="card-body">
            <?php require_once "inc/success.php"; ?>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row["description"]); ?></td>
                        <td>
                            <a href="edit-description.php?id=<?= $row["id"]; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="handlers/handle-delete-description.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once "inc/footer.php"; ?>
