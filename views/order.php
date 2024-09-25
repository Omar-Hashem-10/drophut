<?php require_once "inc/main.php"; ?>

    <?php
    if (Session::check("user_id")) {
        $user_id = Session::get("user_id");
    } else {
        redirect(url("my-account"));
    }
    ?>

    <style>
        .table_desc {
            margin-top: 20px;
        }

        .cart_page {
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

        .product_remove {
            text-align: center; 
        }

        .remove_button {
            background-color: #dc3545; 
            color: #fff; 
            border: none;
            padding: 8px 12px; 
            border-radius: 5px; 
            cursor: pointer;
            transition: background-color 0.3s ease; 
            font-size: 14px; 
        }

        .remove_button:hover {
            background-color: #c82333; 
        }

        .tracking_order_button {
            display: inline-block; /* عرض الزر كعنصر مضمن */
            margin: 20px 0; /* هامش أعلى وأسفل */
            padding: 5px 10px; /* حجم الزر */
            background-color: #007bff; /* لون خلفية الزر */
            color: #fff; /* لون النص */
            border: none;
            border-radius: 5px;
            font-size: 14px; /* حجم الخط */
            text-align: center;
            text-decoration: none; /* إزالة التسطير */
            transition: background-color 0.3s ease; 
            float: right; /* وضع الزر على اليمين */
        }

        .tracking_order_button:hover {
            background-color: #0056b3; /* لون الخلفية عند التمرير */
        }
    </style>

    <?php
    $user_id = Session::get("user_id");
    $conn = Database::connect("localhost", "root", "", "drophut");
    $sql = Database::select("*", "orders", "user_id", $user_id);
    $result = mysqli_query($conn, $sql);
    ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="table_desc">
                <div class="cart_page table-responsive">
                <?php require_once "inc/success.php" ?>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th class="product_name">#</th>
                                    <th class="product_status">Status</th>
                                    <th class="product_tracking">Tracking_number</th>
                                    <th class="product_total">Total</th>
                                    <th class="product_action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td class="product_name"><?= $i++; ?></td>
                                    <?php Session::set("status", $row["status"]); ?>
                                    <td class="product_status"><?= $row["status"] ?></td>
                                    <td class="product_tracking"><?= $row["tracking_number"] ?></td>
                                    <td class="product_total">$<?= $row["total_amount"] ?></td>
                                    <td class="product_action">
                                        <a href="<?= url("order-details&id=") . $row['order_id']; ?>" class="btn btn-primary">Show</a>
                                        <?php if($row["status"] != "shipped" && $row["status"] != "completed"): ?>
                                        <a href="../handlers/delete_order.php?id=<?= $row['order_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this order?');">Remove</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <a href="<?= url('tracking'); ?>" class="tracking_order_button">Tracking Order</a>
                        <?php if(Session::get("status") == "completed"): ?>
                        <a href="<?= url('feedback'); ?>" class="btn btn-info" style="margin-top: 20px;">Feedback</a> 
                        <?php endif; ?>
                    <?php else: ?>
                        <p>No Orders</p>
                    <?php endif; ?>
                </div>        
            </div>
        </div>
    </div>
</div>


    <?php require_once ROOT_PATH . 'inc/footer.php'; ?>
