<?php require_once "inc/main.php"; ?>

<style>
h2 {
    text-align: center;
    margin-bottom: 20px;
}

.wishlist-table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

.wishlist-table th, .wishlist-table td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

.wishlist-table th {
    background-color: #f4f4f4;
}

.product-image {
    width: 100px;
    height: auto;
}

.btn {
    padding: 5px 10px;
    margin: 0 5px;
    border: none;
    border-radius: 3px;
    text-decoration: none;
    color: #fff;
}

.btn-danger {
    background-color: #e74c3c;
}
</style>

<?php
$user_id = Session::get("user_id");
$conn = Database::connect("localhost", "root", "", "drophut");
$sql = Database::select("*", "wishlist", "user_id", $user_id);
$result = mysqli_query($conn, $sql);

$hasProducts = mysqli_num_rows($result) > 0;
?>

<div class="container mt-5">
    <h2>Your Wishlist</h2>
    <?php if ($hasProducts): ?>
        <?php require_once "inc/success.php" ?>
        <table class="wishlist-table">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><img src="<?php echo BASE_URL . "../public/images/products/" . $row["image"];?>" class="product-image"></td>
                    <td><?= $row["title"] ?></td>
                    <td>$<?= $row["price"]; ?></td>
                    <td>
                        <a href="../handlers/delete_wishlist.php?id=<?= $row["id"]; ?>" class="btn btn-danger">Remove</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center;">No products in your wishlist.</p>
    <?php endif; ?>
</div>

<?php require_once ROOT_PATH . 'inc/footer.php'; ?>
