<?php require_once "../inc/main-handlers.php"; ?>
<?php
$order_item_id = Request::getGet("id");

$conn = Database::connect("localhost", "root", "", "drophut");

$order_id_sql = Database::select(['order_id'], 'order_items', 'order_item_id', $order_item_id);
$order_result = mysqli_query($conn, $order_id_sql);

if ($order_result && mysqli_num_rows($order_result) > 0) {
    $order_data = mysqli_fetch_assoc($order_result);
    $order_id = $order_data['order_id'];

    $items_count_sql = "SELECT COUNT(*) as item_count FROM order_items WHERE order_id = $order_id";
    $items_count_result = mysqli_query($conn, $items_count_sql);
    $items_count_data = mysqli_fetch_assoc($items_count_result);
    $item_count = $items_count_data['item_count'];

    if ($item_count == 1) {
        $delete_order_sql = Database::delete('orders', 'order_id', $order_id);
        if (mysqli_query($conn, $delete_order_sql)) {
            Session::set('success', "Order deleted successfully.");
        } else {
            Session::set('error', "Error deleting order: " . mysqli_error($conn));
        }

        $sql_count_orders = "SELECT COUNT(*) AS total_orders FROM orders WHERE user_id = '".Session::get("user_id")."'";
        $count_orders_result = mysqli_query($conn, $sql_count_orders);
        $total_orders = 0;
        
        if ($count_orders_result && mysqli_num_rows($count_orders_result) > 0) {
            $count_orders_data = mysqli_fetch_assoc($count_orders_result);
            $total_orders = $count_orders_data['total_orders'] ?: 0; 
            Session::set("total_orders", $total_orders);
        }
        

        redirect(url("order"));
    } else {
        $delete_item_sql = Database::delete("order_items", "order_item_id", $order_item_id);
        if (mysqli_query($conn, $delete_item_sql)) {
            Session::set('success', "Product removed from order.");
        } else {
            Session::set('error', "Error removing product: " . mysqli_error($conn));
        }

        $sql_count_orders = "SELECT COUNT(*) AS total_orders FROM orders WHERE user_id = '".Session::get("user_id")."'";
$count_orders_result = mysqli_query($conn, $sql_count_orders);
$total_orders = 0;

if ($count_orders_result && mysqli_num_rows($count_orders_result) > 0) {
    $count_orders_data = mysqli_fetch_assoc($count_orders_result);
    $total_orders = $count_orders_data['total_orders'] ?: 0; 
    Session::set("total_orders", $total_orders);
}


        redirect(url("order_details"));
    }
} else {
    Session::set('error', "Invalid product ID.");
    redirect(url("order_details"));
}

// إغلاق الاتصال بقاعدة البيانات
mysqli_close($conn);
?>
