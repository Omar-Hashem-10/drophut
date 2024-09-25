<?php require_once "inc/main.php"; ?>

<style>
    .table_desc {
        margin-top: 20px;
    }

    .products_table {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    .product_thumb img {
        width: 50px;
        height: auto; 
        border-radius: 5px;
    }

    .action_buttons {
        text-align: center;
    }

    .btn {
        display: inline-block;
        padding: 8px 12px;
        margin: 5px;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-edit {
        background-color: #28a745;
    }

    .btn-delete {
        background-color: #dc3545;
    }

    .btn-edit:hover {
        background-color: #218838;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }
</style>

<?php
    $order_id = Request::getGet("id");  

    $conn = Database::connect("localhost", "root", "", "drophut");

    $sql = Database::selectJoin(["order_items.*", "products.title", "products.price_after_discount", "products.price_before_discount", "products.image"], 
                                    "order_items", "products", "order_items.product_id = products.product_id", "order_items.order_id", $order_id);

    $result = mysqli_query($conn, $sql);
?>

<?php
    $sql_2 = Database::select(["status"], "orders", "order_id", $order_id);
    $result_2 = mysqli_query($conn, $sql_2);
    $status = mysqli_fetch_assoc($result_2);
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="table_desc">
                <div class="products_table table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>QTY</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td class="product_thumb"><img src="<?= BASE_URL . "../public/images/products/" . $row["image"] ?>" alt="Product Image"></td>
                                <td><?= $row["title"] ?></td>
                                <td><?= $row["quantity"] ?></td>
                                <?php if(!empty("price_after_discount")): ?>
                                <td>$<?= $row["quantity"] * $row["price"] ?></td>
                                <?php else: ?>
                                <td>$<?= $row["quantity"] * $row["price"] ?></td>
                                <?php endif; ?>
                                <td class="action_buttons">
                                <?php if($status["status"] != "shipped" && $status["status"] != "completed"): ?>
                                    <a href="handlers/delete_order_item.php?id=<?= $row['order_item_id']; ?>" class="btn btn-delete">Delete</a>
                                <?php endif; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once ROOT_PATH . 'inc/footer.php'; ?>